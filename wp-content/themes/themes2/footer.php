<?php  
$currentYear = date("Y");
$designYear = 2018;
$year = ($currentYear > $designYear) ? $designYear." - ".date("y") : $currentYear;
?>
<!-- Footer section starts here -->
<footer>
    <div class="container">
		<div class="row footer-columns equalHeight">
			
			<?php
			$footerLinks = get_menu('footermenu');
			if(!empty($footerLinks)) { ?>
				<div class="col-3 footer-nav-blk accordion-blk">
					<h6>Navigation</h6>
					<ul class="footer-nav accordion-content">
			           	<?php
						if(is_array($footerLinks) || is_object($footerLinks)){
							foreach ($footerLinks as $footerLink) { ?>
								<li  <?php if (get_permalink($post->ID)==$footerLink->url) { echo ' class="active" '; }?>><a href="<?php echo $footerLink->url; ?>" ><?php echo $footerLink->title; ?></a></li>
						<?php } }  ?>
					</ul>
				</div>
			<?php }?>
							<form class="form-element form-row">
								<input type="text" class="form" id="subscribe-email" placeholder="Enter your email"/>
								<div class="newlettersub-btn subBtn" id="subscribe-button">
								  <a href="javascript:void(0);">subscribe</a>
								</div>
								<div class="error-message" id="err_sub_email"></div>
								<div class="error-message msg_sub">Thanks for subscribing successfully!!</div>
								<div class="error-message err-msg">Your email address is already subscribed.</div>
							</form>
			<?php 
			$facebook = get_option('facebook');
			$linkedIn = get_option('linked_in');
			$twitter = get_option('twitter');
			$contDesc = get_option('contact_description');
		    ?>
			<div class="col-3 social-icon accordion-blk">
				<div class="social-icon-inner">
					<h6>WE'RE SOCIAL!</h6>
					<ul class="clearfix accordion-content">
					    <?php if($facebook!='') { ?>
					    <li>
							<a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a>
						</li>
						<?php } ?>
						<?php if($twitter!='') { ?>
							<li>
							  <a href="<?php echo $twitter; ?>" target="_blank"s><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a>
							</li>
						<?php } ?>
						<?php if($linkedIn!='') { ?>
							<li>
							  <a href="<?php echo $linkedIn; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i><span>Linkedin</span></a>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-3 subscribe accordion-blk">
				<?php echo $contDesc; ?>
				<div class="accordion-content">
					<a href="<?php echo get_bloginfo('url'); ?>/contact-us" class="button button-footer">Contact us</a>
				</div>
			</div>	
			<div class="col-3 copy-right order-1">
				<img src="<?php echo get_bloginfo('template_url'); ?>/img/logo.png" alt="" />
			    <p>&copy; <?php echo $year; ?> Verimuchme Ltd. All rights reserved</p>
			</div>		
		</div>
	</div>
</footer>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<script type="text/javascript">
//nprogress init
NProgress.configure({ showSpinner: false }).start();
</script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/wow.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/app.js"></script>
<script src="<?php echo get_bloginfo('template_url'); ?>/js/custom.js"></script>
</div>
</body>
</html>
