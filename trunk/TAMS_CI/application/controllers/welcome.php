<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include '../models/DaoLocation.php';

class Welcome extends CI_Controller {

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
	
        
	function Welcome(){
		parent::__construct();
		session_start();


		// load library
		//$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('DaoProducts');
		$this->load->model('Locations');
		$this->load->model('Roles');
		$this->load->model('Users');
		$this->load->model('Transactions');
		$this->load->model('TradeAutomates');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
}
