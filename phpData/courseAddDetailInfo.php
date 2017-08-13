<?php 
	$curl = curl_init();
	$cookie = $_POST['cookie'];
	$cs_id = $_POST['cs_id'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/course/basic?cs_id=".$cs_id,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    // "postman-token: 1a07e5e1-08e9-2ae8-48fc-2967b55efa63"
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