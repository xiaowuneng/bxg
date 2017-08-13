<?php 
	// 第一种方法：分两次获取
	/*$curl = curl_init();
	$cookie = $_POST['cookie'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/category/top",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie: ".$cookie,
	    "postman-token: dacf7685-3793-4df8-e53b-9b122343a977"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  echo $response;
	}*/
	// 第二种方法
	$curl = curl_init();
	$cookie = $_POST['cookie'];
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.botue.com/category",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	    "cookie:".$cookie,
	    // "postman-token: fef42484-beb1-fb2e-b286-35f11270b0e9"
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