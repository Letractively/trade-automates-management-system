<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//include '../models/DaoLocation.php';

class Ta extends CI_Controller {

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


	function Ta()
	{
		parent::__construct();

		session_start();
		if ( !isset($_SESSION['username'])) {
			redirect('login');
		}

		// load library
		//$this->load->library(array('table','validation'));

		// load helper
		$this->load->helper('url');

		$this->load->model('TradeAutomates');
		$this->load->model('Locations');
		//$this->load->model('Status');
		$this->load->model('Users');
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

	public function index()
	{
		$this->initialize_pagination('ta/index', $this->TradeAutomates);
		$data['pagination'] = $this->pagination->create_links();
		$data['trade_automates'] = $this->TradeAutomates->list_all_by_owner($_SESSION['user']->id)->result();
		
		$charDiv = $this->load->view( 'content/tradeAutomats', $data , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}

	public function details($taId=1)
	{
		$data['trade_automates'] = $this->TradeAutomates->get_by_id($taId)->result();
		$data['selling_list'] = $this->TradeAutomates->get_selling_list_by_ta_id($taId)->result();
		$data['transactions'] = $this->TradeAutomates->get_all_ta_transactions($taId)->result();
		$data['owner'] = $this->Users->get_by_id($data['trade_automates'][0]->Owner)->result();
		$data['location'] = $this->Locations->get_by_id($data['trade_automates'][0]->Location)->result();
		$data['service'] = $this->Users->get_by_id($data['trade_automates'][0]->Service)->result();
		//$data['status'] = $this->
		
		$charDiv = $this->load->view( 'content/taDetails', $data , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}
	
	public function delete($taId=1)
	{
		$this->TradeAutomates->delete($taId)->result();
		$this->index();
	}
}
