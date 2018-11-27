<?php defined('BASEPATH') OR exit('No direct script access allowed');
	if ( ! function_exists('audit_log')) {
		function audit_log($message,$path="") {
			static $_log;
			
			if ($_log === NULL)
			{
				// references cannot be directly assigned to static variables, so we use an array
				$_log[0] =& load_class('Log', 'core');
			}

			$_log[0]->write_custom_log($message,$path);
		}
	}
?>
