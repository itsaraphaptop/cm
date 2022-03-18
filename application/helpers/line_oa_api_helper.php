<?php 
	function line_oa_api($data,$line){
		$post = json_encode($data,true);
		// var_dump($post);
		// echo $ch;
		// die();
		// echo $data['price'];
		$ch = curl_init($line);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		if(curl_exec($ch) === false)
		{
			echo 'Curl error: ' . curl_error($ch);
			$date = date("Y-m-d H:i:s");
			file_put_contents("line.log", "{$date} :[ERROR]: send message to ".$data['price']." ".$data['text']." line alert Unsuccessfully\n",FILE_APPEND | LOCK_EX);
		}
		else
		{
			echo 'Operation completed without any errors';
			$date = date("Y-m-d H:i:s");
			file_put_contents("line.log", "{$date} :[PASS]: send message to ".$data['price']." ".$data['text']." line alert Successfully\n",FILE_APPEND | LOCK_EX);
		}
		curl_close($ch);

	}
 
?>