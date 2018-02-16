<!-- footer start -->
<?php 
    $currentYear = date("Y");
    $designYear = 2017;
    $year = ($currentYear > $designYear) ? $designYear." - ".date("y") : $currentYear;
?>
<footer>
<?php 
$facebook_url=get_option('facebook');?>
<?php if ( is_home() || is_front_page()) { ?>
	<?php if ($facebook_url): ?><a href="<?php echo $facebook_url; ?>" target="_blank"><img src="<?php echo TMPL_URL; ?>/img/SMM.png" class="side-image" alt="images"><?php endif;?>
	</a> <?php } ?>
	<div class="container">	
		<?php
		$footerLinks = get_menu('footermenu'); 
		if (is_array($footerLinks) && count($footerLinks)>0) {
		?>
		<div class="fR">
			<ul class="privacy">
				<?php foreach ($footerLinks as $key => $footerLink){ ?>
					<li><a href="<?php echo $footerLink->url; ?>" <?php if (get_permalink($post->ID)==$footerLink->url) {
					 echo ' class="active"'; }?> ><?php echo $footerLink->title; ?></a></li>
				<?php }?>
			</ul>
		</div>	
		<?php } ?>
		<div class="copy">&#169; <?php echo $year; ?> Givazon. All rights reserved.</div>
	</div>
	
</footer>	
<?php wp_footer();  ?>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
 	<script type="text/javascript">
 	//nprogress init
       NProgress.configure({ showSpinner: false }).start();
 	</script>
	<script type="text/javascript">
        var jsArr = ['js/app.js'];
		for(var j = 0; j < jsArr.length; j++) {
		   var script = document.createElement('script')
		   script.setAttribute('type', 'text/javascript')
		   script.setAttribute('src','<?php echo TMPL_URL; ?>/'+ jsArr[j])
		   document.getElementsByTagName('head')[0].appendChild(script)
		}
    </script>
</body>
</html>