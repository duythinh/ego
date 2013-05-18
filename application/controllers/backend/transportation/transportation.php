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
 * The Transportation Controller
 *
 * @author Thinh Nguyen <thinhnguyenduy88@gmail.com>
 */
class Transportation extends BE_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->config->load('common/status');
        $this->lang->load('transportation/transportation');
        $this->load->model('backend/transportation/transportation_m');
    }

    /**
     * Index action
     *
     * @return void
     */
    public function index()
    {

        $this->data['view'] = 'transportation/transportation/index';
        $this->data['active'][$this->data['view']] = true;
        $this->lang->load($this->data['view']);

        $this->data['transportations'] = $this->transportation_m->get();

        $this->load->view('main_layout', $this->data);
    }

    /**
     * Add action
     *
     * @return void
     */
    public function add()
    {
        $this->lang->load('transportation/transportation/add');
        if ('POST' === @REQUEST_METHOD) {
            $this->validate_add();
        }
        $this->data['view'] = 'transportation/transportation/add';
        $this->data['active']['transportation/transportation/add'] = true;

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
            $this->data['transportation'] = $this->transportation_m->get(null, 0, 0, true);

            if (empty($this->data['transportation'])) {
                unset($this->data['transportation']);
            }
        }

        $this->data['view'] = 'transportation/transportation/edit';
        $this->data['active']['transportation/transportation/edit'] = true;
        $this->lang->load('transportation/transportation/edit');
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

            if (empty($this->data['transportation'])) {
                unset($this->data['transportation']);
            } else {
                $this->language_m->delete($this->data['transportation']->id);

                // redirect(full_url('language'));
            }
        }

        $this->data['view'] = 'transportation/delete';
        $this->data['active']['transportation/delete'] = true;
        $this->lang->load('transportation/delete');

        $this->load->view('main_layout', $this->data);
    }

    private function validate_add()
    {
        // setup the form
        $rules = $this->transportation_m->get_rules();
        $this->form_validation->set_rules($rules);
        // process the form
        if (true === $this->form_validation->run()) {
            // create new transportation type entity
            $data = $this->transportation_m->post_data(array('transportation_type_id','name', 'description', 'content', 'alias','price_id','brand','seats','rentable','sort_order','status'));
            $data['sort_order'] = (int)$data['sort_order'];
            $data['price_id'] = 1;
            $data['rentable'] = (int)$data['rentable'];
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));

            foreach ($this->input->post('transportation_type') as $transportation_types) {
                $data['transportation_type_id'] = $transportation_types;
            }
            //$data['transportation_type_id'] = (int)$data['transportation_type'];

            $this->transportation_m->create($data);
            redirect(full_url('transportation/transportation'));
        }
    }

    private function validate_edit()
    {
        $id = (int)$this->input->post('id');

        // setup the form
        $rules = $this->transportation_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            // create new transportation type entity
            $data = $this->transportation_m->post_data(array('transportation_type_id','name', 'description', 'content', 'alias','price_id','brand','seats','rentable','sort_order','status'));
            $data['sort_order'] = (int)$data['sort_order'];
            $data['price_id'] = 1;
            $data['rentable'] = (int)$data['rentable'];
            $data['status'] = (empty($data['status']) ? 0 : array_sum($data['status']));

            foreach ($this->input->post('transportation_type') as $transportation_types) {
                $data['transportation_type_id'] = $transportation_types;
            }
            $this->transportation_m->update($id, $data);

            redirect(full_url('transportation/transportation'));
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
/* End of file transportation.php */
/* Location: ./application/controllers/backend/transportation/transportation.php */