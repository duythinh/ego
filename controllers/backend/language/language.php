<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
*
*/
class Language extends BE_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->config->load('common/status');
        $this->lang->load('language/language');
    }

    public function index()
    {
        $this->data['view'] = 'language/language/index';
        $this->data['active']['language/index'] = true;
        $this->lang->load('language/language/index');

        $this->load->view('main_layout', $this->data);
    }

    public function add()
    {
        if ('POST' === @REQUEST_METHOD) {
            $this->_add();
        }

        $this->data['view'] = 'language/language/add';
        $this->data['active']['language/add'] = true;
        $this->lang->load('language/language/add');

        $this->load->view('main_layout', $this->data);
    }

    public function edit($alias = null)
    {
        if ('POST' === @REQUEST_METHOD) {
            $this->_edit();
        }

        if (!empty($alias)) {
            if (is_numeric($alias)) {
                $this->db->where('id', $alias);
            } else if (is_string($alias)) {
                $this->db->where('alias', $alias);
            }

            $this->data['language'] = $this->language_m->get(null, true);

            if (empty($this->data['language'])) {
                unset($this->data['language']);
            }
        }

        $this->data['view'] = 'language/language/edit';
        $this->data['active']['language/edit'] = true;
        $this->lang->load('language/language/edit');

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

        $this->data['view'] = 'language/language/delete';
        $this->data['active']['language/delete'] = true;
        $this->lang->load('language/language/delete');

        $this->load->view('main_layout', $this->data);
    }

    private function _add()
    {
        $this->lang->load('language/language/add');

        // setup the form
        $rules = $this->language_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            $data = $this->language_m->post_data(array('name', 'native_name', 'alias', 'code', 'encoding', 'sort_order', 'translable'));

            $data['sort_order'] = (int)$data['sort_order'];
            $data['translable'] = (int)$data['translable'];
            $data['status'] = 0;
            if (is_array($this->input->post('status')) && count($this->input->post('status'))) {
                foreach ($this->input->post('status') as $status) {
                    $data['status'] += $status;
                }
            }

            $this->language_m->save($data);

            redirect(full_url('language'));
        }
    }

    private function _edit()
    {
        $id = (int)$this->input->post('id');
        $this->data['language'] = $this->language_m->get($id);
        $this->lang->load('language/language/add');

        // setup the form
        $rules = $this->language_m->get_rules();
        $this->form_validation->set_rules($rules);

        // process the form
        if (true === $this->form_validation->run()) {
            $data = $this->language_m->post_data(array('name', 'native_name', 'alias', 'code', 'encoding', 'sort_order', 'translable', 'status'));

            $data['sort_order'] = (int)$data['sort_order'];
            $data['translable'] = (int)$data['translable'];
            $data['status'] = array_sum($data['status']);

            $this->language_m->save($data, $id);

            redirect(full_url('language'));
        }
    }

    public function unique_alias($alias = null)
    {
        $id = (int)$this->input->post('id');
        ! $id || $this->db->where('id != ', $id);
        $this->db->where('alias', $this->input->post('alias'));

        if (count($this->language_m->get())) {
            $this->form_validation->set_message('unique_alias', $this->lang->line('is_unique'));
            return false;
        }

        return true;
    }

    public function unique_code($code = null)
    {
        $id = (int)$this->input->post('id');
        ! $id || $this->db->where('id != ', $id);
        $this->db->where('code', $this->input->post('code'));

        if (count($this->language_m->get())) {
            $this->form_validation->set_message('unique_code', $this->lang->line('is_unique'));
            return false;
        }

        return true;
    }
}

/* End of file language.php */
/* Location: ./application/controllers/backend/language/language.php */