<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_settings extends BE_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->data['view'] = 'configuration/general_settings';
    }

    public function index()
    {
        $this->data['lang'] = array_merge(
            $this->data['lang'],
            $this->lang->load('configuration/general_settings')
        );

        $this->load->view('main_layout', $this->data);
    }
}

/* End of file general_settings.php */
/* Location: ./application/controllers/backend/configuration/general_settings.php */