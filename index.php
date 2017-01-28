<?php get_header(); ?>
<div class="category">
	<div class="container">
		<div class="ui stackable grid">
			<div class="computer tablet only row">
				<div class="ten wide column">
						<?php $category = get_the_category(); ?>
							<h1><?php echo $category[0]->name; ?></h1>
							<h2><?php echo category_description(); ?></h2>
					<div class="ui two column grid">
						<?php while( have_posts()) : the_post(); ?>
							<div class="column">
							<?php if ( has_post_thumbnail() ) {	?>
							<a class="categoryThumb" href="<?php echo get_page_link(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php } ?>
							<a href="<?php echo get_page_link(); ?>"><h2><?php the_title() ?></h2></a>
							<?php echo the_excerpt(); ?><a class="ui button" href="<?php echo get_page_link(); ?>">繼續閱讀</a>
							</div>
						<?php endwhile; ?>
						<div class="pageNav"><?php echo paginate_links(); ?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>