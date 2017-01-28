$(document).ready(function(){
	var sidebarAllMenu = $('.sidebar-cat-box .menu').children();
	var subMenuName="";
	subMenuName = $('.sidebar-cat-box .menu > .current-menu-item > a').text();
	if((sidebarAllMenu.hasClass('current-menu-item'))&&(!$('.current-menu-item').children().hasClass('sub-menu'))){
		$('.sidebar-cat-box .menu > .current-menu-item').append('<ul class="sub-menu"><li class="orange-font"><a href="#">'+subMenuName+'</a></li></ul>');
	}
	subMenuName = $('.sidebar-cat-box .menu > .current-menu-parent > a').text();
	if((sidebarAllMenu.hasClass('current-menu-parent'))&&(!$('.current-menu-parent').children().hasClass('sub-menu'))){
		$('.sidebar-cat-box .menu > .current-menu-parent').append('<ul class="sub-menu"><li class="orange-font"><a href="#">'+subMenuName+'</a></li></ul>');
	}
	menuName = $('#cat-name').val();  //沒在選單內的分類，如未分類、活動訊息
	if(!menuName){
		menuName="未分類";
	}
	if(!(sidebarAllMenu.hasClass('current-menu-parent'))&&(!(sidebarAllMenu.hasClass('current-menu-item')))){
		$('.sidebar-cat-box .menu').append('<li class="current-menu-item"><a href="#">'+menuName+'</a></li>');
		subMenuName = $('.sidebar-cat-box .menu > .current-menu-item > a').text();
		$('.sidebar-cat-box .menu > .current-menu-item').append('<ul class="sub-menu"><li class="orange-font"><a href="#">'+subMenuName+'</a></li></ul>');
	}
	var categoryTitle = $('.sidebar-cat-box .current-menu-item > a').text(),
		pageTitle = $('.sidebar-page-box .current-menu-item > a').text(),
		postTitle_menuParent = $('.sidebar-cat-box .current-menu-parent > a').text(),  //menu->post
		postTitle_menuChild = ""; //menu->post
	var len = $('.sidebar-cat-box .current-menu-parent .current-menu-parent a').length;
		$('.sidebar-cat-box .current-menu-parent .current-menu-parent a').each(function(index){
			postTitle_menuChild += $(this).text();
			if(index !== (len-1)){
				postTitle_menuChild += "、";
			}
		});
	$('.category .blue-title').text(categoryTitle);
	if(postTitle_menuChild){
		$('.post .blue-title').text(postTitle_menuChild);
	}else if(postTitle_menuParent){
		$('.post .blue-title').text(postTitle_menuParent);
	}else{
		$('.post .blue-title').text(pageTitle);
	}

	$(".sub-menu li").before("<span class='arrow_t_int'></span><span class='arrow_t_out'></span>");
	$(".sub-menu li:nth-child(3)").hover(
		  function() {
		    $('.arrow_t_out').css('border-bottom-color','rgb(252, 179, 68)');
		  }, function() {
		    $('.arrow_t_out').css('border-bottom-color','#ffffff');
		  }
	);
	$('.navbar .menu>li').hover(
		function(){
			$(this).css('background-color','rgb(252, 179, 68)');
			$(this).children('a').css('color','#ffffff');
		},function(){
			if(!$(this).hasClass('current-menu-item')){
				if($(this).hasClass('current-menu-parent')){
					$(this).css('background-color','rgb(252, 179, 68)');
					$(this).children('a').css('color','#ffffff');
				}else{
					$(this).css('background-color','#ffffff');
					$(this).children('a').css('color','#000000');
				}
			}
		}
	);
	$('.navbar .sub-menu').hover(
		function(){
			var parentLi = $(this).parent();
			parentLi.css('background-color','#ffffff');
			parentLi.children('a').css('color','#000000');
		},function(){
			var parentLi = $(this).parent();
			parentLi.css('background-color','rgb(252, 179, 68)');
			parentLi.children('a').css('color','#ffffff');
		}
	);
	$(window).scroll(function() {
		if ( $(this).scrollTop() > 300){
			$('#gotop').fadeIn("fast");
		} else {
			$('#gotop').stop().fadeOut("fast");
		}
	});
	$("#gotop").click(function(){
		jQuery("html,body").animate({
			scrollTop:0
		},1000);
	});
});