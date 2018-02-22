<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Verimuchme</title>
	<!-- <link rel="stylesheet" type="text/css" href="css/app.css"> -->	
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/img/faviicon.png" type="image/x-icon" />
	<!-- Montserrat font included -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel="stylesheet">
	<!-- modernizr included -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
	<style type="text/css">
		body{
			background-color: #fff;
		}  
		.render-blk{ opacity:0; }
	</style>
	<link href="<?php echo get_bloginfo('template_url'); ?>/css/app.css" rel="stylesheet">
	<link href="<?php echo get_bloginfo('template_url'); ?>/style.css" rel="stylesheet">
	<noscript>
		<style type="text/css" media="screen">
			.render-blk{ opacity: 1; }	
		</style>
	</noscript>
	<script type="text/javascript">
        var templateUri = "<?php  echo get_bloginfo('template_url'); ?>";
        var blogUri = "<?php echo get_bloginfo('url'); ?>";
        var base_url = '<?php echo TMPL_URL; ?>';
	</script>
</head>
<body>
<div class="render-blk">
	<header class="inner-header">
		<div class="container clearfix">
			<div class="row">
				<a href="<?php echo get_bloginfo('url'); ?>" class="col-3 logo"><img src="<?php echo get_bloginfo('template_url'); ?>/img/logo-sub.png" alt="" /></a>
				<div class="col-6 text-center menu-open">
					<a href="#" class="menu-close"><i class="fa fa-times" aria-hidden="true"></i></a>
					<nav>
						<ul>
							<?php
							$headerLinks = get_menu('mainmenu');
							if(is_array($headerLinks)||is_object($headerLinks)) {
							foreach ($headerLinks as $headerLink) { ?>
							<li <?php if (get_permalink($post->ID)==$headerLink->url) { echo ' class="active" '; }?> ><a href="<?php echo $headerLink->url; ?>" ><?php echo $headerLink->title; ?></a></li>
						<?php }  } ?>
				        </ul>
					</nav>
				</div>
			</div>
			<div class="menu-toggle sub-toggle">
					<div class="one"></div>
					<div class="two"></div>
					<div class="three"></div>
		    </div>
		</div>
	</header>