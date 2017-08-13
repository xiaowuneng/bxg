<?php 
	
	$curl = curl_init();
	$cookie = $_POST['cookie'];
	$param = $_POST['param'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/course/chapter/add?".$param,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    "postman-token: 8dfb6171-3cd3-e083-db38-f376740221cf"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}
 ?>