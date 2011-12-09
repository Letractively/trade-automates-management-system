<?php

class Add_trade_automat extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		session_start();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Admin_model');
		$this->load->model('TradeAutomates');
	}	
	function index()
	{	
		if ( !isset($_SESSION['username'])) {
			redirect('login');
		}
		if($_SESSION['user']->Role > 2)
		{
			redirect('access_denied');
		}
		
		$charDiv = $this->load->view( 'content/add_trade_automat_view', '' , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
	}

	function save()
	{

		if ( !isset($_SESSION['username'])) {
			redirect('login');
		}

		if($_SESSION['user']->Role > 2)
		{
			redirect('access_denied');
		}

		$this->form_validation->set_rules('trade_automat_id', 'Trade Automat ID', 'required|is_numeric');			
		$this->form_validation->set_rules('type', 'Type', 'required');			
		$this->form_validation->set_rules('service_id', 'Service ID', 'required|is_numeric');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$charDiv = $this->load->view( 'content/add_trade_automat_view', '' , TRUE );
			$this->load->view( 'mainFrame', array('content' => $charDiv ) );
        }
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'trade_automat_id' => set_value('trade_automat_id'),
					       	'type' => set_value('type'),
					       	'service_id' => set_value('service_id')
						);
					
			// run insert model to write data to db
			if ($this->TradeAutomates->insert($form_data['trade_automat_id'], 
				$form_data['type'], $_SESSION['user']->id, $form_data['service_id']) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('admin/trade_automates');   // or whatever logic needs to occur
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
}
?>