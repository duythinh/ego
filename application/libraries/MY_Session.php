<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Session
{
    /**
     * The session id
     *
     * @var string
     */
    private $id;

    /**
     * current login user
     *
     * @var integer
     */
    private $user_id;

    /**
     * client IP address
     *
     * @var string
     */
    private $ip;

    /**
     * last activity timestamp
     *
     * @var string
     */
    private $last_activity;

    /**
     * client user agent
     *
     * @var string
     */
    private $user_agent;

    /**
     * current user location on website
     *
     * @var string
     */
    private $location;

    /**
     * the session data
     * @var array
     */
    private $data;

    /**
     * global CodeIgniter instance
     *
     * @var CI_Controller
     */
    public $CI;

    /**
     * config values
     * @var array
     */
    private $config = array(
        'sess_cookie_name'     => null,
        'sess_expiration'      => 7200,
        'sess_expire_on_close' => true,
        'sess_encrypt_cookie'  => false,
        'sess_table_name'      => 'session',
        'sess_match_ip'        => true,
        'sess_match_useragent' => true,
        'sess_time_to_update'  => 300,

        'cookie_prefix'        => '',
        'cookie_domain'        => null,
        'cookie_path'          => '/',
        'cookie_secure'        => false,

        'encryption_key'       => ''
    );

    /**
     * the constructor
     */
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->config('general/session');
        $this->CI->load->config('general/cookie');

        // get config from global
        foreach (array_keys($this->config) as $property) {
            ! $this->CI->config->exists($property) || $this->config[$property] = $this->CI->config->item($property);
        }

        // when you use the Session class you MUST set an encryption key
        if (is_null($this->config['encryption_key'])) {
            show_error('In order to use the Session class you are required to set an encryption key in your config file.');
        }

        // if we want to encrypt cookie data, we need to load the encrypt class
        if (true === $this->config['sess_encrypt_cookie']) {
            $this->CI->load->library('encrypt');
        }

        // set the session length. If the session expiration is
        // set to zero we'll set the expiration two years from now.
        if (0 === $this->config['sess_expiration']) {
            $this->config['sess_expiration'] = (60 * 60 * 24 * 365 * 2);
        }

        // set the cookie name
        $this->config['sess_cookie_name'] = $this->config['cookie_prefix'] . $this->config['sess_cookie_name'];

        // run the Session routine. If a session doesn't exist we'll
        // create a new one.  If it does, we'll update it.
        if ( ! $this->read()) {
            $this->create();
        } else {
            $this->update();
        }
    }

    /**
     * Gets the session id.
     *
     * @return string
     */
    public function get_id()
    {
        return $this->id;
    }

    /**
     * Sets the session id.
     *
     * @param string $id the id
     */
    public function set_id($id)
    {
        $this->id = $id;
    }

    /**
     * Gets the current login user.
     *
     * @return integer
     */
    public function get_user_id()
    {
        return $this->user_id;
    }

    /**
     * Sets the current login user.
     *
     * @param integer $user_id the user_id
     */
    public function set_user_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * Gets the current user location on website.
     *
     * @return string
     */
    public function get_location()
    {
        return $this->location;
    }

    /**
     * Sets the current user location on website.
     *
     * @param string $location the location
     */
    public function set_location($location)
    {
        $this->location = $location;
    }

    /**
     * fetch the current session data if it exists
     *
     * @return  bool
     */
    function read()
    {
        // fetch the cookie
        $this->id = $this->CI->input->cookie($this->config['sess_cookie_name']);

        // No cookie? Goodbye cruel world!...
        if (false === $this->id) {
            log_message('debug', 'A session cookie was not found.');
            return false;
        }

        // if current cookie encrypted we need to decrypt it
        if (true === $this->config['sess_encrypt_cookie']) {
            $this->id = $this->CI->encrypt->decode($this->id);
        } else {
            // encryption was not used, so we need to check the md5 hash
            $hash = substr($this->id, strlen($this->id) - 32); // get last 32 chars
            $this->id = substr($this->id, 0, strlen($this->id) - 32);

            // Does the md5 hash match? This is to prevent manipulation of session data in userspace
            if ($hash !==  md5($this->id . $this->config['encryption_key'])) {
                log_message('error', 'The session cookie data did not match what was expected. This could be a possible hacking attempt.');
                $this->destroy();
                return false;
            }
        }

        $this->CI->db->where('id', $this->id);
        $this->CI->db->limit(1);
        $query = $this->CI->db->get($this->config['sess_table_name']);

        if (0 === $query->num_rows()) {
            $this->destroy();
            return false;
        } else {
            $result = $query->row();
        }

        // Is the session current?
        if (strtotime($result->last_activity) + $this->config['sess_expiration'] < @NOW) {
            $this->destroy();
            return false;
        } else {
            $this->last_activity = $result->last_activity;
        }

        // Does the IP Match?
        if (true === $this->config['sess_match_ip'] && $result->ip !== $this->CI->input->ip_address()) {
            $this->destroy();
            return false;
        } else {
            $this->ip = $result->ip;
        }

        // Does the User Agent Match?
        if (true === $this->config['sess_match_useragent'] && $result->user_agent !== $this->CI->input->user_agent()) {
            $this->destroy();
            return false;
        } else {
            $this->user_agent = $result->user_agent;
        }

        $this->data = unserialize($result->data);

        return true;
    }

    /**
     * write the session data into database
     *
     * @return void
     */
    public function write()
    {
        $this->CI->db->where('id', $this->id);
        $this->CI->db->set('user_id', $this->user_id);
        $this->CI->db->set('data', serialize($this->data));

        $this->CI->db->update($this->config['sess_table_name']);
    }

    /**
     * Destroy the current session
     *
     * @return  void
     */
    public function destroy()
    {
        // Kill the session DB row
        $this->CI->db->where('id', $this->id);
        $this->CI->db->delete($this->config['sess_table_name']);

        // Kill the cookie
        setcookie(
            $this->config['sess_cookie_name'],
            addslashes(serialize(array())),
            (@NOW - 31500000),
            $this->config['cookie_path'],
            $this->config['cookie_domain'],
            false
        );

        // Kill session data
        $this->data = array();
    }

    /**
     * set, update or delete the session data
     *
     * @param string $key   session key
     * @param mixed  $value session value
     */
    public function set($key = null, $value = null)
    {
        if (! is_null($key) && ! is_null($value)) {
            $this->data[$key] = $value;
        } else if (! is_null($key)) {
            unset($this->data[$key]);
        } else {
            $this->data = array();
        }

        $this->write();
    }

    /**
     * get session data
     *
     * @param  string $key     session key
     * @param  mixed  $default session value
     * @return mixed           session value
     */
    public function get($key = null, $default = null, $filter = null)
    {
        $filter = strval($filter);

        if ( ! empty($filter) && ! function_exists($filter)) {
            show_error('The Filter Function <strong>' . $filter . '</strong> Does Not Exists!');
        }

        if (is_null($key)) {
            return $this->data;
        } else if (isset($this->data[$key])) {
            return (empty($filter) ? $this->data[$key] : $filter($this->data[$key]));
        } else {
            return $default;
        }
    }

    /**
     * generate identify session code
     *
     * @return string the indentify session code
     */
    private function generate_session_id()
    {
        $id = '';
        while (strlen($id) < 32) {
            $id .= mt_rand(0, mt_getrandmax());
        }

        // to make the session ID even more secure we'll combine it with the user's IP
        $id .= $this->CI->input->ip_address();
        $id = md5(uniqid($id, true));

        return $id;
    }

    /**
     * create a new session
     *
     * @return  void
     */
    private function create()
    {
        $this->id            = $this->generate_session_id();
        $this->ip            = $this->CI->input->ip_address();
        $this->user_agent    = $this->CI->input->user_agent();
        $this->last_activity = date('Y-m-d H:i:s', @NOW);
        $this->data          = array();

        // Save the data to the DB
        $this->CI->db->set('id', $this->id);
        $this->CI->db->set('ip', $this->ip);
        $this->CI->db->set('user_agent', $this->user_agent);
        $this->CI->db->set('last_activity', $this->last_activity);
        $this->CI->db->set('data', serialize($this->data));

        $this->CI->db->insert($this->config['sess_table_name']);

        // Write the cookie
        if (true === $this->config['sess_encrypt_cookie']) {
            $cookie_data = $this->CI->encrypt->encode($this->id);
        } else {
            // if encryption is not used, we provide an md5 hash to prevent userside tampering
            $cookie_data = $this->id . md5($this->id . $this->config['encryption_key']);
        }

        $expire = (true === $this->config['sess_expire_on_close']) ? 0 : $this->config['sess_expiration'] + @NOW;

        // Set the cookie
        setcookie(
            $this->config['sess_cookie_name'],
            $cookie_data,
            $expire,
            $this->config['cookie_path'],
            $this->config['cookie_domain'],
            $this->config['cookie_secure']
        );
    }

    /**
     * update an existing session
     *
     * @return [type] [description]
     */
    private function update()
    {
        // We only update the session every five minutes by default
        if (strtotime($this->last_activity) + $this->config['sess_time_to_update'] >= @NOW) {
            return;
        }

        // Save the old session id so we know which record to
        // update in the database if we need it
        $old_id = $this->id;
        $this->id            = $this->generate_session_id();
        $this->last_activity = date('Y-m-d H:i:s', @NOW);

        // Save the data to the DB
        $this->CI->db->where('id', $old_id);
        $this->CI->db->set('id', $this->id);
        $this->CI->db->set('last_activity', $this->last_activity);
        $this->CI->db->update($this->config['sess_table_name']);

        // Write the cookie
        if (true === $this->config['sess_encrypt_cookie']) {
            $cookie_data = $this->CI->encrypt->encode($this->id);
        } else {
            // if encryption is not used, we provide an md5 hash to prevent userside tampering
            $cookie_data = $this->id . md5($this->id . $this->config['encryption_key']);
        }

        $expire = (true === $this->config['sess_expire_on_close']) ? 0 : $this->config['sess_expiration'] + @NOW;

        // Set the cookie
        setcookie(
            $this->config['sess_cookie_name'],
            $cookie_data,
            $expire,
            $this->config['cookie_path'],
            $this->config['cookie_domain'],
            $this->config['cookie_secure']
        );
    }
}

/* End of file MY_Session.php */
/* Location: ./application/libraries/MY_Session.php */