<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include '../models/DaoLocation.php';

class About extends CI_Controller {

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
	
	private $limit = 10;
	
        
	function About()
	{
		parent::__construct();
		session_start();


		// load library
		//$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		
	}

	public function index()
	{
		$charDiv = $this->load->view( 'content/about/about', 'null' , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	
	public function contacts()
	{
		$charDiv = $this->load->view( 'content/about/contacts', 'null' , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	
	public function feedback()
	{
		$charDiv = $this->load->view( 'content/about/feedback', 'null' , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	
}
