<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 */
class MY_Controller extends CI_Controller
{
    protected $data;

    function __construct()
    {
        parent::__construct();

        if (true === PROFILER) {
            $this->output->enable_profiler(TRUE);
        }
    }
}