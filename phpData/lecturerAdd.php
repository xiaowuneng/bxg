<?php 
	$curl = curl_init();
	$param = $_POST['param'];
	$cookie = $_POST['cookie'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/teacher/add?".$param,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie:".$cookie,
	    // "postman-token: 09733db3-39bd-f485-b005-4b6fec2d231b"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  // var_dump($response) ;
	  echo $response ;
	}
 ?>