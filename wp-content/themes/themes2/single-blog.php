<?php
get_header('sub');
$bannerImage =  get_option('banner_image');
$defaultImage = get_option('default_image');
if($featuredImage!='') {
   $image = $bannerImage;
} else {
  $image = $defaultImage;
}
?>
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
		<?php echo apply_filters('the_content',$post->post_content); ?>
	</div>
</section>
<?php get_footer(); ?>