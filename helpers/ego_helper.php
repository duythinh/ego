<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Full URL
 *
 * Create a local URL based on your basepath. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access  public
 * @param   string
 * @return  string
 */
if ( ! function_exists('full_url'))
{
    function full_url($uri = '')
    {
        $CI =& get_instance();
        return $CI->config->site_url($uri, true);
    }
}


// detect form error with custom languages and class name
if ( ! function_exists('form_detect_error')) {
	/**
	 * detect form error with custom languages and class name
	 *
	 * @param  string  $field            field name
	 * @param  boolean $detect_languages detect languages
	 * @param  string  $class            css class name
	 * @return string
	 */
	function form_detect_error($field = null, $detect_languages = false, $class = 'error')
	{
		if (empty($field)) {
			return null;
		}

		if (false === $detect_languages) {
			if (form_error($field)) {
				$error = true;
			} else {
				$error = false;
			}
		} else {
			$error = false;
			$CI =& get_instance();
			foreach ($CI->lang->get() as $language) {
				if (form_error($field . '[' . $language->code . ']')) {
					$error = true;
					break;
				}
			}
		}

		return $error ? ' ' . $class : null;
	}
}


if ( ! function_exists('res_url'))
{
	/**
	 * Resources URL
	 *
	 * Create a local URL based on your basepath.
	 * Segments can be passed in as a string or an array, same as site_url
	 * or a URL to a file can be passed in, e.g. to an image file.
	 *
	 * @access	public
	 * @param string
	 * @return	string
	 */
	function res_url($uri = '')
	{
		$CI =& get_instance();

		if (true === $CI->config->item('in_admin')) {
			$uri = 'backend/' . $uri;
		}

		$uri = RESPATH . '/' . $uri;

		return $CI->config->base_url($uri);
	}

    function rand_string($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}
/* End of file ego_helper.php */
/* Location: ./application/helpers/ego_helper.php */