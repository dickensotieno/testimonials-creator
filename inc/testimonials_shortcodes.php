<?php
	
	/*========================================================================================================================================================================
		Shortcode
	========================================================================================================================================================================*/

	function tmls_shortcode($atts, $content=null) {  
		extract(shortcode_atts( array(  
			'id' => '',
			'category' => '-1',
			'layout' => 'tmls_slider',
			'style' => 'style1',
			'dialog_radius' => 'small_radius',
            'usedimages' => 'avatars',
			'image_size' => 'large_image',
			'image_radius' => 'large_radius',
			'dialogbgcolor' => '#f5f5f5',
			'dialogbordercolor' => '#DDDDDD',
			'text_font_family' => '',
			'text_font_color' => '',
			'text_font_size' => '14',
            'excerpttextlength' => '',
			'name_font_family' => '',
			'name_font_color' => '',
			'neme_font_size' => '15',
			'neme_font_weight' => 'bold',
			'position_font_family' => '',
			'position_font_color' => '',
			'position_font_size' => '12',
			'order_by' => 'date',
			'order' => 'DESC',
			'number' => '-1',
			'auto_play' => 'true',
			'transitioneffect' => 'crossfade',
			'pause_on_hover' => 'false',
			'next_prev_visibility' => 'tmls_visible',
			'next_prev_radius' => 'small_radius',
			'next_prev_position' => '',
			'next_prev_bgcolor' => '#F5F5F5',
			'next_prev_arrowscolor' => 'tmls_lightgrayarrows',
			'scroll_duration' => '500',
			'pause_duration' => '9000',
			'border_style' => 'tmls_border tmls_dashed_border',
			'border_color' => '#DDDDDD',
			'columns_number' => '2',
			'ratingstars' => 'enabled',
			'ratingstarssize' => '16px',
			'ratingstarscolor' => '#F47E00',
			'grayscale' => 'disabled',
			'slider2_unselectedoverlaybgcolor' => '#FFFFFF',
            'slider2_imagesposition' => 'after',
			'pagination' => 'disabled',
			'pagination_border_style' => 'solid',
			'pagination_border_color' => '#DDDDDD',
			'pagination_bg_color' => 'transparent',
			'pagination_font_color' => '#777777',
			'pagination_font_size' => '14px',
			'pagination_font_family' => '',
			'pagination_current_font_color' => '#F47E00',
			'pagination_current_bg_color' => 'transparent',
			'pagination_current_border_color' => '#DDDDDD',
			'pagination_align' => 'center',
			'pagination_divider_style' => 'solid',
			'pagination_divider_color' => '#DDDDDD',
            'morelinktext' => '',
            'morelinktextcolor' => '#F47E00',
			'wpml_current_lang' =>''
		), $atts));
		
		$tmls_suppress_filters = false;
		
		// 	query posts
		
		
		if(function_exists('icl_object_id') && $wpml_current_lang != '') {
			global $sitepress;
			if(isset($sitepress)) {
				$sitepress->switch_lang($wpml_current_lang);
			}
		}
		
		if($category != '-1') {
			$tmls_suppress_filters = true;
		}
		
		$args =	array ( 'post_type' => 'tmls',
						'post_status' => 'publish',
						'posts_per_page' => $number, 
						'orderby' => $order_by,
						'order' => $order,
						'suppress_filters' => $tmls_suppress_filters	);
		
		if($category > -1) {
			$args['tax_query'] = array(array('taxonomy' => 'tmlscategory','field' => 'term_id','terms' => intval($category) ));
		}
		
		if(($layout=='tmls_list' || $layout=='tmls_grid') && $pagination=='enabled') {
			
			$tmls_current_page = isset($_GET['tmls_page']) ? tmls_test_query_var($_GET['tmls_page']) : 1;
			$args['paged'] = $tmls_current_page;
		}
		
		$testimonials_query = new WP_Query( $args );
		
		$html='';

		if ($testimonials_query->have_posts()) {
			
			if($text_font_family!=''){
				$text_font_family='font-family:'.$text_font_family.';';
			}
			
			if($name_font_family!=''){
				$name_font_family='font-family:'.$name_font_family.';';
			}
			
			if($position_font_family!=''){
				$position_font_family='font-family:'.$position_font_family.';';
			}
			
			if($text_font_color!=''){
				$text_font_color='color:'.$text_font_color.';';
			}
            
            if($morelinktextcolor!='') {
                $morelinktextcolor='color:'.$morelinktextcolor.';';
            }
			
			if($name_font_color!=''){
				$name_font_color='color:'.$name_font_color.';';
			}
			
			if($position_font_color!=''){
				$position_font_color='color:'.$position_font_color.';';
			}
			
			$grayscale_class='';
			
			if($grayscale=='enabled'){
				$grayscale_class='tmls_grayscale';
			}
            
            $usedimages_class = '';
            
            if($usedimages == 'avatars_and_logos') {
                $usedimages_class = 'tmls_use_avatars_and_logos';
            }
			
			if($layout=='tmls_slider2') {
                
                if($slider2_imagesposition=='befor') {
                    $html='<div class="tmls_images_pagination tmls_images_pagination_befor '.$image_size.' '.$grayscale_class.' '.$usedimages_class.'"><div class="tmls_paginationContainer"></div></div>';
                }
                
				$html.='<div id="'.$id.'" class="tmls tmls_notready style1" >';
			}
			else {
			
				if($layout=='tmls_grid') {
					$html='<div id="'.$id.'" class="tmls tmls_overflow_hidden '.$usedimages_class.' ';
				}
				if($layout=='tmls_slider') {
					$html='<div id="'.$id.'" class="tmls tmls_notready '.$usedimages_class.' ';
				}
				else {
					$html='<div id="'.$id.'" class="tmls '.$usedimages_class.' ';
				}
				
				if($style == 'style3') {
					$html.='tmls_style3_notready ';
				}
				
				$html.=$style.' '.$image_size.' '.$grayscale_class.'" >';
			}
            
            if($excerpttextlength != '') {
                $pause_on_hover = 'true';
            }
			
			if($layout=='tmls_slider') {
				
				$tmls_next_prev_style='';
				
				if($next_prev_bgcolor!='') {
					$tmls_next_prev_style='background-color:'.$next_prev_bgcolor.';';
				}
				
				$html.='<div class="tmls_next_prev '.$next_prev_visibility.' '.$next_prev_position.'">
							<a href="#" style="'.$tmls_next_prev_style.'" class="tmls_prev '.$next_prev_radius.' '.$next_prev_arrowscolor.'"></a>
							<a href="#" style="'.$tmls_next_prev_style.'" class="tmls_next '.$next_prev_radius.' '.$next_prev_arrowscolor.'"></a>
						</div>
						
						<div class="tmls_container '.$layout.'" data-autoplay="'.$auto_play.'" data-pauseonhover="'.$pause_on_hover.'" data-scrollduration="'.$scroll_duration.'" data-pauseduration="'.$pause_duration.'" data-transitioneffect="'.$transitioneffect.'">';
			}
			elseif($layout=='tmls_slider2') {
				$html.='<div class="tmls_container '.$layout.'" data-autoplay="'.$auto_play.'" data-pauseonhover="'.$pause_on_hover.'" data-scrollduration="'.$scroll_duration.'" data-pauseduration="'.$pause_duration.'" data-transitioneffect="'.$transitioneffect.'" data-slider2unselectedoverlaybgcolor="'.$slider2_unselectedoverlaybgcolor.'" data-imagesposition="'.$slider2_imagesposition.'" data-usedimages="'.$usedimages.'">';
			}
			else {
						
				$html.='<div class="tmls_container '.$layout.' '.$border_style.'" >';
			
			}	
			
			$i = 0;
			$current_column=0;
			
			while ($i < $testimonials_query->post_count) {
			
				$post = $testimonials_query->posts;
				
				$thumbnailsrc='';
				$bg_img='';
                $logo_img='';
				$company='';
				$company_website ='';
				$position='';
                $testimonial_text ='';
				
	
				// if has post thumbnail		
				if ( has_post_thumbnail($post[$i]->ID)) {
					$thumbnailsrc = wp_get_attachment_url(get_post_meta($post[$i]->ID, '_thumbnail_id', true));	
					$bg_img='background-image:url('.$thumbnailsrc.');';
				}
                
                // if has logo image	
				if (get_post_meta($post[$i]->ID, 'logo', true)!='') {
					$logo_img = get_post_meta($post[$i]->ID, 'logo', true);
				}
                else {
                    $logo_img = plugins_url('../images/logo_icon.png', __FILE__);
                }
				
				if(get_post_meta($post[$i]->ID, 'company', true)!='') {
					
					if(get_post_meta($post[$i]->ID, 'company_website', true)!='') {
					
						$company_website = get_post_meta($post[$i]->ID, 'company_website', true);
						
						if (strpos($company_website, 'http://') === false && strpos($company_website, 'https://') === false && strpos($company_website, 'mailto:') === false) {
							$company_website='http://'.get_post_meta($post[$i]->ID, 'company_website', true);
						}
						
						$company='<a style="'.$position_font_color.'" href="'.$company_website.'" target="'.get_post_meta($post[$i]->ID, 'company_link_target', true).'">'.get_post_meta($post[$i]->ID, 'company', true).'</a>';
					
					}
					else {
						$company=get_post_meta($post[$i]->ID, 'company', true);
					}
					
				}
				
				if(get_post_meta($post[$i]->ID, 'position', true)!='') {
					
					if(get_post_meta($post[$i]->ID, 'company', true)!='') {
						$position=get_post_meta($post[$i]->ID, 'position', true).' / ';
					}
					else {
						$position=get_post_meta($post[$i]->ID, 'position', true);
					}
					
				}
                
                
                if($excerpttextlength != '') {
					$testimonial_text = '<div class="tmls_excerpttext"><p>'.wp_trim_words(get_post_meta($post[$i]->ID, 'testimonial_text', true), $excerpttextlength, '... <span class="tmls_morelink" style="'.$morelinktextcolor.'">'.$morelinktext.'</span></p></div><div class="tmls_fulltext">'.apply_filters('the_content', get_post_meta($post[$i]->ID, 'testimonial_text', true)) ).'</div>';
				}
                else {
                    $testimonial_text = apply_filters('the_content', get_post_meta($post[$i]->ID, 'testimonial_text', true));
                }
				
				
				
				if($layout=='tmls_slider') {
					include('layouts/slider.php');
				}
				elseif($layout=='tmls_slider2') {
					include('layouts/slider2.php');
				}
				elseif($layout=='tmls_grid') {
					include('layouts/grid.php');
				}
				else {
					include('layouts/list.php');
				}
				
				$i++;
				
			}
			
			$grid_column_class='';
			
			if($layout=='tmls_grid' && $current_column!=0) {
				
				while($current_column < $columns_number) {
					
					$html.='<div class="tmls_column '.$grid_column_class.'" style="width:'.(100/$columns_number).'%; border-color:'.$border_color.';"></div>';
					
					$grid_column_class='no_left_border';
					
					$current_column+=1;
				}
				
				$html.='</div>';
			}
			
			
			$html.='</div></div>';
			
			if($layout=='tmls_slider2' && $slider2_imagesposition=='after') {
				$html.='<div class="tmls_images_pagination tmls_images_pagination_after '.$image_size.' '.$grayscale_class.'"><div class="tmls_paginationContainer"></div></div>';
			}
			
			
			// Pagination
			
			if(($layout=='tmls_list' || $layout=='tmls_grid') && $pagination=='enabled') {
				
				$tmls_total_pages = $testimonials_query->max_num_pages;
				
				$tmls_pagination_style = '';
				$tmls_paginationItem_style = '';
				$tmls_paginationCurrentItem_style ='';
				
				if($pagination_border_style !='') {
					$tmls_paginationItem_style.= 'border-style:'.$pagination_border_style.';';
					$tmls_paginationCurrentItem_style.= 'border-style:'.$pagination_border_style.';';
				}
				
				if($pagination_border_color !='') {
					$tmls_paginationItem_style.= 'border-color:'.$pagination_border_color.';';
				}
				
				if($pagination_bg_color !='') {
					$tmls_paginationItem_style.= 'background-color:'.$pagination_bg_color.';';
				}
				
				if($pagination_font_color !='') {
					$tmls_paginationItem_style.= 'color:'.$pagination_font_color.';';
				}
				
				if($pagination_font_size !='') {
					$tmls_pagination_style.= 'font-size:'.$pagination_font_size.';';
				}
				
				if($pagination_font_family !='') {
					$tmls_pagination_style.= 'font-family:'.$pagination_font_family.';';
				}
				
				if($pagination_current_font_color !='') {
					$tmls_pagination_style.= 'color:'.$pagination_current_font_color.';';
				}
				
				if($pagination_current_bg_color !='') {
					$tmls_paginationCurrentItem_style.= 'background-color:'.$pagination_current_bg_color.';';
				}
				
				if($pagination_current_border_color !='') {
					$tmls_paginationCurrentItem_style.= 'border-color:'.$pagination_current_border_color.';';
				}
				
				if($pagination_align !='') {
					$tmls_pagination_style.= 'text-align:'.$pagination_align.';';
				}
				
				if($pagination_divider_style !='') {
					$tmls_pagination_style.= 'border-top-style:'.$pagination_divider_style.';';
				}
				
				if($pagination_divider_color !='') {
					$tmls_pagination_style.= 'border-top-color:'.$pagination_divider_color.';';
				}
                    
				$html.= '<div class="tmls_pagination" style="'.$tmls_pagination_style.'">'.paginate_links(array('base' => str_replace('#038;', '', str_replace( 999999999, '%#%', esc_url( add_query_arg('tmls_page', '999999999#'.$id, html_entity_decode(get_permalink()) )) )), 'format' => '?paged=%#%', 'current' => $tmls_current_page, 'total' => $tmls_total_pages, 'before_page_number' => '<span class="tmls_pagination_currentItem" style="'.$tmls_paginationCurrentItem_style.'"></span><span class="tmls_pagination_item" style="'.$tmls_paginationItem_style.'">', 'after_page_number' => '</span>', 'prev_next' => true, 'prev_text' => __('<span class="tmls-fa tmls_pagination_item" style="'.$tmls_paginationItem_style.'"></span>'), 'next_text' => __('<span class="tmls-fa tmls_pagination_item" style="'.$tmls_paginationItem_style.'"></span>') )).'</div>';
				
			}
			
		}
		
		return $html;  
		
			
		  
	}  
	add_shortcode('tmls', 'tmls_shortcode');
	
	
	
	// tmls_saved Shortcode
	
	function tmls_saved_shortcode( $atts ) {
	    
		extract( shortcode_atts( array(
		    'id' => ''
	    ), $atts ) );
		
		$tmls_sc = '';
		
		if($id != ''){
			$tmls_sc = get_post($id);
			
			if(get_post_meta($tmls_sc->ID, 'shortcode', true) != '') {
				return do_shortcode( get_post_meta($tmls_sc->ID, 'shortcode', true) );
			}
		}
		
	}
	
	add_shortcode( 'tmls_saved', 'tmls_saved_shortcode' );

    function tmls_test_query_var($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>