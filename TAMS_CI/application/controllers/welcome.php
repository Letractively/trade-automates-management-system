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
	
	function Welcome(){
		parent::__construct();
		
		// load library
		//$this->load->library(array('table','validation'));
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('DaoProducts');
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function test() {

    //$Dao = new DaoLocation();
//    $query = $this->db->query('SELECT * FROM tams.location');//$Dao->findAll();
//    echo test;
//		foreach ($query->result() as $row)
//		{
//			echo $row->City;
//			echo $row->Street;
//			echo $row->Coordinates;
//			echo '</br>';
//		}
//		
	$persons = $this->DaoProducts->get_paged_list(10, 0)->result();
//	
//	foreach ($persons as $person){
//		echo $person->idProducts , ' ';
//		echo $person->Name , ' ';
//		echo $person->Description, ' ';
//		echo $person->Price, ' ';
//		echo $person->Image, ' ';
//		echo '</br>';
//	}

		$charDiv = $this->load->view( 'content/listProducts', array( 'persons' => $persons ), TRUE );
		$this->load->view( 'mainFrame', array( 'content' => $charDiv ) );
		//$this->load->view('index');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */