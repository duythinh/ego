<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class User_group_m
 */
class User_group_m extends MY_Model
{
    /**
     * {@inheritdoc}
     */
    function __construct()
    {
        parent::__construct();
        $this->set_table('user_group');
        $this->set_translable(true);
        $this->set_translate_fields(array('name', 'description'));
        $this->set_timestamps(false);
        foreach ($this->lang->get() as $language) {
            if ($this->session->get('language')->code == $language->code) {
                $rules_user_group_name = 'trim|required|min_length[3]|max_length[64]|xss_clean';
            } else {
                $rules_user_group_name = 'trim|callback_null_or_min_length|max_length[64]|xss_clean';
            }

            $rules_user_group_description = 'trim|max_length[255]|xss_clean';

            $this->add_rule('name[' . $language->code . ']', array(
                'field' => 'name[' . $language->code . ']',
                'label' => 'lang:name ' . $language->name,
                'rules' => $rules_user_group_name
            ));

            $this->add_rule('description[' . $language->code . ']', array(
                'field' => 'description[' . $language->code . ']',
                'label' => 'lang:description ' . $language->name,
                'rules' => $rules_user_group_description
            ));
        }

        $this->add_rule('css_class', array(
            'field' => 'css_class',
            'label' => 'lang:css_class',
            'rules' => 'trim|required|alpha_dash|min_length[3]|max_length[64]|callback_unique_css_class|xss_clean'
        ));

        $this->add_rule('alias', array(
            'field' => 'alias',
            'label' => 'lang:alias',
            'rules' => 'trim|required|alpha_dash|min_length[3]|max_length[64]|callback_unique_alias|xss_clean'
        ));
        $this->add_rule('sort_order', array(
            'field' => 'sort_order',
            'label' => 'lang:sort_order',
            'rules' => 'trim|is_natural|intval|xss_clean'
        ));

        $this->add_rule('status[]', array(
            'field' => 'status[]',
            'label' => 'lang:status',
            'rules' => 'trim|is_natural|intval|xss_clean'
        ));
    }
}

/* End of fil.php */
/* Location: ./application/models/backend/categor.php */