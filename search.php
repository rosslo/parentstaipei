<?php get_header(); ?>
<div class="search">
    <div class="container">
        <div class="sidebar-cat-box">
            <ul class="menu">
                <li class="current-menu-parent">
                    <a href="#">站內搜尋</a>
                    <ul class="sub-menu">
                        <li class="current-menu-item"><a href="#">站內搜尋</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="article-box">
            <h1 class="home-title"><span class="blue-title">站內搜尋<span></h1>
            <div class="search-box">
            <?php
                if ( have_posts() )
                    the_post();
            ?>
            <?php
                rewind_posts();
            ?>
            <?php   if ( ! have_posts() ) :?>
                    <div class="content-box">
                        <p style="padding-left:20px;"><?php _e( '很抱歉，查無相關結果，請嘗試其他關鍵字查詢。', 'parentstaipei' ); ?></p>
                    </div>
            <?php endif; ?>

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
                    <a class="title" href="<?php echo get_page_link(); ?>"><?php search_title_highlight() ?></a>
                    <?php echo do_shortcode('[wpsgallery]'); ?>
                    <a class="excerpt" href="<?php echo get_page_link(); ?>">
                        <?php $excerpt = search_excerpt_highlight() ?>
                        <?php echo $excerpt."...";?>
                        <a class="read-more" href="<?php echo get_page_link(); ?>">繼續閱讀</a>
                    </a>
                </div>
            </div>
            <?php endwhile; ?>
            <?php $args = array(
                'prev_text'   => __('« 上一頁'),
                'next_text'   => __('下一頁 »'),
            ); ?>
            <div class="pageNav"><?php echo paginate_links($args); ?></div>
        </div>

        </div>
    </div>
    <div class="clearfix"></div><!-- clear float -->
</div>
<?php get_footer(); ?>