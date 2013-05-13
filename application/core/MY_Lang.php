<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Lang extends CI_Lang
{
    /**
     * current language name
     *
     * @var string
     */
    private $name;

    /**
     * current language zone (backend or frontend)
     *
     * @var string
     */
    private $zone;

    /**
     * default language name
     *
     * @var string
     */
    private $default = 'en';

    /**
     * current language view state
     *
     * @var string
     */
    private $view;

    /**
     * list of availables languages
     *
     * @var array
     */
    private $languages;

    /**
     * set list of availables languages
     *
     * @param array $languages list languages
     */
    public function set($languages = array())
    {
        $this->languages = array();
        $this->languages['languages'] = $languages;

        foreach ($languages as $language) {
            if (1 & $language->status) {
                $this->languages['available'][] = $language;
            }

            if ($language->translable) {
                $this->languages['translable'][] = $language;
            }

            $this->languages[$language->id] = $language;
            $this->languages[$language->code] = $language;
            $this->languages[$language->alias] = $language;
        }
    }

    /**
     * get language by alias
     *
     * @param  mixed $alias the language alias, can be: language_id, language_code, language_alias
     * @return array
     */
    public function get($alias = null)
    {
        if (null === $alias) {
            return $this->languages['languages'];
        } else if (isset($this->languages[$alias])) {
            return $this->languages[$alias];
        } else {
            return false;
        }
    }

    /**
     * load a language
     *
     * @param  string $language view state
     * @param  string $name     language name
     * @return array
     */
    public function load($language, $name = null)
    {
        $config =& get_config();

        if (empty($name)) {
            $name = isset($config['language']) ? $config['language'] : $this->default;
        }

        if ($this->default !== $name) {
            $this->load($language, $this->default);
        }

        $this->name = $name;
        $this->zone = isset($config['in_admin']) && true === $config['in_admin'] ? 'backend' : 'frontend';
        $this->view = rtrim($language, '.php');

        // break script if current language already loaded
        // if (isset($this->language[$this->name][$this->zone][$this->view])) {
        //     return $this->language[$this->name][$this->zone][$this->view];
        // }


        $language_file = APPPATH . 'language/' . $this->name . '/' . $this->zone . '/' . $language . '_lang.php';

        if (file_exists($language_file)) {
            @include($language_file);
        } else {
            // TODO: read language from database and create cache
            echo '<code>Language file not exists: ' . $language_file . '</code>';
        }

        if (isset($this->language[$this->name])) {
            $this->language[$this->name] = array_merge($this->language[$this->name], $language);
        } else {
            $this->language[$this->name] = $language;
        }

        // $this->language[$this->name][$this->zone][$this->view] = $language;
        unset($language);

        log_message('debug', 'Language file loaded: ' . $language_file);
        return $this->language[$this->name];
    }

    /**
     * fetch a single line of text from the language
     *
     * @access public
     * @param  string $var_name language variable name
     * @return string
     */
    public function line($var_name = null)
    {
        if (! isset($this->language[$this->name][$var_name])) {
            if ($this->default !== $this->name && isset($this->language[$this->default][$var_name])) {
                return $this->language[$this->default][$var_name];
            }

            log_message('error', 'Could not find the language line "' . $var_name . '"');
            return false;
        }

        return $this->language[$this->name][$var_name];
    }
}

/* End of file MY_Lang.php */
/* Location: ./application/core/MY_Lang.php */