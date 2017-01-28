<?php get_header(); ?>
<div class="container">
	<div class="flexslider"> <!-- 輪播 -->
	  <ul class="slides">
	  	<?php $slider_num = get_option('slider_num');
	  		for ($i=1; $i <= $slider_num; $i++) {
	  			$link = get_option('link_'.(string)$i);
	  			$image = get_option('slider_'.(string)$i);
	   			echo "<li><a target='_blank' href='".$link."'><img src='".$image."' /></a></li>";
	  		}
	  	?>
	  </ul>
	</div>
	<div class="event-box abgne_tab">
			<h1 class="home-title"><span class="ch-title">最新消息</span><span class="en-title">News</span></h1>
		<ul class="tabs">
			<li><a href="#tab1">教育議題與文章</a></li>
			<li><a href="#tab2">愛你一輩子太陽團活動</a></li>
			<li><a href="#tab3">教育好夥伴廣播</a></li>
			<li><a href="#tab4">會員讀書會</a></li>
		</ul>
		<div class="tab_container">
		<?php
			$Arr=array('issue','愛你一輩子太陽團活動','radio','會員讀書會');
			$i=count($Arr);
			for($j=0 ; $j<$i ; $j++){
		?>
			<div id="<?php echo 'tab'.($j+1); ?>" class="tab_content">
				<?php
					$args = array('category_name'=>$Arr[$j], 'post_type' => 'post');
					$child_pages = new WP_Query($args);
				?>
				<?php if ($child_pages->have_posts()): ?>
				<?php while($child_pages->have_posts()): $child_pages->the_post(); ?>
				<div class="content-box">
				   	<div class="thumb-box">
				    	<?php if ( has_post_thumbnail() ) : ?>
		                    <a class="thumb" href="<?php echo get_page_link(); ?>"><?php the_post_thumbnail(); ?></a>
				    	<?php  else: ?>
		                    <a class="thumb" href="<?php echo get_page_link(); ?>">
		                        <img src="<?php bloginfo('template_directory'); ?>/image/logo.png" >
		                    </a>
		                <?php endif; ?>
				    </div>
				    <div class="text-box">
					    <a class="title" href="<?php echo get_page_link( $child_pages->ID ); ?>">
					    	<?php echo the_title(); ?>
					    </a>
						<a class="excerpt" href="<?php echo get_page_link( $child_pages->ID ); ?>">
						    <?php $excerpt = get_the_excerpt() ?>
						    <?php echo $excerpt."...";?>
						    <a class="read-more" href="<?php echo get_page_link( $child_pages->ID ); ?>">
						    	<?php echo "繼續閱讀";?>
						    </a>
						</a>
				    </div>
				   </div>
			<?php endwhile; ?>
				<?php  else: ?>
				    <div class="content-box">
				    	<div class="thumb-box">
	                        <a class="thumb" href="<?php echo get_page_link(); ?>">
	                            <img src="<?php bloginfo('template_directory'); ?>/image/logo.png" >
	                        </a>
				    	</div>
				    	<div class="text-box">
					        <a class="title">
					        	<?php echo "尚無文章"; ?>
					        </a>
				    	</div>
				    </div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			<a class="more-button" href="<?php bloginfo('url') ?>/category/<?php echo $Arr[$j];?>">了解更多</a>
			</div>
		<?php
			}
		?>
		</div>
	</div>
	<div class="movie-link-box">
		<div class="movie-box">
			<h1 class="home-title"><span class="ch-title">最新影片</span><span class="en-title">Movies</span></h1>
			<?php
				$latest_movie = get_option('latest_movie');
			?>
			<form>
				<input class="movie-url" type="hidden" value="<?php echo $latest_movie;?>"/>
			</form>
		    <a class="movie">
				<span class="play-icon"></span>
		    </a>
		    <?php $youtube_link = get_option('youtube_link');?>
			<a class="more-button" target='_blank' href="<?php echo $youtube_link;?>">了解更多</a>
		</div>
		<div class="link-box">
			<h1 class="home-title"><span class="ch-title">相關連結</span><span class="en-title">Links</span></h1>
				<div class="content-box">
					<?php $related_link_num = get_option('related_link_num');
				  		for ($i=1; $i <= $related_link_num; $i++) {
				  			$link = get_option('related_link_'.(string)$i);
				  			$image = get_option('link_image_'.(string)$i);
				   			echo "<div class='image-box'>
				   					<a class='link-image' target='_blank' href='".$link."'>
				   					<img src='".$image."' />
				   					</a>
				   				  </div>";
				  		}
				  	?>
			  	</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<?php get_footer(); ?>
