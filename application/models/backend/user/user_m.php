<?php

/**
 * Class User Model
 * @author Thinh Nguyen <thinhnguyenduy88@gmail.com>
 */
class User_m extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->set_table('user');
        $this->set_timestamps(true);
        $this->set_translable(false);

        $this->add_rule('name', array(
            'field' => 'name',
            'label' => 'lang:name',
            'rules' => 'trim|required|alpha_dash|min_length[3]|max_length[64]|callback_unique_name|xss_clean'
        ));

        $this->add_rule('password', array(
            'field' => 'password',
            'label' => 'lang:password',
            'rules' => 'trim|matches[password_confirm]'
        ));
        $this->add_rule('password_confirm', array(
            'field' => 'password_confirm',
            'label' => 'lang:password_confirm',
            'rules' => 'trim|matches[password]'
        ));
        $this->add_rule('email', array(
            'field' => 'email',
            'label' => 'lang:email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ));

        /*$this->add_rule('news_letter', array(
            'field' => 'news_letter',
            'label' => 'lang:news_letter',
            'rules' => 'trim|required|is_natural|less_than[2]|xss_clean'
        ));*/

        $this->add_rule('user_group[]', array(
            'field' => 'user_group[]',
            'label' => 'lang:user_group',
            'rules' => 'trim|is_natural|intval|xss_clean'
        ));
        $this->add_rule('status[]', array(
            'field' => 'status[]',
            'label' => 'lang:status',
            'rules' => 'trim|required|is_natural|intval|xss_clean'
        ));
    }
}