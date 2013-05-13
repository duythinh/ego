<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * My customized model
 *
 * @author Vinh Trinh <vinhtrinh@rubikin.com>
 */
class MY_Model extends CI_Model
{
    /**
     * Table name
     *
     * @var string
     */
    protected $table = null;

    /**
     * Primary column name
     *
     * @var string
     */
    protected $primary = 'id';

    /**
     * Primary value filter function
     *
     * @var string
     */
    protected $filter = 'intval';

    /**
     * Order results from SQL
     *
     * @var string
     */
    protected $order = null;

    /**
     * Create and modify time control
     *
     * @var boolean
     */
    protected $timestamps = false;

    /**
     * Translable
     *
     * @var boolean
     */
    protected $translable = false;

    /**
     * Translate fields
     *
     * @var array
     */
    protected $translate_fields = array();

    /**
     * Form validation rules
     *
     * @var array
     */
    protected $rules = array();


    /**
     * The constuctor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Gets the Table name.
     *
     * @return string
     */
    public function get_table()
    {
        return $this->table;
    }

    /**
     * Sets the Table name.
     *
     * @param string $table the table
     */
    public function set_table($table)
    {
        $this->table = $table;
    }

    /**
     * Gets the Primary column name.
     *
     * @return string
     */
    public function get_primary()
    {
        return $this->primary;
    }

    /**
     * Sets the Primary column name.
     *
     * @param string $primary the primary
     */
    public function set_primary($primary)
    {
        $this->primary = $primary;
    }

    /**
     * Gets the Primary filters function.
     *
     * @return string
     */
    public function get_filter()
    {
        return $this->filter;
    }

    /**
     * Sets the Primary filters function.
     *
     * @param string $filter the filter
     */
    public function set_filter($filter)
    {
        if ( ! function_exists($filter)) {
            show_error('The Filter Function <strong>' . $filter . '</strong> Does Not Exists!');
        }

        $this->filter = $filter;
    }

    /**
     * Gets the Order results from SQL.
     *
     * @return string
     */
    public function get_order()
    {
        return $this->order;
    }

    /**
     * Sets the Order results from SQL.
     *
     * @param string $order the order
     */
    public function set_order($order)
    {
        $this->order = $order;
    }

    /**
     * Gets the Create and modify time control.
     *
     * @return boolean
     */
    public function get_timestamps()
    {
        return $this->timestamps;
    }

    /**
     * Sets the Create and modify time control.
     *
     * @param boolean $timestamps the timestamps
     */
    public function set_timestamps($timestamps)
    {
        $this->timestamps = $timestamps;
    }

    /**
     * Gets the Translable.
     *
     * @return boolean
     */
    public function get_translable()
    {
        return $this->translable;
    }

    /**
     * Sets the Translable.
     *
     * @param boolean $translable the translable
     */
    public function set_translable($translable)
    {
        $this->translable = $translable;
    }

    /**
     * Gets the Translate Fields.
     *
     * @return boolean
     */
    public function get_translate_fields()
    {
        return $this->translate_fields;
    }

    /**
     * Sets the Translate Fields.
     *
     * @param boolean $translate_fields the translate Fields
     */
    public function set_translate_fields($translate_fields)
    {
        $this->translate_fields = $translate_fields;
    }

    /**
     * Gets the Form validation rules.
     *
     * @return array
     */
    public function get_rules()
    {
        return $this->rules;
    }

    /**
     * Sets the Form validation rules.
     *
     * @param array $rules the rules
     */
    public function set_rules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * Add the Form validation rules.
     *
     * @param array $rules the rules
     */
    public function add_rule($field, $rule)
    {
        $this->rules[$field] = $rule;
    }

    /**
     * Get post data by array fields
     *
     * @param  array  $fields list of post fields
     * @return array          post data by array fields
     */
    public function post_data(array $fields = array())
    {
        $data = array();

        if (0 < count($fields)) {
            foreach ($fields as $field) {
                $data[$field] = $this->input->post($field);
            }
        }

        return $data;
    }

    /**
     * Get results from database
     *
     * @param  mixed   $id     primary key value
     * @param  integer $limit  number of results
     * @param  integer $offset from offset
     * @return array|null          array of results or null
     */
    public function get($id = null, $limit = 0, $offset = 0, $whole_language = false)
    {
        $limit = (int)$limit;
        $offset = (int)$offset;
        $whole_language = (bool)$whole_language;

        // if current table has a translable
        // we need to join it to translation table
        if (true === $this->translable) {
            $this->db->select($this->table . '.*');
            $this->db->select($this->table . '_translation.language_id');

            foreach ($this->translate_fields as $field) {
                $this->db->select($this->table . '_translation.' . $field);
            }

            $this->db->join(
                // translation table
                $this->table . '_translation',

                // on
                $this->table . '.' . $this->primary  . ' = ' . $this->table . '_translation' . '.' . $this->table . '_' . $this->primary .

                // get all language if current request from admincp
                (false === $whole_language ? ' AND ' . $this->table . '_translation' . '.' . 'language_id' . ' = ' . $this->session->get('language')->id : ''),

                // direction
                'left'
            );
        }

        // add results order by
        if ( ! empty($this->order)) {
            $this->db->order_by($this->order);
        }

        $method = (1 === $limit ? 'row' : 'result');

        // special record by id
        if ( ! empty($id)) {
            if ( ! empty($this->filter)) {
                $filter = $this->filter;
                $id = $filter($id);
            }

            $this->db->limit(1, 0);
            $this->db->where($this->primary, $id);
            $method = 'row';
        }

        // set the result limit
        else if (0 < $limit) {
            $this->db->limit($limit, $offset);
        }

        // return the results if just need only language
        if (false === $whole_language) {
            return $this->db->get($this->table)->{$method}();
        }

        // if the controller need to get whole language
        // we need to filter these data into language code
        else {
            $results = $this->db->get($this->table)->{$method}();

            foreach ($results as $index => $result) {
                $language = $this->lang->get($result->language_id)->code;

                foreach ($result as $field => $value) {
                    if (in_array($field, $this->translate_fields)) {
                        $results[$language][$field] = $value;
                    } else if ( ! isset($results[$field]) && 'language_id' !== $field) {
                        $results[$field] = $value;
                    }
                }

                unset($results[$index]);
            }

            // fix new language add after record added
            foreach ($this->lang->get() as $language) {
                if ( ! isset($results[$language->code])) {
                    foreach ($this->translate_fields as $field) {
                        $results[$language->code][$field] = null;
                    }
                }
            }

            return $results;
        }
    }

    /**
     * Create new record
     *
     * @param  array  $data array of record data
     * @return integer      inserted id
     */
    public function create(array $data = array())
    {
        // set timestamps
        //var_dump($this->timestamps); die('here');
        if (true === $this->timestamps) {
            $now = date('Y-m-d H:i:s');
            $data['date_added'] = $now;
        }

        // if current table is translable
        // filter the translate fields for translation table
        if (true === $this->translable) {
            foreach ($data as $field => $value) {
                if (in_array($field, $this->translate_fields)) {
                    $data_translation[$field] = $value;
                    unset($data[$field]);
                }
            }
        }

        // insert data into table
        ! isset($data[$this->primary]) || $data[$this->primary] = null;

        $this->db->set($data);
        $this->db->insert($this->table);

        // get last insert id for translation table and return value
        $id = $this->db->insert_id();

        // if current table is translable
        // insert into translation table
        if (true === $this->translable) {
            $data = array();
            foreach ($this->lang->get() as $index => $language) {
                $data[$index] = array(
                    $this->table . '_id' => $id,
                    'language_id' => $language->id
                );

                foreach ($this->translate_fields as $field) {
                    if (isset($data_translation[$field][$language->code])) {
                        $data[$index][$field] = $data_translation[$field][$language->code];
                    } else {
                        $data[$index][$field] = null;
                    }
                }
            }

            // insert translate data into database
            $this->db->insert_batch($this->table . '_translation', $data);
        }

        return $id;
    }

