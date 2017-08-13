<?php 
  
  $curl = curl_init();
  $cs_id = $_POST['cs_id'];
  $cookie = $_POST['cookie'];
  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.botue.com/course/lesson?cs_id=".$cs_id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "cookie: ".$cookie,
      "postman-token: f7785673-396b-402f-ae9f-1bd31b94c755"
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