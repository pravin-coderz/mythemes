<?php  
	show_admin_bar(false);
	add_action('init', 'init_custom_load');
	if (!defined('TMPL_URL')) {
		define('TMPL_URL', get_template_directory_uri());
	}
	require_once(ABSPATH . 'wp-admin/includes/user.php');
	/* For post types and metabox */
	require_once(TEMPLATEPATH . "/lib/admin-config.php");

	/* Featured Image */
	add_theme_support('post-thumbnails');
	
	function custom_style_sheet() {
		wp_enqueue_style( 'custom-styling', get_stylesheet_directory_uri() . '/css/style.css' );
	}
	add_action('wp_enqueue_scripts', 'custom_style_sheet');

	/*	Menu Backend */
	add_theme_support( 'menus' );

	/*	widgets Backend */
	add_theme_support( 'widgets' );
	
	/*	Multipost Thumbnail Image */
	if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(array(
			'label' => 'Secondary Image',
			'id' => 'imageBanner',
			'post_type' => 'banners'
			)
		);
	}
	/*	For Excerpt */
	add_post_type_support('page', 'excerpt');
	
	/*Hide wp version*/
	remove_action('wp_head', 'wp_generator'); 

	/*Get logo at center and count*/
	function countMenu($menuName){
		$countMenuArgs = array(
		'order' => 'ASC', 
		'post_type' => 'nav_menu_item', 
		'post_status' => 'publish',
		'output' => ARRAY_A,
		'output_key' => 'menu_order', 
		'nopaging' => true,
		'update_post_term_cache' => false,
		'menu_item_parent' => 1
		);
		$menuCountItems = wp_get_nav_menu_items($menuName, $countMenuArgs); 
		$menuItemsCount = 0;
		foreach ($menuCountItems as $key => $menuCountItem) {
			if ($menuCountItem->menu_item_parent == '0'){
				$menuItemsCount++;
			}
		}
		return $menuItemsCount;
	}

	/*Header grt menu*/
	function get_menu($menuName){
		$mainMenuArgs = array(
		'order' => 'ASC', 
		'post_type' => 'nav_menu_item', 
		'post_status' => 'publish',
		'output' => ARRAY_A,
		'output_key' => 'menu_order', 
		'nopaging' => true,
		'update_post_term_cache' => false,
		'menu_item_parent' => 0
		);
		$menuItems = wp_get_nav_menu_items($menuName, $mainMenuArgs); 
		return $menuItems;
	}
	function shortcode_empty_paragraph_fix($content) {
	   $array = array(
	       '<p>[' => '[',
	       ']</p>' => ']',
	       '<p></p>' => '',
	       ']<br />' => ']'
	   );
	   $content = strtr($content, $array);
	   return $content;
	}
	function img_caption( $atts, $content = null ) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  		$content=shortcode_empty_paragraph_fix($content);
   		   return '<figcaption>'.do_shortcode($content).'</figcaption>';
	}
	add_shortcode('img_caption', 'img_caption');

	function nopad_blk( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="col-8 no-padding">'.do_shortcode($content).'</div>';
	}
	add_shortcode('nopad_blk', 'nopad_blk');
	function fullblk_image( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<figure class="content-image">'.do_shortcode($content).'</figure>';
	}
	add_shortcode('fullblk_image', 'fullblk_image');

	function content_image( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<figure class="content-image">'.do_shortcode($content).'</figure>';
	}
	add_shortcode('content_image', 'content_image');
	function video_image( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="videoImage">'.do_shortcode($content).'</div>';
	}
	add_shortcode('video_image', 'video_image');

	function video_content( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="videoContent">'.do_shortcode($content).'</div>';
	}
	add_shortcode('video_content', 'video_content');

	function video_lnk( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
  			$lnk = $atts['link'];
   		   return '<a href="'.$lnk.'" data-group="1" data-effect="mfp-fade" class="galleryItem play-track">
						<i class="fa fa-play" aria-hidden="true"></i>
					'.do_shortcode($content).'</a>';
	}
	add_shortcode('video_lnk', 'video_lnk');
    
    function double_column( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="row double-column">'.do_shortcode($content).'</div>';
	}
	add_shortcode('double_column', 'double_column');
    
    function left_panel( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="col-8 left-panel">'.do_shortcode($content).'</div>';
	}
	add_shortcode('left_panel', 'left_panel');

    function ulist( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="generic-list">'.do_shortcode($content).'</div>';
	}
	add_shortcode('ulist', 'ulist');

    
    function right_panel( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="col-4 right-panel">'.do_shortcode($content).'</div>';
	}
	add_shortcode('right_panel', 'right_panel');
    
    function section( $atts, $content = null ) {
    		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
  			$content=shortcode_empty_paragraph_fix($content);
   		   return '<div class="sub-sections">'.do_shortcode($content).'</div>';
	}
	add_shortcode('section', 'section');
  
	
?>
	
