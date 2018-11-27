<?php defined('BASEPATH') OR exit('No direct script access allowed');
	
	if ( ! function_exists('convertDate')) {
		function convertDate($date,$from_format,$format) {
			if (!$dt = DateTime::createFromFormat($from_format, $date)) {	
				log_message('error', 'Formato data '.$date.' non previsto ('.$from_format.').');			
				return false;
			}
			return $dt->format($format);
		}
	}
			

	if ( ! function_exists('compareDates')) {
		function compareDates($start,$operator,$end) { 
			/* $start $operator $end */
			// operator < == >
			$permitted_operators=["<","==","!=",">"];
			if ($op=array_search($operator,$permitted_operators)===false) {
				audit_log("operator not permitted");
				return false;			
			}
			if (!$start = DateTime::createFromFormat("d/m/Y H:i:s", $start)) {
				audit_log("start is not a valid date");
				return false;
			}
			if (!$end = DateTime::createFromFormat("d/m/Y H:i:s", $end)) {
				audit_log("end is not a valid date");
				return false;
			}
			switch ($op) {
				case 0: // <
					return $start < $end;
					break;
				case 1: // ==
					return $start == $end;
					break;
				case 2: // !=
					return $start != $end;
					break;
				case 3: // >
					return $start > $end;
					break;
			}
		}
	}
?>
