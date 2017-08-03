$(function(){
	var course = $(".course");
	var course_submenu = course.nextAll();
	var arrow = course.find("span");
	var lis = $(".list-group-item");
	var aside = $("aside");
	var navbarBrand = $(".navbar-brand");
	var wrapScrollTop;
	var hash = window.location.hash;

	$("#content").load("dashboard/dashboard.html");//默认加载

	/*页面刷新时，判断锚点，用a标签锚点实现路由效果（页面刷新时不会一直跳转到首页）*/
	if(hash === "#dashboard"){
		$("#content").load("dashboard/dashboard.html");
	}
	if(hash === "#lecturer"){
		$("#content").load("lecturer/lecturerManagement.html");
	}
	if(hash === "#sort"){
		$("#content").load("sort/sortManagement.html");
	}
	if(hash === "#courseAdd"){
		$("#content").load("courseManagement/courseAdd.html");
	}


	lis.on("click",function(event){//侧边栏 切换样式
		$(this).children("a").addClass("current").end().siblings("li").children("a").removeClass("current");
		event.stopPropagation();
		if(!course.children("a").hasClass("current")){//当父元素失去样式时，子元素去掉样式
			course_submenu.find("a").removeClass("current");
		}
		switch($(this).index()){
			case 0:$("#content").load("dashboard/dashboard.html"); break;
			case 1:$("#content").load("lecturer/lecturerManagement.html"); break;
			case 2:$("#content").load("sort/sortManagement.html"); break;
			case 4:$("#content").load("courseManagement/courseAdd.html"); break;
			// case 5:$("#content").load("sort/sortManagement.html"); break;
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
	navbarBrand.on("click",function(){
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
});