<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		/* When developing a complete codeigniter application, 
		 * you have to load the session library in each and every controller module for which you want only the logged in user to access.*/
		
		//$this->load->library('session');
		$this->load->helper('url');
		//load the bus model
		$this->load->model('bus_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('javascript');
		
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
	public function index($page = 'viewBuses')
    {        	
		if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
		{			
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$data['bus_data']=$this->bus_model->get_bus();		
		
		$this->load->view('admin/'.$page, $data);
    }
    
    /*
     * This function will insert a bus to the fleet
    */
    public function add($page = 'addBus')
    {
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    	
    	
    	if($this->input->post('btn_insert'))
    	{
    		//form posted back on click event of insert button
    		//pass validation
    		$bus_data = array(
    				'vin' => $this->input->post('vin'),
    				'plate' => $this->input->post('plate'),
    				'capacity' => $this->input->post('capacity'),
    				'status' => $this->input->post('status'),
    		);
    		
    		//insert the form data into database
    		$is_inserted=$this->bus_model->insert_bus($bus_data);
    		if($is_inserted==true)
    		{
    			redirect('admin/bus/index');
    		}
    		else 
    		{
    			//$this->load->view('admin/'.$page, $data);
    		}    		
    		
    	}
    	else 
    	{
    		//page is loaded first-time
    		//$this->load->view('admin/'.$page, $data);
    	} 
    	$this->load->view('admin/'.$page, $data);
    	
    }
    
    /*
     * This function will display details of the requested bus
    */
    public function details($id = 0)
    {
    	$page="viewBusDetails";
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	 
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    	$data['bus_id']=$id;
    	$data['bus_details']=$this->bus_model->get_bus_details($id);
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
