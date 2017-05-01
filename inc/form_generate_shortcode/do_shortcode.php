<?php
	if (!headers_sent()) {
		include_once('../../../../../wp-load.php');
	}
	
	$shortcode="[tmls_form ";
	
	if(isset($_POST['form_width'])) {
		$shortcode.='form_width="'.$_POST['form_width'].'" ';
	}
	
	if(isset($_POST['position'])) {
		$shortcode.='position="'.$_POST['position'].'" ';
	}
	
	if(isset($_POST['company'])) {
		$shortcode.='company="'.$_POST['company'].'" ';
	}
	
	if(isset($_POST['rating'])) {
		$shortcode.='rating="'.$_POST['rating'].'" ';
	}
	
	if(isset($_POST['image'])) {
		$shortcode.='image="'.$_POST['image'].'" ';
	}
    
    if(isset($_POST['logo'])) {
		$shortcode.='logo="'.$_POST['logo'].'" ';
	}
	
	if(isset($_POST['notificationemail'])) {
		$shortcode.='notificationemail="'.$_POST['notificationemail'].'" ';
	}
	
	if(isset($_POST['emailto'])) {
		$shortcode.='emailto="'.$_POST['emailto'].'" ';
	}
	
	if(isset($_POST['emailsubject'])) {
		$shortcode.='emailsubject="'.$_POST['emailsubject'].'" ';
	}
	
	if(isset($_POST['emailmessage'])) {
		$shortcode.='emailmessage="'.$_POST['emailmessage'].'" ';
	}
	
	if(isset($_POST['success_message'])) {
		$shortcode.='success_message="'.$_POST['success_message'].'" ';
	}
	
	if(isset($_POST['namerequired_message'])) {
		$shortcode.='namerequired_message="'.$_POST['namerequired_message'].'" ';
	}
	
	if(isset($_POST['emailrequired_message'])) {
		$shortcode.='emailrequired_message="'.$_POST['emailrequired_message'].'" ';
	}
	
	if(isset($_POST['testimonialrequired_message'])) {
		$shortcode.='testimonialrequired_message="'.$_POST['testimonialrequired_message'].'" ';
	}
	
	if(isset($_POST['invalidemail_message'])) {
		$shortcode.='invalidemail_message="'.$_POST['invalidemail_message'].'" ';
	}
	
	if(isset($_POST['invalidcompanywebsite_message'])) {
		$shortcode.='invalidcompanywebsite_message="'.$_POST['invalidcompanywebsite_message'].'" ';
	}
	
	if(isset($_POST['imagefailed_message'])) {
		$shortcode.='imagefailed_message="'.$_POST['imagefailed_message'].'" ';
	}
	
	if(isset($_POST['selectimageagain_message'])) {
		$shortcode.='selectimageagain_message="'.$_POST['selectimageagain_message'].'" ';
	}


    if(isset($_POST['logofailed_message'])) {
		$shortcode.='logofailed_message="'.$_POST['logofailed_message'].'" ';
	}
	
	if(isset($_POST['selectlogoagain_message'])) {
		$shortcode.='selectlogoagain_message="'.$_POST['selectlogoagain_message'].'" ';
	}


	
	if(isset($_POST['captchaanswerrequired_message'])) {
		$shortcode.='captchaanswerrequired_message="'.$_POST['captchaanswerrequired_message'].'" ';
	}
	
	if(isset($_POST['invalidcaptchaanswer_message'])) {
		$shortcode.='invalidcaptchaanswer_message="'.$_POST['invalidcaptchaanswer_message'].'" ';
	}
	
	if(isset($_POST['alreadysent_message'])) {
		$shortcode.='alreadysent_message="'.$_POST['alreadysent_message'].'" ';
	}
	
	if(isset($_POST['label_fontcolor'])) {
		$shortcode.='label_fontcolor="'.$_POST['label_fontcolor'].'" ';
	}
	
	if(isset($_POST['label_fontsize'])) {
		$shortcode.='label_fontsize="'.$_POST['label_fontsize'].'" ';
	}
	
	if(isset($_POST['label_fontweight'])) {
		$shortcode.='label_fontweight="'.$_POST['label_fontweight'].'" ';
	}
	
	if(isset($_POST['label_fontfamily'])) {
		$shortcode.='label_fontfamily="'.$_POST['label_fontfamily'].'" ';
	}
	
	if(isset($_POST['validationmessage_fontcolor'])) {
		$shortcode.='validationmessage_fontcolor="'.$_POST['validationmessage_fontcolor'].'" ';
	}
	
	if(isset($_POST['validationmessage_fontsize'])) {
		$shortcode.='validationmessage_fontsize="'.$_POST['validationmessage_fontsize'].'" ';
	}
	
	if(isset($_POST['validationmessage_fontweight'])) {
		$shortcode.='validationmessage_fontweight="'.$_POST['validationmessage_fontweight'].'" ';
	}
	
	if(isset($_POST['validationmessage_fontfamily'])) {
		$shortcode.='validationmessage_fontfamily="'.$_POST['validationmessage_fontfamily'].'" ';
	}
	
	if(isset($_POST['successmessage_fontcolor'])) {
		$shortcode.='successmessage_fontcolor="'.$_POST['successmessage_fontcolor'].'" ';
	}
	
	if(isset($_POST['successmessage_fontsize'])) {
		$shortcode.='successmessage_fontsize="'.$_POST['successmessage_fontsize'].'" ';
	}
	
	if(isset($_POST['successmessage_fontweight'])) {
		$shortcode.='successmessage_fontweight="'.$_POST['successmessage_fontweight'].'" ';
	}
	
	if(isset($_POST['successmessage_fontfamily'])) {
		$shortcode.='successmessage_fontfamily="'.$_POST['successmessage_fontfamily'].'" ';
	}
	
	if(isset($_POST['inputs_fontcolor'])) {
		$shortcode.='inputs_fontcolor="'.$_POST['inputs_fontcolor'].'" ';
	}
	
	if(isset($_POST['inputs_fontsize'])) {
		$shortcode.='inputs_fontsize="'.$_POST['inputs_fontsize'].'" ';
	}
	
	if(isset($_POST['inputs_fontweight'])) {
		$shortcode.='inputs_fontweight="'.$_POST['inputs_fontweight'].'" ';
	}
	
	if(isset($_POST['inputs_fontfamily'])) {
		$shortcode.='inputs_fontfamily="'.$_POST['inputs_fontfamily'].'" ';
	}
	
	if(isset($_POST['inputs_bordercolor'])) {
		$shortcode.='inputs_bordercolor="'.$_POST['inputs_bordercolor'].'" ';
	}
	
	if(isset($_POST['inputs_bgcolor'])) {
		$shortcode.='inputs_bgcolor="'.$_POST['inputs_bgcolor'].'" ';
	}
	
	if(isset($_POST['inputs_borderradius'])) {
		$shortcode.='inputs_borderradius="'.$_POST['inputs_borderradius'].'" ';
	}
	
	if(isset($_POST['name_label_text'])) {
		$shortcode.='name_label_text="'.$_POST['name_label_text'].'" ';
	}
	
	if(isset($_POST['position_label_text'])) {
		$shortcode.='position_label_text="'.$_POST['position_label_text'].'" ';
	}
	
	if(isset($_POST['companyname_label_text'])) {
		$shortcode.='companyname_label_text="'.$_POST['companyname_label_text'].'" ';
	}
	
	if(isset($_POST['companywebsite_label_text'])) {
		$shortcode.='companywebsite_label_text="'.$_POST['companywebsite_label_text'].'" ';
	}
	
	if(isset($_POST['email_label_text'])) {
		$shortcode.='email_label_text="'.$_POST['email_label_text'].'" ';
	}
	
	if(isset($_POST['rating_label_text'])) {
		$shortcode.='rating_label_text="'.$_POST['rating_label_text'].'" ';
	}
	
	
	if(isset($_POST['testimonial_label_text'])) {
		$shortcode.='testimonial_label_text="'.$_POST['testimonial_label_text'].'" ';
	}
	
	if(isset($_POST['image_label_text'])) {
		$shortcode.='image_label_text="'.$_POST['image_label_text'].'" ';
	}

    if(isset($_POST['logo_label_text'])) {
		$shortcode.='logo_label_text="'.$_POST['logo_label_text'].'" ';
	}
	
	if(isset($_POST['captcha_label_text'])) {
		$shortcode.='captcha_label_text="'.$_POST['captcha_label_text'].'" ';
	}
	
	if(isset($_POST['button_text'])) {
		$shortcode.='button_text="'.$_POST['button_text'].'" ';
	}
	
	if(isset($_POST['button_fontcolor'])) {
		$shortcode.='button_fontcolor="'.$_POST['button_fontcolor'].'" ';
	}
	
	if(isset($_POST['button_fontsize'])) {
		$shortcode.='button_fontsize="'.$_POST['button_fontsize'].'" ';
	}
	
	if(isset($_POST['button_fontweight'])) {
		$shortcode.='button_fontweight="'.$_POST['button_fontweight'].'" ';
	}
	
	if(isset($_POST['button_fontfamily'])) {
		$shortcode.='button_fontfamily="'.$_POST['button_fontfamily'].'" ';
	}
	
	if(isset($_POST['button_bordercolor'])) {
		$shortcode.='button_bordercolor="'.$_POST['button_bordercolor'].'" ';
	}
	
	if(isset($_POST['button_bgcolor'])) {
		$shortcode.='button_bgcolor="'.$_POST['button_bgcolor'].'" ';
	}
	
	if(isset($_POST['button_borderradius'])) {
		$shortcode.='button_borderradius="'.$_POST['button_borderradius'].'" ';
	}
	
	if(isset($_POST['button_hover_fontcolor'])) {
		$shortcode.='button_hover_fontcolor="'.$_POST['button_hover_fontcolor'].'" ';
	}
	
	if(isset($_POST['button_hover_bordercolor'])) {
		$shortcode.='button_hover_bordercolor="'.$_POST['button_hover_bordercolor'].'" ';
	}
	
	if(isset($_POST['button_hover_bgcolor'])) {
		$shortcode.='button_hover_bgcolor="'.$_POST['button_hover_bgcolor'].'" ';
	}
	
	
	$shortcode.='is_generate_shortcode_page_form="true" ';
	
	
	$shortcode.="]";
	
	echo do_shortcode( $shortcode );
?>