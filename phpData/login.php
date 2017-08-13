
<?php 
	function _httpPost($url,$requestData){

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        //普通数据
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($requestData));//http_build_query()方法把数据组合成url数据

        //发送json数据
        //$requestData = '{"name":"hello","age":122,"arr":{"arrid":44,"name":"world","test":[333,444,555,66,"xxdfads"]}}';
        //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length:' . strlen($requestData))); 
        //curl_setopt($curl, CURLOPT_POSTFIELDS, $requestData);
        //服务器端接收json数据  file_get_contents('php://input');

        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }
    $username = $_GET['tc_name'];
    $userpass = $_GET['tc_pass'];
    echo _httpPost("http://api.botue.com/login",array("tc_name"=>"$username","tc_pass"=>"$userpass"));
 ?>