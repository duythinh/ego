<?php

/**
 * Class Transportation Model
 * @author Thinh Nguyen <thinhnguyenduy88@gmail.com>
 */
class Transportation_m extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->set_table('transportation');
        $this->set_translable(true);
        $this->set_translate_fields(array('name', 'description' ,'content'));
        $this->set_timestamps(false);
        foreach ($this->lang->get() as $language) {
            if ($this->session->get('language')->code == $language->code) {
                $rules_user_group_name = 'trim|required|min_length[3]|max_length[64]|xss_clean';
            } else {
                $rules_user_group_name = 'trim|callback_null_or_min_length|max_length[64]|xss_clean';
            }

            $rules_user_group_description = 'trim|max_length[255]|xss_clean';
            $rules_topic_content = 'trim|required';
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
            $this->add_rule('content[' . $language->code . ']', array(
                'field' => 'content[' . $language->code . ']',
                'label' => 'lang:content ' . $language->name,
                'rules' => $rules_topic_content
            ));
        }
        $this->add_rule('alias', array(
            'field' => 'alias',
            'label' => 'lang:alias',
            'rules' => 'trim|required|alpha_dash|min_length[3]|max_length[64]|callback_unique_alias|xss_clean'
        ));
        $this->add_rule('brand', array(
            'field' => 'brand',
            'label' => 'lang:brand',
            'rules' => 'trim|required|alpha_dash|min_length[3]|max_length[64]|callback_unique_brand|xss_clean'
        ));
        $this->add_rule('seats', array(
            'field' => 'seats',
            'label' => 'lang:seats',
            'rules' => 'trim|required|is_natural|xss_clean'
        ));
        $this->add_rule('rentable', array(
            'field' => 'rentable',
            'label' => 'lang:rentable',
            'rules' => 'trim|required|is_natural|less_than[2]|xss_clean'
        ));
        $this->add_rule('sort_order', array(
            'field' => 'sort_order',
            'label' => 'lang:sort_order',
            'rules' => 'trim|is_natural|xss_clean'
        ));
        $this->add_rule('status[]', array(
            'field' => 'status[]',
            'label' => 'lang:status',
            'rules' => 'trim|is_natural|intval|xss_clean'
        ));
    }
}