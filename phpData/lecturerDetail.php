<?php 
	$curl = curl_init();
	$tc_id = $_GET['tc_id'];
	$cookie = $_GET['cookie'];

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/teacher/view?tc_id=".$tc_id,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    "postman-token: d527895f-795c-cc90-670a-9f36f4c467cf"
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