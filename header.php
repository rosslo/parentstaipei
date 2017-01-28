<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#" <?php language_attributes(); ?>>
	<head>
		<meta name="google-site-verification" content="cZsEhltsg17hsuRzCXc6KkMxX3pisB7e_1y7_HdEtyU" />
		<meta name="description" content="台北市家長協會在86年成立,91年開始在教育廣播電台製作教育好夥伴節目,至今有14年
節目內容包括各種教育新聞相關議題、教育趨勢新知、親子關係、好書介紹、電影獎評,深受各地家長倚重!!" />
		<meta property="og:image" content="http://pait.org.tw/wp-content/uploads/2016/08/logo.png">
		<meta name="format-detection" content="telephone=no">
		<meta charset="<?php bloginfo('charset');?>" />
		<title><?php
				if (is_home()) {
					bloginfo('name');
				} else {
					wp_title(' - ', true, 'right');
					bloginfo('name');
				} ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/flexslider.css">
		<link href="<?php bloginfo('template_directory') ?>/css/stylesheets/style.css" media="screen" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory') ?>/jquery.fancybox.css">
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
		<![endif]-->
		<!--[if (gte IE 6)&(lte IE 8)]>
		  <script type="text/javascript" src="<?php bloginfo('template_directory') ?>/selectivizr-min.js"></script>
		<![endif]-->
		<?php wp_head(); ?>
	</head>
	<body>
		<header>
			<div class="blue-box">
				<div class="container">
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
					<a id="sitemap" style="line-height:20px;margin-top:40px;margin-right:16px;float:right;" href="http://pait.org.tw/%E7%B6%B2%E7%AB%99%E5%9C%B0%E5%9C%96/">網站地圖</a>
				</div>
			</div>
			<div class="container">
				<div class="top-logo">
					<a href="<?php bloginfo('url'); ?>" class="logo">
						<img src="<?php bloginfo('template_directory'); ?>/image/footer-logo-black.png" alt="logo">
					</a>
				</div>
			</div><!--  close container -->
			<div class="navbar">
				<?php /* Primary navigation */
				wp_nav_menu(array('theme_location' => 'primary-menu','depth' => 2,'menu_class'=>'menu' ));
				?>
			</div>
		</header>