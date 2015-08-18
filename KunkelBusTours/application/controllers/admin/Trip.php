<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		/* When developing a complete codeigniter application, 
		 * you have to load the session library in each and every controller module for which you want only the logged in user to access.*/
		
		//$this->load->library('session');
		$this->load->helper('url');
		//load the trip model
		$this->load->model('destination_model');
		$this->load->model('trip_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('javascript');
		$this->load->library('upload');
		function _remap($method)
		{			
			switch($method)
			{
				case 'index':
					$this->index();
					break;
				case 'add':
					$this->add();
					break;
				case 'details':
					$this->details();
					break;
				case 'edit':
					$this->edit();
					break;
				case 'delete':
					$this->delete();
					break;
				default:
					$this->index();
					break;
			}
		}
		
	}
	
	/*
	 * This function will display the list of all buses
	 */	
	public function index($page = 'viewTrips')
    {        	
		if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
		{			
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$data['trip_data']=$this->trip_model->get_trips();	
		//echo sizeof($data['trip_data']);	
		
		$this->load->view('admin/'.$page, $data);
    }
    
    /*
     * This function will insert a bus to the fleet
    */
    public function add($page = 'addTrip')
    {    	
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    	
    	/**************Origin country, province and city ******************/
    	$data['countries']=$this->populate_countries();//$this->destination_model->get_countries();     	 	
    	$data['OriginCountry']='-1';
    	$data['OriginProvince']='-1';
    	$data['OriginCity']='-1';
    	
    	$data['DestinationCountry']='-1';
    	$data['DestinationProvince']='-1';
    	$data['DestinationCity']='-1';
    	
    	if($this->input->post('btn_insert'))
    	{
    		//form posted back on click event of insert button
    		//pass validation
    		$trip= array(
    				'trip_name' => $this->input->post('trip_name'),
    				'origin_country' => $this->input->post('origin_country'),
    				'origin_province' => $this->input->post('origin_province'),
    				'origin_city' => $this->input->post('origin_city'),
    				'destination_country' => $this->input->post('destination_country'),
    				'destination_province' => $this->input->post('destination_province'),
    				'destination_city' => $this->input->post('destination_city'),
    				'days' => $this->input->post('trip_days'),
    				'nights' => $this->input->post('trip_nights'),
    				'adult_price' => $this->input->post('adult_price'),
    				'child_price' => $this->input->post('child_price'),
    				'trip_details' => $this->input->post('trip_details')
    		);
    		
    		if($trip['origin_country']!='-1' && $trip['origin_province']!='-1' && $trip['origin_city']!='-1')
    		{
    			$location=$this->destination_model->getLocationId($trip['origin_country'],$trip['origin_province'],$trip['origin_city']);
    			
    			if(sizeof($location)==1)
    			{    
    				$originId=	$location->id;
    			}    			    			
    		}
    		
    		if($trip['destination_country']!='-1' && $trip['destination_province']!='-1' && $trip['destination_city']!='-1')
    		{
    			$location=$this->destination_model->getLocationId($trip['destination_country'],$trip['destination_province'],$trip['destination_city']);
    			 
    			if(sizeof($location)==1)
    			{
    				$destinationId=$location->id;
    			}
    		}
    		
    		 
    		$trip_data=array(
    			'name'=>ucwords(strtolower($trip['trip_name'])),
    			'originId'=>$originId,
    			'destinationId'=>$destinationId,
    			'days'=>$trip['days'],
    			'nights'=>$trip['nights'],
    			'adultPrice'=>$trip['adult_price'],
    			'childPrice'=>$trip['child_price'],
    			'tripDetails'=>$trip['trip_details']  				
    		);
    		
    		//insert the form data into database
    		$is_inserted=$this->trip_model->insert_trip($trip_data);
    		if($is_inserted==true)
    		{
    			redirect('admin/trip/index');
    		}
    		else
    		{
    			$this->load->view('admin/'.$page, $data);
    		}   		
    	
    	}
    	else
    	{
    		//page is loaded first-time
    		$this->load->view('admin/'.$page, $data);
    	}
    	
    }
    
    public function populate_countries()
    {
    	$countries=$this->destination_model->get_countries();
    	return $countries;
    }
    
    public function populate_provinces()
    {  
    	if($this->input->post('origin_country'))
    	{
    		$country=$this->input->post('origin_country');
    	}
   		else if($this->input->post('destination_country'))
    	{
    		$country=$this->input->post('destination_country');
    	}
    	else 
    	{
    		$country= "-1";
    	}    	
    	$provinces=$this->destination_model->get_provinces($country);
    	echo json_encode($provinces);
    }
    
    public function populate_cities()
    {
    	if($this->input->post('origin_province'))
    	{
    		$province=  $this->input->post('origin_province');
    	}
    	else if($this->input->post('destination_province'))
    	{
    		$province=  $this->input->post('destination_province');
    	}
    	else
    	{
    		$province="-1";
    	}    	
    	$cities=$this->destination_model->get_cities($province);
    	echo json_encode($cities);
    }
    
    /*
     * This function will display details of the requested bus
    */
    public function details($id = 0)
    {
    	$page="viewTripDetails";
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	 
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    	//$data['trip_id']=$id;
    	$data['trip_details']=$this->trip_model->get_trip_details($id);
    	echo sizeof($data['trip_details']);
    	$this->load->view('admin/'.$page, $data);    	
    }
    
    /*
     * This function will edit details of the requested bus
    */
    public function edit($id = 0)
    {
    	$page="editBusDetails";
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	
    	$data['title'] = ucfirst($page); // Capitalize the first letter 
    	if($this->input->post('btn_edit'))
    	{    		
    		//form posted back on click event of edit button
    		//pass validation
    		$bus_data = array(
    				//'vin' => $this->input->post('vin'),
    				'plate' => $this->input->post('plate'),
    				'capacity' => $this->input->post('capacity'),
    				'status' => $this->input->post('status'),
    		);
    		$bus_id = $this->input->post('hdn_vin');
    		//update the form data into database
    		$is_updated=$this->bus_model->update_bus_details($bus_id, $bus_data);
    		if($is_updated!=0)
    		{
    			//updated successfully
    			redirect('admin/bus/index');
    		}
    		else
    		{
    			//redirect('admin/bus/edit/'.$id);
    			$data['bus_details']=array(
    					'vin' => $bus_id,
    					'plate' => $bus_data['plate'],
    					'capacity' => $bus_data['capacity'],
    					'status' => $bus_data['status'],
    			);
    			$data['count']=sizeof($data['bus_details']);
    			$this->load->view('admin/'.$page, $data);
    		}
    	
    	}
    	else
    	{    		
    		//page is loaded first-time
    		$bus_data=$this->bus_model->get_bus_details($id);
    		$data['count']=sizeof($bus_data);
    		if($data['count']!=0)
    		{
	    		$data['bus_details']=array(
	    				'vin' => $bus_data['vin'],
	    				'plate' => $bus_data['plate'],
	    				'capacity' => $bus_data['capacity'],
	    				'status' => $bus_data['status'],
	    		);	
    		}
    		$this->load->view('admin/'.$page, $data);    		
    	}    	
    }
    
    /*
     * This function will edit details of the requested bus
    */
    public function delete($id = 0)
    {
    	//delete the data from database
    	$is_deleted=$this->bus_model->delete_bus_details($id);
    	if($is_deleted!=0)
    	{
    		//deleted successfully
    		redirect('admin/bus/index');
    	}
    	else
    	{
    		//not a valid id,unable to delete
    		redirect('admin/bus/details/'.$id);    		
    	}
    }
    
   
    
    function error()
    {
    	/*  Output error page (don't forget your 404 heaaders) */
    	// Whoops, we don't have a page for that!
    	 show_404();    	
    }
	
}
