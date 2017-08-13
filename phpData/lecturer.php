 <?php
     $curl = curl_init();
     $cookie = $_GET['cookie'];
     curl_setopt_array($curl, array(
       CURLOPT_URL => "http://api.botue.com/teacher",
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 10,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_HTTPHEADER => array(
         "cache-control: no-cache",
         "cookie: ".$cookie,
         "postman-token: ed9c6cf7-0b04-0b9e-7201-4926c9eeb6d2"
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