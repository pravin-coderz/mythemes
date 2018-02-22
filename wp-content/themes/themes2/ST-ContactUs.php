<?php
/**********
Template Name: Contact us-template
**********/

get_header('sub');

global $wpdb;
global $_POST;
?>
<?php
if ($_POST['contact_us_form'] != "" && $_POST['contactform'] == "") {
$table = $wpdb->prefix . "contact";
    $data['firstname']        = sanitize_text_field($_POST['firstname']);
    $data['email']            = sanitize_text_field($_POST['email']);
   /* $data['organization']     = sanitize_text_field($_POST['organization']);*/
    $data['telephone']        = sanitize_text_field($_POST['telephone']);
    $data['message']          = nl2br($_POST['message']);
    $data['address']        = nl2br($_POST['address']);
    $data['posted_date']      = date('Y-m-d H:i:s');
    $data['firstname'] = ucwords($data['firstname']);
    $format = array('%s','%s','%s','%s','%s','%s','%s');
    $err = 0;
        if (empty($data['firstname'])) {
            $error['firstname'] = "Please enter your name";
            $err++;
        }
        if (empty($data['telephone'])) {
            $error['telephone'] = "Please enter your phone number";
            $err++;
        }
       /* if (empty($data['organization'])) {
            $error['organization'] = "Please enter your organization name";
            $err++;
        }*/
        if (empty($data['email'])) {
            $error['email'] = "Please enter your email";
            $err++;
        }
        if (empty($data['message'])) {
            $error['message'] = "Please enter your message";
            $err++;
        }
        if (empty($data['address'])) {
            $error['address'] = "Please enter your address";
            $err++;
        }
        if (empty($err)) {
            $insert_contact = $wpdb->insert($table, $data, $format);
            $lastid = $wpdb->insert_id;
            if($lastid != "") {  
                $reurl = get_bloginfo('url') . "/contact-us/thank-you/";
                echo '<script type="text/javascript">document.location="'.$reurl.'";</script>'; ?>
                <?php $message = '
                <html>
                    <body>
                        <div style="max-width:500px">
                            <p>Dear Admin,<br /><br />

                            The following message was submitted through the website today.<br /><br />

                           ---- Message ----<br /><br />

                                Name - '. $data['firstname'] .'<br />
                                Email - ' . $data['email'] . ' <br />
                                Phone - ' . $data['telephone'] . '<br />
                                Address -' .$data['address'] . '<br />
                                Message - '. $data['message'] . '<br />
                            </p>
                        </div>
                    </body>
                </html>'
            ?>
            <?php $senderMessage = '
                <html>
                    <body>
                        <div style="max-width:500px">
                            <p>Dear '. $data['firstname'] .',<br /><br />

                               Thank you for writing to us. We will get back to you at the earliest.<br /><br />

                               Regards,<br /><br />

                               Team VMM<br /><br />

                               ---- Your message ----<br /><br />

                               Name - '. $data['firstname'] .' <br />
                               Email - ' . $data['email'] . ' <br />
                               Phone - ' . $data['telephone'] . ' <br />
                               Address -' .$data['address'] . '<br />
                               Your Message - ' . $data['message'] . ' <br />
                            </p>
                        </div>
                    </body>
                </html>';
                $from = "VMM <no-reply@vmm.in>";
                $subject = "Message from the VMM website";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
                $headers .= "From: " .  $from."\r\n";
                $to = get_option('contact_us_email');
                if (wp_mail($to, $subject, $message, $headers)) {
                    $to = $data['email'];
                    $subjectSender ="VMM - Your message has been received.";
                    if (wp_mail($to, $subjectSender, $senderMessage, $headers)) {
                        unset($_POST);
                        $redirect_url = get_bloginfo('url') . "/contact-us/thank-you/";
                        header('Location: '.$redirect_url);

                        exit;
                    }
                }
            }
        }
}
$featImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
$defaultImage = get_option('default_image');
if($featImage!='') {
   $image = $featImage;
} else {
  $image = $defaultImage;
}
?>
<!-- Hero Banner Starts here -->
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
<!-- Hero Banner End here -->
<section class="generic-wraper">
    <div class="container generic-wraper-bg offer-section">
        <div class="col-10 center-block subpage-wrap generic">
            <div class="row">
                <div class="col-8">
                    <?php echo apply_filters('the_content',$post->post_content  ); ?>
                </div>               
            </div>
            <div class="row">                  
                <div class="col-8">
                    <div class="form-blk">
                        <form name="contact_us_frm" id="contact_us_frm" method="post" action="">
                            <?php wp_nonce_field('conactus_nonce','contact_us_form'); ?>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your name">  
                                    <input type="text" class="floating-item-input input-item" name="firstname" maxlength="75" onkeypress="return onlyAlphabets(event, this)" id="firstname" value="" />
                                    <span class="floating-item-label">Name</span>
                                </label>
                                <div class="error-message" id="err_firstname"> <?php echo $error['firstname'];?> </div>                                           
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your email address">
                                    <input type="text" class="floating-item-input input-item validate-email" maxlength="100" name="email" id="email" value="" />
                                    <span class="floating-item-label">Email Address</span>
                                </label> 
                                <div class="error-message" id="err_login_email"><?php echo $error['email'];?></div>
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your phone number">
                                    <input type="text" class="floating-item-input input-item validate-mobile" name="telephone" maxlength="12" onkeypress="return isNumber(event)" id="telephone" value="" />
                                    <span class="floating-item-label">Phone Number</span>
                                </label>
                                <div class="error-message" id="err_telephone"><?php echo $error['telephone'];?></div>                                                
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your address">
                                    <textarea class="floating-item-input input-item" maxlength="2000" rows="5" name="address" id="address"></textarea> 
                                    <span class="floating-item-label">Address</span>
                                </label> 
                                <div class="error-message" id="err_address"><?php echo $error['address'];?></div>                                            
                            </div>
                            <div class="form-row">
                                <label class="floating-item" data-error="Please enter your message">
                                    <textarea class="floating-item-input input-item" maxlength="2000" rows="5" name="message" id="message"></textarea> 
                                    <span class="floating-item-label">Message</span>
                                </label> 
                                <div class="error-message" id="err_message"><?php echo $error['message'];?></div>                                            
                            </div>
                            <button class="button button-primary has-ripple" name="contact_submit" id="contact_submit">Submit</button>
                            <div id ="dispnone" class="dispnone" style="display: none;">
                                <input type="text" name="contactform" id="contactform" value="">
                            </div>
                        </form>
                    </div>
                </div>
                <?php 
                $contPhone = get_option('contact_phone');
                $contEmail = get_option('contact_email');
                $contAddress = get_option('contact_address');?>
             
                <div class="col-4 right-nav">
                    <div class="right-nav-border">
                        <?php if($contPhone!=''){ ?>
                        <h6>Phone</h6>
                        <p><?php echo $contPhone; ?></p>
                        <?php } ?>
                        <?php if($contEmail!=''){?>
                        <h6>Email</h6>
                        <p><a href="mailto:<?php echo $contEmail; ?>" title="<?php echo $contEmail; ?>"><?php echo $contEmail; ?></a></p>
                        <?php } ?>
                        <?php if($contAddress!=''){?>
                        <h6>Address</h6>
                        <p><?php echo $contAddress; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
       </div>
    </div>
</section>
<?php get_footer(); ?>
