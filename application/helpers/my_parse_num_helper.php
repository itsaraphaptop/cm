<?php 
	function parse_num($number){
		$search = [
			","
		];

		$replace = [
			""
		];
		$number = str_ireplace($search, $replace, $number);

		return $number;
	}

	function add_zero($number){
		$max = 4;
		$size = strlen($number);
		$zero_full = $max-$size;
		$zero = "0";
		//echo $size." ".$zero_full;
		for($index = 1 ;$index < $zero_full ; $index++){
			$zero .="0";
		}
		return $zero.$number;
		
	}


 ?>