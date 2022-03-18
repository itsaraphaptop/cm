<?php 
	function line_alert($pushID,$text){
		// set post fields

		// app Alert ERP
		$to =
		//  array(
		// 	'U11fae07ce7afb4aac7875be082b2b3ee',
		// 	'U0e6b5794496cbcee1bb4850c8f888c8c'
		// );


		// top
		 "U55ebca7c282122cff90fec9bb3062f5a" ;
		//  piak
		// "U0e6b5794496cbcee1bb4850c8f888c8c";
		// M
		// "U8f70ff048d6c81f89cc0f280be0acef2";

		// tae
		// $to = "U411da4036b0998ab4af64cf951a31e43";

		// $json = "{\"data\":[{\"id\":\"{$to}\",\"type\":\"message\",\"text\":\"testMessage\"}]}";

		// echo $json;

		
		$post = [
		    'to' => $pushID,
		    'text' => $text,
		    'json' =>json_encode(
				    	array('data'=>
				    		[
				    			array('id'=>$pushID,'type'=>'message','text'=>$text)
				    	
				    		]	
				    	)
		    		)
		];

		// 	$post = [
		// 	    'to' => $to,
		// 	    'text' => $text,
		// 	    'json' =>$json
		// 	];


		// var_dump($post);
		// die();
		// $ch = curl_init('http://alert.sourcework.co/api.php');
		// $ch = curl_init('https://gsv.in.th/SW%20Line%20Api/api.php');
		$ch = curl_init('https://line-inac.herokuapp.com/botpush.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		// execute!
		$response = curl_exec($ch);


		// var_dump($response);
		
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