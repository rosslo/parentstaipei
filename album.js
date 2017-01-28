$(document).ready(function(){
	(function setImagesCount (){
		var albumsNum = $('.albums > .album-box').length;
		for(var i=0; i<albumsNum; i+=1){
			var imagesNum = $('.albums > #wpsimplegallery_container:eq('+i+') li').length;
			$('.albums > .album-box:eq('+i+') .number').text(imagesNum+"張相片");
		}
	})();
	(function setBgImgForAlbumPost (){
		$('.post-box #wpsimplegallery li a img').unwrap();
		// var imagesNum = $('.post-box #wpsimplegallery li a').length;
		// for(var i=0; i<imagesNum; i+=1){
		// 	var cnt = $(".post-box #wpsimplegallery li a:eq('+i+')").contents();
		// 	$(".post-box #wpsimplegallery li a:eq('+i+')").replaceWith(cnt);
		// 	// var originalImgUrl = $('.post-box #wpsimplegallery li a:eq('+i+')').attr('href');
		// 	// $('.post-box #wpsimplegallery li a:eq('+i+')').css('background-image','url('+originalImgUrl+')');
		// }
		// $('.post-box #wpsimplegallery li a').css('behavior','url(http://localhost/parentstaipei/wp-content/themes/parentstaipei/css/backgroundsize.min.htc)');
	})();
	(function albumSlider(){
		$('#wpsimplegallery_container').addClass('albumSlider');
		$('.albumSlider').children('ul').addClass('slides');
		var imagesNum = $('.slides').children('li').length;
		for(var i=0; i<imagesNum; i+=1){
			var src = $('.slides li:eq('+i+') img').attr('src');
			$('.slides li:eq('+i+')').attr('data-thumb',src);
			var newSrc = src.replace('-150x150','');
			$('.slides li:eq('+i+') img').attr('src',newSrc);
			$('.slides li:eq('+i+') img').attr('width','');
			$('.slides li:eq('+i+') img').attr('height','');
		}

	})();
	$('.albumSlider').flexslider({
	    animation: "fade",
	    controlNav: "thumbnails",
	    directionNav: true,
		slideshowSpeed: 2500,
		prevText: "",
		nextText: "",
		pausePlay: true
	});
	$('.flex-control-nav').before($('.flex-direction-nav').clone());
	$('.flex-direction-nav:eq(1)').remove();
	$('.albumSlider .flex-nav-prev').after("<li class='flex-nav-pause'><a class='flex-pause' href='#'></a></li><li class='flex-nav-play'><a class='flex-play' href='#'></a></li>");
	$('.albumSlider .flex-prev').click(function(){
		$('.albumSlider').flexslider('prev');
		$('.albumSlider').flexslider('play');
		return false;
	});
	$('.albumSlider .flex-next').click(function(){
		$('.albumSlider').flexslider('next');
		$('.albumSlider').flexslider('play');
		return false;
	});
	$('.albumSlider .flex-pause').on('click',function(){
		$('.albumSlider').flexslider('pause');
		$(this).toggle();
		$('.flex-play').toggle();
		return false;
	});
	$('.albumSlider .flex-play').on('click',function(){
		$('.albumSlider').flexslider('play');
		$(this).toggle();
		$('.flex-pause').toggle();
		return false;
	});
});