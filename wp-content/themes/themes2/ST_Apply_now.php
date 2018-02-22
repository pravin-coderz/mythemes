<?php
/*****************
Template Name: Apply now
******************/
get_header('sub');
$bannerImage =  get_option('banner_image');
$defaultImage = get_option('default_image');
if($featuredImage!='') {
   $image = $bannerImage;
} else {
  $image = $defaultImage;
}

?>
<div class="banner inner-banner"  style="background-image: url('<?php echo $image; ?>');">
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
	<div class="col-10 center-block subpage-wrap generic">
	 <div class="container generic-wraper-bg offer-section">
		 	<div class="row">
                <div class="col-8">
                    <p><?php echo $post->post_excerpt; ?></p>
                </div>               
            </div>
            <div class="form-blk">
			<form name="applyonline_frm" id="applyonline_frm" method="post" action="" enctype="multipart/form-data">
            <?php wp_nonce_field('applyonline_nonce','applyonline_form'); ?>
				<div class="form-row">
					<label class="floating-item" data-error="Please enter your name">
						<input type="text" class="floating-item-input input-item" name="applicantname" onkeypress="return onlyAlphabets(event, this)" id="applicantname" value="" />
						<span class="floating-item-label">Name</span>
					</label>
					<div class="error-message" id="err_firstname"></div>											
				</div>
				<input type="hidden" name="career_id" id="career_id" value="<?php echo $_REQUEST['job_id'];?>" />
				<div class="form-row">
					<label class="floating-item" data-error="Please enter your email address">
						<input type="email" class="floating-item-input input-item validate-email" name="applicantemail" id="applicantemail" value="" />
						<span class="floating-item-label">Email Address</span>
					</label>
					<div class="error-message" id="err_login_email"></div>
				</div>
				<div class="form-row">
					<label class="floating-item" data-error="Please enter your telephone number">
						<input type="text" class="floating-item-input input-item validate-mobile" name="applicanttelephone" onkeypress="return isNumber(event)" id="applicanttelephone" value="" />
						<span class="floating-item-label">Telephone</span>
					</label>
					<div class="error-message" id="err_telephone"></div>											
				</div>
				<div class="form-row">
					<label class="floating-item" data-error="Please enter your message">
						<textarea type="text" class="floating-item-input input-item" maxlength="2000" rows="5" name="applicantmessage" id="applicantmessage" value="" ></textarea>
						<span class="floating-item-label">message</span>
					</label>
					<div class="error-message" id="err_message"></div>										
				</div>
				<div class="form-row file-browse">
					<label class="floating-item upload-input" data-error="Please upload your resume">
						<input type="text" class="floating-item-input input-item" name="resume" value="" id="file-upload-value" placeholder="Upload File"/>
						<button class="button upload-button">Upload</button> <input type="file" class="file-upload" name="filename" id="filename" onchange="validateFileType()">
					</label>
					<div class="error-message" id="err_resume"></div>										
				</div>
				<button class="button button-primary" name="applyonline_submit" id="applyonline_submit">submit</button>
				<div id ="dispnone" class="dispnone" style="display: none;">
                    <input type="text" name="applyonlineform" id="applyonlineform" value="">
                </div>
			</form>
		</div>
		</div>
	</div>
</section>
 <script type="text/javascript">
        function validateFileType(){
            var fileName = document.getElementById("filename").value;
            var idxDot = fileName.lastIndexOf(".") + 1;
            var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
            if (extFile=="doc" || extFile=="docx" || extFile=="pdf" || extFile=="DOC" || extFile=="DOCX" || extFile=="PDF"){
                $('#file-upload-value').parents(".form-row").find(".error-message").remove();
                $('#file-upload-value').parents('.form-row').removeClass('error-row');
            }else{
                if ($('#file-upload-value').parents('.form-row').find('.error-message').length==0) {
                $('<div class="error-message">Please Upload doc or pdf files</div>').appendTo($('#file-upload-value').parents(".form-row")).slideDown();
                } else {
                    $('#file-upload-value').parents(".form-row").find(".error-message").text('Please Upload doc or pdf files').slideDown();
                }
                //if ($('#file-upload-value').parents('.form-row').find('.error-message').length==0) {
                //}
                //$('#err_resume_filetype').show();
            }   
        }
    </script>
<?php get_footer(); ?>