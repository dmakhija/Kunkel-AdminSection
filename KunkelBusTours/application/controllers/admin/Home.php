<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		//load the  model
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
				case 'login':
					$this->login();
					break;
				default:
					$this->index();
					break;
			}
		}
	
	}
	 
	public function index($page='home')
    {	
		if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
		{
			// Whoops, we don't have a page for that!
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalize the first letter
		
		$this->load->view('admin/'.$page, $data);
		
    }
    
    public function login($page='login')
    {
    	if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
    	{
    		// Whoops, we don't have a page for that!
    		show_404();
    	}
    
    	$data['title'] = ucfirst($page); // Capitalize the first letter
    
    	$this->load->view('admin/'.$page, $data);
    
    }
}
