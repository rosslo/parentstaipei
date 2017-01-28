$(document).ready(function(){
	var albumsNum = $('.search-box #wpsimplegallery_container').length;
	for(var i=0; i<albumsNum; i+=1){
		var images = $('.search-box #wpsimplegallery_container:eq('+i+') li'),
			imagesNum = images.length;
		for(var j=4; j<imagesNum; j+=1){
			images.eq(j).remove();
		}
		$('.search-box #wpsimplegallery_container a[title]').removeAttr('class href');
		$('.search-box #wpsimplegallery_container:eq('+i+')').prependTo('.excerpt:eq('+i+')');
	}
});