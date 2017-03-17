<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
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
 * The User Group Controller
 *
 * @author Thinh Nguyen <thinhnguyenduy88@gmail.com>
 */
class User_group extends BE_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->config->load('common/status');
        $this->lang->load('user/user_group');
        $this->load->model('backend/user/user_group_m');

    }

    /**
     * Index action
     *
     * @return void
     */
    public function index()
    {

        $this->data['view'] = 'user/user_group/index';
        $this->data['active'][$this->data['view']] = true;
        $this->lang->load($this->data['view']);

        $this->data['user_groups'] = $this->user_group_m->get();

        $this->load->view('main_layout', $this->data);
    }

    /**
     * Add action
     *
     * @return void
     */
    public function add()
    {
        $this->lang->load('user/user_group/add');
        if ('POST' === @REQUEST_METHOD) {
            $this->validate_add();
        }
        $this->data['view'] = 'user/user_group/add';
        $this->data['active']['user/user_group/add'] = true;

        $this->load->view('main_layout', $this->data);
    }

    /**
     * Edit action
     *
     * @param  mixed $alias the record identifier
     * @return void
     */
    public function edit($alias = null)
    {
        if ('POST' === @REQUEST_METHOD) {
            $this->validate_edit();
        }

        if (!empty($alias)) {
            if (is_numeric($alias)) {
                $this->db->where('id', $alias);
            } else if (is_string($alias)) {
                $this->db->where('alias', $alias);
            }

            $this->data['user_group'] = $this->user_group_m->get(null, 0, 0, true);

            if (empty($this->data['user_group'])) {
                unset($this->data['user_group']);
            }
        }

        $this->data['view'] = 'user/user_group/edit';
        $this->data['active']['user/user_group/edit'] = true;
        $this->lang->load('user/user_group/edit');
        $this->load->view('main_layout', $this->data);
    }

    public function delete($alias = null)
    {
        if (!empty($alias)) {
            if (is_numeric($alias)) {
                $this->db->where('id', $alias);
            } else if (is_string($alias)) {
                $this->db->where('alias', $alias);
            }

            $this->data['user_group'] = $this->user_group_m->get(null, true);

            if (empty($this->data['user_group'])) {
                unset($this->data['user_group']);
            } else {
                $this->user_group_m->delete($this->data['user_group']->id);

                // redirect(full_url('language'));
            }
        }

        $this->data['view'] = 'user_group/delete';
        $this->data['active']['user_group/delete'] = true;
        $this->lang->load('user_group/delete');

        $this->load->view('main_layout', $this->data);
    }

    private function validate_add()
    {
        // setup the form
        $rules = $this->user_group_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new user type entity
            $data = $this->user_group_m->post_data(array('name', 'description', 'css_class', 'alias', 'member', 'sort_order', 'status'));
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));
            $this->user_group_m->create($data);

            redirect(full_url('user/user_group'));
        }
    }

    private function validate_edit()
    {
        $id = (int)$this->input->post('id');

        // setup the form
        $rules = $this->user_group_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new user type entity
            $data = $this->user_group_m->post_data(array('name', 'description', 'alias', 'status'));
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));
            $this->user_group_m->update($id, $data);

            redirect(full_url('user/user_group'));
        }
    }

    public function null_or_min_length($str = null)
    {
        if (empty($str) || 3 <= strlen($str)) {
            return true;
        }
        $this->form_validation->set_message('null_or_min_length', sprintf($this->lang->line('null_or_min_length'), '%s', 3));

        return false;
    }
}

/* End of file user_group.php */
/* Location: ./application/controllers/backend/user/user_group.php */