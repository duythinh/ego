<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BE_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->config->set_item('in_admin', true);

        $this->load->model('backend/language/language_m');
        $this->load->library('form_validation');

        $this->lang->load('components/cphome');
        $this->lang->load('components/sidebar');

        $this->data['view'] = strtolower(get_class($this));
        $this->data['active'][$this->data['view']] = true;

        $this->lang->set($this->language_m->get());

        $this->session->set('language', $this->lang->get(1));
        $this->session->set('user_id', 1);

        $user = new stdClass();
        $user->id = 1;
        $user->email = 'test';
        $this->session->set('user', $user);
    }
}

/* End of file BE_Controller.php */
/* Location: ./application/libraries/BE_Controller.php */
