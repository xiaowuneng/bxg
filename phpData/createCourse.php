<?php 
	$curl = curl_init();
	$cookie = $_POST['cookie'];
	$cs_name = $_POST['cs_name'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/course/create?cs_name=".$cs_name,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    // "postman-token: 9fef03d2-86be-9dc0-407e-0958effb9cd8"
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