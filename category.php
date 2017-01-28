<?php get_header(); ?>
<div class="category">
	<div class="container">
	<?php get_sidebar(); ?>
		<div class="article-box">
			<?php $category = get_the_category(); ?>
			<form>
				<input id="cat-name" type="hidden" value="<?php echo $category[0]->name ; ?>">
			</form>
			<h1 class="home-title"><span class="blue-title"></span></h1>
			<?php if(is_category( 'movie' )) : ?>
			<div class="albums">
				<?php query_posts(array('post_type' => 'album')); ?>
				<?php while (have_posts()) : the_post(); ?>
				<a class="album-box" href="<?php echo get_page_link(); ?>">
					<div class="thumb-box">
						<?php if ( has_post_thumbnail() ) {	?>
						<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false ); ?>
						<div class="thumb" style="background-image:url('<?php echo $src[0];?>')"></div>
						<?php } ?>
						<div class="text-box">
							<div class="title">
								<?php the_title() ?>
								<p class="number"></p>
								<p><i class="fa fa-long-arrow-right fa-2x" aria-hidden="true"></i></p>
							</div>
						</div>
					</div>
				</a>
				<?php echo do_shortcode('[wpsgallery]'); ?>
				<?php endwhile;?>
			</div>
			<?php  else: ?>
				<?php while( have_posts()) : the_post(); ?>
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
						<a class="title" href="<?php echo get_page_link(); ?>"><?php the_title() ?></a>
						<a class="excerpt" href="<?php echo get_page_link(); ?>">
							<?php echo get_the_excerpt()."..."; ?>
							<a class="read-more" href="<?php echo get_page_link(); ?>">繼續閱讀</a>
						</a>
					</div>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php $args = array(
				'prev_text'   => __('« 上一頁'),
				'next_text'   => __('下一頁 »'),
			); ?>
			<div class="pageNav"><?php echo paginate_links($args); ?></div>
		</div>
	</div>
</div>
<?php get_footer(); ?>