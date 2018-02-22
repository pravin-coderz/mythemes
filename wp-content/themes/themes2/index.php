<?php
/***********************
Template Name: Home page
************************/
get_header('sub');
?>
<?php
$bannerArgs = array(
    'post_type'     => 'banners',
    'numberposts' => -1,
    'order'         => 'ASC', 
    'orderby'       => 'menu_order',
    'post_status'   => 'publish',   
); 
$banners = get_posts($bannerArgs);
?>
<!-- Hero Banner Starts here -->
<?php 
if(is_array($banners) && count($banners) > 0){ ?>
<?php 
	foreach($banners as $banner){
        $featImage = wp_get_attachment_url(get_post_thumbnail_id($banner->ID) ); 
        $watchVideo = get_post_meta($banner->ID, 'rl_link_url', true);
        $linkHeading = get_post_meta($banner->ID, 'link_heading', true);?>
		<div class="banner page"  style="background-image:url('<?php echo $featImage; ?>')">
			<div class="container">
		     	<div class="banner-content">
		        	<h1><?php echo $banner->post_title; ?></h1>
		        		 <?php echo apply_filters('the_content',$banner->post_content); ?>
		        		 <?php if($watchVideo !=''){?>
			          		<a href="<?php echo $watchVideo; ?>" data-id="media-popup" class="button button-video popup-trigger"><?php echo $linkHeading; ?></a>
							<div class="popup videoBlk" id="media-popup">
				          	 	<div class="videoPlay popup-inner embed-responsive embed-responsive-21by9">
							    <iframe id="videoFrame" class="embed-responsive-item" src="<?php echo $watchVideo; ?>"></iframe>
							    <a href="#" class="popup-close"><i class="fa fa-times" aria-hidden="true"></i></a>
							    </div>
							</div>
			          	<?php }?>
			    </div>
			</div>
	    </div>
   <?php } ?>
<?php } ?>
<!-- Hero Banner End here -->
	
<?php get_footer(); ?>