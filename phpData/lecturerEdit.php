<?php 
	$curl = curl_init();
	$tc_id = $_POST['tc_id'];
	$cookie = $_POST['cookie'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/teacher/edit?tc_id=".$tc_id,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    "postman-token: 0941b170-710a-ab06-d429-2a1dc341d7fd"
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