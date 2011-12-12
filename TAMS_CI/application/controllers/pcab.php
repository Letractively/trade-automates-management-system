<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include '../models/DaoLocation.php';

class Pcab extends CI_Controller {

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
	
        
	function Pcab()
	{
		parent::__construct();
		
		session_start();
		if ( !isset($_SESSION['username'])) {
			redirect('login');
		}
		
		// load helper
		$this->load->helper('url');
		
		$this->load->model('Users');
		$this->load->model('Roles');
		$this->load->model('TradeAutomates');
		
	}

	public function index()
	{
		$data['user'] = $this->Users->get_by_id($_SESSION['user']->id)->result();
		$data['role'] = $this->Roles->get_by_id($data['user'][0]->Role)->result();
		$data['ta'] = $this->TradeAutomates->list_all_by_owner($data['user'][0]->id)->result();
		if (IS_AJAX) {
			 $this->load->view( 'content/profile', $data);
		}
		else{
			$charDiv = $this->load->view( 'content/profile', $data , TRUE );
			$this->load->view( 'mainFrame', array('content' => $charDiv ) );
		}
	}
	
	
}
