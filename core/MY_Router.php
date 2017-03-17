<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Router Class
 *
 * Parses URIs and determines routing
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @author      ExpressionEngine Dev Team
 * @category    Libraries
 * @link        http://codeigniter.com/user_guide/general/routing.html
 */
class MY_Router extends CI_Router {
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Validates the supplied segments.  Attempts to determine the path to
     * the controller.
     *
     * @access  private
     * @param   array
     * @return  array
     */
    function _validate_request($segments)
    {
        if (0 === count($segments)) {
            return $segments;
        }

        foreach ($segments as $segment) {
            if (is_dir(APPPATH . 'controllers/' . $this->directory . $segment)) {
                $this->directory .= array_shift($segments) . '/';
            } else if (file_exists(APPPATH . 'controllers/' . $this->directory . $segment . '.php')) {
                break;
            } else if (! empty($this->routes['404_override'])) {
                $x = explode('/', $this->routes['404_override']);

                $this->set_directory('');
                $this->set_class($x[0]);
                $this->set_method(isset($x[1]) ? $x[1] : 'index');

                return $x;
            } else {
                show_404($this->fetch_directory() . $segments[0]);
            }
        }

        return array_values($segments);
    }
}
/* End of file MY_Router.php */
/* Location: ./application/core/MY_Router.php */