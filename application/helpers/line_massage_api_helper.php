<?php 
	function line_massage_api($pushID,$text,$type,$price,$pay,$detail,$unit){
		// set post fields

		// app Alert ERP
		// $to = "U55ebca7c282122cff90fec9bb3062f5a" ;
		$sss = "ssss";
		// $post = [
		//     'to' => $pushID,
		// 	'text' => $text,
		// 	'type'=>'message',
		$json = array(
									'id'=> $pushID,
									'type' => $type,
									'text' => $text,
									'price' => $price,
									'pay' => $pay,
									'detail' => $detail,
									'unit' => $unit,
									'moduletype' => 'PR',
		);
		// ];

		// 	$post = [
		// 	    'to' => $to,
		// 	    'text' => $text,
		// 	    'json' =>$json
		// 	];


		// var_dump($post);
		
		$post = json_encode($json,true);
		// $ch = curl_init('http://alert.sourcework.co/api.php');
		// $ch = curl_init('https://gsv.in.th/SW%20Line%20Api/api.php');
		$ch = curl_init('https://line-inac.herokuapp.com/botpush.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		// execute!
		$response = curl_exec($ch);


		var_dump($response);
		
		if($response === "true" || $response == ""){
			$date = date("Y-m-d H:i:s");
			file_put_contents("line.log", "{$date} :[PASS]: send message to line alert Successfully\n",FILE_APPEND | LOCK_EX);
		}else{
			$date = date("Y-m-d H:i:s");
			file_put_contents("line.log", "{$date} :[ERROR]: send message to line alert Unsuccessfully\n",FILE_APPEND | LOCK_EX);
		}

		// close the connection, release resources used
		curl_close($ch);

	}
 
?>