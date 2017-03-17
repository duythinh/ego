<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class MY_Loader extends CI_Loader
{
    protected $config;

    function __construct()
    {
        parent::__construct();

        $this->config =& get_config();
    }

    /**
     * Load View
     *
     * This function is used to load a "view" file.  It has three parameters:
     *
     * 1. The name of the "view" file to be included.
     * 2. An associative array of data to be extracted for use in the view.
     * 3. TRUE/FALSE - whether to return the data or load it.  In
     * some cases it's advantageous to be able to return data so that
     * a developer can process it in some way.
     *
     * @param   string
     * @param   array
     * @param   bool
     * @return  void
     */
    public function view($view, $vars = array(), $return = FALSE)
    {
        if (true === $this->config['in_admin']) {
            $view = 'backend/' . $view;
        } else {
            $view = 'frontend/' . $view;
        }

        return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
}

/* End of file MY_Loader.php */
/* Location: ./application/core/MY_Loader.php */