<?php

class helper{


    public static function clean_input($string){
		$string = str_replace(array('[\', \']'), '', $string);
		$string = preg_replace('/\[.*\]/U', '', $string);
		$string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $string);
		$string = htmlentities($string, ENT_COMPAT, 'utf-8');
		$string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
		$string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '', $string);
		
		return trim($string, '');
	}

    public static function check_array_values_contain_special_characters($string = array()){
		if(!empty($string) && is_array($string)):
			foreach($string as $str):
				if (preg_match('/[\'^£$%&*()}{@#~?;!.><>,|=_+¬-]/', $str) || ctype_space($str) || ctype_digit($str) || strlen($str) < 2){
					$out[] = true;
				}else{
					$out[] = $str;
				}
			endforeach;
				return $out;
		endif;
	}

    public static function convert_from_latin1_to_utf8_recursively($dat)
	{
	   if (is_string($dat)) {
		  return utf8_encode($dat);
	   } elseif (is_array($dat)) {
		  $ret = [];
		  foreach ($dat as $i => $d) $ret[ $i ] = self::convert_from_latin1_to_utf8_recursively($d);
 
		  return $ret;
	   } elseif (is_object($dat)) {
		  foreach ($dat as $i => $d) $dat->$i = self::convert_from_latin1_to_utf8_recursively($d);
 
		  return $dat;
	   } else {
		  return $dat;
	   }
    }
    
    public function recursive_array_replace($find, $replace, $array) {
		if (!is_array($array)) {
			return str_replace($find, $replace, $array);
		}
	
		$newArray = [];
		foreach ($array as $key => $value) {
			$newArray[$key] = recursive_array_replace($find, $replace, $value);
		}
		return $newArray;
    }
    
    public static function time_elapsed_string($datetime, $full = false) {
		$now = new DateTime;
		$ago = new DateTime($datetime);
		$diff = $now->diff($ago);
	
		$diff->w = floor($diff->d / 7);
		$diff->d -= $diff->w * 7;
	
		$string = array(
			'y' => 'year',
			'm' => 'month',
			'w' => 'week',
			'd' => 'day',
			'h' => 'hour',
			'i' => 'minute',
			's' => 'second',
		);
		foreach ($string as $k => &$v) {
			if ($diff->$k) {
				$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
			} else {
				unset($string[$k]);
			}
		}
	
		if (!$full) $string = array_slice($string, 0, 1);
		return $string ? implode(', ', $string) . ' ago' : 'just now';
	}

}