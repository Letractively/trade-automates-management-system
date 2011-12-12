<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

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
	function __construct()
	{
		parent::__construct();
		session_start();
		$this->load->model('Roles');
	}
	public function index()
	{
		//echo sha1('unreal');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_address', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'min_length[4]');

		$ErrorMessage="";
		if ($this->form_validation->run() !== false) 
		{
			//then validation passed
			$this->load->model('admin_model');
			$res = $this
				->admin_model
				->verify_user(
					$this->input->post('email_address'),
					$this->input->post('password')
				);
			if ($res !== false)
			{
				//person has an account
				$_SESSION['username'] = $this->input->post('login');
				$_SESSION['user'] = $res;
				$_SESSION['role'] = $this->Roles->get_by_id($res->id);
				//echo $_SESSION['user']->Name;
				//echo $res->Name;
				redirect( base_url() );
			}
			else
			{
				$ErrorMessage="Error: Bad login or password.";
			}
		}
		
		if($ErrorMessage=="")
		{
			$charDiv = $this->load->view( 'login_view', 'null' , TRUE );
		}
		else
		{
			$charDiv = $ErrorMessage;			
		}       			

		$this->load->view('mainFrame', array( 'content' => $charDiv ) );
	}
	public function logout()
	{
		session_destroy();
		redirect( base_url() );
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */

