<?php 
	$curl = curl_init();
	$cookie = $_POST['cookie'];
	$cg_id = $_POST['cg_id'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/category/edit?cg_id=".$cg_id,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    // "postman-token: b8a48f4e-60ad-3059-83ad-d2518a8d9e49"
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