<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'sess_cookie_name'     => 'ego',
    'sess_expiration'      => 7200,
    'sess_expire_on_close' => true,
    'sess_encrypt_cookie'  => false,
    'sess_table_name'      => 'session',
    'sess_match_ip'        => true,
    'sess_match_useragent' => true,
    'sess_time_to_update'  => 300
);

/* End of file session.php */
/* Location: ./application/config/general/session.php */