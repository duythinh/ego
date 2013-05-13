<?php

/**
 * Class Topic Model
 * @author Thinh Nguyen <thinhnguyenduy88@gmail.com>
 */
class Topic_m extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->set_table('topic');
        $this->set_translable(false);
        $this->set_translate_fields(array('name', 'description','content'));
        $this->set_timestamps(true);
        foreach ($this->lang->get('translable') as $language) {
            if ($this->session->get('language')->code == $language->code) {
                $rules_topic_name = 'trim|required|min_length[3]|max_length[64]|xss_clean';
            } else {
                $rules_topic_name = 'trim|callback_null_or_min_length|max_length[64]|xss_clean';
            }

            $rules_topic_description = 'trim|max_length[255]|xss_clean';

            $rules_topic_content = 'trim|required';

            $this->add_rule('name[' . $language->code . ']', array(
                'field' => 'name[' . $language->code . ']',
                'label' => 'lang:name ' . $language->name,
                'rules' => $rules_topic_name
            ));

            $this->add_rule('description[' . $language->code . ']', array(
                'field' => 'description[' . $language->code . ']',
                'label' => 'lang:description ' . $language->name,
                'rules' => $rules_topic_description
            ));
            $this->add_rule('content[' . $language->code . ']', array(
                'field' => 'content[' . $language->code . ']',
                'label' => 'lang:content ' . $language->name,
                'rules' => $rules_topic_content
            ));
        }
        $this->add_rule('category[]', array(
            'field' => 'category[]',
            'label' => 'lang:category',
            'rules' => 'trim|is_natural|intval|xss_clean'
        ));
        $this->add_rule('status[]', array(
            'field' => 'status[]',
            'label' => 'lang:status',
            'rules' => 'trim|required|is_natural|intval|xss_clean'
        ));
    }
}