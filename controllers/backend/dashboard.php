<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends BE_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->lang->load('dashboard');
    }

    public function index()
    {
        $this->load->view('main_layout', $this->data);
    }
}

/* End of file test.php */
/* Location: ./application/controllers/test.php */