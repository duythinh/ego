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
class User extends BE_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->config->load('common/status');
        $this->lang->load('user/user');
        $this->load->model('backend/user/user_m');
    }

    /**
     * Index action
     *
     * @return void
     */
    public function index()
    {

        $this->data['view'] = 'user/user/index';
        $this->data['active'][$this->data['view']] = true;
        $this->lang->load($this->data['view']);

        $this->data['users'] = $this->user_m->get();

        $this->load->view('main_layout', $this->data);
    }

    /**
     * Add action
     *
     * @return void
     */
    public function add()
    {
        $this->lang->load('user/user/add');
        if ('POST' === @REQUEST_METHOD) {
            $this->validate_add();
        }
        $this->data['view'] = 'user/user/add';
        $this->data['active']['user/user/add'] = true;

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

            $this->data['user'] = $this->user_m->get(null, 0, 0, true);

            if (empty($this->data['user'])) {
                unset($this->data['user']);
            }
        }

        $this->data['view'] = 'user/user/edit';
        $this->data['active']['user/user/edit'] = true;
        $this->lang->load('user/user/edit');
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

            $this->data['language'] = $this->language_m->get(null, true);

            if (empty($this->data['language'])) {
                unset($this->data['language']);
            } else {
                $this->language_m->delete($this->data['language']->id);

                // redirect(full_url('language'));
            }
        }

        $this->data['view'] = 'language/delete';
        $this->data['active']['language/delete'] = true;
        $this->lang->load('language/delete');

        $this->load->view('main_layout', $this->data);
    }

    private function validate_add()
    {
        // setup the form
        $rules = $this->user_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new user type entity
            $data = $this->user_m->post_data(array('name', 'email', 'password', 'salt', 'news_letter', 'status'));
            $data['password'] = md5($data['password']);
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));
            $id = $this->user_m->create($data);
            $this->user_m->set_table('user_has_user_group');
            $this->user_m->set_timestamps(false);
            foreach ($this->user_m->post_data(array('user_group')) as $user_group) {
                foreach ($user_group as $group) {
                    $data = array(
                        'user_id' => $id,
                        'user_group_id' => $group
                    );

                    $this->user_m->create($data);
                }
            }
            redirect(full_url('user/user'));
        }
    }

    private function validate_edit()
    {
        $id = (int)$this->input->post('id');

        // setup the form
        $rules = $this->user_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new user type entity
            $data = $this->user_m->post_data(array('name', 'description', 'alias', 'status'));
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));
            $this->user_m->update($id, $data);

            redirect(full_url('user/user'));
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
/* End of file user.php */
/* Location: ./application/controllers/backend/user/user.php */