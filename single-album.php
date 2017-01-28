<?php get_header(); ?>
<div class="post">
	<div class="container">
	<?php get_sidebar(); ?>
	<div class="post-box">
		<?php while( have_posts()) : the_post(); ?>
			<h1 class="home-title"><span class="blue-title"></span></h1>
			<div class="content-box">
				<h1 class="post-title"><?php the_title() ?></h1>
					<i class="fa fa-calendar"></i><span>&nbsp;<?php the_time('Y/n/j'); ?>&nbsp;</span>
				<?php if (get_the_tags()) { ?>
					<i class="fa fa-tags"></i><span>&nbsp;<?php the_tags('',' | ',''); ?>&nbsp;</span>
				<?php } ?>
			</div>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
	</div>
</div>
<?php get_footer(); ?>