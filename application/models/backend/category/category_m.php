<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Category_m extends MY_Model
{
    protected $table_name = 'category';

    protected $rules = array();

    function __construct()
    {
        parent::__construct();
    }

    public function get_new()
    {
        $language = new stdClass();
        $language->name        = '';
        $language->native_name = '';
        $language->code        = '';
        $language->encoding    = '';

        return $language;
    }
}

/* End of file language_manager_m.php */
/* Location: ./application/models/backend/language/language_manager_m.php */