    /**
     * Update record
     *
     * @param  inteter $id   the record identifier
     * @param  array   $data array of record data
     * @return integer       inserted id
     */
    public function update($id, array $data = array())
    {
        // set timestamps
        if (true === $this->timestamps) {
            $now = date('Y-m-d H:i:s');
            $id || $data['date_added'] = $now;

            $data['last_modified'] = $now;
        }

        // if current table is translable
        // filter the translate fields for translation table
        if (true === $this->translable) {
            foreach ($data as $field => $value) {
                if (in_array($field, $this->translate_fields)) {
                    $data_translation[$field] = $value;

                    unset($data[$field]);
                }
            }
        }

        $filter = $this->filter;
        $id = $filter($id);
        $this->db->limit(1);
        $this->db->set($data);
        $this->db->where($this->primary, $id);
        $this->db->update($this->table);

        // if current table is translable
        // insert into translation table
        if (true === $this->translable) {
            foreach ($this->lang->get() as $index => $language) {
                $data = array();
                foreach ($this->translate_fields as $field) {
                    if (isset($data_translation[$field][$language->code])) {
                        $data[$field] = $data_translation[$field][$language->code];
                    } else {
                        $data[$field] = null;
                    }
                }

                $this->db->where($this->table . '_id', $id);
                $this->db->where('language_id', $language->id);

                if (1 === $this->db->count_all_results($this->table . '_translation')) {
                    $this->db->where($this->table . '_id', $id);
                    $this->db->where('language_id', $language->id);

                    $this->db->update($this->table . '_translation', $data);
                } else {
                    $data[$this->table . '_id'] = $id;
                    $data['language_id'] = $language->id;

                    $this->db->insert($this->table . '_translation', $data);
                }
            }
        }

        return $id;
    }













    // public function array_from_post($fields = array())
    // {
    //     $data = array();

    //     if (count($fields)) {
    //         foreach ($fields as $field) {
    //             $data[$field] = $this->input->post($field);
    //         }
    //     }

    //     return $data;
    // }

    // public function get($id = null, $single = false, $translable = false)
    // {
    //     if (null !== $id) {
    //         $filter = $this->filter;
    //         $id = $filter($id);
    //         $this->db->where($this->primary, $id);
    //         $method = 'row';
    //     } else if (true === $single) {
    //         $method = 'row';
    //     } else {
    //         $method = 'result';
    //     }

    //     if (count($this->db->ar_orderby)) {
    //         $this->db->order_by($this->order_by);
    //     }

    //     return $this->db->get($this->table)->{$method}();
    // }

    public function get_by($where, $single = false)
    {
        $this->db->where($where);

        return $this->get(null, $single);
    }

    public function save($data, $id = null, $translable = false)
    {
        // set timestamps
        if (true === $this->timestamps) {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // insert
        if (null === $id) {
            !isset($data[$this->primary]) || $data[$this->primary] = null;
            $this->db->set($data);
            $this->db->insert($this->table);
            $id = $this->db->insert_id();
        }
        // update
        else {
            $filter = $this->filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->primary, $id);
            $this->db->update($this->table);
        }

        return $id;
    }

    public function delete($id, $permanence = false)
    {
        $filter = $this->filter;
        $id = $filter($id);

        if (! $id) {
            return false;
        }

        $this->db->where($this->primary, $id);
        $this->db->limit(1);

        if (true === $permanence) {
            $this->db->delete($this->table);
        } else {
            $statuses = $this->config->item('status');
            $this->db->set('status', 'status | 4', false);
            $this->db->update($this->table);
        }
    }
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */