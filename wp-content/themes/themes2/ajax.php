<?php
$load_url = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
include $load_url[0] . 'wp-load.php';
$table = $wpdb->prefix . "career";
$careerId = $_POST['career_id'];
$careerDetails = get_post($careerId);


	$data['name']        = sanitize_text_field($_POST['applicantname']);
	$data['email']       = sanitize_text_field($_POST['applicantemail']);
	$data['telephone']       = sanitize_text_field($_POST['applicanttelephone']);
	$data['message']     = nl2br($_POST['applicantmessage']);
	$data['applied_job_name']     = nl2br($careerDetails->post_title);
	$data['posted_date']      = date('Y-m-d H:i:s');
	$format = array('%s','%s','%s','%s','%s','%s','%s');
	var_dump($_FILES['filename']['name']);
	if (isset($_POST['applicantname'])){
		if($_FILES['filename']['name'] !=""){
			$filename = $_FILES['filename']['name'];
			$filenamearr = explode('.', $filename);      
			$extensionarr = array('pdf','PDF','doc','DOC','docx','DOCX');
			if($_FILES['filename']['size'] <= 5242880 ) {
				if (in_array($filenamearr[count($filenamearr) - 1], $extensionarr)) {
					$destination_path = WP_CONTENT_DIR . "/uploads/resumes/";
					if (!file_exists($destination_path)) {
						mkdir($destination_path, 0777);
					}
					$target_path='';   
					$target_path = $destination_path . $filename;  
					$resume = $filename;
					if (move_uploaded_file($_FILES['filename']['tmp_name'], $target_path)) {
						$attachments = array(WP_CONTENT_DIR . '/uploads/resumes/' . $filename);
							$upload_dir = wp_upload_dir(); 
							$resumeurl=$upload_dir['baseurl']."/resumes/".$filename;
							$data['filename'] = $resumeurl;
							$insert_contact = $wpdb->insert($table, $data, $format);
							var_dump($wpdb);
							$lastid = $wpdb->insert_id;
							if($lastid){
						    	$message = '
		   <html>
				<body>
					<div style="max-width:500px">
						<p>Dear,<br /><br />

						The following job application  was submitted through the website today.<br /><br />

							Name    : '. $data['name'] .'<br />
							Email   : ' . $data['email'] . ' <br />
							Phone   : ' . $data['telephone'] . '<br />
							Message : '. $data['message'] . '<br />
						</p>
					</div>
				</body>
			</html>';?>
		<?php $senderMessage = '
			<html>
				<body>
					<div style="max-width:500px">
						<p>Dear '. $data['name'] .',<br /><br />
							
						   Thank you for sending in your job application. We have forwarded 
						   it to our Human Resources department and they will be in touch 
						   after reviewing your application.<br /><br />

						   Thank you and warm regards,<br /><br />

						   Team Verimuchme.<br /><br />
						</p>
					</div>
				</body>
			</html>';
								  $from = "Verimuchme <no-reply@verimuchme.in>";
								  $subject = "Job application from the Verimuchme website";
								  $headers = "MIME-Version: 1.0" . "\r\n";
								  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								  $headers .= "From: " .  $from."\r\n";
								  $to = get_option('contact_us_email');
								  if (wp_mail($to, $subject, $message, $headers,$attachments[0])) {
								  $to = $data['email'];
								  $subjectSender ="Verimuchme - Your job application has been received.";
									  if (wp_mail($to, $subjectSender, $senderMessage, $headers)) {
										echo 1;
										unset($_POST);
										unset($_FILES);
										exit;
									  }
								  }
						   } 
		  }else{
			echo "Not uploaded because of error #".$_FILES["filename"]["error"];
			$error="Failed to upload, Please try again later.";
			die;
		  }
		}else{
			$error="Please upload PDF or DOC files.";
		}
	  }else{
			$error="Resume size must be less than 5MB.";
	  }
	}
}