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
	
	private $limit = 5;
	
        
	function Welcome(){
		parent::__construct();

		session_start();
		if ( !isset($_SESSION['username'])) {
			redirect('admin');
		}

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
	}
	
	public function index()
	{
		$this->load->view('index');
	}
	
	public function initialize_pagination($page_name, $model, $uri_segment=3)
	{
		$offset = $this->uri->segment($uri_segment);

		$this->load->library('pagination');
		
		$config['base_url'] = site_url($page_name);
 		$config['total_rows'] = $model->count_all();
 		$config['per_page'] = $this->limit;
		$config['uri_segment'] = $uri_segment;
	
		$this->pagination->initialize($config);

	}
	
	public function test($offset = 0) 
	{
		$this->initialize_pagination('welcome/test/', $this->DaoProducts);
		$data['pagination'] = $this->pagination->create_links();
		$data['products']  = $this->DaoProducts->get_paged_list($this->limit, $offset)->result();	
		
		$charDiv = $this->load->view( 'content/listProducts', $data , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	
	public function locations($offset = 0)
	{
		$this->initialize_pagination('welcome/locations/', $this->Locations);
		$data['pagination'] = $this->pagination->create_links();
		$data['locations'] = $this->Locations->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listLocations', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}
	
	public function roles($offset = 0)
	{
		$this->initialize_pagination('welcome/roles/', $this->Roles);
		$data['pagination'] = $this->pagination->create_links();
		$data['roles'] = $this->Roles->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listRoles', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}
	
	public function users($offset = 0)
	{
		$this->initialize_pagination('welcome/users/', $this->Users);
		$data['pagination'] = $this->pagination->create_links();
		$data['users'] = $this->Users->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listUsers', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}

	public function transactions($offset = 0)
	{
		$this->initialize_pagination('welcome/transactions/', $this->Transactions);
		$data['pagination'] = $this->pagination->create_links();
		$data['transactions'] = $this->Transactions->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listTransactions', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
