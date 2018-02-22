<?php
/************
Template Name:Blogs-page
************/

get_header('sub');
$currentpage = get_post($postId);
$postArgs=array(
    'orderby' => 'post_date',
    'order'   => 'ASC',
    'post_type'=> 'blog',
    'post_status'=>'publish',
    'numberposts'=>-1
 
);
$blogsPages=get_posts($postArgs); 
$bannerImage =  get_option('banner_image');
$defaultImage = get_option('default_image');
if($featuredImage!='') {
   $image = $bannerImage;
} else {
  $image = $defaultImage;
}
?>
<!-- News and Blog section Starts here -->
<!-- Hero Banner Starts here -->
<div class="banner inner-banner"  style="background-image:url('<?php echo $image; ?>')">
	<div class="container">
     	<div class="inner-banner-content">
     		<div class="breadcrumbs">
		    	<ul>
		    	    <?php 
					if (function_exists('bcn_display')) {
                		bcn_display();
            		}
            		?>
		    	</ul>
		    </div>
        	<h1><?php echo $post->post_title;?></h1>
        </div>
	</div>
 </div>
<section class="generic-wraper">
    <div class="container generic-wraper-bg offer-section">
        <div class="col-10 center-block subpage-wrap">
    	    <div class="blog-section">
		 		<?php echo apply_filters('the_content',$currentpage->post_content  );?>
		 		<div class="row">
		        	<div class="col-8 news news-row">
		        		<div>
		        			<?php foreach ($blogsPages as $blogsPage ) {
		        			$featImage = wp_get_attachment_url(get_post_thumbnail_id($blogsPage->ID) );?>
		        			<a href="<?php echo get_permalink($blogsPage->ID);?>" class="news-card">
					    		<div class="news-image"><img src="<?php echo $featImage; ?>" alt="news-image" /></div>
								<div class="news-content">
						        	<h6><?php echo get_the_date( 'F jS, Y', $blogsPage->ID); ?></h6>
						            <h3><?php echo $blogsPage->post_title; ?></h3>
						            <span class="button-arrow">
					        			Read more
									</span>
								</div>
							</a>
		        			<?php }?>
						</div>
		        	</div>
		     
		        </div>
		    </div>
</div>
</div>
</section>
<!-- News and Blog section End here -->
<?php get_footer(); ?>
