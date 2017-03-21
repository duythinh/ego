<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends FE_Controller
{
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function FunctionName($value='')
	{
		
		# code...
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */