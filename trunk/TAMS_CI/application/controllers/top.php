<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include '../models/DaoLocation.php';

class Top extends CI_Controller {

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
	
        
	function Top()
	{
		parent::__construct();
		
		session_start();
		if ( !isset($_SESSION['username'])) {
			redirect('login');
		}
		
		// load helper
		$this->load->helper('url');
		
		$this->load->model('DaoProducts');
		$this->load->model('TradeAutomates');
		
	}

	public function index()
	{
		$data['products_top'] = $this->DaoProducts->get_best_selling_products($this->limit)->result();
		$data['ta_top'] = $this->TradeAutomates->get_top_ta($this->limit)->result();
		if (IS_AJAX) {
			 $this->load->view( 'content/topView', $data);
		}
		else{
			$charDiv = $this->load->view( 'content/topView', $data , TRUE );
			$this->load->view( 'mainFrame', array('content' => $charDiv ) );
		}
	}
	
	
}
