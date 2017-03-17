<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by Cimex Team.
 * ======================
 * Date: date
 * Time: time
 *
 * @link http:://egotravel.com.vn
 * @version 1.0.0
 * @copyright (c) Cimex Team
 *
 * This file is part of the eGo Travel package.
 *
 * Warning: This program is protected by copyright law and international treaties.
 * Unauthorized reproduction or distribution of this program, or any portions of it,
 * may result in severe civil and criminal penalties, and will be prosecuted to the
 * maximum extent possible under the law.
 */

/**
 * The language model
 *
 * @author Vinh Trinh <vinhtrinh@rubikin.com>
 */
class Language_m extends MY_Model
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'language';

    /**
     * {@inheritdoc}
     */
    protected $order = 'sort_order';

    /**
     * {@inheritdoc}
     */
    protected $rules = array(
        'name' => array(
            'field' => 'name',
            'label' => 'lang:language_name',
            'rules' => 'trim|required|min_length[3]|max_length[64]|xss_clean'
        ),

        'native_name' => array(
            'field' => 'native_name',
            'label' => 'lang:native_name',
            'rules' => 'trim|required|min_length[3]|max_length[64]|xss_clean'
        ),

        'alias' => array(
            'field' => 'alias',
            'label' => 'lang:alias',
            'rules' => 'trim|required|alpha_dash|min_length[3]|max_length[64]|callback_unique_alias|xss_clean'
        ),

        'code' => array(
            'field' => 'code',
            'label' => 'lang:iso-639-1',
            'rules' => 'trim|required|alpha|exact_length[2]|callback_unique_code'
        ),

        'encoding' => array(
            'field' => 'encoding',
            'label' => 'lang:encoding',
            'rules' => 'trim|required|min_length[3]|max_length[32]|xss_clean'
        ),

        'sort_order' => array(
            'field' => 'sort_order',
            'label' => 'lang:sort_order',
            'rules' => 'trim|is_natural|xss_clean'
        ),

        'translable' => array(
            'field' => 'translable',
            'label' => 'lang:translable',
            'rules' => 'trim|required|is_natural|less_than[2]|xss_clean'
        )
    );

    /**
     * {@inheritdoc}
     */
    function __construct()
    {
        parent::__construct();
    }
}

/* End of file language_m.php */
/* Location: ./application/models/backend/language/language_m.php */