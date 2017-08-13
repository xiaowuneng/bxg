$(function(){
	var username;
	var password;
	var bn = $(".bn");
	bn.on("click",function(){
		
		username = $(".ur").val();
		password = $(".pw").val();
		if(username!=""&&password!=""){
			NProgress.start();
			$.ajax({
				type:"get",
				url:"./phpData/login.php",
				data:{"tc_name":username,"tc_pass":password},
				dataType:"json",
				success:function(data){
					if(data.code == 200){
						NProgress.done();
						$.cookie("PHPSESSID", "l94vduir6j545kdqkr2e0gea02");
						window.location.href = "http://localhost/8.2/index.html#dashboard";
					}else{
						alert("用户名或密码不正确");
					}
				}
			});
		}else{
			alert("请输入用户名和密码");
		}
		
	});
});