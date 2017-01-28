<footer>
	<div class="container">
		<div class="left-box">
			<div class="footer-logo">
				<a href="<?php bloginfo('url'); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/image/footer-logo-black.png" alt="logo">
				</a>
			</div>
			<div>
			    <?php $footer_youtube_link = get_option('youtube_link');?>
			    <?php $fb_link = get_option('fb_link');?>
				<ul class="social">
					<li class="li-facebook"><a class="fa fa-facebook" target='_blank' href="<?php echo $fb_link;?>" target='_blank'></a></li>
					<li class="li-youtube"><a class="fa fa-youtube" target='_blank' href="<?php echo $footer_youtube_link;?>"></a></li>
					<li><img class="qr-image" src="<?php bloginfo('template_directory'); ?>/image/QR.png"></li>
				</ul>
				<ul class="left-info">
					<li>電話：(02)2832-1389</li>
					<li style="padding-left:48px;">(02)2832-1387</li>
				</ul>
			</div>
		</div>
		<div class="right-box">
			<div class="logo-2">
				<img src="<?php bloginfo('template_directory'); ?>/image/logo-2.jpg">
			</div>
			<ul class="right-info">
				<li>傳真：(02)2832-1526</li>
				<li>網站：<a style="color:#fff;" href="http://pait.org.tw">http://pait.org.tw</a></li>
				<li>電子郵件地址: wearepait@gmail.com</li>
				<li>統編：20085126</li>
			</ul>
			<div id="footer-sidebar" class="secondary">
				<div id="footer-sidebar1">
				<?php
				if(is_active_sidebar('footer-sidebar-1')){
				dynamic_sidebar('footer-sidebar-1');
				}
				?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="copyright-box">
		<p id="copyright-text">Copyright &copy 2016 台北市家長協會 All rights reserved</p>
	</div>
</footer>
<div id="gotop"><i class="fa fa-chevron-up"></i></div>  <!-- 向上滑 -->
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/script.js"></script>
<?php  if(is_home()){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery.easing.min.js" /></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/home.js"></script>
<?php } ?>
 <?php  $content =  get_the_content();
 if ( has_shortcode( $content, 'wpsgallery' ) ) { ?>
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery.flexslider-min.js"></script>
 <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/album.js"></script>
 <?php } ?>
<?php if ( 'album' == get_post_type() ){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/album.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/jquery.flexslider-min.js"></script>
<?php } ?>
<?php if(is_search()){ ?>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/search.js"></script>
<?php } ?>
<?php wp_footer();?>
</body>
</html>
