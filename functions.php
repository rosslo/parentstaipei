<?php
function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
}
/* Theme setup */
register_nav_menus(
	array(
 		'primary-menu'=>_( '主選單')
	)
);
// Register custom navigation walker
//登入頁的logo圖片及大小設定
function custom_login_logo() {
  echo '<style type="text/css">
      .login h1 a { margin-top:-80px;
      				background-image:url(http://pait.org.tw/wp-content/uploads/2016/08/logo.png) !important;
      				background-size: 228px 198.5px; width:228px; height:198.5px;}
    </style>';
}
add_action('login_head', 'custom_login_logo');
//登入頁的logo圖片的點擊連結
function custom_loginlogo_url($url) {
    return get_bloginfo('url');
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );

add_action( 'admin_menu', 'add_homepage_page' );
function add_homepage_page() {
    //add an item to the menu
    add_menu_page (
        '首頁設定',
        '首頁',
        'manage_options',
        'homepage-setting',
        'my_admin_page_function',
        'icons/home_icon.png',
        '24'
    );
    add_action( 'admin_init', 'register_mysettings' );
}
function register_mysettings() { // whitelist options
  register_setting( 'myoption-group', 'slider_num' );
  $slider_num = get_option('slider_num');
  for ( $i = 1 ; $i <= $slider_num ; $i++ ) {
    register_setting( 'myoption-group', 'slider_'.(string)$i );
    register_setting( 'myoption-group', 'link_'.(string)$i );
  }
  register_setting( 'myoption-group', 'latest_movie' );
  register_setting( 'myoption-group', 'youtube_link' );
  register_setting( 'myoption-group', 'fb_link' );
  register_setting( 'myoption-group', 'related_link_num' );
  $related_link_num = get_option('related_link_num');
  for ( $i = 1 ; $i <= $related_link_num ; $i++ ) {
    register_setting( 'myoption-group', 'link_image_'.(string)$i );
    register_setting( 'myoption-group', 'related_link_'.(string)$i );
  }
}
function my_enqueue_media(){
  if (is_admin ()){
    wp_enqueue_media();
  }
}
add_action ( 'admin_enqueue_scripts', 'my_enqueue_media');
function my_admin_page_function() {
    ?>
    <div class="wrap">
        <h2>首頁內容相關設定</h2>
        <form method="post" action="options.php">
        <?php
          settings_fields( 'myoption-group' );
          do_settings_sections( 'myoption-group' );
        ?>
        <table class="form-table" id="slider-table" style="border-bottom: 1px solid #000;">
            <tr valign="top">
            <th scope="row">輪播數量</th>
            <td>
              <input type="number" min="0" step = "1" id="slider_num"  name="slider_num" value="<?php echo esc_attr( get_option('slider_num') ); ?>" />
              <br />請輸入需要的輪播圖片數量。
            </td>
            </tr>
            <?php
              $slider_num = get_option('slider_num');
              for ( $i = 1 ; $i <= $slider_num ; $i++ ) {
                echo "<tr valign='top'><th scope='row'>圖片".(string)$i."</th><td><input id='slider_image_".$i."' type='text' size='36' name='slider_".(string)$i."' value='".esc_attr(get_option('slider_'.(string)$i.''))."'/><input id='slider_button_".(string)$i."' class='slider_upload_button' type='button' value='上傳圖片' /><img class='preview_image' id='slider_preview_".(string)$i."' style='width:150px;height:auto;float:right;' src='".get_option('slider_'.(string)$i)."'/><br />請輸入圖片網址或點擊上傳圖片。<br /><input id='slider_link_".(string)$i."' type='text' size='36' name='link_".(string)$i."' value='".esc_attr( get_option('link_'.(string)$i.''))."' /><br />請輸入圖片點擊後跳轉連結。</td>";
              }
            ?>
          </table>
          <table class="form-table" id="movie-table" style="border-bottom: 1px solid #000;">
            <tr valign="top">
            <th scope="row">最新影片</th>
            <td>
              <input id="latest_movie" size='36' type="text" name="latest_movie" value="<?php echo esc_attr( get_option('latest_movie') ); ?>" />
              <br />請輸入欲顯示的最新影片網址。
            </td>
            </tr>
            <tr valign="top">
            <th scope="row">YouTube連結(不是影片，是播放清單！)</th>
            <td>
              <input id="youtube_link" size='36' type="text" name="youtube_link" value="<?php echo esc_attr( get_option('youtube_link') ); ?>" />
              <br />請輸入欲連結的YouTube播放清單網址。
            </td>
            </tr>
        </table>
          <table class="form-table" id="movie-table" style="border-bottom: 1px solid #000;">
            <tr valign="top">
            <th scope="row">Facebook連結</th>
            <td>
              <input id="fb_link" size='36' type="text" name="fb_link" value="<?php echo esc_attr( get_option('fb_link') ); ?>" />
              <br />請輸入欲連結的Facebook連結網址。
            </td>
            </tr>
        </table>
        <table class="form-table" id="link-table" style="border-bottom: 1px solid #000;">
            <tr valign="top">
            <th scope="row">相關連結</th>
            <td>
              <input id="related_link_num" type="number" min="1" step = "1" name="related_link_num" value="<?php echo esc_attr( get_option('related_link_num') ); ?>" />
              <br />請輸入欲顯示的相關連結數量。
            </td>
            </tr>
             <?php
              $related_link_num = get_option('related_link_num');
              for ( $i = 1 ; $i <= $related_link_num ; $i++ ) {
                echo "<tr valign='top'><th scope='row'>連結".(string)$i."</th><td><input id='link_image_".$i."' type='text' size='36' name='link_image_".(string)$i."' value='".esc_attr(get_option('link_image_'.(string)$i.''))."'/><input id='link_button_".(string)$i."' class='link_upload_button' type='button' value='上傳圖片' /><img class='preview_image' id='link_preview_".(string)$i."' style='width:150px;height:auto;float:right;' src='".get_option('link_image_'.(string)$i)."'/>
                  <br />請輸入圖片網址或點擊上傳圖片。<br /><input id='related_link_".(string)$i."' type='text' size='36' name='related_link_".(string)$i."' value='".esc_attr( get_option('related_link_'.(string)$i.''))."' /><br />請輸入相關連結網址。</td>";
              }
            ?>
        </table>
        <?php
          submit_button();
        ?>
        </form>
    </div>
    <?php
}
/*upload image*/
function my_admin_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', WP_PLUGIN_URL.'/upload-image.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'my_admin_scripts');
add_action('admin_print_styles', 'my_admin_styles');
/*繼續閱讀*/
function new_excerpt_more( $more ) {
    return '<a style="display:none;" class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('', 'your-text-domain') . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*頁碼*/
function native_pagenavi(){

    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

    $pagination = array(
      'base' => @add_query_arg('page','%#%'),
      'format' => '',
      'total' => $wp_query->max_num_pages,
      'current' => $current,
      'prev_text' => '上一頁',
      'next_text' => '下一頁'
    );

     if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');

     if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array('s'=>get_query_var('s'));

    echo paginate_links($pagination);
}
/*編輯器新增文字大小*/
// function enable_more_buttons($buttons) {
// $buttons[] = 'fontsizeselect';
// return $buttons;
// }
// add_filter("mce_buttons_3", "enable_more_buttons");
//
function search_excerpt_highlight() {
    $excerpt = get_the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

    echo $excerpt;
}
function search_title_highlight() {
    $title = get_the_title();
    $keys = implode('|', explode(' ', get_search_query()));
    $title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);

    echo $title;
}
function alter_the_query( $request ) {
    $dummy_query = new WP_Query();  // the query isn't run if we don't pass any query vars
    $dummy_query->parse_query( $request );

    // this is the actual manipulation; do whatever you need here
    if ( $dummy_query->is_category())
        $request['post_type'] = array('post','product');

    return $request;
}
add_filter( 'request', 'alter_the_query' );


function side_widgets_init() {
    register_sidebar( array(
    'name' => 'Footer Sidebar',
    'id' => 'footer-sidebar-1',
    'description' => 'Appears in the footer area 放置訪客人數使用',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'side_widgets_init' );

?>