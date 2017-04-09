(function($){
$(document).ready(function(){
	
	var tmls_forms = $('.tmls_form.tmls_notready');
	var tmls_sliders = $('.tmls.tmls_notready .tmls_slider, .tmls.tmls_notready .tmls_slider2');
	var tmls_style3 = $('.style3.tmls_style3_notready');
    
	
	if ( self != top ) {
		$.tmls_findNotReadyInserted();
	}
	else {
		
		// Submission Form
	
		if (tmls_forms.length > 0 )
		{
			tmls_forms.each(function(){
				$(this).removeClass('tmls_notready');
				$.tmls_runFormsScripts($(this));
			});
		}
		
		
		// Sliders
	
		if (tmls_sliders.length  > 0 )
		{
			tmls_sliders.each(function(){
				$(this).parent().removeClass('tmls_notready');
				$.tmls_runSlidersScripts($(this));
			});
		}
		
		// Style3
	
		if (tmls_style3.length  > 0 )
		{
			tmls_style3.each(function(){
				$(this).removeClass('tmls_style3_notready');
				$.tmls_runStyle3Scripts($(this));
			});
		}
		
		
		
		
	}
    
    $.tmls_runReadMoreScripts();
    $.tmls_runLogosImagesScripts();
		
});

$.tmls_runLogosImagesScripts = function() {
    
    var tmls_avatarsAndLogos_items = $('.tmls.tmls_use_avatars_and_logos .tmls_item');
    
    tmls_avatarsAndLogos_items.mouseenter(function(){
        $(this).find('.tmls_image').stop().fadeIn('slow');
        $(this).find('.tmls_image.tmls_logo_image').stop().hide(0);
    });
    
    tmls_avatarsAndLogos_items.mouseleave(function(){
        $(this).find('.tmls_image').stop().hide(0);
        $(this).find('.tmls_image.tmls_logo_image').stop().fadeIn('slow');
    });
    
}

$.tmls_runReadMoreScripts = function() {
    
    var tmls_morelinks = $('.tmls_morelink');
    var tmls_items = $('.tmls_fulltext').parents('.tmls_item');

    tmls_morelinks.click(function(){
        var tmls_item = $(this).parents('.tmls_item');
        var tmls_fulltext = tmls_item.find('.tmls_fulltext');
        var tmls_excerpttext = tmls_item.find('.tmls_excerpttext');
        var tmls_container = $(this).parents('.tmls_container');
        var tmls_slider = $(this).parents('.tmls_slider');
        var caroufredsel_wrapper = $(this).parents('.caroufredsel_wrapper');
        var tmls_slider2 = $(this).parents('.tmls_slider2');
            
        tmls_excerpttext.stop().hide(0,function(){
            tmls_fulltext.stop().fadeIn('slow');
                
            if(tmls_container.hasClass('tmls_slider')) {
                tmls_slider.css('min-height',tmls_item.height());
                caroufredsel_wrapper.css('min-height',tmls_item.height());    
            }
            else if(tmls_container.hasClass('tmls_slider2')) {
                tmls_slider2.css('min-height',tmls_item.height());
                caroufredsel_wrapper.css('min-height',tmls_item.height());
            }
            
        });
            
    });

    tmls_items.mouseleave(function(){
        var tmls_tmls_fulltext = $(this).find('.tmls_fulltext');
        var tmls_excerpttext = $(this).find('.tmls_excerpttext');
        var tmls_container = $(this).parents('.tmls_container');
        var tmls_slider = $(this).parents('.tmls_slider');
        var caroufredsel_wrapper = $(this).parents('.caroufredsel_wrapper');
        var tmls_slider2 = $(this).parents('.tmls_slider2');
        
        tmls_tmls_fulltext.stop().hide(0,function(){
            tmls_excerpttext.stop().fadeIn('slow'); 

            if(tmls_container.hasClass('tmls_slider')) {
                tmls_slider.css('min-height',0);
                caroufredsel_wrapper.css('min-height',0);
            }
            else if(tmls_container.hasClass('tmls_slider2')) {
                tmls_slider2.css('min-height',0);
                caroufredsel_wrapper.css('min-height',0);
            }
        });
        
    });
    
}
    
$.tmls_findNotReadyInserted = function() {
	
	var tmls_forms = $('.tmls_form.tmls_notready');
	var tmls_sliders = $('.tmls.tmls_notready .tmls_slider, .tmls.tmls_notready .tmls_slider2');
	var tmls_style3 = $('.style3.tmls_style3_notready');
	
	// Submission Form
	
	if (tmls_forms.length  > 0 )
	{
		tmls_forms.each(function(){
			$(this).removeClass('tmls_notready');
			$.tmls_runFormsScripts($(this));
		});
	}
		
		
	// Sliders
	
	if (tmls_sliders.length  > 0 )
	{
		tmls_sliders.each(function(){
			$.tmls_runSlidersScripts($(this));
			$(this).parent().parent().removeClass('tmls_notready');
		});
	}
		
	// Style3
	
	if (tmls_style3.length  > 0 )
	{
		tmls_style3.each(function(){
			$(this).removeClass('tmls_style3_notready');
			$.tmls_runStyle3Scripts($(this));
		});
	}
	
	setTimeout(function() {
		$.tmls_findNotReadyInserted();
	},1000);
	
}



$.tmls_runFormsScripts = function( tmls_form ) {
	
	var tmls_form_submit = tmls_form.find('.tmls_form_submit');
	
	if (tmls_form_submit.length  > 0 )
	{
		tmls_form_submit.mouseover(function(){
			$(this).css('color',$(this).attr('data-hoverfontcolor'));
			$(this).css('border-color',$(this).attr('data-hoverbordercolor'));
			$(this).css('background-color',$(this).attr('data-hoverbgcolor'));
		});
		
		tmls_form_submit.mouseleave(function(){
			$(this).css('color',$(this).attr('data-fontcolor'));
			$(this).css('border-color',$(this).attr('data-bordercolor'));
			$(this).css('background-color',$(this).attr('data-bgcolor'));
		});
	}
	
}

$.tmls_runSlidersScripts = function( tmls_slider ) {
	
	/*======================== Slider ========================*/
		
	var tmls_visible_slider_buttons = tmls_slider.parent().parent().find('.tmls_next_prev.tmls_visible');

	
	tmls_slider_play(tmls_slider);
			
	tmls_slider.parent().parent().mouseenter(function(){
		$(this).children('.tmls_show_on_hover').slideToggle();
	});
			
	tmls_slider.parent().parent().mouseleave(function(){
		$(this).children('.tmls_show_on_hover').slideToggle();
	});
			
		
	tmls_visible_slider_buttons.fadeIn();

}

$.tmls_runStyle3Scripts = function( tmls_style3 ) {
	
	var tmls_style3_names = tmls_style3.find('.tmls_name');
	
	if(tmls_style3_names.length  > 0) {
		tmls_style3_names.each(function(){
				
			var tmls_style3_infos_height_sum = ($(this).height()+ 2.5 + $(this).parent().children('.tmls_position').height()+$(this).parent().children('.tmls_rating').height()+5);
			var tmls_style3_img_height = $(this).parent().children('.tmls_image').last().height();
				
			if(tmls_style3_infos_height_sum < tmls_style3_img_height && $(this).parent().children('.tmls_image').last().css('display')!='none' ) {
				$(this).css('padding-top', (tmls_style3_img_height/2) - (tmls_style3_infos_height_sum/2));
			}
			else {
				$(this).css('padding-top',0);
			}
				
		});
	}
	
}

$(window).load(function(){

	var tmls_sliders = $('.tmls_slider, .tmls_slider2');
	
    if (tmls_sliders.length  > 0 )
	{
        tmls_sliders.each(function(){
            tmls_slider_play($(this));
        });
    }
	
});

$(window).resize(function() {

	var tmls_sliders = $('.tmls_slider, .tmls_slider2');
	var tmls_style3 = $('.style3');
	
    
    if (tmls_sliders.length  > 0 )
	{
	   tmls_slider_play(tmls_sliders);
    }
	
	if (tmls_style3.length  > 0 )
	{
		tmls_style3.each(function(){
			$.tmls_runStyle3Scripts($(this));
		});
	}
	
});


function tmls_slider_play(tmls_slider) {
	
	tmls_slider.carouFredSel({
		responsive: true,
		width:'variable',
		height:'variable',
		prev: {
			button: function() {
				return $(this).parents().children(".tmls_next_prev").children(".tmls_prev");
			}
		},
		next: {
			button: function() {
				return $(this).parents().children(".tmls_next_prev").children(".tmls_next");
			}
		},
		pagination: {
			container: function() {
                if($(this).attr('data-imagesposition') == 'after'){
                    return $(this).parents().next().children('.tmls_paginationContainer');    
                }
                else {
                    return $(this).parents().prev().children('.tmls_paginationContainer');
                }
				
			},
			anchorBuilder	: function(nr) {
                if($(this).parent().attr('data-usedimages') == 'avatars') {
                    return "<div class='tmls_image_container "+$(this).attr('data-imageradius')+"'><div class='tmls_image' style='"+$(this).attr('data-bgimg')+"'></div><div class='tmls_image_overlay' style='background-color:"+$(this).parent().attr('data-slider2unselectedoverlaybgcolor')+"'></div></div>";
                }
                else {
                    return "<div class='tmls_image_container'><div class='tmls_image tmls_logo_image'><img alt='' src='"+$(this).attr('data-logoimage')+"'/></div><div class='tmls_image_overlay' style='background-color:"+$(this).parent().attr('data-slider2unselectedoverlaybgcolor')+"'></div></div>";
                }
				
			}
		},
		scroll: {
			items:1,          
			duration: tmls_slider.data('scrollduration'),
			fx: tmls_slider.data('transitioneffect')
		},
		auto: {
			play: tmls_slider.data('autoplay'),
			timeoutDuration:tmls_slider.data('pauseduration'),
			pauseOnHover:tmls_slider.data('pauseonhover')
		},
		items: {
			width:700
		},
		swipe: {
			onMouse: false,
			onTouch: true
		}
				
	});
			
}

}) (jQuery);