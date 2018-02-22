<?php
    /*
    Rendering Toolbar In Frontend
    */
	show_admin_bar(true);

	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );    
	add_action('init', 'init_custom_load');
	/*ini_set('display_errors', 'On');*/

	/****************
	Show Template Path
	*****************/
	if (!defined('TMPL_URL')) {
	    define('TMPL_URL', get_template_directory_uri());
	}

	/**************************
	Override Admin css and style
	***************************/

	function init_custom_load(){
	    
	if(is_admin()) {
	    wp_enqueue_style('admin_css', TMPL_URL.'/lib/css/admin_css.css', false, '1.0', 'all');
	    wp_enqueue_style('font-awesome.min', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css');
	    wp_enqueue_style('jquery-ui-css', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
	    wp_enqueue_script('admin_js', TMPL_URL.'/js/lib/admin.js', false, '1.0', 'all');
	}
	}
	/**************************
	Remove Wp-Version In Browser
	***************************/
	remove_action('wp_head', 'wp_generator');


	require_once(ABSPATH . 'wp-admin/includes/user.php');
	
	/*************************
	For Post Types And Metabox
	**************************/
	require_once(TEMPLATEPATH . "/lib/admin-config.php");

	/*************
	Featured Image 
	**************/
	add_theme_support('post-thumbnails');
	
	/***********
	Menu Backend 
	************/
	add_theme_support( 'menus' );
	
	/***********************
	Multipost Thumbnail Image 
	************************/
	if (class_exists('MultiPostThumbnails')) { 
    	$types = array('banners','service' ); 
    	foreach($types as $type) {
    		new MultiPostThumbnails(array('label' => 'mobile image', 'id' => 'mobileimage', 'post_type' => $type)); 
    	}

    };
    /*********
    Remove Image Height and Width
    **********/
	add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
	add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

	function remove_width_attribute( $html ) {
	 $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
	 return $html;
	}

	add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
	  $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	  return $html;
	}
	/**********	
	For Excerpt
	***********/
	add_post_type_support('page', 'excerpt');

	/****************
	Format The Content 
	*****************/
	function content_formatter($content) {
	    $bad_content = array('<p></div></p>', '<p><div class="full', '_width"></p>', '</div></p>', '<p><ul', '</ul></p>', '<p><div', '<p><block', 'quote></p>', '<p><hr /></p>', '<p><table>', '<td></p>', '<p></td>', '</table></p>', '<p></div>', 'nosidebar"></p>', '<p><p>', '<p><a', '</a></p>', '_half"></p>', '_third"></p>', '_fourth"></p>', '<p><p', '</p></p>', 'child"></p>', '<p></p>');
	    $good_content = array('</div>', '<div class="full', '_width">', '</div>', '<ul', '</ul>', '<div', '<block', 'quote>', '<hr />', '<table>', '<td>', '</td>', '</table>', '</div>', 'nosidebar">', '<p>', '<a', '</a>', '_half">', '_third">', '_fourth">', '<p', '</p>', 'child">', '');
	    $new_content = str_replace($bad_content, $good_content, $content);
	    return $new_content;
	}
	remove_filter('the_content', 'wpautop');
	add_filter('the_content', 'wpautop', 10);
	add_filter('the_content', 'content_formatter', 11);

	/****************** 
	For Empty Paragraph
	******************/
	function shortcode_empty_paragraph_fix_tag($content) {
	   $array = array(
	      '<p>[' => '[',
	      ']</p>' => ']',
	      '<p></p>' => '',
	      ']<br />' => ']'
	   );
	   $content = strtr($content, $array);
	   return $content;
	}
	
	/********
	Shortcodes
	*********/

	function span( $atts, $content = null ) {
	   $content = preg_replace('#^<\/p>|<p>$#', '', $content);
	   $content=shortcode_empty_paragraph_fix_tag($content);
	   return '<span>'.do_shortcode($content).'</span>';
	}
	add_shortcode('span', 'span');

	function break_tag( $atts, $content = null ) {
	   $content = preg_replace('#^<\/p>|<p>$#', '', $content);
	   $content=shortcode_empty_paragraph_fix_tag($content);
	   return '</br>';
	}
	add_shortcode('break_tag', 'break_tag');
  


	/****************************
	Shortcodes for Generic page
	*****************************/

	function intro_content($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="intro-content">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('intro_content', 'intro_content');
	
	function inner_generic($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="col-10 center-block subpage-wrap generic"><div class="row">' . do_shortcode($content) . '</div></div>';

	}
	add_shortcode('inner_generic', 'inner_generic');

	function with_sidebar($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="col-8">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('with_sidebar', 'with_sidebar');

	function without_sidebar($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="col-10">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('without_sidebar', 'without_sidebar');

	function accordion_section($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="component-accordion">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('accordion_section', 'accordion_section');

	function single_accordion($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="accordion-blk"><h4>'.$atts["title"].'</h4><div class="accordion-content"><p>' . do_shortcode($content) . '</p></div></div>';

	}
	add_shortcode('single_accordion', 'single_accordion');

	function full_image($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="pull-image">' . do_shortcode($content) . '<div class="pull-image-content">'.$atts["caption"].'</div></div>';

	}
	add_shortcode('full_image', 'full_image');

	function row_section($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="row">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('row_section', 'row_section');

	function two_column($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="col-6">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('two_column', 'two_column');

	function sidebar($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="col-4 right-nav"><div class="right-nav-border">' . do_shortcode($content) . '</div></div>';

	}
	add_shortcode('sidebar', 'sidebar');

	function testimonial($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div id="testimonial" class="extand-section"><div class="container testimonial-list"><div class="col-8 center-block text-center">' . do_shortcode($content) . '</div></div></div>';

	}
	add_shortcode('testimonial', 'testimonial');


	function solutions_row($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="row solutions-row">' . do_shortcode($content) . '</div>';

	}
	
	add_shortcode('solutions_row', 'solutions_row');

	function solutions_row_left($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="solutions-content text-left accordion-blk">' . do_shortcode($content) . '</div>';

	}
	
	add_shortcode('solutions_row_left', 'solutions_row_left');

	function btn_apply($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="button-offers">' . do_shortcode($content) . '</div>';

	}
	
	add_shortcode('btn_apply', 'btn_apply');


	function team_section($atts, $content = null) {
		$postArgs=array(
			'orderby' => 'post_date',
			'order'   => 'ASC',
			'post_type'=> 'team',
			'post_status'=>'publish',
			'numberposts'=>-1
 
		);
		$servicePages=get_posts($postArgs);

		$featuredImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
		$defaultImage = get_option('default_image');
		if($featuredImage!='') {
		   $image = $featuredImage;
		} else {
		  $image = $defaultImage;
		}
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
	    $team_sec_div .='<div class="section-block who-isit extand-section">
	<div class="container text-center">
		<h6>SayHello to</h6>
		<h2>Our team</h2>
			<div class="row who-isit-slider">';
			foreach ($servicePages as $servicePage) { 
				$featImage = wp_get_attachment_url(get_post_thumbnail_id($servicePage->ID) );
				$team_sec_div = '<div class="col-4">
	        	<div class="card">
					<div class="card-image"><img src="'.$featImage.'" alt="icon" /></div>
					<div class="card-content">
	            		<h3>'.$servicePage->post_title.'</h3>
	            		<p> '.$servicePage->post_content.' </p>
					</div>
				</div> 	
	        </div>';
	    }
	   $team_sec_div .= '</div></div></div>';
	    return $team_sec_div;

	}
	add_shortcode('team_section', 'team_section'); 
	
	function solutions_content($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="solutions-content accordion-blk">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('solutions_content', 'solutions_content');

	function block_two($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="blk-two">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('block_two', 'block_two');

	function accordion_content($atts, $content = null) {
    	$content = preg_replace('#^<\/p>|<p>$#', '', $content);
	    $content=shortcode_empty_paragraph_fix_tag($content);
    return '<div class="accordion-content">' . do_shortcode($content) . '</div>';

	}
	add_shortcode('accordion_content', 'accordion_content');

	/****************************
	Get Menus In Header And Footer
	*****************************/
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
?>