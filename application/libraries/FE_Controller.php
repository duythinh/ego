<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class FE_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->config->set_item('in_admin', false);
    }
}

/* End of file FE_Controller.php */
/* Location: ./application/libraries/FE_Controller.php */
