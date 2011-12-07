<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * 
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
	
        
	function Admin(){
		parent::__construct();

		session_start();
		if ( !isset($_SESSION['username'])) {
			redirect('login');
		}

		// load library
		//$this->load->library(array('table','validation'));
		$this->load->library('form_validation');
		
		// load helper
		$this->load->helper('url');
		
		// load model
		$this->load->model('DaoProducts');
		$this->load->model('Locations');
		$this->load->model('Roles');
		$this->load->model('Users');
		$this->load->model('Transactions');
		$this->load->model('TradeAutomates');
		$this->load->model('TradeList');
		$this->load->model('Tasks');
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
		$this->initialize_pagination('admin/test/', $this->DaoProducts);
		$data['pagination'] = $this->pagination->create_links();
		$data['products']  = $this->DaoProducts->get_paged_list($this->limit, $offset)->result();	
		
		$charDiv = $this->load->view( 'content/listProducts', $data , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	public function addProduct($offset = 0) 
	{
//		$this->initialize_pagination('welcome/test/', $this->DaoProducts);
//		$data['pagination'] = $this->pagination->create_links();
//		$data['products']  = $this->DaoProducts->get_paged_list($this->limit, $offset)->result();	
		
		$charDiv = $this->load->view( 'content/addProduct', '' , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	
function saveProduct()
	{			
		$this->form_validation->set_rules('name', 'Name', '');			
		$this->form_validation->set_rules('description', 'Description', '');			
		$this->form_validation->set_rules('price', 'Price', 'is_numeric');			
		$this->form_validation->set_rules('image', 'Image', '');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('add_form_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'name' => set_value('name'),
					       	'description' => set_value('description'),
					       	'price' => set_value('price'),
					       	'image' => set_value('image')
						);
					
			// run insert model to write data to db
		
			if ($this->DaoProducts->save($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('admin/test');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}

	
	public function locations($offset = 0)
	{
		$this->initialize_pagination('admin/locations/', $this->Locations);
		$data['pagination'] = $this->pagination->create_links();
		$data['locations'] = $this->Locations->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listLocations', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}
	
	public function roles($offset = 0)
	{
		$this->initialize_pagination('admin/roles/', $this->Roles);
		$data['pagination'] = $this->pagination->create_links();
		$data['roles'] = $this->Roles->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listRoles', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}
	
	public function users($offset = 0)
	{
		$this->initialize_pagination('admin/users/', $this->Users);
		$data['pagination'] = $this->pagination->create_links();
		$data['users'] = $this->Users->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listUsers', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}

	public function transactions($offset = 0)
	{
		$this->initialize_pagination('admin/transactions/', $this->Transactions);
		$data['pagination'] = $this->pagination->create_links();
		$data['transactions'] = $this->Transactions->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listTransactions', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}

	public function trade_automates($offset = 0)
	{
		$this->initialize_pagination('admin/trade_automates/', $this->TradeAutomates);
		$data['pagination'] = $this->pagination->create_links();
		$data['trade_automates'] = $this->TradeAutomates->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listTradeAutomates', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}
	
	public function trade_list($offset = 0)
	{
		$this->initialize_pagination('admin/trade_list/', $this->TradeList);
		$data['pagination'] = $this->pagination->create_links();
		$data['trade_list'] = $this->TradeList->get_paged_list($this->limit, $offset, '1', '1', 'or')->result();

		$charDiv = $this->load->view( 'content/listTradeList', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}

	public function tasks($offset = 0)
	{
		$this->initialize_pagination('admin/tasks/', $this->Tasks);
		$data['pagination'] = $this->pagination->create_links();
		$data['tasks'] = $this->Tasks->get_paged_list($this->limit, $offset)->result();

		$charDiv = $this->load->view( 'content/listTasks', $data , TRUE );
		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}

	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */