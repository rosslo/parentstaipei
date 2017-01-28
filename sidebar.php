<?php
	if(is_page()){
?>
<div class="sidebar-page-box">
	<ul class="menu">
		<li class="current-menu-parent"><a><?php the_title() ?></a>
			<ul class="sub-menu">
				<li class="current-menu-item"><a><?php the_title() ?></a></li>
			</ul>
		</li>
	</ul>
</div>
<?php
	}
	if(is_category() || is_single()){
?>
<div class="sidebar-cat-box">
	<?php /* Primary navigation */
		wp_nav_menu(array('theme_location' => 'primary-menu','depth' => 2,'menu_class'=>'menu' ));
	?>
</div>
<?php
	}
?>

