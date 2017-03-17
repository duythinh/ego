<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class MY_Config extends CI_Config
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Site URL
     * Returns base_url . index_page [. uri_string]
     *
     * @access  public
     * @param   string  the URI string
     * @return  string
     */
    function site_url($uri = null, $absolute = false)
    {
        if (true === $absolute) {
            $base_url = $this->slash_item('full_url');
        } else {
            $base_url = $this->slash_item('base_url');
        }

        if (true === $this->item('in_admin')) {
            $base_url .= ADMINPATH . '/';
        }

        $url = '';
        if (null === $uri) {
            $url = $base_url . $this->item('index_page');
        } else if (false === $this->item('enable_query_strings')) {
            $url = $base_url . $this->slash_item('index_page') . $this->_uri_string($uri);
        } else {
            return $base_url . $this->item('index_page') . '?' . $this->_uri_string($uri);
        }

        $suffix = '';
        if ($this->item('url_suffix')) {
            $base_suffix = explode('.', $uri);
            $base_suffix = end($base_suffix);

            if (! in_array($base_suffix, array('html', 'htm', 'css', 'js', 'png', 'jpg', 'gif'))) {
                $suffix = $this->item('url_suffix');
            }
        }

        return rtrim($url, '/') . $suffix;
    }


    /**
     * Load the config from file or database
     *
     * @param  string  $config_file     the config file name
     * @param  boolean $use_sections    if configuration values should be loaded into their own section
     * @param  boolean $fail_gracefully true if errors should just return false, false if an error message should be displayed
     *
     * @return array|boolean            the config array if the file was loaded correctly or false
     */
    function load($config_file = null, $use_sections = false, $fail_gracefully = false)
    {
        // if config_file is not set, it'll be "config" by default
        $config_file || $config_file = 'config';

        // by default, the config_file has only one segment
        // but from database, it can hvae more than one
        $segments = explode('/', rtrim($config_file, '.php'));

        $directory = '';
        foreach ($segments as $segment) {
            if (is_dir(APPPATH . 'config/' . $directory . $segment)) {
                $directory .= $segment . '/';
            } else if (file_exists(APPPATH . 'config/' . $directory . $segment . '.php')) {
                // include the config file
                @require(APPPATH . 'config/' . $directory . $segment . '.php');

                // check the config array
                if ( ! isset($config) || ! is_array($config)) {
                    if (true !== $fail_gracefully) {
                        // show the error if fail gracefully is not true
                        show_error('The config ' . $config_file . ' does not appear to contain a valid configuration.');
                    }

                    return false;
                }

                break;
            } else {
                // TODO: File not found, load from database
                if (true) {
                    // config found in database, just load it
                } else {
                    // config not found in database.
                    if (true !== $fail_gracefully) {
                        // show the error if fail gracefully is not true
                        show_error('The config ' . $config_file . ' does not appear to contain a valid configuration.');
                    }

                    return false;
                }
            }
        }

        // at this position we already have config array
        // TODO: split config segments into array
        if (true === $use_sections) {
            if (isset($this->config[$config_file])) {
                $this->config[$config_file] = array_merge($this->config[$config_file], $config);
            } else {
                $this->config[$config_file] = $config;
            }
        } else {
            $this->config = array_merge($this->config, $config);
        }

        $this->is_loaded[] = $config_file;
        unset($config);

        return $this->config;



        $file = ($file == '') ? 'config' : str_replace('.php', '', $file);
        $found = FALSE;
        $loaded = FALSE;

        $check_locations = defined('ENVIRONMENT') ? array(ENVIRONMENT.'/'.$file, $file) : array($file);

        foreach ($this->_config_paths as $path) {
            foreach ($check_locations as $location) {
                $file_path = $path.'config/'.$location.'.php';

                if (in_array($file_path, $this->is_loaded, TRUE)) {
                    $loaded = TRUE;
                    continue 2;
                }

                if (file_exists($file_path)) {
                    $found = TRUE;
                    break;
                }
            }

            if ($found === FALSE) {
                continue;
            }

            include($file_path);

            if ( ! isset($config) OR ! is_array($config)) {
                if ($fail_gracefully === TRUE) {
                    return FALSE;
                }
                show_error('Your ' . $file_path . ' file does not appear to contain a valid configuration array.');
            }

            if ($use_sections === TRUE) {
                if (isset($this->config[$file])) {
                    $this->config[$file] = array_merge($this->config[$file], $config);
                } else {
                    $this->config[$file] = $config;
                }
            } else {
                $this->config = array_merge($this->config, $config);
            }

            $this->is_loaded[] = $file_path;
            unset($config);

            $loaded = TRUE;
            log_message('debug', 'Config file loaded: '.$file_path);
            break;
        }

        if ($loaded === FALSE) {
            if ($fail_gracefully === TRUE) {
                return FALSE;
            }

            show_error('The configuration file ' . $file . '.php does not exist.');
        }

        return TRUE;
    }

    public function exists($key = null)
    {
        if (! is_null($key)) {
            return isset($this->config[$key]);
        } else {
            return false;
        }
    }
}

/* End of file MY_Config.php */
/* Location: ./application/core/MY_Config.php */