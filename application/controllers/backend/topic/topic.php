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
class Topic extends BE_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->config->load('common/status');
        $this->lang->load('topic/topic');
        $this->load->model('backend/topic/topic_m');
    }

    /**
     * Index action
     *
     * @return void
     */
    public function index()
    {

        $this->data['view'] = 'topic/topic/index';
        $this->data['active'][$this->data['view']] = true;
        $this->lang->load($this->data['view']);

        $this->data['topics'] = $this->topic_m->get();

        $this->load->view('main_layout', $this->data);
    }

    /**
     * Add action
     *
     * @return void
     */
    public function add()
    {
        $this->lang->load('topic/topic/add');
        if ('POST' === @REQUEST_METHOD) {
            $this->validate_add();
        }
        $this->data['view'] = 'topic/topic/add';
        $this->data['active']['topic/topic/add'] = true;

        $this->load->view('main_layout', $this->data);
    }

    /**
     * Edit action
     *
     * @param  mixed $name the record identifier
     * @return void
     */
    public function edit($name = null)
    {
        if ('POST' === @REQUEST_METHOD) {
            $this->validate_edit();
        }

        if (!empty($name)) {
            if (is_numeric($name)) {
                $this->db->where('id', $name);
            } else if (is_string($name)) {
                $this->db->where('name', $name);
            }

            $this->data['topic'] = $this->topic_m->get(null, 0, 0, true);

            if (empty($this->data['topic'])) {
                unset($this->data['topic']);
            }
        }

        $this->data['view'] = 'topic/topic/edit';
        $this->data['active']['topic/topic/edit'] = true;
        $this->lang->load('topic/topic/edit');
        $this->load->view('main_layout', $this->data);
    }

    public function delete($name = null)
    {
        if (!empty($name)) {
            if (is_numeric($name)) {
                $this->db->where('id', $name);
            } else if (is_string($name)) {
                $this->db->where('alias', $name);
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
        $rules = $this->topic_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new topic type entity
            $data = $this->topic_m->post_data(array('user_id','alias', 'name', 'description', 'content', 'status'));
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));
            $data['user_id'] = $this->session->get('user')->id;
            $id = $this->topic_m->create($data);
            $this->topic_m->set_table('topic_has_category');
            $this->topic_m->set_translable(false);
            $this->topic_m->set_timestamps(false);
            foreach ($this->topic_m->post_data(array('category')) as $category) {
                foreach ($category as $categories) {
                    $data = array(
                        'topic_id' => $id,
                        'category_id' => $categories
                    );

                    $this->topic_m->create($data);
                }
            }
            redirect(full_url('topic/topic'));
        }
    }

    private function validate_edit()
    {
        $id = (int)$this->input->post('id');

        // setup the form
        $rules = $this->topic_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new topic type entity
            $data = $this->topic_m->post_data(array('name', 'description', 'content', 'status'));
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));

            $this->topic_m->update($id, $data);

            redirect(full_url('topic/topic'));
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
/* End of file topic.php */
/* Location: ./application/controllers/backend/topic/topic.php */