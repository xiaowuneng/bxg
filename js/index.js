var cookie = "PHPSESSID="+$.cookie("PHPSESSID");//获取cookie,ajax请求用(需为全局变量)
$(function(){
	var course = $(".course");
	var course_submenu = course.nextAll();
	var arrow = course.find("span");
	var lis = $(".list-group-item");
	var aside = $("aside");
	var navbarBrand = $(".navbar-brand");
	var wrapScrollTop;
	var hash = window.location.hash;
	var userCenter = $(".userCenter");
	var exit = $("#exit");//退出按钮
	

	// 判断是否登录，如果没有登录，跳到登录页面
	if(!($.cookie("PHPSESSID"))){
		window.location.href = "http://localhost/8.2/login.html";
	}
	exit.on("click",function(){
		$.removeCookie("PHPSESSID");
	});

	/*页面刷新时，判断锚点，用a标签锚点实现路由效果（页面刷新时不会一直跳转到首页）*/
	if(hash === "#dashboard"){
		$("#content").load("dashboard/dashboard.html");
	}
	if(hash === "#lecturer"){
		$("#content").load("lecturer/lecturerManagement.html");
	}
	if(hash === "#lecturerAdd"){
		$("#content").load("lecturer/lecturerAdd.html");
	}
	if(hash === "#lecturer/edit"){
		$("#content").load("lecturer/lecturerEdit.html");
	}
	if(hash === "#sort"){
		$("#content").load("sort/sortManagement.html");
	}
	if(hash === "#sortAdd"){
		$("#content").load("sort/sortAdd.html");
	}
	if(hash === "#sortEdit"){
		$("#content").load("sort/sortEdit.html");
	}
	if(hash === "#courseAdd"){
		$("#content").load("courseManagement/courseAdd.html");
	}
	if(hash === "#courseAdd/Detail"){
		$("#content").load("courseManagement/courseAddDetail/courseAddDetail.html");
	}
	if(hash === "#courseAdd/Detail/info"){
		$("#content").load("courseManagement/courseAddDetail/courseAddDetail.html",function(){
			$(".panel-right").load("courseManagement/courseAddDetail/courseAddDetailInfo.html");
		});
	}
	if(hash === "#courseAdd/Detail/img"){
		$("#content").load("courseManagement/courseAddDetail/courseAddDetail.html",function(){
			$(".panel-right").load("courseManagement/courseAddDetail/courseAddDetailImg.html");
		});
	}
	if(hash === "#courseAdd/Detail/manage"){
		$("#content").load("courseManagement/courseAddDetail/courseAddDetail.html",function(){
			$(".panel-right").load("courseManagement/courseAddDetail/courseAddDetailManage.html");
		});
	}
	if(hash === "#courseList"){
		$("#content").load("courseManagement/courseList.html");
	}
	if(hash === "#userCenter"){
		$("#content").load("user/userCenter.html");
	}

	userCenter.on("click",function(){//点击个人中心，加载个人中心页面(组件)
		$("#content").load("user/userCenter.html");
	});

	lis.on("click",function(event){//侧边栏 切换样式
		$(this).children("a").addClass("current").end().siblings("li").children("a").removeClass("current");
		event.stopPropagation();
		switch($(this).index()){
			case 0:$("#content").load("dashboard/dashboard.html"); break;
			case 1:$("#content").load("lecturer/lecturerManagement.html"); break;
			case 2:$("#content").load("sort/sortManagement.html"); break;
			case 4:$("#content").load("courseManagement/courseAdd.html"); break;
			case 5:$("#content").load("courseManagement/courseList.html"); break;
		}
	});
	course.on("click",function(){
		course_submenu.slideToggle();//切换显示子菜单
		if(arrow.hasClass("glyphicon-chevron-down")){//通过修改类名，切换显示箭头
			arrow.removeClass("glyphicon-chevron-down");
			arrow.addClass("glyphicon-chevron-up");
		}else{
			arrow.removeClass("glyphicon-chevron-up");
			arrow.addClass("glyphicon-chevron-down");
		}
	});
	navbarBrand.on("click",function(){//隐藏显示侧边栏
		aside.fadeToggle();
	});
	function asideHeight(){// 设置aside高度为屏幕高度
		aside.height($(window).height());
	}
	asideHeight();
	//屏幕大小改变时，重设高度
	$(window).resize(asideHeight).scroll(function(){
		aside.css("marginTop",$(document).scrollTop());
	});


	$(window).ajaxStart(function(){
		NProgress.start();//加载进度条
		$("#mask").show();

	}).ajaxStop(function(){
		NProgress.done();//加载进度条
		setTimeout(function(){
			$("#mask").hide();
		},200);
	});
});