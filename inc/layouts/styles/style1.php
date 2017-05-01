<?php
	
	
				
	$html.='<div class="tmls_item" style="border-color:'.$border_color.';">';
	
    if($usedimages == 'avatars' || $usedimages == 'avatars_and_logos') {
        $html.='<div class="tmls_image '.$image_radius.'" style="'.$bg_img.'"></div>';
    }
    
    if($usedimages == 'logos' || $usedimages == 'avatars_and_logos') {
        
        $html.='<div class="tmls_image tmls_logo_image" style="">';
        
        if($company_website != '') {
            $html.='<a href="'.$company_website.'"><img src="'.$logo_img.'" alt="" /></a>';
        }
        else {
            $html.='<img src="'.$logo_img.'" alt="" />';
        }
        
        $html.='</div>';
        
    }
				
	
					
	$html.='<div class="tmls_text" style="'.$text_font_family.' '.$text_font_color.' font-size:'.$text_font_size.';">'.$testimonial_text.'</div>
					
            <div class="tmls_name" style="'.$name_font_family.' '.$name_font_color.' font-size:'.$neme_font_size.'; font-weight:'.$neme_font_weight.';">'.get_post_meta($post[$i]->ID, 'name', true).'</div>
            <div class="tmls_position" style="'.$position_font_family.' '.$position_font_color.' font-size:'.$position_font_size.';">'.$position.$company.'</div>';
					
            include('rating.php');
				
	$html.='</div>';
?>