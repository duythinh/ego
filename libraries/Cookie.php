<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cookie
{
    /**
     * client cookie name
     *
     * @var string
     */
    protected $name = null;

    /**
     * client cookie encryption
     *
     * @var boolean
     */
    protected $encryption = true;

    /**
     * cookie encryption key
     *
     * @var string
     */
    protected $encryption_key = null;

    /**
     * set a prefix if you need to avoid collisions
     *
     * @var string
     */
    protected $prefix = null;

    /**
     * cookie domain
     *
     * @var string
     */
    protected $domain = null;

    /**
     * typically will be a forward slash
     *
     * @var string
     */
    protected $path = '/';

    /**
     * cookies will only be set if a secure HTTPS connection exists.
     *
     * @var boolean
     */
    protected $secure = false;

    /**
     * cookie data
     *
     * @var mixed
     */
    protected $data;

    /**
     * auto put data into global cookie
     * @var boolean
     */
    protected $auto = false;

    /**
     * global CodeIgniter instance
     *
     * @var CI_Controller
     */
    protected $CI;

    public function __construct()
    {
        return;

        $this->CI =& get_instance();
        $this->CI->load->config('cookie');

        foreach (array('name', 'expiration', 'encryption', 'encryption_key', 'prefix', 'domain', 'path', 'secure') as $key) {
            $this->{$key} = $this->CI->config->item($key);
        }

        // do we need encryption?
        // if so, load the encryption class
        if (true === $this->encryption) {
            // show the error if encryption key is not set
            if (empty($this->encryption_key)) {
                show_error('In order to use the Session class you are required to set an encryption key in your config file.');
            }

            $this->CI->load->library('encrypt');
        }

        if (isset($_COOKIE[$this->name]) && ! empty($_COOKIE[$this->name])) {
            if (true === $this->encryption) {
                $this->data = unserialize($this->CI->encrypt->decode($_COOKIE[$this->name]));
            } else {
                $this->data = unserialize($_COOKIE[$this->name]);
            }
            // setcookie($this->name, 1, @NOW + $this->expiration, $this->path, $this->domain);
        }
    }

    public function __destruct()
    {
        return;

        if (! $this->auto) {
            $this->set();
        }
    }

    /**
     * retrieve a cookie value
     *
     * @param  string $key     the cookie key
     * @param  mixed  $default the cookie default value
     * @return mixed           the cookie value
     */
    public function read($key = null, $default = null)
    {
        return isset($this->data[$key]) ? $this->data[$key] : $default;
    }

    /**
     * write, update or delete the cookie
     *
     * @param  string $key   the cookie key
     * @param  mixed  $value the cookie value
     * @return mixed         the cookie value
     */
    public function write($key = null, $value = null)
    {
        if (! is_null($key) and ! is_null($value)) {
            $this->data[$key] = $value;
        } else if ($key) {
            unset($this->data[$key]);
        } else {
            $this->data = array();
        }

        if ($this->auto) {
            $this->set();
        }
        return $value;
    }

    public function set()
    {
        if (empty($this->data)) {
            return;
        }

        if (true === $this->encryption) {
            $data = $this->CI->encrypt->encode(serialize($this->data));
        } else {
            $data = serialize($this->data);
        }

        @setcookie($this->name, $data, @NOW + $this->expiration, $this->path, $this->domain);
    }
}

/* End of file MY_Cookie.php */
/* Location: ./application/libraries/MY_Cookie.php */