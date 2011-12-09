<?php

class Add_task extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		session_start();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Tasks');
		$this->load->model('TradeAutomates');
	}	
	function index()
	{			
		if ( !isset($_SESSION['username'])) 
		{
			redirect('login');
		}
		if($_SESSION['user']->Role > 2)
		{
			redirect('access_denied');
		}
		
		$charDiv = $this->load->view( 'content/add_task_view', '' , TRUE );
		$this->load->view( 'mainFrame', array('content' => $charDiv ) );
		
	}
		
	function save()
	{
		
		if ( !isset($_SESSION['username'])) 
		{
			redirect('login');
		}

		if($_SESSION['user']->Role > 2)
		{
			redirect('access_denied');
		}
		
		$this->form_validation->set_rules('trade_automat_id', 'Trade Automat ID', 'required|is_numeric');			
		$this->form_validation->set_rules('worker_staff', 'Worker Staff', 'required|is_numeric');			
		$this->form_validation->set_rules('description', 'Description', 'required|trim');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		do
		{
			if ($this->form_validation->run() == FALSE) // validation hasn't been passed
			{
				$charDiv = $this->load->view( 'content/add_task_view', '' , TRUE );
				$this->load->view( 'mainFrame', array('content' => $charDiv ) );
				break;
			}		
			// build array for the models
			
			$form_data = array(
					       	'trade_automat_id' => set_value('trade_automat_id'),
					       	'worker_staff' => set_value('worker_staff'),
					       	'description' => set_value('description')
							);
				
			if($this->TradeAutomates->TradeAutomatBelongToUser($_SESSION['user']->id, $form_data['trade_automat_id'])->num_rows == 0)
			{
				$this->load->view( 'mainFrame', array('content' => "You don't have any trade automat with pointed ID" ) );
				break;
			}
			
			if($this->Tasks->get_by_id($form_data['worker_staff'])->num_rows == 0)
			{
				$this->load->view( 'mainFrame', array('content' => "Worker staff with such id doesn't exist" ) );
				break;
			}
			
			//
			// run insert model to write data to db
			if ($this->Tasks->insert($form_data['trade_automat_id'], $form_data['worker_staff'], $form_data['description']) == TRUE)
			{
				redirect('admin/tasks');   // or whatever logic needs to occur
			}
			else
			{
				echo 'An error occurred saving your information. Please try again later';
				// Or whatever error handling is necessary
			}
		}
		while(false);
	}
	function success()
	{
			echo 'this form has been successfully submitted with all validation being passed. All messages or logic here. Please note
			sessions have not been used and would need to be added in to suit your app';
	}
}
?>