<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function rewrite_base_url()
{
    if (isset($_SERVER['PATH_INFO'])) {
        $segments = explode('/', ltrim($_SERVER['PATH_INFO'], '/'));
        $segments = count($segments) - 1;

        $url = '';
        for ($i = 0; $i < $segments; $i++) {
            $url .= '../';
        }

        $CI =& get_instance();
        $CI->config->set_item('full_url', $CI->config->item('base_url'));
        $CI->config->set_item('base_url', $url);
    }
}

/* End of file uri.php */
/* Location: ./system/application/hools/uri.php */