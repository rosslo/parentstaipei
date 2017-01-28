$(document).ready(function(){
	(function iframe(){
		var videourl = $('.movie-url').val(),
			strindex = 0,
			vid = "",
			url = "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyDUtLYp8dDWF5lSBviYAgpizjNe4hM1TH0&part=snippet";
		if( videourl ){
			strindex = videourl.indexOf("=")+1;
			vid = videourl.substr(strindex);
		}
		if ( vid!=="" ){
			url += "&id=" + vid + "&callback=?"; //callback for ie
			$.support.cors = true;
			$.getJSON(url,
				function(data){
			      var imgurl = data.items[0].snippet.thumbnails.high.url,
			      	  title = data.items[0].snippet.title;
			      $('.movie').append("<img class='movie-img' src='"+imgurl+"'>");
			      $('.movie-img').after("<p class='movie-title'>"+title+"</p>");
			})
			.error(function(jqXHR, textStatus, errorThrown) {
				alert(errorThrown);
			});
	 	}
	 	if( videourl ){
		 	if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 			fancyboxurl = videourl.replace('watch?v=','embed/');
	 			$('.movie').attr('href',fancyboxurl);
			}else {
				fancyboxurl = videourl.replace('watch?v=','v/');
	 			$('.movie').attr('href',fancyboxurl);
			}
	 	}
	   	$(".movie").fancybox({
			type: 'iframe',
			maxWidth: 640,
			maxHeight: 385,
			fitToView: true
		});
	})();
	(function slider(){
		$('.flexslider').flexslider({
		    animation: "slide",
		    slideshowSpeed: 2500,
		    pauseOnHover: true,
		    prevText: "",
		    nextText: ""
		});
		$('.flex-control-nav li a').on('mouseover',function(){
		    $(this).trigger('click');
		});
	})();
	$(function(){
		var _showTab = 0;
		var $defaultLi = $('ul.tabs li').eq(_showTab).addClass('active');
		$($defaultLi.find('a').attr('href')).siblings().hide();
		$('ul.tabs li').mouseover(function() {
			var $this = $(this),
				_clickTab = $this.find('a').attr('href');
			$this.addClass('active').siblings('.active').removeClass('active');
			$(_clickTab).stop(false, true).fadeIn().siblings().hide();
			return false;
		}).find('a').focus(function(){
			this.blur();
		});
	});
});