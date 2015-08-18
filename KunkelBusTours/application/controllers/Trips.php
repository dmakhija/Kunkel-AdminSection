<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trips extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
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
	
	public function index($page='tripDetails')
	{
		redirect('trips/details/1');
	}
	
	public function details($id=0)
    {
    	
    	$page = 'tripDetails';
    	//echo $page;
    	
		if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter		
		$this->load->view('pages/'.$page, $data);
    }
	
}
