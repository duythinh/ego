<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation
{
/**
	 * Translate a field name
	 *
	 * @access	private
	 * @param	string	the field name
	 * @return	string
	 */
	protected function _translate_fieldname($fieldname)
	{
		// Do we need to translate the field name?
		// We look for the prefix lang: to determine this
		if (substr($fieldname, 0, 5) == 'lang:')
		{
			// Grab the variable
			// $line = substr($fieldname, 5);
			$lines = explode(' ', substr($fieldname, 5));
			$line = array_shift($lines);

			// Were we able to translate the field name?  If not we use $line
			if (FALSE == ($fieldname = ucwords($this->CI->lang->line($line))))
			{
				return $line;
			} else if (count($lines)) {
				$fieldname .= ' ' . implode(' ', $lines);
			}
		}

		return $fieldname;
	}
}

/* End of file MY_Form_validation.php */
/* Location: ./application/libraries/MY_Form_validation.php */