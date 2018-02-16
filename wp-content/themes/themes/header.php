<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>common</title>
	<link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/img/ faviicon.png" type="image/x-icon" />
	<script src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-2.8.3.js"></script>
	<style type="text/css">
        body{
            background-color: #fff;
        }  
        .render-blk{ opacity:0; min-height: calc(100vh - 235px)};
    </style>
    <link href="<?php echo TMPL_URL; ?>/css/app.css" rel="stylesheet">
    <link href="<?php echo TMPL_URL; ?>/css/style.css" rel="stylesheet">

	<noscript>
		<style type="text/css" media="screen">
			.render-blk{ opacity: 1; }	
			.intro-hero-banner{
				-webkit-transition-property:inherit;
			    -moz-transition-property: inherit;
			    -o-transition-property: inherit;
			    transition-property: inherit;
			    -webkit-transition-duration: inherit;
			    -moz-transition-duration: inherit;
			    -o-transition-duration: inherit;
			    transition-duration: inherit;
			    -webkit-transition-delay: inherit;
			    -moz-transition-delay: inherit;
			    -o-transition-delay: inherit;
			    transition-delay: inherit;
			    -webkit-transition-timing-function: inherit;
			    -moz-transition-timing-function: inherit;
			    -o-transition-timing-function: inherit;
			    transition-timing-function: inherit;
			}
			.intro-hero-banner-content{ display: block; }
		</style>
	</noscript>
</head>
<body> 
	<div class="render-blk">
		<header>
			<div class="container clearfix">
				<div class="menu-blk">
					<a href="<?php echo get_bloginfo('url'); ?>" class="mobile-logo">
						<img src="<?php echo TMPL_URL; ?>/img/mobilelogo.png" alt="images" />
					</a>
					<div class="menu-toggle">
						<div class="one"></div>
						<div class="two"></div>
						<div class="three"></div>
					</div>
					<nav>
						<ul>
						<?php 
                    	   $cntMenu = countMenu('mainmenu');
                    		$headerLinks = get_menu('mainmenu'); 
                    		$count = 0;
                		    $divider = ceil($cntMenu/2);  // ceil-> Round fraction Up //
                    		if (is_array($headerLinks) && count($headerLinks)>0) {
                        		foreach ($headerLinks as $key => $headerLink) {
	                    			if ($divider == $count) { ?> 
									<li>
									<a class="logo" href="<?php echo get_bloginfo('url'); ?>">
											<img src="<?php echo TMPL_URL; ?>/img/logo.png" alt="Logo"/>
											</a>
									</li>
									<?php } ?>
									<li><a href="<?php echo $headerLink->url; ?>"><?php echo $headerLink->title; ?></a></li>
									<?php   
									$count++;                                               
                       				} 
								} ?>
						</ul>
					
					</nav>
				</div>	
		    </div>
		</header>