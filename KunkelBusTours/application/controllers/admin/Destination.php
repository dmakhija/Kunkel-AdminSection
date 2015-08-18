<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destination extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//load the destination model
		$this->load->model('destination_model');
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
				case 'upload':
						$this->upload();
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
	public function index($page = 'viewDestinations')
    {        	
		if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
		{			
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$data['destination_data']=$this->destination_model->get_destinations();		
		
		$this->load->view('admin/'.$page, $data);
    }
    
    /*
     * This function will insert a bus to the fleet
    */
    public function add($page = 'addDestination')
    {
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	
    	$data['title'] = ucfirst($page); // Capitalize the first letter    	
    	
    	if($this->input->post('btn_insert'))
    	{
    		$latitude=floatval(number_format($this->input->post('latitude'),4,".","."));
    		$longitude=floatval(number_format($this->input->post('longitude'),4,".","."));
    		
    		//form posted back on click event of insert button
    		//pass validation
    		$destination_data = array(
    				'country' => $this->input->post('country'),
    				'province' => $this->input->post('state'),
    				'city' => ucwords($this->input->post('city')),
    				'latitude' => floatval(number_format($this->input->post('latitude'),4,".",".")), //$this->input->post('latitude'),
    				'longitude' => floatval(number_format($this->input->post('longitude'),4,".",".")),//$this->input->post('longitude'),
    				'picture_id' =>0    			
    		); 
    		//echo $destination_data['country'] ."--".$destination_data['province']."--". ucwords($destination_data['city']);
    		  		
    		//insert the form data into database
    		$is_inserted=$this->destination_model->insert_destination($destination_data);
    		if($is_inserted==true)
    		{
    			redirect('admin/destination/index');    			
    		}
    		else 
    		{
    			$this->load->view('admin/'.$page, $data);
    		}    
    			
    		$this->load->view('admin/'.$page, $data);
    	}
    	else 
    	{
    		//page is loaded first-time
    		$this->load->view('admin/'.$page, $data);
    	} 
    	
    }
    
    /*
     * This function will display details of the requested bus
    */
    public function details($id = 0)
    {
    	$page="viewDestinationDetails";
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	 
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    	$data['destination_id']=$id;
    	$data['destination_details']=$this->destination_model->get_destination_details($id);
    	$this->load->view('admin/'.$page, $data);    	
    }
    
    /*
     * This function will edit details of the requested bus
    */
    public function edit($id = 0)
    {
    	$page="editDestinationDetails";
    	//if requested page does not exists, show error page
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	
    	$data['title'] = ucfirst($page); // Capitalize the first letter 
    	if($this->input->post('btn_edit'))
    	{    		
    		//form posted back on click event of edit button
    		$destination_id = $this->input->post('hdn_id');
    		
    		//pass validation
    		if(($this->input->post('country')!=-1) && ($this->input->post('state')!=-1) && ($this->input->post('city')!="") && ($this->input->post('latitude')!="") && ($this->input->post('longitude')!=""))
    		{
    			$destination_data = array(
    					'country' => $this->input->post('country'),
    					'province' => $this->input->post('state'),
    					'city' => $this->input->post('city'),
    					'latitude' => $this->input->post('latitude'),
    					'longitude' => $this->input->post('longitude'),
    					'picture_id' => 0
    			);
    			
    			//update the form data into database
    			$is_updated=$this->destination_model->update_destination_details($destination_id, $destination_data);
    			if($is_updated!=0)
    			{
    				//updated successfully
    				redirect('admin/destination/index');
    			}
    			else
    			{
    				//redirect('admin/bus/edit/'.$id);
    				$data['destination_details']=array(
    						'id' => $destination_id,
    						'country' => $destination_data['country'],
    						'province' => $destination_data['province'],
    						'city' => $destination_data['city'],
    						'latitude' => $destination_data['latitude'],
    						'longitude' => $destination_data['longitude']
    				);
    				$data['count']=sizeof($data['destination_details']);
    				$this->load->view('admin/'.$page, $data);
    			}    			
    		}
    		else
    		{
    			redirect('admin/destination/edit/'.$destination_id);
    		}    		   		
    		
    	}
    	else
    	{    		
    		//page is loaded first-time
    		$destination_data=$this->destination_model->get_destination_details($id);
    		$data['count']=sizeof($destination_data);
    		if($data['count']!=0)
    		{
	    		$data['destination_details']=array(
	    				'id' => $destination_data['id'],
	    				'country' => $destination_data['country'],
	    				'province' => $destination_data['province'],
	    				'city' => $destination_data['city'],
	    				'latitude' => $destination_data['latitude'],
	    				'longitude' => $destination_data['longitude']
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
    	$is_deleted=$this->destination_model->delete_destination_details($id);
    	if($is_deleted!=0)
    	{
    		//deleted successfully
    		redirect('admin/destination/index');
    	}
    	else
    	{
    		//not a valid id,unable to delete
    		redirect('admin/destination/details/'.$id);    		
    	}
    }
    
    /*
     * This function will upload images for destinations
    */
    public function upload($id=0)
    {
    	$page = 'uploadDestinationImages';
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		show_404();
    	}
    	
    	if($id==0)
    	{
    		show_404();
    	}
    	    
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    	$data['id']=$id;
    	
    	if($this->input->post("btn_upload1")){
    		
    		$config = array(
    				'upload_path' => '/assests/uploads/destinationImages/',  //"./uploads/",
    				'allowed_types' => "gif|jpg|png|jpeg",
    				'overwrite' => FALSE,
    				'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
    				'max_height' => "768",
    				'max_width' => "1024"
    		);
    		
	    	$this->load->library('upload', $config);    	
	    	
	    	if($this->upload->do_upload('image1'))
	    	{
	    		//$data['upload_data'] = $this->upload->data();
	    		//array('upload_data' => $this->upload->data());
	    		//$this->load->view('upload_success',$data);
	    		$data['status']->message = "File Uploaded Successfully";
	    		$data['status']->success = TRUE;
	    		$data["uploaded_file"] = $this->upload->data();
	    	}
	    	else
	    	{
	    		//$data['errors']= array('error' => $this->upload->display_errors());
	    		//$error = array('error' => $this->upload->display_errors());
	    		//$this->load->view('file_view', $error);
	    		$data['status']->message = $this->upload->display_errors();
	    		$data['status']->success = FALSE;
	    		//$data['errors']= array('error' => $this->upload->display_errors());
	    	}
    	}    	
    	
    	//$data['trip_data']=$this->trip_model->get_trips();
    	//echo sizeof($data['trip_data']);
    
    	$this->load->view('admin/'.$page, $data);
    }
    
    function error()
    {
    	/*  Output error page (don't forget your 404 heaaders) */
    	// Whoops, we don't have a page for that!
    	 show_404();    	
    }
	
}
