<?php

function ppb_text_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'width' => '100%',
		'padding' => 30,
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '';
	
	if($size!='one')
	{
		$return_html.= '<div class="standard_wrapper">';
	}

	//Set main shortcode div content
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_text"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).' !important;';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	if(!empty($width))
	{
		$return_html.= '<div style="margin:auto;width:'.esc_attr(rawurldecode($width)).'">';
	}
	$return_html.= do_shortcode(photography_apply_content($content)).'</div>';
	if(!empty($width))
	{
		$return_html.= '</div>';
	}
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	if($size!='one')
	{
		$return_html.= '</div>';
	}

	return $return_html;

}

add_shortcode('ppb_text', 'ppb_text_func');


function ppb_text_fullwidth_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'width' => '100%',
		'padding' => 30,
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '';
	
	if($size!='one')
	{
		$return_html.= '<div class="standard_wrapper">';
	}
	
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_text"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).' !important;';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= do_shortcode(photography_apply_content($content));
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	if($size!='one')
	{
		$return_html.= '</div>';
	}

	return $return_html;

}

add_shortcode('ppb_text_fullwidth', 'ppb_text_fullwidth_func');


function ppb_text_image_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'padding' => 30,
		'background' => '',
		'background_parallax' => '',
		'background_position' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	if($size != 'one')
	{	
		$return_html.= '<div class="standard_wrapper">';
	}

	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_text ';
	
	if(!empty($background))
	{
		$return_html.= 'withbg ';
		$custom_css.= 'background-image:url('.esc_url($background).');';
	}
	
	if(!empty($background_parallax))
	{
		$return_html.= 'parallax ';
	}
	
	if(!empty($background_position))
	{
		$custom_css.= 'background-position: center '.esc_attr($background_position).';';
	}
	
	$return_html.= '"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).' !important;';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	if(!empty($background_parallax))
	{
		$return_html.= ' data-stellar-background-ratio="0.5" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	if($size == 'one')
	{	
		$return_html.= '<div class="standard_wrapper">';
	}
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner" ';

	$return_html.= '>';
	$return_html.= do_shortcode(photography_apply_content($content));
	$return_html.= '</div></div>';
	
	if($size == 'one')
	{	
		$return_html.= '</div>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_text_image', 'ppb_text_image_func');


function ppb_text_sidebar_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'slug' => '',
		'subtitle' => '',
		'sidebar' => '',
		'padding' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="one withsmallpadding" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode($custom_css).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper"><div class="page_content_wrapper"><div class="inner"><div class="inner_wrapper">';
	
	$return_html.= '<div class="sidebar_content">';
	
	$return_html.= do_shortcode(photography_apply_content($content)).'</div>';
	
	//Display Sidebar
	$return_html.= '<div class="sidebar_wrapper"><div class="sidebar"><div class="content"><ul class="sidebar_widget">';
	$return_html.= photography_get_dynamic_sidebar(rawurldecode($sidebar));
	$return_html.= '</ul></div></div></div>';
	
	$return_html.= '</div></div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('ppb_text_sidebar', 'ppb_text_sidebar_func');


function ppb_header_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'subtitle' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'textalign' => 'left',
		'width' => '100',
		'padding' => 30,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));

	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	if($size != 'one')
	{
		$return_html.= '<div class="standard_wrapper">';
	}

	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_header ';
	
	if(!empty($layout) && $layout == 'fullwidth')
	{
		$return_html.= 'fullwidth ';
	}

	$return_html.= '"';
	
	$custom_css.= 'text-align:'.esc_attr($textalign).';padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	$custom_css_fontcolor = '';
	$custom_css_bordercolor = '';
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_fontcolor.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_bordercolor.= 'border-color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	if($size == 'one')
	{	
		$return_html.= '<div class="standard_wrapper">';
	}
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	if(!empty($width))
	{
		$return_html.= '<div style="margin:auto;width:'.esc_attr(rawurldecode($width)).'%">';
	}
	
	if(!empty($subtitle))
	{
		$return_html.= '<div class="ppb_subtitle" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode($subtitle).'</div>';
	}
	
	//Add title and content
	if(!empty($title))
	{
		$return_html.= '<h2 class="ppb_title" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<hr class="title_break '.esc_attr($textalign).'" style="'.esc_attr($custom_css_bordercolor).'"/>';
		$return_html.= '<div class="ppb_header_content">'.do_shortcode(photography_apply_content($content)).'</div>';
	}
	
	$return_html.= '</div>';
	
	if(!empty($width))
	{
		$return_html.= '</div>';
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	if($size != 'one')
	{
		$return_html.= '</div>';
	}

	return $return_html;

}

add_shortcode('ppb_header', 'ppb_header_func');


function ppb_header_image_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'subtitle' => '',
		'fontcolor' => '',
		'textalign' => 'left',
		'width' => '100%',
		'padding' => 30,
		'background' => '',
		'background_position' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '';
	if($size != 'one')
	{	
		$return_html.= '<div class="standard_wrapper">';
	}

	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_header ';
	
	if(!empty($background))
	{
		$return_html.= 'withbg ';
		$custom_css.= 'background-image:url('.esc_url($background).');';
	}
	
	if(!empty($background_position))
	{
		$custom_css.= 'background-position: center '.esc_attr($background_position).';';
	}

	$return_html.= '"';
	
	$custom_css.= 'text-align:'.esc_attr($textalign).';padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	$custom_css_fontcolor = '';
	$custom_css_bordercolor = '';
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_fontcolor.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_bordercolor.= 'border-color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	if($size == 'one')
	{	
		$return_html.= '<div class="standard_wrapper">';
	}
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	if(!empty($subtitle))
	{
		$return_html.= '<div class="ppb_subtitle" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode($subtitle).'</div>';
	}
	
	//Add title and content
	if(!empty($title))
	{
		$return_html.= '<h2 class="ppb_title" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<hr class="title_break '.esc_attr($textalign).'" style="'.esc_attr($custom_css_bordercolor).'"/>';
		$return_html.= '<div class="ppb_header_content">'.do_shortcode(photography_apply_content($content)).'</div>';
	}
	
	$return_html.= '</div>';
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	if($size != 'one')
	{
		$return_html.= '</div>';
	}

	return $return_html;

}

add_shortcode('ppb_header_image', 'ppb_header_image_func');


function ppb_divider_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'builder_id' => '',
	), $atts));

	//Set begin wrapper div for live builder
	$return_html= photography_live_builder_begin_wrapper($builder_id, 'ppb_divider');
	
	$return_html.= '<div class="divider '.esc_attr($size).'">&nbsp;</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);

	return $return_html;

}

add_shortcode('ppb_divider', 'ppb_divider_func');


function ppb_gallery_slider_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'gallery' => '',
		'autoplay' => 0,
		'caption' => 0,
		'timer' => 5,
		'padding' => 0,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= do_shortcode('[tg_gallery_slider gallery_id="'.esc_attr($gallery).'" size="original" autoplay="'.esc_attr($autoplay).'" caption="'.esc_attr($caption).'" timer="'.esc_attr($timer).'" fullwidth="1"]');
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_slider', 'ppb_gallery_slider_func');


function ppb_gallery_slider_fixed_width_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'gallery' => '',
		'autoplay' => 0,
		'caption' => 0,
		'timer' => 5,
		'padding' => 0,
		'bgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper nopadding"><div class="inner">';
	
	$return_html.= do_shortcode('[tg_gallery_slider gallery_id="'.esc_attr($gallery).'" size="original" autoplay="'.esc_attr($autoplay).'" caption="'.esc_attr($caption).'"  timer="'.esc_attr($timer).'"]');
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_slider_fixed_width', 'ppb_gallery_slider_fixed_width_func');


function ppb_gallery_horizontal_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'title' => '',
		'gallery' => '',
		'items' => -1,
		'display_caption' => 1,
		'custom_css' => '',
		'layout' => 'wide',
		'builder_id' => '',
	), $atts));
	
	$return_html = '<div class="'.esc_attr($size).'" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode(esc_attr($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	//Get gallery images
	$all_photo_arr = get_post_meta($gallery, 'wpsimplegallery_gallery', true);
	
	//Get global gallery sorting
	$all_photo_arr = photography_resort_gallery_img($all_photo_arr);
	
	if(!empty($all_photo_arr) && is_array($all_photo_arr))
	{
		wp_enqueue_script("horizontal_gallery", get_template_directory_uri()."/js/horizontal_gallery.js", false, THEMEVERSION, true);
	
		$gallery_excerpt = get_post_field('post_excerpt', $gallery);
	
		//Check if select contained layout
		if($layout == 'contain')
		{
			$return_html.= '<div class="page_content_wrapper horizontal_gallery">';
		}
	
		$return_html.= '
		<div class="horizontal_gallery">
			<table class="horizontal_gallery_wrapper">
				<tbody><tr>';
		
		foreach($all_photo_arr as $photo_id)
		{
		    $small_image_url = '';
		    $hyperlink_url = get_permalink($photo_id);
		    $thumb_image_url = '';
		    
		    if(!empty($photo_id))
		    {
		    	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
		    }
		    
		    //Get image meta data
		    $image_caption = get_post_field('post_excerpt', $photo_id);
		    $image_description = get_post_field('post_content', $photo_id);
		    $tg_full_image_caption = kirki_get_option('tg_full_image_caption');
		 
		 	$return_html.= '<td>';
		 	
		 	if(isset($image_url[0]) && !empty($image_url[0]))
	    	{
	    		//Check if enable horizontal gallery lightbox
	    		$tg_lightbox_enable_horizontal_gallery = kirki_get_option('tg_lightbox_enable_horizontal_gallery');
	    	
				if(!empty($tg_lightbox_enable_horizontal_gallery))
				{
		    		$return_html.= '<a ';
		    		
		    		if(!empty($tg_full_image_caption)) 
		    		{ 
		    			$return_html.= 'data-caption="';
		    			
		    			if(!empty($image_caption)) 
		    			{ 
		    				$return_html.= esc_attr($image_caption);
		    			} 
		    			
		    			$return_html.= '"';
		    		} 
		    			$return_html.= 'class="fancy-gallery" href="'.esc_url($image_url[0]).'">';
	    		}
			    	
			    $return_html.= '<div class="gallery_image_wrapper">
				    	<img src="'.esc_url($image_url[0]).'" alt="" class="horizontal_gallery_img"/>';
			    $return_html.= '</div>';
			   
				if(!empty($tg_lightbox_enable_horizontal_gallery))
				{
					$return_html.= '</a>';
				}
	    	
	    		if(!empty($display_caption))
				{
				    $return_html.= '<div class="wp-caption aligncenter"><p class="wp-caption-text">'.$image_caption.'</p>';
				    
				    //Get image purchase URL
				    $photography_purchase_url = get_post_meta($photo_id, 'photography_purchase_url', true);
				    
				    if(!empty($photography_purchase_url))
				    {
				    	$return_html.= '<a href="'.esc_url($photography_purchase_url).'" class="button ghost"><i class="fa fa-shopping-cart marginright"></i>'.esc_html__('Purchase', 'photography-translation' ).'</a>';
				}
				    
				    $return_html.= '</div>';
				}
	    	}
		 	
		 	$return_html.= '</td>';   
		}
			
		$return_html.= '
				</tr></tbody>
			</table>
		</div>
		';
		
		//Check if select contained layout
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_horizontal', 'ppb_gallery_horizontal_func');


function ppb_gallery_striped_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'title' => '',
		'gallery' => '',
		'items' => -1,
		'display_caption' => 1,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$return_html = '<div class="'.esc_attr($size).'" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode(esc_attr($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	//Get gallery images
	$all_photo_arr = get_post_meta($gallery, 'wpsimplegallery_gallery', true);
	
	//Get global gallery sorting
	$all_photo_arr = photography_resort_gallery_img($all_photo_arr);
	
	if(!empty($all_photo_arr) && is_array($all_photo_arr))
	{
		wp_enqueue_script("horizontal_gallery", get_template_directory_uri()."/js/horizontal_gallery.js", false, THEMEVERSION, true);
	
		$gallery_excerpt = get_post_field('post_excerpt', $gallery);
	
		$return_html.= '<div class="page_content_wrapper horizontal_gallery">';
	
		$return_html.= '
		<div class="horizontal_gallery">
			<table class="horizontal_gallery_wrapper">
				<tbody><tr>';
		
		foreach($all_photo_arr as $photo_id)
		{
		    $small_image_url = '';
		    $hyperlink_url = get_permalink($photo_id);
		    $thumb_image_url = '';
		    
		    if(!empty($photo_id))
		    {
		    	$small_image_url = wp_get_attachment_image_src($photo_id, 'photography-gallery-striped', true);
		    	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
		    }
		    
		    //Get image meta data
		    $image_caption = get_post_field('post_excerpt', $photo_id);
		    $image_description = get_post_field('post_content', $photo_id);
		    $tg_full_image_caption = kirki_get_option('tg_full_image_caption');
		 
		 	$return_html.= '<td>';
		 	
		 	if(isset($image_url[0]) && !empty($image_url[0]))
	    	{
	    		$return_html.= '<a ';
	    		
	    		if(!empty($tg_full_image_caption)) 
	    		{ 
	    			$return_html.= 'data-caption="';
	    			
	    			if(!empty($image_caption)) 
	    			{ 
	    				$return_html.= esc_attr($image_caption);
	    			} 
	    			
	    			$return_html.= '"';
	    		} 
	    			$return_html.= 'class="fancy-gallery" href="'.esc_url($image_url[0]).'">
			    	<div class="gallery_image_wrapper">
				    	<img src="'.esc_url($small_image_url[0]).'" alt="" class="horizontal_gallery_img"/>';
			    	$return_html.= '</div>
	    	</a>';
	    	
	    			if(!empty($display_caption))
					{
				    	$return_html.= '<div class="wp-caption aligncenter"><p class="wp-caption-text">'.$image_caption.'</p>';
				    	
				    	//Get image purchase URL
				    	$photography_purchase_url = get_post_meta($photo_id, 'photography_purchase_url', true);
				    	
				    	if(!empty($photography_purchase_url))
				    	{
							$return_html.= '<a href="'.esc_url($photography_purchase_url).'" class="button ghost"><i class="fa fa-shopping-cart marginright"></i>'.esc_html__('Purchase', 'photography-translation' ).'</a>';
				    }
				    	
				    	$return_html.= '</div>';
				    }
	    	}
		 	
		 	$return_html.= '</td>';   
		}
			
		$return_html.= '
				</tr></tbody>
			</table>
		</div>
		';
		
		$return_html.= '</div>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_striped', 'ppb_gallery_striped_func');


function ppb_gallery_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'gallery_id' => '',
		'layout' => 'wide',
		'columns' => 4,
		'items' => 0,
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'">';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= do_shortcode('[tg_grid_gallery gallery_id="'.esc_attr($gallery_id).'" layout="'.esc_attr($layout).'" columns="'.esc_attr($columns).'" items="'.esc_attr($items).'"]');
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_grid', 'ppb_gallery_grid_func');


function ppb_gallery_masonry_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'gallery_id' => '',
		'layout' => 'wide',
		'columns' => 4,
		'items' => 0,
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'">';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= do_shortcode('[tg_masonry_gallery gallery_id="'.esc_attr($gallery_id).'" layout="'.esc_attr($layout).'" columns="'.esc_attr($columns).'" items="'.esc_attr($items).'"]');
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_masonry', 'ppb_gallery_masonry_func');


function ppb_gallery_mixed_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'gallery_id' => '',
		'layout' => 'wide',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_gallery_mixed_grid '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	//Get gallery images
	$all_photo_arr = get_post_meta($gallery_id, 'wpsimplegallery_gallery', true);
	
	//Get global gallery sorting
	$all_photo_arr = photography_resort_gallery_img($all_photo_arr);
	
	if(!empty($all_photo_arr) && is_array($all_photo_arr))
	{
		wp_enqueue_script("photography-custom-mixed_masonry", get_template_directory_uri()."/js/custom_mixed_masonry.js", false, THEMEVERSION, true);
	
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
		
		//Check if enable infinite scroll
		$custom_id = time().rand();
		
		$wrapper_class = 'three_cols';
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_mixed_filter_wrapper gallery portfolio-content section content clearfix '.esc_attr($wrapper_class).' ' .esc_attr($layout).'">';
		
		$large_counter = 1;
		$next_number_to_add = 4;
		$next_trigger = 1;
		
		foreach($all_photo_arr as $key => $photo_id)
		{
			//Calculated columns size
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
			$photography_image_size = 'photography-gallery-grid';
			
			$large_counter_trigger = FALSE;
			
			if($next_trigger == $key+1)
			{
				$large_counter_trigger = TRUE;
				$next_trigger = $next_trigger+$next_number_to_add;
				
				if($next_number_to_add == 4)
				{
					$next_number_to_add = 2;
				}
				else if($next_number_to_add==2)
				{
					$next_number_to_add = 4;
				}
			}
			
			if($large_counter_trigger)
			{
				$wrapper_class = 'three_cols double_size';
				$grid_wrapper_class = 'classic3_cols double_size';
				$column_class = 'one_third gallery3 double_size';
				$photography_image_size = 'photography-gallery-grid-large';
			}
			
			$large_counter++;
		
		    $small_image_url = '';
		    $hyperlink_url = get_permalink($photo_id);
		    $thumb_image_url = '';
		    
		    if(!empty($photo_id))
		    {
		    	$image_url = wp_get_attachment_image_src($photo_id, 'original', true);
		    	$small_image_url = wp_get_attachment_image_src($photo_id, $photography_image_size, true);
		    }
		    
		    //Get image meta data
		    $image_caption = get_post_field('post_excerpt', $photo_id);
		    
			//Begin display HTML
			$return_html.= '<div class="element '.esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' filterable static'.($key+1).' portfolio_type">';
			
			$return_html.= '<a data-caption="'.esc_attr($image_caption).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($image_caption).'"/></a>';
			
			$return_html.= '</div>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
		
		$return_html.= '<script>';
		$return_html.= '
		jQuery(window).load(function(){ 
			var containWidth = jQuery("#'.esc_js($custom_id).'").width();
			jQuery("#'.esc_js($custom_id).'").css("width", containWidth+"px");
		
			jQuery("#'.esc_js($custom_id).'").masonry({
			  itemSelector: ".element",
			  isResizable: true,
			  columnWidth: Math.floor(jQuery("#'.esc_js($custom_id).'").width()/ 3)
			});
			
			jQuery(window).resize(function () {
				jQuery("#'.esc_js($custom_id).'").css("width", "100%");
				var containWidth = jQuery("#'.esc_js($custom_id).'").width();
				jQuery("#'.esc_js($custom_id).'").css("width", containWidth+"px");
			
				jQuery("#'.esc_js($custom_id).'").masonry({
				  itemSelector: ".element",
				  isResizable: true,
				  columnWidth: Math.floor(jQuery("#'.esc_js($custom_id).'").width()/ 3)
				});
			});
			
			jQuery("#'.esc_js($custom_id).'").imagesLoaded( function(){
			    jQuery("#'.esc_js($custom_id).'").children(".element").children(".portfolio_type").each(function(){
				    jQuery(this).addClass("fadeIn");
			    });
			});
		});';
		$return_html.= '</script>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_gallery_mixed_grid', 'ppb_gallery_mixed_grid_func');


function ppb_gallery_archive_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'cat' => '',
		'items' => '',
		'layout' => 'contain',
		'columns' => 3,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 3;
	}
	if(!is_numeric($columns))
	{
		$columns = 3;
	}

	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode(esc_attr($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	//Display galleries items
	$args = array(
	    'numberposts' => $items,
	    'order' => 'ASC',
	    'orderby' => 'menu_order',
	    'post_type' => array('galleries'),
	    'suppress_filters' => 0,
	);
	
	if(!empty($cat))
	{
		$args['gallerycat'] = $cat;
	}

	$galleris_arr = get_posts($args);
	
	$wrapper_class = '';
	$grid_wrapper_class = '';
	$column_class = '';
	
	switch($columns)
	{
		case 2:
			$wrapper_class = 'two_cols';
			$grid_wrapper_class = 'classic2_cols';
			$column_class = 'one_half gallery2';
		break;
		
		case 3:
			$wrapper_class = 'three_cols';
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
		break;
		
		case 4:
			$wrapper_class = 'four_cols';
			$grid_wrapper_class = 'classic4_cols';
			$column_class = 'one_fourth gallery4';
		break;
	}
	
	if(!empty($galleris_arr) && is_array($galleris_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
	
		//Check if disable slideshow hover effect
		$tg_gallery_hover_slide = kirki_get_option( "tg_gallery_hover_slide" );
		
		if(!empty($tg_gallery_hover_slide))
		{
			wp_enqueue_script("jquery.cycle2.min", get_template_directory_uri()."/js/jquery.cycle2.min.js", false, THEMEVERSION, true);
			wp_enqueue_script("custom_cycle", get_template_directory_uri()."/js/custom_cycle.js", false, THEMEVERSION, true);
		}
		
		$return_html.= '<div class="portfolio_filter_wrapper gallery '.esc_attr($wrapper_class).' ' .esc_attr($layout).'" data-columns="'.esc_attr($columns).'">';
		
		foreach($galleris_arr as $key => $gallery)
		{
			$image_url = '';
			$gallery_ID = $gallery->ID;
			    	
			if(has_post_thumbnail($gallery_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($gallery_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-grid', true);
			}
			
			$permalink_url = get_permalink($gallery_ID);
			
			$return_html.= '<div class="element grid  ' .esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' static filterable gallery_type animated'.esc_attr($key+1).' archive">';
			
			if(!empty($small_image_url[0]))
			{
				$all_photo_arr = array();
						
				if(!empty($tg_gallery_hover_slide))
				{
				    //Get gallery images
				    $all_photo_arr = get_post_meta($gallery_ID, 'wpsimplegallery_gallery', true);
				    
				    //Get only 5 recent photos
				    $all_photo_arr = array_slice($all_photo_arr, 0, 5);
				}
			    
			    $return_html.= '<a href="'.esc_url($permalink_url).'"><div class="gallery_archive_desc">
							    <h4>'.$gallery->post_title.'</h4>
								<div class="post_detail">'.$gallery->post_excerpt.'</div></div>';

				if(!empty($all_photo_arr))
				{
					 $return_html.= '<ul class="gallery_img_slides">';

					foreach($all_photo_arr as $photo)
					{
						$slide_image_url = wp_get_attachment_image_src($photo, 'photography-gallery-grid', true);
						$return_html.= '<li><img src="'.esc_url($slide_image_url[0]).'" alt="" class="static"/></li>';
					}
					
					$return_html.= '</ul>';
				}

				$return_html.= '<img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($gallery->post_title).'"/></a>';
			}
			
			$return_html.= '</div>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_gallery_archive', 'ppb_gallery_archive_func');


function ppb_image_fullwidth_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'image' => '',
		'height' => 400,
		'display_caption' => 1,
		'background_position' => 'center',
		'padding' => 0,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));

	if(!is_numeric($height))
	{
		$height = 400;
	}
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper withbg"';
	
	if(!empty($image))
	{
		$return_html.= ' style="background-image:url('.esc_url($image).');background-size:cover;background-position:center '.esc_attr($background_position).';height:'.esc_attr($height).'px;position:relative;"';
	}
	
	$return_html.= '>';
	
	if(!empty($display_caption))
	{
		//Get image meta data
		$image_id = photography_get_image_id($image);
		$image_caption = get_post_field('post_excerpt', $image_id);
		
		if(!empty($image_caption))
		{
			$return_html.= '<div id="gallery_caption" class="ppb_fullwidth">'.$image_caption.'</div>';
		}
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_image_fullwidth', 'ppb_image_fullwidth_func');


function ppb_image_parallax_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'title' => '',
		'slug' => '',
		'image' => '',
		'height' => 50,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	if(!is_numeric($height))
	{
		$height = 50;
	}
	
	//Set begin wrapper div for live builder
	$return_html = photography_live_builder_begin_wrapper($builder_id);

	$return_html.= '<div '.$sec_id.' class="parallax ';
	$return_html.= '" ';
	
	if(!empty($image))
	{
		$image_id = photography_get_image_id($image);
		$image_thumb = wp_get_attachment_image_src($image_id, 'original', true);
		
		//Check if got file name
		if(basename($image_thumb[0]) != 'default.png')
		{
			$background_image = $image_thumb[0];
			$background_image_width = $image_thumb[1];
			$background_image_height = $image_thumb[2];
		
			$return_html.= 'data-image="'.esc_url($background_image).'" ';
			$return_html.= 'data-width="'.$background_image_width.'" ';
			$return_html.= 'data-height="'.$background_image_height.'" ';
		}
		else
		{
			$return_html.= 'data-image="'.esc_url($image).'" ';
			list($background_image_width, $background_image_height) = getimagesize($image);
			$return_html.= 'data-width="'.$background_image_width.'" ';
			$return_html.= 'data-height="'.$background_image_height.'" ';
		}
	}
	
		
	if(!empty($height))
	{
		$custom_css.= 'height:'.$height.'px; ';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'"';
	}
	
	$return_html.= '>';
	
	$return_html.= '</div>';

	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '<br class="clear"/>';

	return $return_html;
}

add_shortcode('ppb_image_parallax', 'ppb_image_parallax_func');


function ppb_image_fixed_width_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'image' => '',
		'display_caption' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';

	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	if(!empty($image))
	{
		$image_id = photography_get_image_id($image);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
		$return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		$return_html.= '<a href="'.esc_url($image).'" class="img_frame"><img src="'.esc_url($image).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		$return_html.= '</div>';
	}
	
	if(!empty($display_caption))
	{
		//Get image meta data
		$image_id = photography_get_image_id($image);
		$image_caption = get_post_field('post_excerpt', $image_id);
		$image_description = get_post_field('post_content', $image_id);
		
		if(!empty($image_caption) OR !empty($image_description))
		{
			$return_html.= '<div class="image_caption">'.esc_html($image_caption).'</div>';
		}
	}
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_image_fixed_width', 'ppb_image_fixed_width_func');


function ppb_content_half_bg_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'subtitle' => '',
		'background' => '',
		'background_parallax' => '',
		'background_position' => '',
		'padding' => 30,
		'bgcolor' => '#ffffff',
		'opacity' => 100,
		'fontcolor' => '',
		'align' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(empty($bgcolor))
	{
		$bgcolor = '#ffffff';
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_content_half_bg ';
	
	if(!empty($background))
	{
		$return_html.= 'withbg ';
		$custom_css.= 'background-image:url('.esc_url($background).');';
	}
	
	if(!empty($background_parallax))
	{
		$return_html.= 'parallax ';
	}
	
	if(!empty($background_position))
	{
		$custom_css.= 'background-position: center '.esc_attr($background_position).';';
	}
	
	$return_html.= '"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	if(!empty($background_parallax))
	{
		$return_html.= ' data-stellar-background-ratio="0.5" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper"><div class="page_content_wrapper"><div class="inner">';
	
	if(!empty($content))
	{
		$custom_bgcolor_css = '';
		if(!empty($bgcolor))
		{
			$ori_bgcolor = $bgcolor;
			$opacity = $opacity/100;
			$bgcolor = photography_hex_to_rgb($bgcolor);
		
			$custom_bgcolor_css.= 'background:'.$ori_bgcolor.';';
			$custom_bgcolor_css.= 'background:rgb('.$bgcolor['r'].','.$bgcolor['g'].','.$bgcolor['b'].','.$opacity.');';
			$custom_bgcolor_css.= 'background:rgba('.$bgcolor['r'].','.$bgcolor['g'].','.$bgcolor['b'].','.$opacity.');';
		}
		
		$custom_css_fontcolor = '';
		$custom_css_bordercolor = '';
		if(!empty($fontcolor))
		{
			$custom_css.= 'color:'.esc_attr($fontcolor).';';
			$custom_css_fontcolor.= 'color:'.esc_attr($fontcolor).';';
			$custom_css_bordercolor.= 'border-color:'.esc_attr($fontcolor).';';
		}
	
		if($align == 'left')
		{
			$return_html.= '<div class="one_half_bg" style="'.esc_attr($custom_bgcolor_css.$custom_css_fontcolor).'">';
		}
		else
		{
			$return_html.= '<div class="one_half_bg floatright" style="'.esc_attr($custom_bgcolor_css.$custom_css_fontcolor).'">';
		}
		
		//Add title and content
		if(!empty($subtitle))
		{
			$return_html.= '<div class="ppb_subtitle" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode($subtitle).'</div>';
		}
		
		//Add title and content
		if(!empty($title))
		{
			$return_html.= '<h2 class="ppb_title" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
		}
		
		if(!empty($content))
		{
			$return_html.= '<hr class="title_break left" style="'.esc_attr($custom_css_bordercolor).'"/>';
			$return_html.= do_shortcode(photography_apply_content($content));
		}
		$return_html.= '</div>';
	}
	
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_content_half_bg', 'ppb_content_half_bg_func');


function ppb_image_half_fixed_width_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'image' => '',
		'align' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(empty($align))
	{
		$align = 'left';
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper"><div class="page_content_wrapper"><div class="inner">';
	
	//Display Title
	if(!empty($title))
	{
		$return_html.= '<h2 class="ppb_title">'.$title.'</h2>';
	}
	
	if($align=='left')
	{
		$return_html.= '<div class="one_half">';
		if(!empty($image))
		{
			$image_id = photography_get_image_id($image);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
			$return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
			$return_html.= '<a href="'.esc_url($image).'" class="img_frame"><img src="'.esc_url($image).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
			$return_html.= '</div></div>';
		}
		$return_html.= '</div>';
		
		$return_html.= '<div class="one_half last content_middle animate">';
		if(!empty($content))
		{
			$return_html.= $content;
		}
		$return_html.= '</div>';
	}
	else
	{	
		$return_html.= '<div class="one_half content_middle animate textright">';
		if(!empty($content))
		{
			$return_html.= $content;
		}
		$return_html.= '</div>';
		
		$return_html.= '<div class="one_half last">';
		if(!empty($image))
		{
			$image_id = photography_get_image_id($image);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
			$return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
			$return_html.= '<a href="'.esc_url($image).'" class="img_frame"><img src="'.esc_url($image).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
			$return_html.= '</div></div>';
		}
		$return_html.= '</div>';
	}
	
	$return_html.= '<br class="clear"/></div>';
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_image_half_fixed_width', 'ppb_image_half_fixed_width_func');


function ppb_image_half_fullwidth_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'subtitle' => '',
		'image' => '',
		'height' => 500,
		'align' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(empty($align))
	{
		$align = 'left';
	}
	
	if(!is_numeric($height))
	{
		$height = 500;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$custom_css_fontcolor = '';
	$custom_css_bordercolor = '';
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_fontcolor.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_bordercolor.= 'border-color:'.esc_attr($fontcolor).';';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper nopadding">';
	
	$content_custom_css = '';
	if($align=='left')
	{
		$return_html.= '<div class="one_half_bg"';
		if(!empty($image))
		{
			$return_html.= ' style="background-image:url('.esc_url($image).');height:'.esc_attr($height).'px;"';
		}
		$return_html.= '></div>';
		
		$content_custom_css.= 'style="padding:'.esc_attr($padding).'px;"';
		$return_html.= '<div class="one_half_bg" '.$content_custom_css.'>';
		
		//Add title and content
		if(!empty($subtitle))
		{
			$return_html.= '<div class="ppb_subtitle" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode($subtitle).'</div>';
		}
		
		//Add title and content
		if(!empty($title))
		{
			$return_html.= '<h2 class="ppb_title" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
		}
		
		if(!empty($content))
		{
			$return_html.= '<hr class="title_break left" style="'.esc_attr($custom_css_bordercolor).'"/>';
			$return_html.= do_shortcode(photography_apply_content($content));
		}
		
		$return_html.= '</div>';
	}
	else
	{	
		$content_custom_css.= 'style="padding:'.esc_attr($padding).'px;"';
		$return_html.= '<div class="one_half_bg textright" '.$content_custom_css.'>';
		
		//Add title and content
		if(!empty($subtitle))
		{
			$return_html.= '<div class="ppb_subtitle" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode($subtitle).'</div>';
		}
		
		//Add title and content
		if(!empty($title))
		{
			$return_html.= '<h2 class="ppb_title" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
		}
		
		if(!empty($content))
		{
			$return_html.= '<hr class="title_break left" style="'.esc_attr($custom_css_bordercolor).'"/>';
			$return_html.= do_shortcode(photography_apply_content($content));
		}
	
		$return_html.= '</div>';
		
		$return_html.= '<div class="one_half_bg"';
		if(!empty($image))
		{
			$return_html.= ' style="background-image:url('.esc_url($image).');height:'.esc_attr($height).'px;"';
		}
		$return_html.= '></div>';
	}
	
	$return_html.= '<br class="clear"/></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_image_half_fullwidth', 'ppb_image_half_fullwidth_func');


function ppb_two_cols_images_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'image1' => '',
		'image2' => '',
		'display_caption' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	$return_html.= '<div class="one_half">';
	if(!empty($image1))
	{
		$image_id = photography_get_image_id($image1);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image1).'" class="img_frame"><img src="'.esc_url($image1).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image1);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	$return_html.= '<div class="one_half last">';
	if(!empty($image2))
	{
		$image_id = photography_get_image_id($image2);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image2).'" class="img_frame"><img src="'.esc_url($image2).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image2);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div></div>';
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_two_cols_images', 'ppb_two_cols_images_func');


function ppb_two_cols_images_no_space_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'image1' => '',
		'image2' => '',
		'height' => 600,
		'display_caption' => 1,
		'padding' => 0,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner" style="padding:0;">';
	
	if(!empty($image1) && !empty($height))
	{
		$return_html.= '<div class="one_half_bg" ';
		$return_html.= 'style="background-image:url(\''.$image1.'\');height:'.$height.'px;"';
		$return_html.= '>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image1);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	
	if(!empty($image2) && !empty($height))
	{
		$return_html.= '<div class="one_half_bg" ';
		$return_html.= 'style="background-image:url(\''.$image2.'\');height:'.$height.'px;"';
		$return_html.= '>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image2);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_two_cols_images_no_space', 'ppb_two_cols_images_no_space_func');


function ppb_three_cols_images_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'image1' => '',
		'image2' => '',
		'image3' => '',
		'display_caption' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	//First image
	$return_html.= '<div class="one_third">';
	if(!empty($image1))
	{
		$image_id = photography_get_image_id($image1);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image1).'" class="img_frame"><img src="'.esc_url($image1).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image1);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	//Second image
	$return_html.= '<div class="one_third">';
	if(!empty($image2))
	{
		$image_id = photography_get_image_id($image2);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image2).'" class="img_frame"><img src="'.esc_url($image2).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image2);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	//Third image
	$return_html.= '<div class="one_third last animate">';
	if(!empty($image3))
	{
		$image_id = photography_get_image_id($image3);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image3).'" class="img_frame"><img src="'.esc_url($image3).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image3);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div></div>';
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_three_cols_images', 'ppb_three_cols_images_func');


function ppb_three_images_block_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'image_portrait' => '',
		'image_portrait_align' => 'left',
		'image2' => '',
		'image3' => '',
		'display_caption' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(empty($image_portrait_align))
	{
		$image_portrait_align = 'left';
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	if($image_portrait_align=='left')
	{
		//First column
		$return_html.= '<div class="one_half">';
		if(!empty($image_portrait))
		{
			$image_id = photography_get_image_id($image_portrait);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
		    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		    $return_html.= '<a href="'.esc_url($image_portrait).'" class="img_frame"><img src="'.esc_url($image_portrait).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		    $return_html.= '</div>';
		    if(!empty($display_caption))
		    {
		    	//Get image meta data
		    	$image_id = photography_get_image_id($image_portrait);
		    	$image_caption = get_post_field('post_excerpt', $image_id);
		    	
		    	if(!empty($image_caption))
		    	{
		    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
		    	}
		    }
		    $return_html.= '</div>';
		}
		$return_html.= '</div>';
		
		//Second column
		$return_html.= '<div class="one_half last">';
		if(!empty($image2))
		{
			$image_id = photography_get_image_id($image2);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
		    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		    $return_html.= '<a href="'.esc_url($image2).'" class="img_frame"><img src="'.esc_url($image2).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		    $return_html.= '</div>';
		    if(!empty($display_caption))
		    {
		    	//Get image meta data
		    	$image_id = photography_get_image_id($image2);
		    	$image_caption = get_post_field('post_excerpt', $image_id);
		    	
		    	if(!empty($image_caption))
		    	{
		    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
		    	}
		    }
		    $return_html.= '</div>';
		}
		
		$return_html.= '<br class="clear"/>';
		
		if(!empty($image3))
		{
			$image_id = photography_get_image_id($image3);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
		    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		    $return_html.= '<a href="'.esc_url($image3).'" class="img_frame"><img src="'.esc_url($image3).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		    $return_html.= '</div>';
		    if(!empty($display_caption))
		    {
		    	//Get image meta data
		    	$image_id = photography_get_image_id($image3);
		    	$image_caption = get_post_field('post_excerpt', $image_id);
		    	
		    	if(!empty($image_caption))
		    	{
		    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
		    	}
		    }
		    $return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	else
	{
		//First column
		$return_html.= '<div class="one_half">';
		if(!empty($image2))
		{
			$image_id = photography_get_image_id($image2);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
		    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		    $return_html.= '<a href="'.esc_url($image2).'" class="img_frame"><img src="'.esc_url($image2).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		    $return_html.= '</div>';
		    if(!empty($display_caption))
		    {
		    	//Get image meta data
		    	$image_id = photography_get_image_id($image2);
		    	$image_caption = get_post_field('post_excerpt', $image_id);
		    	
		    	if(!empty($image_caption))
		    	{
		    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
		    	}
		    }
		    $return_html.= '</div>';
		}
		
		$return_html.= '<br class="clear"/>';
		
		if(!empty($image3))
		{
			$image_id = photography_get_image_id($image3);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
		    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		    $return_html.= '<a href="'.esc_url($image3).'" class="img_frame"><img src="'.esc_url($image3).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		    $return_html.= '</div>';
		    if(!empty($display_caption))
		    {
		    	//Get image meta data
		    	$image_id = photography_get_image_id($image3);
		    	$image_caption = get_post_field('post_excerpt', $image_id);
		    	
		    	if(!empty($image_caption))
		    	{
		    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
		    	}
		    }
		    $return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		//Second column
		$return_html.= '<div class="one_half last">';
		if(!empty($image_portrait))
		{
			$image_id = photography_get_image_id($image_portrait);
			$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
		
		    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
		    $return_html.= '<a href="'.esc_url($image_portrait).'" class="img_frame"><img src="'.esc_url($image_portrait).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
		    $return_html.= '</div>';
		    if(!empty($display_caption))
		    {
		    	//Get image meta data
		    	$image_id = photography_get_image_id($image_portrait);
		    	$image_caption = get_post_field('post_excerpt', $image_id);
		    	
		    	if(!empty($image_caption))
		    	{
		    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
		    	}
		    }
		    $return_html.= '</div>';
		}
		$return_html.= '</div>';
	}
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	$return_html.= '<div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_three_images_block', 'ppb_three_images_block_func');


function ppb_four_images_block_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'image1' => '',
		'image2' => '',
		'image3' => '',
		'image4' => '',
		'display_caption' => 1,
		'padding' => 0,
		'bgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).'" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	//First image
	$return_html.= '<div class="one_half grid4">';
	if(!empty($image1))
	{
		$image_id = photography_get_image_id($image1);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image1).'" class="img_frame"><img src="'.esc_url($image1).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image1);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	//Second image
	$return_html.= '<div class="one_half last grid4">';
	if(!empty($image2))
	{
		$image_id = photography_get_image_id($image2);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image2).'" class="img_frame"><img src="'.esc_url($image2).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image2);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	$return_html.= '<br class="clear"/>';
	
	//Third image
	$return_html.= '<div class="one_half grid4">';
	if(!empty($image3))
	{
		$image_id = photography_get_image_id($image3);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand animate"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image3).'" class="img_frame"><img src="'.esc_url($image3).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image3);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	//Fourth image
	$return_html.= '<div class="one_half last grid4 animate">';
	if(!empty($image4))
	{
		$image_id = photography_get_image_id($image4);
		$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	    $return_html.= '<div class="image_classic_frame expand"><div class="image_wrapper">';
	    $return_html.= '<a href="'.esc_url($image4).'" class="img_frame"><img src="'.esc_url($image4).'" alt="'.esc_attr($image_alt).'" class="portfolio_img"/></a>';
	    $return_html.= '</div>';
	    if(!empty($display_caption))
	    {
	    	//Get image meta data
	    	$image_id = photography_get_image_id($image4);
	    	$image_caption = get_post_field('post_excerpt', $image_id);
	    	
	    	if(!empty($image_caption))
	    	{
	    		$return_html.= '<div class="image_caption">'.$image_caption.'</div>';
	    	}
	    }
	    $return_html.= '</div>';
	}
	$return_html.= '</div>';
	
	$return_html.= '</div>';
	$return_html.= '</div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';

	return $return_html;

}

add_shortcode('ppb_four_images_block', 'ppb_four_images_block_func');


function ppb_portfolio_slider_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 9,
		'cat' => '',
		'order' => 'default',
		'autoplay' => '',
		'timer' => 5,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 9;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_portfolio '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$portfolio_order = 'ASC';
	$portfolio_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'menu_order';
		break;
		
		case 'newest':
			$portfolio_order = 'DESC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'oldest':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'title':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'title';
		break;
		
		case 'random':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'rand';
		break;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	if(!empty($portfolios_arr) && is_array($portfolios_arr))
	{
		wp_enqueue_script("flexslider-js", get_template_directory_uri()."/js/flexslider/jquery.flexslider-min.js", false, THEMEVERSION, true);
		wp_enqueue_script("script-gallery-flexslider", get_template_directory_uri()."/templates/script-portfolio-flexslider.php?autoplay=".$autoplay.'&amp;timer='.$timer, false, THEMEVERSION, true);
	
		$return_html.= '<div class="slider_wrapper portfolio">';
		$return_html.= '<div class="flexslider tg_gallery" data-height="750">';
		$return_html.= '<ul class="slides">';
	
		foreach($portfolios_arr as $key => $portfolio)
		{
			$image_url = '';
			$portfolio_ID = $portfolio->ID;
					
			if(has_post_thumbnail($portfolio_ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Begin display HTML
			$return_html.= '<li>';
			
			if(!empty($image_url[0]))
			{
				$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
			    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
			    
			    switch($portfolio_type)
			    {
				    case 'External Link':
						$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				
						$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'">';
				        
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
	        	    default:
	
			        	$return_html.= '<a href="'.get_permalink($portfolio_ID).'">';
		        
				    break;
				    //end external link
	        	    
	        	    case 'Image':
				
						$return_html.= '<a data-caption="'.esc_attr($portfolio->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery">';
				
				    break;
				    //end image
				    
				    case 'Youtube Video':
				
						$return_html.= '<a href="https://www.youtube.com/embed/'.esc_attr($portfolio_video_id).'" class="lightbox_youtube" data-options="width:900, height:488">';
				
				    break;
				    //end youtube
				
				case 'Vimeo Video':
	
						$return_html.= '<a href="https://player.vimeo.com/video/'.esc_attr($portfolio_video_id).'?badge=0" class="lightbox_vimeo" data-options="width:900, height:506">';
				
				    break;
				    //end vimeo
				    
					case 'Self-Hosted Video':
				
				    //Get video URL
				    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
				    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				    
						$return_html.= '<a href="'.esc_url($portfolio_mp4_url).'" class="lightbox_vimeo">';
				
				    break;
				    //end self-hosted
			    }
			    //end switch
			}
			
			//Display portfolio detail
			if(isset($image_url[0]) && !empty($image_url[0]))
			{
				$return_html.= '<div class="portfolio_slider_overlay"></div>';
				$return_html.= '<img src="'.esc_url($image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/>';
			}
			
			$return_html.= '<div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_slider_desc">';
            $return_html.= '<h3>'.$portfolio->post_title.'</h3>';
            $return_html.= '<div class="post_detail">'.$portfolio->post_excerpt.'</div>';
            $return_html.= '</div>';
            $return_html.= '</a>';
			$return_html.= '</li>';
		}
	}
	
	$return_html.= '</ul></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_portfolio_slider', 'ppb_portfolio_slider_func');


function ppb_portfolio_classic_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 9,
		'cat' => '',
		'columns' => 2,
		'order' => 'default',
		'custom_css' => '',
		'layout' => 'contain',
		'items_ini' => 0,
		'filterable' => 'hide',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 9;
	}
	$all_items = $items;
	
	if(!is_numeric($columns))
	{
		$columns = 2;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_portfolio '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper ';
	
	if($layout == 'fullwidth')
	{
		$return_html.='fullwidth';
	}
	
	$return_html.= '">';
	
	$portfolio_order = 'ASC';
	$portfolio_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'menu_order';
		break;
		
		case 'newest':
			$portfolio_order = 'DESC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'oldest':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'title':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'title';
		break;
		
		case 'random':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'rand';
		break;
	}
	
	if($items_ini > 0)
	{
		$items = $items_ini;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	$wrapper_class = '';
	$grid_wrapper_class = '';
	$column_class = '';
	
	switch($columns)
	{
		case 2:
			$wrapper_class = 'two_cols';
			$grid_wrapper_class = 'classic2_cols';
			$column_class = 'one_half gallery2';
		break;
		
		case 3:
			$wrapper_class = 'three_cols';
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
		break;
		
		case 4:
			$wrapper_class = 'four_cols';
			$grid_wrapper_class = 'classic4_cols';
			$column_class = 'one_fourth gallery4';
		break;
	}
	
	//Check if enable infinite scroll
	$custom_id = time().rand();
	
	if($items_ini > 0)
	{
		wp_register_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.php?id=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=grid&action=photography_portfolio_classic', false, THEMEVERSION, true);
		$params = array(
		  'ajaxurl' => admin_url('admin-ajax.php'),
		  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
		);
		
		wp_localize_script("photography-script-portfolio-infinite-scroll-".$custom_id, 'tgAjax', $params );
		wp_enqueue_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.phpid=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=grid&action=photography_portfolio_classic', false, THEMEVERSION, true);
	}
	
	if(!empty($portfolios_arr) && is_array($portfolios_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
		
		//Check if display filterable
		if($filterable == 'display')
		{
			//Get all sets and sorting option
			$tg_portfolio_filterable_sort = kirki_get_option('tg_portfolio_filterable_sort');
		
			//Get all portfolio sets
			$sets_arr = get_terms('portfoliosets', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_portfolio_filterable_sort);
			    
			if(!empty($sets_arr))
			{
				$return_html.= '<ul class="portfolio_wall_filters portfolio-main filter full">';
					
				foreach($sets_arr as $key => $set_item)
				{
				    $filter_link_url = get_term_link($set_item);
					
					$return_html.= '<li class="cat-item '.esc_attr($set_item->slug).'" data-type="'.esc_attr($set_item->slug).'" style="clear:none">
						<a href="'.esc_attr($filter_link_url).'" title="'.esc_attr($set_item->name).'">'.$set_item->name.'</a>
						<span class="separator">/</span>
					</li>';
				}
	
				$return_html.= '</ul>';
			}
		}
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_filter_wrapper gallery portfolio-content section content clearfix '.esc_attr($wrapper_class).' ' .esc_attr($layout).'">';
	
		foreach($portfolios_arr as $key => $portfolio)
		{
			$image_url = '';
			$portfolio_ID = $portfolio->ID;
					
			if(has_post_thumbnail($portfolio_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-grid', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Begin display HTML
			$return_html.= '<div class="element '.esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' classic filterable static animated'.($key+1).'">';
			
			if(!empty($image_url[0]))
			{
				$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
			    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
			    
			    switch($portfolio_type)
			    {
				    case 'External Link':
						$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				
						$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-chain"></i>
								</div>
							</div></a>';
				        
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
	        	    default:
	
			        	$return_html.= '<a href="'.get_permalink($portfolio_ID).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-mail-forward"></i>
								</div>
							</div></a>';
		        
				    break;
				    //end external link
	        	    
	        	    case 'Image':
				
						$return_html.= '<a data-caption="'.esc_attr($portfolio->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-search-plus"></i>
								</div>
							</div></a>';
				
				    break;
				    //end image
				    
				    case 'Youtube Video':
				
						$return_html.= '<a href="https://www.youtube.com/embed/'.esc_attr($portfolio_video_id).'" class="lightbox_youtube" data-options="width:900, height:488"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-play"></i>
								</div>
							</div></a>';
				
				    break;
				    //end youtube
				
				case 'Vimeo Video':
	
						$return_html.= '<a href="https://player.vimeo.com/video/'.esc_attr($portfolio_video_id).'?badge=0" class="lightbox_vimeo" data-options="width:900, height:506"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-play"></i>
								</div>
							</div></a>';
				
				    break;
				    //end vimeo
				    
				case 'Self-Hosted Video':
				
				    //Get video URL
				    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
				    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				    
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($portfolio_mp4_url).'" class="lightbox_vimeo"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-play"></i>
								</div>
							</div></a>';
				
				    break;
				    //end self-hosted
			    }
			    //end switch
			}
			$return_html.= '</div>';
			
			//Display portfolio detail
			$return_html.= '<br class="clear"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_desc portfolio'.esc_attr($columns).' ' .esc_attr($layout).' filterable">';
            $return_html.= '<h5>'.$portfolio->post_title.'</h5>';
            $return_html.= '<div class="post_detail">'.$portfolio->post_excerpt.'</div>';
			$return_html.= '</div>';
			
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		//Check if enable infinite scroll
		if($items > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items_ini).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr($all_items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_portfolio_classic', 'ppb_portfolio_classic_func');


function ppb_portfolio_classic_masonry_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 9,
		'cat' => '',
		'columns' => 2,
		'order' => 'default',
		'custom_css' => '',
		'layout' => 'contain',
		'items_ini' => 0,
		'filterable' => 'hide',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 9;
	}
	$all_items = $items;
	
	if(!is_numeric($columns))
	{
		$columns = 2;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_portfolio '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper ';
	
	if($layout == 'fullwidth')
	{
		$return_html.='fullwidth';
	}
	
	$return_html.= '">';
	
	$portfolio_order = 'ASC';
	$portfolio_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'menu_order';
		break;
		
		case 'newest':
			$portfolio_order = 'DESC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'oldest':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'title':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'title';
		break;
		
		case 'random':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'rand';
		break;
	}
	
	if($items_ini > 0)
	{
		$items = $items_ini;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	$wrapper_class = '';
	$grid_wrapper_class = '';
	$column_class = '';
	
	switch($columns)
	{
		case 2:
			$wrapper_class = 'two_cols';
			$grid_wrapper_class = 'classic2_cols';
			$column_class = 'one_half gallery2';
		break;
		
		case 3:
			$wrapper_class = 'three_cols';
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
		break;
		
		case 4:
			$wrapper_class = 'four_cols';
			$grid_wrapper_class = 'classic4_cols';
			$column_class = 'one_fourth gallery4';
		break;
	}
	
	//Check if enable infinite scroll
	$custom_id = time().rand();
	
	if($items_ini > 0)
	{
		wp_register_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.php?id=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=masonry&action=photography_portfolio_classic', false, THEMEVERSION, true);
		$params = array(
		  'ajaxurl' => admin_url('admin-ajax.php'),
		  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
		);
		
		wp_localize_script("photography-script-portfolio-infinite-scroll-".$custom_id, 'tgAjax', $params );
		wp_enqueue_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.phpid=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=masonry&action=photography_portfolio_classic', false, THEMEVERSION, true);
	}
	
	if(!empty($portfolios_arr) && is_array($portfolios_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
		
		//Check if display filterable
		if($filterable == 'display')
		{
			//Get all sets and sorting option
			$tg_portfolio_filterable_sort = kirki_get_option('tg_portfolio_filterable_sort');
		
			//Get all portfolio sets
			$sets_arr = get_terms('portfoliosets', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_portfolio_filterable_sort);
			    
			if(!empty($sets_arr))
			{
				$return_html.= '<ul class="portfolio_wall_filters portfolio-main filter full">';
					
				foreach($sets_arr as $key => $set_item)
				{
				    $filter_link_url = get_term_link($set_item);
					
					$return_html.= '<li class="cat-item '.esc_attr($set_item->slug).'" data-type="'.esc_attr($set_item->slug).'" style="clear:none">
						<a href="'.esc_attr($filter_link_url).'" title="'.esc_attr($set_item->name).'">'.$set_item->name.'</a>
						<span class="separator">/</span>
					</li>';
				}
	
				$return_html.= '</ul>';
			}
		}
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_filter_wrapper gallery portfolio-content section content clearfix '.esc_attr($wrapper_class).' ' .esc_attr($layout).'">';
	
		foreach($portfolios_arr as $key => $portfolio)
		{
			$image_url = '';
			$portfolio_ID = $portfolio->ID;
					
			if(has_post_thumbnail($portfolio_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-masonry', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Begin display HTML
			$return_html.= '<div class="element '.esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' classic filterable static animated'.($key+1).'">';
			
			if(!empty($image_url[0]))
			{
				$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
			    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
			    
			    switch($portfolio_type)
			    {
			    	case 'External Link':
						$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				
						$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-chain"></i>
								</div>
							</div></a>';
				        
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
	        	    default:
	
			        	$return_html.= '<a href="'.get_permalink($portfolio_ID).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-mail-forward"></i>
								</div>
							</div></a>';
		        
				    break;
				    //end external link
	        	    
	        	    case 'Image':
				
						$return_html.= '<a data-caption="'.esc_attr($portfolio->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-search-plus"></i>
								</div>
							</div></a>';
				
				    break;
				    //end image
				    
				    case 'Youtube Video':
				
						$return_html.= '<a href="https://www.youtube.com/embed/'.esc_attr($portfolio_video_id).'" class="lightbox_youtube" data-options="width:900, height:488"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-play"></i>
								</div>
							</div></a>';
				
				    break;
				    //end youtube
				
				case 'Vimeo Video':
	
						$return_html.= '<a href="https://player.vimeo.com/video/'.esc_attr($portfolio_video_id).'?badge=0" class="lightbox_vimeo" data-options="width:900, height:506"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-play"></i>
								</div>
							</div></a>';
				
				    break;
				    //end vimeo
				    
				case 'Self-Hosted Video':
				
				    //Get video URL
				    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
				    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				    
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($portfolio_mp4_url).'" class="lightbox_vimeo"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div class="portfolio_classic_icon_wrapper">
								<div class="portfolio_classic_icon_content">
									<i class="fa fa-play"></i>
								</div>
							</div></a>';
				
				    break;
				    //end self-hosted
			    }
			    //end switch
			}
			$return_html.= '</div>';
			
			//Display portfolio detail
			$return_html.= '<br class="clear"/><div id="portfolio_desc_'.$portfolio_ID.'" class="portfolio_desc portfolio'.$columns.' ' .esc_attr($layout).' filterable">';
            $return_html.= '<h5>'.$portfolio->post_title.'</h5>';
            $return_html.= '<div class="post_detail">'.$portfolio->post_excerpt.'</div>';
			$return_html.= '</div>';
			
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		//Check if enable infinite scroll
		if($items > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items_ini).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr($all_items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_portfolio_classic_masonry', 'ppb_portfolio_classic_masonry_func');


function ppb_portfolio_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 9,
		'cat' => '',
		'columns' => 2,
		'order' => 'default',
		'custom_css' => '',
		'layout' => 'contain',
		'items_ini' => 0,
		'filterable' => 'hide',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 9;
	}
	$all_items = $items;
	
	if(!is_numeric($columns))
	{
		$columns = 2;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_portfolio '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper ';
	
	if($layout == 'fullwidth')
	{
		$return_html.='fullwidth';
	}
	
	$return_html.= '">';
	
	$portfolio_order = 'ASC';
	$portfolio_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'menu_order';
		break;
		
		case 'newest':
			$portfolio_order = 'DESC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'oldest':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'title':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'title';
		break;
		
		case 'random':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'rand';
		break;
	}
	
	if($items_ini > 0)
	{
		$items = $items_ini;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	$wrapper_class = '';
	$grid_wrapper_class = '';
	$column_class = '';
	
	switch($columns)
	{
		case 2:
			$wrapper_class = 'two_cols';
			$grid_wrapper_class = 'classic2_cols';
			$column_class = 'one_half gallery2';
		break;
		
		case 3:
			$wrapper_class = 'three_cols';
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
		break;
		
		case 4:
			$wrapper_class = 'four_cols';
			$grid_wrapper_class = 'classic4_cols';
			$column_class = 'one_fourth gallery4';
		break;
	}
	
	//Check if enable infinite scroll
	$custom_id = time().rand();
	
	if($items_ini > 0)
	{
		wp_register_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.php?id=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=grid', false, THEMEVERSION, true);
		$params = array(
		  'ajaxurl' => admin_url('admin-ajax.php'),
		  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
		);
		
		wp_localize_script("photography-script-portfolio-infinite-scroll-".$custom_id, 'tgAjax', $params );
		wp_enqueue_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.phpid=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=grid', false, THEMEVERSION, true);
	}
	
	if(!empty($portfolios_arr) && is_array($portfolios_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
		
		//Check if display filterable
		if($filterable == 'display')
		{
			//Get all sets and sorting option
			$tg_portfolio_filterable_sort = kirki_get_option('tg_portfolio_filterable_sort');
		
			//Get all portfolio sets
			$sets_arr = get_terms('portfoliosets', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_portfolio_filterable_sort);
			    
			if(!empty($sets_arr))
			{
				$return_html.= '<ul class="portfolio_wall_filters portfolio-main filter full">';
					
				foreach($sets_arr as $key => $set_item)
				{
				    $filter_link_url = get_term_link($set_item);
					
					$return_html.= '<li class="cat-item '.esc_attr($set_item->slug).'" data-type="'.esc_attr($set_item->slug).'" style="clear:none">
						<a href="'.esc_attr($filter_link_url).'" title="'.esc_attr($set_item->name).'">'.$set_item->name.'</a>
						<span class="separator">/</span>
					</li>';
				}
	
				$return_html.= '</ul>';
			}
		}
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_filter_wrapper gallery portfolio-content section content clearfix '.esc_attr($wrapper_class).' ' .esc_attr($layout).'" data-items="'.esc_attr($all_items).'" data-cat="'.esc_attr($cat).'">';
	
		foreach($portfolios_arr as $key => $portfolio)
		{
			$image_url = '';
			$portfolio_ID = $portfolio->ID;
					
			if(has_post_thumbnail($portfolio_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-grid', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Begin display HTML
			$return_html.= '<div class="element '.esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' filterable static animated'.($key+1).' portfolio_type">';
			
			if(!empty($image_url[0]))
			{
				$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
			    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
			    
			    switch($portfolio_type)
			    {
				    case 'External Link':
						$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				
						$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				        
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
	        	    default:
	
			        	$return_html.= '<a href="'.get_permalink($portfolio_ID).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
		        
				    break;
				    //end external link
	        	    
	        	    case 'Image':
				
						$return_html.= '<a data-title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end image
				    
				    case 'Youtube Video':
				
						$return_html.= '<a href="https://www.youtube.com/embed/'.esc_attr($portfolio_video_id).'" class="lightbox_youtube" data-options="width:900, height:488"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end youtube
				
				case 'Vimeo Video':
	
						$return_html.= '<a href="https://player.vimeo.com/video/'.esc_attr($portfolio_video_id).'?badge=0" class="lightbox_vimeo" data-options="width:900, height:506"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end vimeo
				    
				case 'Self-Hosted Video':
				
				    //Get video URL
				    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
				    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				    
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($portfolio_mp4_url).'" class="lightbox_vimeo"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
			    //end self-hosted
			    }
			    //end switch
			}
			$return_html.= '</div>';
			
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		//Check if enable infinite scroll
		if($items > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items_ini).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr($all_items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_portfolio_grid', 'ppb_portfolio_grid_func');


function ppb_portfolio_mixed_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 9,
		'cat' => '',
		'order' => 'default',
		'custom_css' => '',
		'layout' => 'contain',
		'items_ini' => 0,
		'filterable' => 'hide',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 9;
	}
	$original_items = $items;
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_mixed_portfolio '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper ';
	
	if($layout == 'fullwidth')
	{
		$return_html.='fullwidth';
	}
	
	$return_html.= '">';
	
	$portfolio_order = 'ASC';
	$portfolio_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'menu_order';
		break;
		
		case 'newest':
			$portfolio_order = 'DESC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'oldest':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'title':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'title';
		break;
		
		case 'random':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'rand';
		break;
	}
	
	if($items_ini > 0)
	{
		$items = $items_ini;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	
	//Get all portfolio items
	$args = array(
	    'numberposts' => -1,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_all_arr = get_posts($args);
	
	if($items_ini > 0 && count($portfolios_all_arr) < $original_items)
	{
		$all_items = count($portfolios_all_arr);
	}
	else
	{
		$all_items = $original_items;	
	}
	
	//Check if enable infinite scroll
	$custom_id = time().rand();
	
	if(!empty($portfolios_arr) && is_array($portfolios_arr))
	{
		$return_html.= '<div class="standard_wrapper">';
		
		if(!empty($title))
		{
			$return_html.= '<div class="portfolio_title_wrapper"><h2 class="ppb_title alignleft">'.$title.'</h2>';
		}
		
		//Check if display filterable
		if($filterable == 'display')
		{
			//Get all sets and sorting option
			$tg_portfolio_filterable_sort = kirki_get_option('tg_portfolio_filterable_sort');
		
			//Get all portfolio sets
			$sets_arr = get_terms('portfoliosets', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_portfolio_filterable_sort);
			    
			if(!empty($sets_arr))
			{
				$return_html.= '<ul class="portfolio_wall_filters portfolio-main filter full ';
				
				if(!empty($title))
				{
					$return_html.= 'alignright';
				}
				
				$return_html.= '">';
				
				//Get all portfolio page URL
				$tg_portfolio_url = kirki_get_option('tg_portfolio_url');
				
				if(!empty($tg_portfolio_url))
				{
				    $return_html.= '<li style="clear:none">
				    <a href="'.esc_attr($tg_portfolio_url).'" title="'.esc_html__('All', 'photography-translation' ).'">'.esc_html__('All', 'photography-translation' ).'</a>
				    <span class="separator">/</span>
				</li>';
				}
					
				foreach($sets_arr as $key => $set_item)
				{
				    $term_meta = get_option( "taxonomy_term_".$set_item->term_id );

					if(isset($term_meta['portfoliosets_custom_url']) && !empty($term_meta['portfoliosets_custom_url']))
					{
						$filter_link_url = $term_meta['portfoliosets_custom_url'];
					}
					else
					{
				    	$filter_link_url = get_term_link($set_item);
				    }
					
					$return_html.= '<li class="cat-item '.esc_attr($set_item->slug).'" data-type="'.esc_attr($set_item->slug).'" style="clear:none">
						<a href="'.esc_attr($filter_link_url).'" title="'.esc_attr($set_item->name).'">'.$set_item->name.'</a>
						<span class="separator">/</span>
					</li>';
				}
	
				$return_html.= '</ul>';
			}
		}
		
		if(!empty($title))
		{
			$return_html.= '</div><br class="clear"/>';
		}
		
		if($layout == 'wide')
		{
			$return_html.= '</div>';
		}
		
		//Define columns class
		$wrapper_class = 'three_cols';
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_mixed_filter_wrapper gallery portfolio-content section content clearfix '.esc_attr($wrapper_class).' ' .esc_attr($layout).'" data-items="'.esc_attr($all_items).'" data-cat="'.esc_attr($cat).'">';
	
		$large_counter = 1;
		$next_number_to_add = 4;
		$next_trigger = 1;
		
		foreach($portfolios_arr as $key => $portfolio)
		{
			//Calculated columns size
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
			$photography_image_size = 'photography-gallery-grid';
			
			$large_counter_trigger = FALSE;
			
			if($next_trigger == $key+1)
			{
				$large_counter_trigger = TRUE;
				$next_trigger = $next_trigger+$next_number_to_add;
				
				if($next_number_to_add == 4)
				{
					$next_number_to_add = 2;
				}
				else if($next_number_to_add==2)
				{
					$next_number_to_add = 4;
				}
			}
			
			if($large_counter_trigger)
			{
				$wrapper_class = 'three_cols double_size';
				$grid_wrapper_class = 'classic3_cols double_size';
				$column_class = 'one_third gallery3 double_size';
				$photography_image_size = 'photography-gallery-grid-large';
			}
			
			$large_counter++;
		
			$image_url = '';
			$portfolio_ID = $portfolio->ID;
					
			if(has_post_thumbnail($portfolio_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, $photography_image_size, true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Begin display HTML
			$return_html.= '<div class="element '.esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' filterable static'.($key+1).' portfolio_type">';
			
			if(!empty($image_url[0]))
			{
				$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
			    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
			    
			    switch($portfolio_type)
			    {
				    case 'External Link':
						$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				
						$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				        
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
	        	    default:
	
			        	$return_html.= '<a href="'.get_permalink($portfolio_ID).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
		        
				    break;
				    //end external link
	        	    
	        	    case 'Image':
				
						$return_html.= '<a data-title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end image
				    
				    case 'Youtube Video':
				
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="#video_'.$portfolio_video_id.'" class="lightbox_youtube"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
						
			            $return_html.= '
			            <div style="display:none;">
						    <div id="video_'.$portfolio_video_id.'" class="video-container">
						        
						        <iframe title="YouTube video player" width="900" height="488" src="https://www.youtube.com/embed/'.$portfolio_video_id.'?theme=dark&amp;rel=0&amp;wmode=transparent" allowfullscreen></iframe>
						        
						    </div>	
						</div>';
				
				    break;
				    //end youtube
				
				case 'Vimeo Video':
	
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="#video_'.$portfolio_video_id.'" class="lightbox_vimeo"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
			
			            $return_html.= '
			            <div style="display:none;">
						    <div id="video_'.$portfolio_video_id.'" class="video-container">
						    
						        <iframe src="https://player.vimeo.com/video/'.$portfolio_video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="900" height="506"></iframe>
						        
						    </div>	
						</div>';
				
				    break;
				    //end vimeo
				    
				case 'Self-Hosted Video':
				
				    //Get video URL
				    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
				    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				    
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="#video_self_'.$key.'" class="lightbox_vimeo"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
			
						$return_html.= '
						<div style="display:none;">
						    <div id="video_self_'.$key.'" class="video-container">
						    
						        <div id="self_hosted_vid_'.$key.'"></div>
						        '.do_shortcode('[tg_jwplayer id="self_hosted_vid_'.$key.'" file="'.esc_url($portfolio_mp4_url).'" image="'.esc_url($preview_image[0]).'" width="900" height="488"]').'
						        
						    </div>	
						</div>';
				
				    break;
			    //end self-hosted
			    }
			    //end switch
			}
			$return_html.= '</div>';
			
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		$return_html.= '<script>';
		$return_html.= '
		jQuery(window).load(function(){ 
			var containWidth = jQuery("#'.esc_js($custom_id).'").width();
			jQuery("#'.esc_js($custom_id).'").css("width", containWidth+"px");
		
			jQuery("#'.esc_js($custom_id).'").masonry({
			  itemSelector: ".element",
			  isResizable: true,
			  columnWidth: Math.floor(jQuery("#'.esc_js($custom_id).'").width()/ 3)
			});
			
			jQuery(window).resize(function () {
				jQuery("#'.esc_js($custom_id).'").css("width", "100%");
				var containWidth = jQuery("#'.esc_js($custom_id).'").width();
				jQuery("#'.esc_js($custom_id).'").css("width", containWidth+"px");
			
				jQuery("#'.esc_js($custom_id).'").masonry({
				  itemSelector: ".element",
				  isResizable: true,
				  columnWidth: Math.floor(jQuery("#'.esc_js($custom_id).'").width()/ 3)
				});
			});
			
			jQuery("#'.esc_js($custom_id).'").imagesLoaded( function(){
			    jQuery("#'.esc_js($custom_id).'").children(".element").children(".portfolio_type").each(function(){
				    jQuery(this).addClass("fadeIn");
			    });
			});
		});';
		$return_html.= '</script>';
		
		//Check if enable infinite scroll
		if($items_ini > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items_ini).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr($all_items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
			
			//Print contact form javascript code
			$params = array(
			  'ajaxurl' => admin_url('admin-ajax.php'),
			  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
			);
			
			$return_html.= '<script>';
			$return_html.='
				function loadPortfolioImage'.esc_js($custom_id).'()
				{
					if(jQuery("#'.esc_js($custom_id).'_status").val() == 0)
					{
						var currentOffset = parseInt(jQuery("#'.esc_js($custom_id).'_offset").val());
						jQuery("#'.esc_js($custom_id).'_loading").addClass("visible");
					
						jQuery.ajax({
					        url: "'.esc_url($params['ajaxurl']).'",
					        type:"POST",
					        data: "action=photography_portfolio_grid&cat='.esc_js($cat).'&items='.esc_js($all_items).'&items_ini='. esc_js($items_ini).'&offset="+currentOffset+"&columns='.esc_js($columns).'&type=grid&order='.esc_js($portfolio_order).'&order_by='.esc_js($portfolio_order_by).'&layout='.esc_js($layout).'&tg_security='.$params['ajax_nonce'].'", 
					        success: function(html)
					        {
					        	jQuery("#'.esc_js($custom_id).'_offset").val(parseInt(currentOffset+'.esc_js($items_ini).'));
	        	
					            var newItems = jQuery(html);
								jQuery("#'.esc_js($custom_id).'").isotope( "insert", newItems );
								
								jQuery("#'.esc_js($custom_id).'").imagesLoaded(function(){
									jQuery("#'.esc_js($custom_id).'").children(".element").children(".portfolio_type").each(function(){
									    jQuery(this).addClass("fadeIn");
								    });
								    
								    jQuery("#'.esc_js($custom_id).'").isotope("reloadItems").isotope({ sortBy: "original-order" });
								});
								
								jQuery(document).setiLightbox();
								
								jQuery("#'.esc_js($custom_id).'_loading").removeClass("visible");
					        }
					    });
					}
				}
				
				jQuery(window).load(function(){ 
					jQuery(document).ajaxStart(function() {
					  	jQuery("#'.esc_js($custom_id).'_status").val(1);
					});
					
					jQuery(document).ajaxStop(function() {
					  	jQuery("#'.esc_js($custom_id).'_status").val(0);
					});
				
					if (jQuery(document).height() <= jQuery(window).height())
					{
				        var currentOffset = parseInt(jQuery("#'.esc_js($custom_id).'_offset").val());
						var total = parseInt(jQuery("#'.esc_js($custom_id).'_total").val());
						
						if (currentOffset > total)
					    {
					        return false;
					    }
					    else
					    {
					        loadPortfolioImage'.esc_js($custom_id).'();
					    }
				    }
				
					jQuery(window).on("scroll", function() {
						var currentOffset = parseInt(jQuery("#'.esc_js($custom_id).'_offset").val());
						var total = parseInt(jQuery("#'.esc_js($custom_id).'_total").val());
						var wrapperHeight = jQuery(this).height();
						
						if(jQuery(window).height() > 1000)
						{
						    var targetOffset = parseInt(jQuery("#'.esc_js($custom_id).'").offset().top/2);
						}
						else
						{
						    var targetOffset = jQuery("#'.esc_js($custom_id).'").offset().top;
						}
					
					    if(jQuery(window).scrollTop() > targetOffset)
					    {
					    	if (currentOffset >= total)
					    	{
					    		return false;
					    	}
					    	else
					    	{
					    		loadPortfolioImage'.esc_js($custom_id).'();
					    	}
					    }
					});
				});
			';
			$return_html.= '</script>';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_portfolio_mixed_grid', 'ppb_portfolio_mixed_grid_func');


function ppb_portfolio_grid_masonry_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 9,
		'cat' => '',
		'columns' => 2,
		'order' => 'default',
		'custom_css' => '',
		'layout' => 'contain',
		'items_ini' => 0,
		'filterable' => 'hide',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 9;
	}
	$all_items = $items;
	
	if(!is_numeric($columns))
	{
		$columns = 2;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="ppb_portfolio '.$size.' nopadding ';
	
	$return_html.= '" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper ';
	
	if($layout == 'fullwidth')
	{
		$return_html.='fullwidth';
	}
	
	$return_html.= '">';
	
	$portfolio_order = 'ASC';
	$portfolio_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'menu_order';
		break;
		
		case 'newest':
			$portfolio_order = 'DESC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'oldest':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'post_date';
		break;
		
		case 'title':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'title';
		break;
		
		case 'random':
			$portfolio_order = 'ASC';
			$portfolio_order_by = 'rand';
		break;
	}
	
	if($items_ini > 0)
	{
		$items = $items_ini;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $portfolio_order,
	    'orderby' => $portfolio_order_by,
	    'post_type' => array('portfolios'),
	    'suppress_filters' => false,
	);
	
	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	$wrapper_class = '';
	$grid_wrapper_class = '';
	$column_class = '';
	
	switch($columns)
	{
		case 2:
			$wrapper_class = 'two_cols';
			$grid_wrapper_class = 'classic2_cols';
			$column_class = 'one_half gallery2';
		break;
		
		case 3:
			$wrapper_class = 'three_cols';
			$grid_wrapper_class = 'classic3_cols';
			$column_class = 'one_third gallery3';
		break;
		
		case 4:
			$wrapper_class = 'four_cols';
			$grid_wrapper_class = 'classic4_cols';
			$column_class = 'one_fourth gallery4';
		break;
	}
	
	//Check if enable infinite scroll
	$custom_id = time().rand();
	
	if($items_ini > 0)
	{
		wp_register_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.php?id=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=masonry', false, THEMEVERSION, true);
		$params = array(
		  'ajaxurl' => admin_url('admin-ajax.php'),
		  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
		);
		
		wp_localize_script("photography-script-portfolio-infinite-scroll-".$custom_id, 'tgAjax', $params );
		wp_enqueue_script("photography-script-portfolio-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-infinite-scroll.phpid=".$custom_id.'&cat='.$cat.'&items='.$all_items.'&items_ini='.$items_ini.'&columns='.$columns.'&order='.$portfolio_order.'&order_by='.$portfolio_order_by.'&type=masonry', false, THEMEVERSION, true);
	}
	
	if(!empty($portfolios_arr) && is_array($portfolios_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
		
		//Check if display filterable
		if($filterable == 'display')
		{
			//Get all sets and sorting option
			$tg_portfolio_filterable_sort = kirki_get_option('tg_portfolio_filterable_sort');
		
			//Get all portfolio sets
			$sets_arr = get_terms('portfoliosets', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$tg_portfolio_filterable_sort);
			    
			if(!empty($sets_arr))
			{
				$return_html.= '<ul class="portfolio_wall_filters portfolio-main filter full">';
					
				foreach($sets_arr as $key => $set_item)
				{
				    $filter_link_url = get_term_link($set_item);
					
					$return_html.= '<li class="cat-item '.esc_attr($set_item->slug).'" data-type="'.esc_attr($set_item->slug).'" style="clear:none">
						<a href="'.esc_attr($filter_link_url).'" title="'.esc_attr($set_item->name).'">'.$set_item->name.'</a>
						<span class="separator">/</span>
					</li>';
				}
	
				$return_html.= '</ul>';
			}
		}
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_filter_wrapper gallery portfolio-content section content clearfix '.esc_attr($wrapper_class).' ' .esc_attr($layout).'">';
	
		foreach($portfolios_arr as $key => $portfolio)
		{
			$image_url = '';
			$portfolio_ID = $portfolio->ID;
					
			if(has_post_thumbnail($portfolio_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($portfolio_ID);
			    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
			    
			    $small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-masonry', true);
			}
			
			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
			
			if(empty($portfolio_link_url))
			{
			    $permalink_url = get_permalink($portfolio_ID);
			}
			else
			{
			    $permalink_url = $portfolio_link_url;
			}
			
			//Begin display HTML
			$return_html.= '<div class="element '.esc_attr($grid_wrapper_class).'">';
			$return_html.= '<div class="'.esc_attr($column_class).' filterable static animated'.($key+1).' portfolio_type">';
			
			if(!empty($image_url[0]))
			{
				$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
			    $portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
			    
			    switch($portfolio_type)
			    {
			    	case 'External Link':
						$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
				
						$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				        
				    break;
				    //end external link
				    
				    case 'Portfolio Content':
	        	    default:
	
			        	$return_html.= '<a href="'.get_permalink($portfolio_ID).'"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
		        
				    break;
				    //end external link
	        	    
	        	    case 'Image':
				
						$return_html.= '<a data-title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end image
				    
				    case 'Youtube Video':
				
						$return_html.= '<a href="https://www.youtube.com/embed/'.esc_attr($portfolio_video_id).'" class="lightbox_youtube" data-options="width:900, height:488"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end youtube
				
				case 'Vimeo Video':
	
						$return_html.= '<a href="https://player.vimeo.com/video/'.esc_attr($portfolio_video_id).'?badge=0" class="lightbox_vimeo" data-options="width:900, height:506"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
				    //end vimeo
				    
				case 'Self-Hosted Video':
				
				    //Get video URL
				    $portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
				    $preview_image = wp_get_attachment_image_src($image_id, 'large', true);
				    
						$return_html.= '<a title="'.esc_attr($portfolio->post_title).'" href="'.esc_url($portfolio_mp4_url).'" class="lightbox_vimeo"><img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($portfolio->post_title).'"/><div id="portfolio_desc_'.esc_attr($portfolio_ID).'" class="portfolio_title">
	        					<div class="table">
	        						<div class="cell">
							            <h5>'.$portfolio->post_title.'</h5>
							            <div class="post_detail">'.$portfolio->post_excerpt.'</div>
	        						</div>
	        					</div>
					        </div></a>';
				
				    break;
			    //end self-hosted
			    }
			    //end switch
			}
			$return_html.= '</div>';
			
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		//Check if enable infinite scroll
		if($items > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items_ini).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr($all_items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_portfolio_grid_masonry', 'ppb_portfolio_grid_masonry_func');


function ppb_blog_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'cat' => '',
		'items' => '',
		'padding' => '',
		'custom_css' => '',
		'link_title' => '',
		'link_url' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	
	$return_html.= '<div '.$sec_id.' class="'.$size.' withsmallpadding"';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode($custom_css).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper"><div class="inner"><div class="inner_wrapper">';
	
	if(!is_numeric($items))
	{
		$items = 3;
	}
	
	//Get blog posts
	$args = array(
	    'numberposts' => $items,
	    'order' => 'DESC',
	    'orderby' => 'post_date',
	    'post_type' => array('post'),
	    'suppress_filters' => false,
	);

	if(!empty($cat))
	{
		$args['category'] = $cat;
	}
	$posts_arr = get_posts($args);
	
	if(!empty($posts_arr) && is_array($posts_arr))
	{
		$return_html.= '<div class="blog_grid_wrapper sidebar_content full_width ppb_blog_posts">';
	
		foreach($posts_arr as $key => $ppb_post)
		{
			$animate_layer = $key+7;
			$image_thumb = '';
										
			if(has_post_thumbnail($ppb_post->ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($ppb_post->ID);
			    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
			}
			
			$return_html.= '<div id="post-'.$ppb_post->ID.'" class="post type-post hentry status-publish">
			<div class="post_wrapper grid_layout">';
			
			 //Get post featured content
		    $post_ft_type = get_post_meta($ppb_post->ID, 'post_ft_type', true);
		    
		    switch($post_ft_type)
		    {
		    	case 'Image':
		    	default:
		        	if(!empty($image_thumb))
		        	{
		        		$small_image_url = wp_get_attachment_image_src($image_id, 'photography-blog', true);
		
		    	    $return_html.= '<div class="post_img small">
		    	    	<a href="'.esc_url(get_permalink($ppb_post->ID)).'">
		    	    		<img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($ppb_post->post_title).'" class=""/>
		                </a>
		    	    </div>';
		    		}
		    	break;
		    	
		    	case 'Vimeo Video':
		    		$post_ft_vimeo = get_post_meta($ppb_post->ID, 'post_ft_vimeo', true);
		
					$return_html.= do_shortcode('[tg_vimeo video_id="'.$post_ft_vimeo.'" width="670" height="377"]').'<br/>';
		    	break;
		    	
		    	case 'Youtube Video':
		    		$post_ft_youtube = get_post_meta($ppb_post->ID, 'post_ft_youtube', true);

		    		$return_html.= do_shortcode('[tg_youtube video_id="'.$post_ft_youtube.'" width="670" height="377"]').'<br/>';
		    	break;
		    	
		    	case 'Gallery':
		    		$post_ft_gallery = get_post_meta($ppb_post->ID, 'post_ft_gallery', true);
		    		$return_html.= do_shortcode('[tg_gallery_slider gallery_id="'.$post_ft_gallery.'" size="gallery_2" width="670" height="270"]');
		    	break;
		    	
		    } //End switch
		    
		    $return_html.= '<div class="blog_grid_content">';
		    
		    //Check post format
		    $post_format = get_post_format($ppb_post->ID);
		    
		    switch($post_format)
			{
			    case 'quote':
			
			    $return_html.= '<div class="post_quote_wrapper">
						<div class="post_quote_title">
						    '.$ppb_post->post_content.'
						</div>
						<div class="post_detail">
					        '.$ppb_post->post_title.'
						</div>
					</div>';
			    		    
				$return_html.= '</div>

			    	</div>
			    </div>';
			    
			    break;
			    
			    case 'link':
			
			    $return_html.= '
			    <div class="post_header quote">
			    	<div class="post_quote_title grid">
			    	'.$ppb_post->post_content.'
			    	<div class="post_detail">
			    	    	'.get_the_time(THEMEDATEFORMAT, $ppb_post->ID).'&nbsp;';
			    		    
						$post_categories = wp_get_post_categories($ppb_post->ID);
						if(!empty($post_categories))
						{
						 	$return_html.= esc_html__('In', 'photography-custom-post' ).'&nbsp;';
						 	
						    foreach($post_categories as $c)
						    {
						        $cat = get_category( $c );
						    	$return_html.= '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a>';
						    }
						}
			    		    
				$return_html.= '</div>';
			    	
				$return_html.= '
			    	</div>
			    </div>';

			    break;
			    
			    default:
		    
				$return_html.= '<div class="post_header grid">
				<div class="post_info_cat">';
				
				$post_categories = wp_get_post_categories($ppb_post->ID);
						    	
				$count_categories = count($post_categories);
				$i = 0;
				
				if(!empty($post_categories))
				{
				 	foreach($post_categories as $c)
				    {
				        $cat = get_category( $c );
				    	$return_html.= '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a>';
				    	
				    	if(++$i != $count_categories) 
						{
						    $return_html.= '&nbsp;/&nbsp;';
						}
				    }
				}
				
				$return_html.= '</div>
				<h6><a href="'.esc_url(get_permalink($ppb_post->ID)).'" title="'.get_the_title($ppb_post->ID).'">'.get_the_title($ppb_post->ID).'</a></h6>
				<hr class="title_break"/>
				<div class="post_detail">'.get_the_time(THEMEDATEFORMAT, $ppb_post->ID);
			    		    
				$return_html.= '</div>
				</div>';
				
				$return_html.= photography_substr($ppb_post->post_excerpt, 110);
		        break;
		    }
		    
		    $return_html.= '
	    </div>    
	</div>
</div>';
		}
		
		$return_html.= '</div>';
	}
	
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div></div>';
	
	if(!empty($link_title) && !empty($link_url))
	{
		$return_html.= '<br class="clear"/><div class="blog_recent_link">
		<a href="'.esc_url($link_url).'"><i class="fa fa-list-ul marginright middle"></i><h6>'.rawurldecode($link_title).'</h6></a>
	</div>';
		$return_html.= '<br class="clear"/><br/><hr class="small"/>';
	}
	
	return $return_html;
}

add_shortcode('ppb_blog_grid', 'ppb_blog_grid_func');


function ppb_blog_masonry_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'cat' => '',
		'items' => '',
		'padding' => '',
		'custom_css' => '',
		'link_title' => '',
		'link_url' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	
	$return_html.= '<div '.$sec_id.' class="'.$size.' withsmallpadding"';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode($custom_css).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper"><div class="inner"><div class="inner_wrapper">';
	
	if(!is_numeric($items))
	{
		$items = 3;
	}
	
	//Get blog posts
	$args = array(
	    'numberposts' => $items,
	    'order' => 'DESC',
	    'orderby' => 'post_date',
	    'post_type' => array('post'),
	    'suppress_filters' => false,
	);

	if(!empty($cat))
	{
		$args['category'] = $cat;
	}
	$posts_arr = get_posts($args);
	
	if(!empty($posts_arr) && is_array($posts_arr))
	{
		$return_html.= '<div class="blog_grid_wrapper sidebar_content full_width ppb_blog_posts">';
	
		foreach($posts_arr as $key => $ppb_post)
		{
			$animate_layer = $key+7;
			$image_thumb = '';
										
			if(has_post_thumbnail($ppb_post->ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($ppb_post->ID);
			    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
			}
			
			$return_html.= '<div id="post-'.$ppb_post->ID.'" class="post type-post hentry status-publish">
			<div class="post_wrapper grid_layout">';
			
			 //Get post featured content
		    $post_ft_type = get_post_meta($ppb_post->ID, 'post_ft_type', true);
		    
		    switch($post_ft_type)
		    {
		    	case 'Image':
		    	default:
		        	if(!empty($image_thumb))
		        	{
		        		$small_image_url = wp_get_attachment_image_src($image_id, 'photography-gallery-masonry', true);
		
		    	    $return_html.= '<div class="post_img small">
		    	    	<a href="'.esc_url(get_permalink($ppb_post->ID)).'">
		    	    		<img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($ppb_post->post_title).'" class=""/>
		                </a>
		    	    </div>';
		    		}
		    	break;
		    	
		    	case 'Vimeo Video':
		    		$post_ft_vimeo = get_post_meta($ppb_post->ID, 'post_ft_vimeo', true);
		
					$return_html.= do_shortcode('[tg_vimeo video_id="'.$post_ft_vimeo.'" width="670" height="377"]').'<br/>';
		    	break;
		    	
		    	case 'Youtube Video':
		    		$post_ft_youtube = get_post_meta($ppb_post->ID, 'post_ft_youtube', true);

		    		$return_html.= do_shortcode('[tg_youtube video_id="'.$post_ft_youtube.'" width="670" height="377"]').'<br/>';
		    	break;
		    	
		    	case 'Gallery':
		    		$post_ft_gallery = get_post_meta($ppb_post->ID, 'post_ft_gallery', true);
		    		$return_html.= do_shortcode('[tg_gallery_slider gallery_id="'.$post_ft_gallery.'" size="gallery_2" width="670" height="270"]');
		    	break;
		    	
		    } //End switch
		    
		    $return_html.= '<div class="blog_grid_content">';
		    
		    //Check post format
		    $post_format = get_post_format($ppb_post->ID);
		    
		    switch($post_format)
			{
			    case 'quote':
			
			    $return_html.= '<div class="post_quote_wrapper">
						<div class="post_quote_title">
						    '.$ppb_post->post_content.'
						</div>
						<div class="post_detail">
					        '.$ppb_post->post_title.'
						</div>
					</div>';
			    		    
				$return_html.= '</div>

			    	</div>
			    </div>';
			    
			    break;
			    
			    case 'link':
			
			    $return_html.= '
			    <div class="post_header quote">
			    	<div class="post_quote_title grid">
			    	'.$ppb_post->post_content.'
			    	<div class="post_detail">
			    	    	'.get_the_time(THEMEDATEFORMAT, $ppb_post->ID).'&nbsp;';
			    		    
						$post_categories = wp_get_post_categories($ppb_post->ID);
						if(!empty($post_categories))
						{
						 	$return_html.= esc_html__('In', 'photography-custom-post' ).'&nbsp;';
						 	
						    foreach($post_categories as $c)
						    {
						        $cat = get_category( $c );
						    	$return_html.= '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a>';
						    }
						}
			    		    
				$return_html.= '</div>';
			    	
				$return_html.= '
			    	</div>
			    </div>';

			    break;
			    
			    default:
		    
				$return_html.= '<div class="post_header grid">
				<div class="post_info_cat">';
				
				$post_categories = wp_get_post_categories($ppb_post->ID);
						    	
				$count_categories = count($post_categories);
				$i = 0;
				
				if(!empty($post_categories))
				{
				 	foreach($post_categories as $c)
				    {
				        $cat = get_category( $c );
				    	$return_html.= '<a href="'.esc_url(get_category_link($cat->term_id)).'">'.$cat->name.'</a>';
				    	
				    	if(++$i != $count_categories) 
						{
						    $return_html.= '&nbsp;/&nbsp;';
						}
				    }
				}
				
				$return_html.= '</div>
				<h6><a href="'.esc_url(get_permalink($ppb_post->ID)).'" title="'.get_the_title($ppb_post->ID).'">'.get_the_title($ppb_post->ID).'</a></h6>
				<hr class="title_break"/>
				<div class="post_detail">'.get_the_time(THEMEDATEFORMAT, $ppb_post->ID);
			    		    
				$return_html.= '</div>
				</div>';
				
				$return_html.= photography_substr($ppb_post->post_excerpt, 110);
		        break;
		    }
		    
		    $return_html.= '
	    </div>    
	</div>
</div>';
		}
		
		$return_html.= '</div>';
	}
	
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div></div>';
	
	if(!empty($link_title) && !empty($link_url))
	{
		$return_html.= '<div class="blog_recent_link">
		<a href="'.esc_url($link_url).'"><i class="fa fa-list-ul marginright middle"></i><h6>'.rawurldecode($link_title).'</h6></a>
	</div>';
		$return_html.= '<br class="clear"/><br/><hr class="small"/>';
	}
	
	return $return_html;
}

add_shortcode('ppb_blog_masonry', 'ppb_blog_masonry_func');


function ppb_blog_minimal_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'cat' => '',
		'items' => 3,
		'padding' => '',
		'custom_css' => '',
		'link_title' => '',
		'link_url' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	
	$return_html.= '<div '.$sec_id.' class="'.$size.' ppb_blog_minimal"';
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode($custom_css).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper"><div class="inner"><div class="inner_wrapper">';
	
	if(!is_numeric($items))
	{
		$items = 3;
	}
	
	//Get blog posts
	$args = array(
	    'numberposts' => $items,
	    'order' => 'DESC',
	    'orderby' => 'post_date',
	    'post_type' => array('post'),
	    'suppress_filters' => false,
	);

	if(!empty($cat))
	{
		$args['category'] = $cat;
	}
	$posts_arr = get_posts($args);
	
	if(!empty($posts_arr) && is_array($posts_arr))
	{
		foreach($posts_arr as $key => $ppb_post)
		{
			$animate_layer = $key+7;
			$image_thumb = '';
										
			if(has_post_thumbnail($ppb_post->ID, 'large'))
			{
			    $image_id = get_post_thumbnail_id($ppb_post->ID);
			    $image_thumb = wp_get_attachment_image_src($image_id, 'large', true);
			}
			
			$return_html.= '<div class="one_third_bg">';
			$return_html.= '<a href="'.esc_url(get_permalink($ppb_post->ID)).'">';
			$return_html.= '<div class="blog_minimal_wrapper">';
			
			if(!empty($image_thumb[0]))
			{
				$return_html.= '<div class="featured_image" style="background-image:url(\''.$image_thumb[0].'\');"></div>';
				$return_html.= '<div class="background_overlay"></div>';
			}
			
			$return_html.= '<div class="content">';
			$return_html.= '<h4>'.get_the_title($ppb_post->ID).'</h4>';
			$return_html.= '<div class="post_detail">'.get_the_time(THEMEDATEFORMAT, $ppb_post->ID).'</div>';
		    $return_html.= '</div>';
		    $return_html.= '</div>';
		    $return_html.= '</a>';
		    $return_html.= '</div>';
		}
	}
	
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	if(!empty($link_title) && !empty($link_url))
	{
		$return_html.= '<a href="'.esc_url($link_url).'" class="button continue_ppb_blog">'.rawurldecode($link_title).'</a>';
	}
	
	return $return_html;
}

add_shortcode('ppb_blog_minimal', 'ppb_blog_minimal_func');


function ppb_service_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 3,
		'padding' => 30,
		'cat' => '',
		'columns' => '3',
		'align' => 'left',
		'layout' => 'fixedwidth',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).' withpadding ';
	
	if(!empty($layout) && $layout == 'fullwidth')
	{
		$return_html.= 'fullwidth ';
	}
	
	$return_html.= '" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper"><div class="inner" ';
	if($layout == 'fullwidth')
	{
		$return_html.= 'style="width:100%;"';
	}
	$return_html.= '>';
	
	$service_order = 'ASC';
	$service_order_by = 'menu_order';
	
	//Get service items
	$args = array(
	    'numberposts' => $items,
	    'order' => $service_order,
	    'orderby' => $service_order_by,
	    'post_type' => array('services'),
	);
	
	if(!empty($cat))
	{
		$args['servicecats'] = $cat;
	}
	$services_arr = get_posts($args);
	
	//Check display columns
	$count_column = 3;
	$columns_class = 'one_third';
	$service_h = 'h3';
	
	switch($columns)
	{
		case 1:
			$count_column = 1;
			$columns_class = 'one';
			$service_h = 'h3';
		break;
	
		case 2:
			$count_column = 2;
			$columns_class = 'one_half';
			$service_h = 'h3';
		break;
		
		case 3:
		default:
			$count_column = 3;
			$columns_class = 'one_third';
			$service_h = 'h3';
		break;
		
		case 4:
			$count_column = 4;
			$columns_class = 'one_fourth';
			$service_h = 'h6';
		break;
	}
	
	if(!empty($content))
	{
		$return_html.= '<div class="one_third"  style="text-align:left">';
		$content = preg_replace('/^(?:<br\s*\/?>\s*)+/', '', $content);
		$return_html.= $content;
		$return_html.= '</div>';
	}

	if(!empty($services_arr) && is_array($services_arr))
	{
		if(!empty($content))
		{
			$return_html.= '<div class="two_third last">';
		}
	
		$return_html.= '<div class="service_content_wrapper">';
		$last_class = '';
	
		foreach($services_arr as $key => $service)
		{
			if(($key+1)%$count_column==0)
			{
				$last_class = 'last';
			}
			else
			{
				$last_class = '';
			}
			
			$return_html.= '<div class="'.$columns_class.' '.$last_class.'">';
			
			$image_url = '';
			$service_ID = $service->ID;
					
			//check if use font awesome
			$service_icon_code ='';
			$service_font_awesome = get_post_meta($service_ID, 'service_font_awesome', true);
					
			if(!empty($service_font_awesome))
			{
				$service_icon_code = get_post_meta($service_ID, 'service_font_awesome_code', true);
			}
			else
			{
				if(has_post_thumbnail($service_ID, 'large'))
				{
				    $image_id = get_post_thumbnail_id($service_ID);
				    $image_url = wp_get_attachment_image_src($image_id, 'original', true);
				    $service_icon_code = '<img src="'.$image_url[0].'" alt="'.esc_attr($service->post_title).'" />';
				}
			}
			$return_html.= '<div class="service_wrapper '.esc_attr(rawurldecode($align)).'">';
			
			if(!empty($service_icon_code))
			{
				$return_html.= '<div class="service_icon">'.$service_icon_code.'<div class="service_border"></div></div>';
			}
			
			$return_html.= '<div class="service_title">';
			$return_html.= '<'.$service_h.'>'.$service->post_title.'</'.$service_h.'>';
			$return_html.= '<div class="service_content">'.$service->post_content.'</div>';
			$return_html.= '</div>';
			
			$return_html.= '</div>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
		
		if(!empty($content))
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_service', 'ppb_service_func');


function ppb_service_content_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'subtitle' => '',
		'items' => 3,
		'padding' => 30,
		'cat' => '',
		'order' => 'default',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 3;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).' withpadding ';
	
	if(!empty($layout) && $layout == 'fullwidth')
	{
		$return_html.= 'fullwidth ';
	}
	
	$return_html.= '" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper"><div class="inner"> ';
	
	if(!empty($content))
	{
		$return_html.= '<div class="one_half">';
		
		//Add title and content
		if(!empty($title))
		{
			$return_html.= '<h2 class="ppb_title">'.rawurldecode($title).'</h2>';
		}
		
		if(!empty($subtitle))
		{
			$return_html.= '<div class="ppb_subtitle">'.rawurldecode($subtitle).'</div>';
		}
		
		$return_html.= do_shortcode(photography_apply_content($content));
		$return_html.= '</div>';
	}

	//display service content
	$return_html.= '<div class="one_half last">';	
	$return_html.= do_shortcode('[tg_service_vertical cat="'.esc_attr($cat).'" items="'.esc_attr($items).'" align="left"]');
	$return_html.= '</div>';
	
	$return_html.= '</div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_service_content', 'ppb_service_content_func');


function ppb_fullwidth_button_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'padding' => 30,
		'slug' => '',
		'title' => '',
		'bgcolor' => '',
		'fontcolor' => '#000',
		'button_text' => '',
		'link_url' => '',
		'button_bgcolor' => '',
		'button_fontcolor' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	//Set begin wrapper div for live builder
	$return_html= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' ppb_fullwidth_button" ';
	
	if(!empty($bgcolor))
	{
		$return_html.= 'style="background-color:'.esc_attr($bgcolor).';padding:'.$padding.'px 0 '.$padding.'px 0;"';
	}
	
	$return_html.= '>';
	
	$return_html.= '<div class="standard_wrapper">';
	
	if(!empty($title))
	{
		$return_html.= '<h2 class="title" style="color:'.esc_attr($fontcolor).';">'.rawurldecode($title).'</h2>';
	}
	
	$custom_css = '';
	if(!empty($button_text))
	{
		if(!empty($button_bgcolor))
		{
			$custom_css.= 'background-color:'.$button_bgcolor.';border-color:'.$button_bgcolor.';';
		}
		
		if(!empty($button_fontcolor))
		{
			$custom_css.= 'color:'.$button_fontcolor.';';
		}
	
		$return_html.= '<a href="'.esc_url($link_url).'" class="button" ';
		
		if(!empty($custom_css))
		{
			$return_html.= 'style="'.$custom_css.'"';
		}
		
		$return_html.= '>'.rawurldecode($button_text).'</a>';
	}
	
	$return_html.= '</div>';
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);

	return $return_html;

}

add_shortcode('ppb_fullwidth_button', 'ppb_fullwidth_button_func');


function ppb_pricing_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'skin' => 'normal',
		'items' => 3,
		'cat' => '',
		'columns' => '3',
		'highlightcolor' => '#001d2c',
		'bgcolor' => '',
		'padding' => 30,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' ppb_pricing"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper"><div class="page_content_wrapper"><div class="inner">';
	
	$pricing_order = 'ASC';
	$pricing_order_by = 'menu_order';
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $pricing_order,
	    'orderby' => $pricing_order_by,
	    'post_type' => array('pricing'),
	);
	
	if(!empty($cat))
	{
		$args['pricingcats'] = $cat;
	}
	$pricing_arr = get_posts($args);
	
	//Check display columns
	$count_column = 3;
	$columns_class = 'one_third';
	
	switch($columns)
	{
		case 2:
			$count_column = 2;
			$columns_class = 'one_half';
		break;
		
		case 3:
		default:
			$count_column = 3;
			$columns_class = 'one_third';
		break;
		
		case 4:
			$count_column = 4;
			$columns_class = 'one_fourth';
		break;
	}
	
	$custom_header = '';
	$custom_button = '';
	$custom_price = '';
	switch($skin)
	{
		case 'light':
		default:
			$custom_header = 'color:'.$highlightcolor.';';
			$custom_price = 'color:'.$highlightcolor.';';
			$custom_button = 'background:'.$highlightcolor.';border-color:'.$highlightcolor.';color:#fff;';
			
		break;
		
		case 'normal':
			$custom_header = 'background:'.$highlightcolor.';';
			$custom_price = 'color:'.$highlightcolor.';';
			$custom_button = 'background:'.$highlightcolor.';border-color:'.$highlightcolor.';color:#fff;';
		break;
	}

	if(!empty($pricing_arr) && is_array($pricing_arr))
	{
		$return_html.= '<div class="pricing_content_wrapper '.$skin.'">';
		$last_class = '';
	
		foreach($pricing_arr as $key => $pricing)
		{
			if(($key+1)%$count_column==0)
			{
				$last_class = 'last';
			}
			else
			{
				$last_class = '';
			}
			
			//Check if featured
			$priing_featured_class = '';
			$priing_button_class = '';
			$pricing_plan_featured = get_post_meta($pricing->ID, 'pricing_featured', true);
			if(!empty($pricing_plan_featured))
			{
				$priing_featured_class = 'featured';
			}
			
			$return_html.= '<div class="pricing '.esc_attr($columns_class).' '.esc_attr($priing_featured_class).' '.esc_attr($last_class).'">';
			$return_html.= '<div class="pricing_wrapper_border"><ul class="pricing_wrapper">';
			
			$return_html.= '<li class="title_row '.esc_attr($priing_featured_class).'" style="'.esc_attr($custom_header).'">'.$pricing->post_title.'</li>';
			
			//Check price
			$pricing_plan_currency = get_post_meta($pricing->ID, 'pricing_plan_currency', true);
			$pricing_plan_price = get_post_meta($pricing->ID, 'pricing_plan_price', true);
			$pricing_plan_time = get_post_meta($pricing->ID, 'pricing_plan_time', true);
			
			$return_html.= '<li class="price_row">';
			$return_html.= '<strong>'.$pricing_plan_currency.'</strong>';
			$return_html.= '<em class="exact_price" style="'.esc_attr($custom_price).'">'.$pricing_plan_price.'</em>';
			$return_html.= '<em class="time">'.$pricing_plan_time.'</em>';
			$return_html.= '</li>';
			
			//Get pricing features
			$pricing_plan_features = get_post_meta($pricing->ID, 'pricing_plan_features', true);
			$pricing_plan_features = trim($pricing_plan_features);
			$pricing_plan_features_arr = explode("\n", $pricing_plan_features);
			$pricing_plan_features_arr = array_filter($pricing_plan_features_arr, 'trim');
			
			foreach ($pricing_plan_features_arr as $feature) {
			    $return_html.= '<li>'.$feature.'</li>';
			}
			
			//Get button
			$pricing_button_text = get_post_meta($pricing->ID, 'pricing_button_text', true);
			$pricing_button_url = get_post_meta($pricing->ID, 'pricing_button_url', true);
			
			$return_html.= '<li class="button_row '.esc_attr($priing_featured_class).'"><a href="'.esc_url($pricing_button_url).'" class="button"  style="'.esc_attr($custom_button).'">'.$pricing_button_text.'</a></li>';
			
			$return_html.= '</ul></div>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_pricing', 'ppb_pricing_func');


function ppb_team_column_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'columns' => 4,
		'title' => '',
		'items' => 4,
		'cat' => '',
		'order' => 'default',
		'bgcolor' => '',
		'fontcolor' => '',
		'padding' => 30,
		'layout' => 'fixedwidth',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_team_column" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$team_order = 'ASC';
	$team_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$team_order = 'ASC';
			$team_order_by = 'menu_order';
		break;
		
		case 'newest':
			$team_order = 'DESC';
			$team_order_by = 'post_date';
		break;
		
		case 'oldest':
			$team_order = 'ASC';
			$team_order_by = 'post_date';
		break;
		
		case 'title':
			$team_order = 'ASC';
			$team_order_by = 'title';
		break;
		
		case 'random':
			$team_order = 'ASC';
			$team_order_by = 'rand';
		break;
	}
	
	//Check display columns
	$count_column = 3;
	$columns_class = 'one_third';
	
	switch($columns)
	{	
		case 3:
			$count_column = 3;
			$columns_class = 'one_third nopadding';
		break;
		
		case 4:
			$count_column = 4;
			$columns_class = 'one_fourth nopadding';
		break;
		
		case 5:
			$count_column = 5;
			$columns_class = 'one_fifth nopadding';
		break;
	}
	
	//Get team items
	$args = array(
	    'numberposts' => $items,
	    'order' => $team_order,
	    'orderby' => $team_order_by,
	    'post_type' => array('team'),
	);
	
	if(!empty($cat))
	{
		$args['teamcats'] = $cat;
	}
	$team_arr = get_posts($args);
	
	if(!empty($team_arr) && is_array($team_arr))
	{
		$return_html.= '<div class="team_wrapper">';
	
		foreach($team_arr as $key => $member)
		{
			$image_url = '';
			$member_ID = $member->ID;
					
			if(has_post_thumbnail($member_ID, 'tg_grid'))
			{
			    $image_id = get_post_thumbnail_id($member_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'tg_grid', true);
			}
			
			$last_class = '';
			if(($key+1)%$count_column==0)
			{
				$last_class = 'last';
			}
			
			//Begin display HTML
			$return_html.= '<div class="'.$columns_class.' animated'.($key+1).' '.$last_class.'">';
			
			if(!empty($small_image_url[0]))
			{
				$return_html.= '<div class="post_img team"><img class="team_pic animated" data-animation="fadeIn" src="'.esc_url($small_image_url[0]).'" alt=""/></div>';
			}
			
			$team_position = get_post_meta($member_ID, 'team_position', true);
			
			//Display portfolio detail
			$return_html.= '<br class="clear"/><div id="portfolio_desc_'.$member_ID.'" class="portfolio_desc team '.esc_attr($last_class).'">';
            $return_html.= '<h5 ';
            
            if(!empty($fontcolor))
			{
				$return_html.= 'style="color:'.$fontcolor.';"';
			}
            
            $return_html.= '>'.$member->post_title.'</h5>';
            if(!empty($team_position))
            {
            	$return_html.= '<div class="post_detail" ';
            	
            	if(!empty($fontcolor))
				{
					$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
				}
            	
            	$return_html.= '>'.$team_position.'</div>';
            }
            
            $member_facebook = get_post_meta($member_ID, 'member_facebook', true);
			$member_twitter = get_post_meta($member_ID, 'member_twitter', true);
			$member_google = get_post_meta($member_ID, 'member_google', true);
			$member_linkedin = get_post_meta($member_ID, 'member_linkedin', true);
            
            if(!empty($member_facebook) OR !empty($member_twitter) OR !empty($member_google) OR !empty($member_linkedin))
			{
			    $return_html.= '<ul class="social_wrapper team">';
			    
			    $social_font_color = '';
			    if(!empty($fontcolor))
				{
					$social_font_color = 'style="color:'.$fontcolor.';"';
				}
			    
			    if(!empty($member_twitter))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Twitter" target="_blank" class="tooltip" href="https://twitter.com/'.$member_twitter.'" '.$social_font_color.'><i class="fa fa-twitter"></i></a></li>';
			    }
	 
			    if(!empty($member_facebook))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Facebook" target="_blank" class="tooltip" href="https://facebook.com/'.$member_facebook.'" '.$social_font_color.'><i class="fa fa-facebook"></i></a></li>';
			    }
			    
			    if(!empty($member_google))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Google+" target="_blank" class="tooltip" href="'.$member_google.'" '.$social_font_color.'><i class="fa fa-google-plus"></i></a></li>';
			    }
			        
			    if(!empty($member_linkedin))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Linkedin" target="_blank" class="tooltip" href="'.$member_linkedin.'" '.$social_font_color.'><i class="fa fa-linkedin"></i></a></li>';
			    }
			    
			    $return_html.= '</ul>';
			}

			$return_html.= '</div>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_team_column', 'ppb_team_column_func');


function ppb_team_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'columns' => 4,
		'title' => '',
		'items' => 4,
		'cat' => '',
		'order' => 'default',
		'bgcolor' => '',
		'fontcolor' => '',
		'padding' => 30,
		'layout' => 'fixedwidth',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_team_column" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$team_order = 'ASC';
	$team_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$team_order = 'ASC';
			$team_order_by = 'menu_order';
		break;
		
		case 'newest':
			$team_order = 'DESC';
			$team_order_by = 'post_date';
		break;
		
		case 'oldest':
			$team_order = 'ASC';
			$team_order_by = 'post_date';
		break;
		
		case 'title':
			$team_order = 'ASC';
			$team_order_by = 'title';
		break;
		
		case 'random':
			$team_order = 'ASC';
			$team_order_by = 'rand';
		break;
	}
	
	//Check display columns
	$count_column = 3;
	$columns_class = 'one_third';
	
	switch($columns)
	{	
		case 3:
			$count_column = 3;
			$columns_class = 'one_third_bg nopadding grid';
		break;
		
		case 4:
		default:
			$count_column = 4;
			$columns_class = 'one_fourth_bg nopadding grid';
		break;
		
		case 5:
			$count_column = 5;
			$columns_class = 'one_fifth_bg nopadding grid';
		break;
	}
	
	//Get team items
	$args = array(
	    'numberposts' => $items,
	    'order' => $team_order,
	    'orderby' => $team_order_by,
	    'post_type' => array('team'),
	);
	
	if(!empty($cat))
	{
		$args['teamcats'] = $cat;
	}
	$team_arr = get_posts($args);
	
	if(!empty($team_arr) && is_array($team_arr))
	{
		$return_html.= '<div class="team_wrapper">';
	
		foreach($team_arr as $key => $member)
		{
			$image_url = '';
			$member_ID = $member->ID;
					
			if(has_post_thumbnail($member_ID, 'original'))
			{
			    $image_id = get_post_thumbnail_id($member_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'original', true);
			}
			
			$last_class = '';
			if(($key+1)%$count_column==0)
			{
				$last_class = 'last';
			}
			
			//Begin display HTML
			$return_html.= '<div class="'.$columns_class.' animated'.($key+1).' '.$last_class.'">';
			
			if(!empty($small_image_url[0]))
			{
				$return_html.= '<div class="post_img team"><img class="team_pic animated" data-animation="fadeIn" src="'.esc_url($small_image_url[0]).'" alt=""/>';
				$member_facebook = get_post_meta($member_ID, 'member_facebook', true);
				$member_twitter = get_post_meta($member_ID, 'member_twitter', true);
				$member_google = get_post_meta($member_ID, 'member_google', true);
				$member_linkedin = get_post_meta($member_ID, 'member_linkedin', true);
	            
	            if(!empty($member_facebook) OR !empty($member_twitter) OR !empty($member_google) OR !empty($member_linkedin))
				{
				    $return_html.= '<div class="team_social_wrapper"><div class="team_social_content"><ul class="social_wrapper team">';
				    
				    $social_font_color = '';
				    if(!empty($fontcolor))
					{
						$social_font_color = 'style="color:'.$fontcolor.';"';
					}
				    
				    if(!empty($member_twitter))
				    {
				        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Twitter" target="_blank" class="tooltip" href="https://twitter.com/'.$member_twitter.'" '.$social_font_color.'><i class="fa fa-twitter"></i></a></li>';
				    }
		 
				    if(!empty($member_facebook))
				    {
				        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Facebook" target="_blank" class="tooltip" href="https://facebook.com/'.$member_facebook.'" '.$social_font_color.'><i class="fa fa-facebook"></i></a></li>';
				    }
				    
				    if(!empty($member_google))
				    {
				        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Google+" target="_blank" class="tooltip" href="'.$member_google.'" '.$social_font_color.'><i class="fa fa-google-plus"></i></a></li>';
				    }
				        
				    if(!empty($member_linkedin))
				    {
				        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Linkedin" target="_blank" class="tooltip" href="'.$member_linkedin.'" '.$social_font_color.'><i class="fa fa-linkedin"></i></a></li>';
				    }
				    
				    $return_html.= '</ul></div></div>';
				
					$team_position = get_post_meta($member_ID, 'team_position', true);
				
					//Display team member detail
					$return_html.= '<div class="team_grid_desc '.esc_attr($last_class).'">';
		            $return_html.= '<h5 ';
		            
		            if(!empty($fontcolor))
					{
						$return_html.= 'style="color:'.$fontcolor.';"';
					}
		            
		            $return_html.= '>'.$member->post_title.'</h5>';
		            if(!empty($team_position))
		            {
		            	$return_html.= '<div class="post_detail" ';
		            	
		            	if(!empty($fontcolor))
						{
							$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
						}
		            	
		            	$return_html.= '>'.$team_position.'</div>';
		            }
					
					$return_html.= '</div>';
				}
			    
			}

			$return_html.= '</div>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_team_grid', 'ppb_team_grid_func');


function ppb_team_card_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'items' => 4,
		'cat' => '',
		'order' => 'default',
		'bgcolor' => '',
		'fontcolor' => '',
		'card_bgcolor' => '',
		'padding' => 30,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_team_card" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper">';
	$return_html.='<div class="page_content_wrapper"><div class="inner">';
	
	$team_order = 'ASC';
	$team_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$team_order = 'ASC';
			$team_order_by = 'menu_order';
		break;
		
		case 'newest':
			$team_order = 'DESC';
			$team_order_by = 'post_date';
		break;
		
		case 'oldest':
			$team_order = 'ASC';
			$team_order_by = 'post_date';
		break;
		
		case 'title':
			$team_order = 'ASC';
			$team_order_by = 'title';
		break;
		
		case 'random':
			$team_order = 'ASC';
			$team_order_by = 'rand';
		break;
	}
		
	//Get team items
	$args = array(
	    'numberposts' => $items,
	    'order' => $team_order,
	    'orderby' => $team_order_by,
	    'post_type' => array('team'),
	);
	
	if(!empty($cat))
	{
		$args['teamcats'] = $cat;
	}
	$team_arr = get_posts($args);
	
	if(!empty($team_arr) && is_array($team_arr))
	{
	
		foreach($team_arr as $key => $member)
		{
			$card_number = $key+1;
		
			$return_html.= '<div class="team_card_wrapper" ';
			
			if(!empty($card_bgcolor))
			{
				$return_html.= 'style="background-color:'.esc_attr($card_bgcolor).'"';
			}
			
			$return_html.= '>';
		
			$image_url = '';
			$member_ID = $member->ID;
					
			if(has_post_thumbnail($member_ID, 'team_member'))
			{
			    $image_id = get_post_thumbnail_id($member_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'team_member', true);
			}
			
			//Begin display HTML
			$return_html.= '<div class="one_third_bg nopadding team_photo ';
			
			if ($card_number % 2 == 0) 
			{
				$return_html.= 'floatright';
			}
			
			$return_html.= '">';
			
			if(!empty($small_image_url[0]))
			{
				$return_html.= '<img class="team_pic" src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($member->post_title).'"/>';
			}
			
			$return_html.= '</div>';
			
			$return_html.= '<div class="two_third_bg team" ';
			
			if(!empty($fontcolor))
			{
				$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
			}
			
			$return_html.= '>';
			
			$team_position = get_post_meta($member_ID, 'team_position', true);
			
			//Display team member detail
            $return_html.= '<h3 ';
            
            if(!empty($fontcolor))
			{
				$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
			}
            
            $return_html.= '>'.$member->post_title.'</h3>';
            if(!empty($team_position))
            {
            	$return_html.= '<div class="team_position post_detail" ';
            	
            	if(!empty($fontcolor))
				{
					$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
				}
            	
            	$return_html.= '>'.$team_position.'</div>';
            }
            
            if(!empty($member->post_content))
            {
            	$return_html.= '<div class="team_content">'.$member->post_content.'</div>';
            }
            
            $member_facebook = get_post_meta($member_ID, 'member_facebook', true);
			$member_twitter = get_post_meta($member_ID, 'member_twitter', true);
			$member_google = get_post_meta($member_ID, 'member_google', true);
			$member_linkedin = get_post_meta($member_ID, 'member_linkedin', true);
            
            if(!empty($member_facebook) OR !empty($member_twitter) OR !empty($member_google) OR !empty($member_linkedin))
			{
			    $return_html.= '<ul class="social_wrapper team">';
			    
			    $social_font_color = '';
			    if(!empty($fontcolor))
				{
					$social_font_color = 'style="color:'.$fontcolor.';"';
				}
			    
			    if(!empty($member_twitter))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Twitter" target="_blank" class="tooltip" href="https://twitter.com/'.$member_twitter.'" '.$social_font_color.'><i class="fa fa-twitter"></i></a></li>';
			    }
	 
			    if(!empty($member_facebook))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Facebook" target="_blank" class="tooltip" href="https://facebook.com/'.$member_facebook.'" '.$social_font_color.'><i class="fa fa-facebook"></i></a></li>';
			    }
			    
			    if(!empty($member_google))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Google+" target="_blank" class="tooltip" href="'.$member_google.'" '.$social_font_color.'><i class="fa fa-google-plus"></i></a></li>';
			    }
			        
			    if(!empty($member_linkedin))
			    {
			        $return_html.= '<li><a title="'.esc_attr($member->post_title).' on Linkedin" target="_blank" class="tooltip" href="'.$member_linkedin.'" '.$social_font_color.'><i class="fa fa-linkedin"></i></a></li>';
			    }
			    
			    $return_html.= '</ul>';
			}
			
			$return_html.= '</div><br class="clear"/>';
			$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	
	$return_html.= '</div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_team_card', 'ppb_team_card_func');


function ppb_promo_box_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'button_text' => '',
		'button_url' => '',
		'background_color' => '',
		'builder_id' => '',
	), $atts));
	
	$return_html = '<div class="one skinbg" ';
	
	if(!empty($background_color))
	{
		$return_html.= 'style="background:'.esc_attr($background_color).'"';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.='<div class="page_content_wrapper promo_box_wrapper">';
	$return_html.= do_shortcode('[tg_promo_box title="'.$title.'" button_text="'.rawurldecode($button_text).'" button_url="'.esc_url($button_url).'" button_style="button transparent"]'.$content.'[/tg_promo_box]');
	$return_html.='</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_promo_box', 'ppb_promo_box_func');


function ppb_testimonial_slider_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'title' => '',
		'slug' => '',
		'items' => '',
		'cat' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'background' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	wp_enqueue_script("flexslider-js", get_template_directory_uri()."/js/flexslider/jquery.flexslider-min.js", false, THEMEVERSION, true);
	wp_enqueue_script("sciprt-testimonials-flexslider", get_template_directory_uri()."/templates/script-testimonials-flexslider.php", false, THEMEVERSION, true);
	
	$testimonials_order = 'ASC';
	$testimonials_order_by = 'menu_order';
	
	//Get testimonial items
	$args = array(
	    'numberposts' => $items,
	    'order' => $testimonials_order,
	    'orderby' => $testimonials_order_by,
	    'post_type' => array('testimonials'),
	);
	
	if(!empty($cat))
	{
		$args['testimonialcats'] = $cat;
	}
	$testimonial_arr = get_posts($args);
	
	$return_html = '';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ';
	
	if(!empty($background))
	{
		$return_html.= 'withbg ';
	}
	
	$return_html.= '" ';
	
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}

	if(!empty($background))
	{
		$custom_css.= 'background-image:url('.esc_url($background).');background-size:cover; ';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div class="page_content_wrapper" style="text-align:center"><div class="inner">';
	
	if(!empty($testimonial_arr) && is_array($testimonial_arr))
	{
		$return_html.= '<div class="testimonial_slider_wrapper">';
		$return_html.= '<div class="flexslider" data-height="750">';
		$return_html.= '<ul class="slides">';
		
		foreach($testimonial_arr as $key => $testimonial)
		{
			$testimonial_ID = $testimonial->ID;
		
			//Get testimonial meta
			$testimonial_name = get_post_meta($testimonial_ID, 'testimonial_name', true);
			
			$return_html.= '<li>';
			$return_html.= '<div class="testimonial_slider_wrapper">';
			
			if(!empty($testimonial_name))
			{
				$return_html.= '<div class="testimonial_slider_meta">';
				
				//Get customer picture
				if(has_post_thumbnail($testimonial_ID, 'thumbnail'))
				{
				    $image_id = get_post_thumbnail_id($testimonial_ID);
				    $small_image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true);
				}
				
				if(!empty($small_image_url[0]))
				{
					$return_html.= '<div class="testimonial_image animated" data-animation="bigEntrance">';
					$return_html.='<img class="team_pic" src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($testimonial_name).'"/>';
					$return_html.= '</div>';
				}
				
				$return_html.= '<h6 ';
				
				if(!empty($fontcolor))
				{
				    $return_html.= 'style="color:'.esc_attr($fontcolor).'"';
				}
				
				$return_html.= '>'.$testimonial_name.'</h6>';
				
				$return_html.= '</div>';
			}
			
			if(!empty($testimonial->post_content))
			{
				$return_html.= $testimonial->post_content;
			}
			
			$return_html.= '</div>';
			$return_html.= '</li>';
		}
		
		$return_html.= '</ul>';
		$return_html.= '</div>';
		$return_html.= '</div>';
	}
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('ppb_testimonial_slider', 'ppb_testimonial_slider_func');


function ppb_testimonial_column_func($atts, $content) {
	remove_filter('the_content', 'pp_formatter', 99);

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'columns' => 2,
		'items' => 4,
		'cat' => '',
		'fontcolor' => '',
		'bgcolor' => '',
		'padding' => 30,
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	if(!is_numeric($columns))
	{
		$columns = 2;
	}
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div '.$sec_id.' class="'.esc_attr($size).' withsmallpadding ppb_testimonial_column"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$testimonials_order = 'ASC';
	$testimonials_order_by = 'menu_order';
	
	//Check display columns
	$count_column = 3;
	$columns_class = 'one_third';
	
	switch($columns)
	{	
		case 2:
			$count_column = 2;
			$columns_class = 'one_half';
		break;
		
		case 3:
		default:
			$count_column = 3;
			$columns_class = 'one_third';
		break;
		
		case 4:
			$count_column = 4;
			$columns_class = 'one_fourth';
		break;
	}
	
	//Get testimonial items
	$args = array(
	    'numberposts' => $items,
	    'order' => $testimonials_order,
	    'orderby' => $testimonials_order_by,
	    'post_type' => array('testimonials'),
	);
	
	if(!empty($cat))
	{
		$args['testimonialcats'] = $cat;
	}
	$testimonial_arr = get_posts($args);
	
	if(!empty($testimonial_arr) && is_array($testimonial_arr))
	{
		$return_html.= '<div class="page_content_wrapper"><div class="inner"><div class="testimonial_wrapper">';
	
		foreach($testimonial_arr as $key => $testimonial)
		{
			$image_url = '';
			$testimonial_ID = $testimonial->ID;
					
			//Get customer picture
			if(has_post_thumbnail($testimonial_ID, 'thumbnail'))
			{
			    $image_id = get_post_thumbnail_id($testimonial_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'thumbnail', true);
			}
			
			$last_class = '';
			if(($key+1)%$count_column==0)
			{
				$last_class = 'last';
			}
			
			//Begin display HTML
			$return_html.= '<div class="'.esc_attr($columns_class).' testimonial_column_element animated'.($key+1).' '.esc_attr($last_class).'">';
			
			//Get testimonial meta
			$testimonial_name = get_post_meta($testimonial_ID, 'testimonial_name', true);
			$testimonial_position = get_post_meta($testimonial_ID, 'testimonial_position', true);
			$testimonial_company_name = get_post_meta($testimonial_ID, 'testimonial_company_name', true);
			$testimonial_company_website = get_post_meta($testimonial_ID, 'testimonial_company_website', true);
			
			if(!empty($small_image_url[0]))
			{
				$return_html.= '<div class="testimonial_image animated" data-animation="bigEntrance">';
				$return_html.='<img class="team_pic" src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($testimonial_name).'"/>';
				$return_html.= '</div>';
			}
			
			if(!empty($testimonial->post_content))
			{
				$return_html.= '<div class="testimonial_content">';
				$return_html.= $testimonial->post_content;
				
				if(!empty($testimonial_name))
				{
					$return_html.= '<br/><br/><div class="testimonial_customer">';
					$return_html.= '<h5 ';
					
					if(!empty($fontcolor))
					{
						$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
					}
					
					$return_html.= '>'.$testimonial_name.'</h5>';
					
					if(!empty($testimonial_position))
					{
						$return_html.= '<div class="testimonial_customer_position" ';
						
						if(!empty($fontcolor))
						{
							$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
						}
						
						$return_html.= '>'.$testimonial_position.'</div>';
					}
					
					if(!empty($testimonial_company_name))
					{
						$return_html.= '-<div class="testimonial_customer_company">';
						
						if(!empty($testimonial_company_website))
						{
							$return_html.= '<a href="'.esc_url($testimonial_company_website).'" target="_blank" ';
							
							if(!empty($fontcolor))
							{
								$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
							}
							
							$return_html.= '>';
						}
						
						$return_html.=$testimonial_company_name;
						
						if(!empty($testimonial_company_website))
						{
							$return_html.= '</a>';
						}
						
						$return_html.= '</div>';
					}
					
					$return_html.= '</div>';
				}
				
				$return_html.= '</div>';
			}
			
			$return_html.= '</div>';
		}
		
		$return_html.= '</div></div></div>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_testimonial_column', 'ppb_testimonial_column_func');


function ppb_contact_map_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'slug' => '',
		'subtitle' => '',
		'lat' => 0,
		'long' => 0,
		'zoom' => 8,
		'type' => '',
		'popup' => '',
		'address' => '',
		'marker' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'buttonbgcolor' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="one nopadding" ';
	
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="floatleft nopadding"><div class="one_half_bg contact_form" ';
	
	$contact_form_custom_css = '';
	if(!empty($bgcolor))
	{
		$contact_form_custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$contact_form_custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($contact_form_custom_css))
	{
		$return_html.= 'style="'.esc_attr($contact_form_custom_css).'"';
	}
	
	$return_html.= '>';
	
	//Display Title
	if(!empty($title))
	{
		$return_html.= '<h2 class="ppb_title" ';
		if(!empty($fontcolor))
		{
			$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
		}
		$return_html.= '>'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
	}
	
	//Display Content
	if(!empty($subtitle))
	{
		$return_html.= '<div class="ppb_subtitle" ';
		if(!empty($fontcolor))
		{
			$return_html.= 'style="color:'.esc_attr($fontcolor).';"';
		}
		$return_html.= '>'.rawurldecode($subtitle).'</div>';
	}
	
	if(!empty($title) OR !empty($subtitle))
	{
		$return_html.= '<div class="page_header_sep left"></div>';
	}
	
	//Display Content
	if(!empty($content))
	{
		$return_html.= '<div class="ppb_content">'.rawurldecode($content).'</div>';
	}
	
	//Display contact form
	//Get contact form random ID
	$custom_id = time().rand();
    $pp_contact_form = unserialize(get_option('pp_contact_form_sort_data'));
    
    //Setup Google Map API Key
	photography_set_map_api();
    
    wp_enqueue_script("jquery.validate", get_template_directory_uri()."/js/jquery.validate.js", false, THEMEVERSION, true);
    
    wp_register_script("script-contact-form", get_template_directory_uri()."/templates/script-contact-form.php?form=".$custom_id, false, THEMEVERSION, true);
	$params = array(
	  'ajaxurl' => admin_url('admin-ajax.php'),
	  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
	);
	wp_localize_script( 'script-contact-form', 'tgAjax', $params );
	wp_enqueue_script("script-contact-form", get_template_directory_uri()."/templates/script-contact-form.php?form=".$custom_id, false, THEMEVERSION, true);

    $return_html.= '<div id="reponse_msg_'.$custom_id.'" class="contact_form_response"><ul></ul></div>';
    
    $return_html.= '<form id="contact_form_'.$custom_id.'" class="contact_form_wrapper" method="post" action="/wp-admin/admin-ajax.php">';
	$return_html.= '<input type="hidden" id="action" name="action" value="photography_contact_mailer"/>';

    if(is_array($pp_contact_form) && !empty($pp_contact_form))
    {
        foreach($pp_contact_form as $form_input)
        {
        	switch($form_input)
        	{
    				case 1:
    				
    				$return_html.= '<label for="your_name">'.esc_html__('Name *', 'photography-custom-post' ).'</label>
    				<input id="your_name" name="your_name" type="text" class="required_field" placeholder="'.esc_html__('Name *', 'photography-custom-post' ).'"/>
    				';	

    				break;
    				
    				case 2:
    				
    				$return_html.= '<label for="email">'.esc_html__('Email *', 'photography-custom-post' ).'</label>
    				<input id="email" name="email" type="text" class="required_field email" placeholder="'.esc_html__('Email *', 'photography-custom-post' ).'"/>
    				';	

    				break;
    				
    				case 3:
    				
    				$return_html.= '<label for="message">'.esc_html__('Message *', 'photography-custom-post' ).'</label>
    				<textarea id="message" name="message" rows="7" cols="10" class="required_field" style="width:96%;" placeholder="'.esc_html__('Message *', 'photography-custom-post' ).'"></textarea>
    				';	

    				break;
    				
    				case 4:
    				
    				$return_html.= '<label for="address">'.esc_html__('Address', 'photography-custom-post' ).'</label>
    				<input id="address" name="address" type="text" placeholder="'.esc_html__('Address', 'photography-custom-post' ).'"/>
    				';	

    				break;
    				
    				case 5:
    				
    				$return_html.= '<label for="phone">'.esc_html__('Phone', 'photography-custom-post' ).'</label>
    				<input id="phone" name="phone" type="text" placeholder="'.esc_html__('Phone', 'photography-custom-post' ).'"/>
    				';

    				break;
    				
    				case 6:
    				
    				$return_html.= '<label for="mobile">'.esc_html__('Mobile', 'photography-custom-post' ).'</label>
    				<input id="mobile" name="mobile" type="text" placeholder="'.esc_html__('Mobile', 'photography-custom-post' ).'"/>
    				';		

    				break;
    				
    				case 7:
    				
    				$return_html.= '<label for="company">'.esc_html__('Company Name', 'photography-custom-post' ).'</label>
    				<input id="company" name="company" type="text" placeholder="'.esc_html__('Company Name', 'photography-custom-post' ).'"/>
    				';

    				break;
    				
    				case 8:
    				
    				$return_html.= '<label for="country">'.esc_html__('Country', 'photography-custom-post' ).'</label>				
    				<input id="country" name="country" type="text" placeholder="'.esc_html__('Country', 'photography-custom-post' ).'"/>
    				';
    				break;
    			}
    		}
    	}

    	$pp_contact_enable_captcha = get_option('pp_contact_enable_captcha');
    	
    	if(!empty($pp_contact_enable_captcha))
    	{
    	
    	$return_html.= '<div id="captcha-wrap">
    		<div class="captcha-box">
    			<img src="'.get_template_directory_uri().'/get_captcha.php" alt="" id="captcha" />
    		</div>
    		<div class="text-box">
    			<label>Type the two words:</label>
    			<input name="captcha-code" type="text" id="captcha-code">
    		</div>
    		<div class="captcha-action">
    			<img src="'.get_template_directory_uri().'/images/refresh.jpg"  alt="" id="captcha-refresh" />
    		</div>
    	</div>
    	<br class="clear"/><br/>';
    
    }
    
    $return_html.= '<br/><br/><div class="contact_submit_wrapper">
    	<input id="contact_submit_btn'.$custom_id.'" name="contact_submit_btn'.$custom_id.'" type="submit" class="solidbg" value="'.esc_html__('Send', 'photography-custom-post' ).'" ';
	
	if(!empty($buttonbgcolor))
	{
		$return_html.= 'style="background-color:'.esc_attr($buttonbgcolor).';border-color:'.esc_attr($buttonbgcolor).'"';
	}
	
    $return_html.= '/>
    </div>';
    
	$return_html.= '</form>';
	
	
	$return_html.= '</div>';
	
	//Display Map
	$return_html.= '<div class="one_half_bg nopadding" style="height:100%">';
	$return_html.= '<div id="map'.$custom_id.'" class="map_shortcode_wrapper" style="width:100%;height:100%">';
	$return_html.= '<div class="map-marker" ';
	
	if(!empty($popup))
	{
		$return_html.= 'data-title="'.esc_attr(rawurldecode($popup)).'" ';
	}
	
	if(!empty($lat) && !empty($long))
	{
		$return_html.= 'data-latlng="'.esc_attr(rawurldecode($lat)).','.esc_attr(rawurldecode($long)).'" ';
	}
	
	if(!empty($address))
	{
		$return_html.= 'data-address="'.esc_attr(rawurldecode($address)).'" ';
	}
	
	if(!empty($marker))
	{
		$return_html.= 'data-icon="'.esc_attr(rawurldecode($marker)).'" ';
	}
		
	$return_html.= '>';
	
	if(!empty($popup))
	{
		$return_html.= '<div class="map-infowindow">'.rawurldecode($popup).'</div>';
	}
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	$ext_attr = array(
		'id' => 'map'.$custom_id,
		'zoom' => $zoom,
		'type' => $type,
	);
	
	$ext_attr_serialize = serialize($ext_attr);
	
	wp_enqueue_script("simplegmaps", get_template_directory_uri()."/js/jquery.simplegmaps.min.js", false, THEMEVERSION, true);
	wp_enqueue_script("script-contact-map".$custom_id, get_template_directory_uri()."/templates/script-map-shortcode.php?fullheight=true&data=".$ext_attr_serialize, false, THEMEVERSION, true);
	$return_html.= '</div>';
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('ppb_contact_map', 'ppb_contact_map_func');


function ppb_contact_sidebar_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'slug' => '',
		'subtitle' => '',
		'sidebar' => '',
		'sidebar_layout' => 'left',
		'padding' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$sidebar_class = '';
	if($sidebar_layout == 'left')
	{
		$sidebar_class = 'left_sidebar';
	}
	
	$return_html = '';
	$return_html.= '<div class="standard_wrapper">';
	$return_html.= '<div '.$sec_id.' class="one withsmallpadding" ';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.rawurldecode($custom_css).'" ';
	}
	
	$return_html.= '>';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner"><div class="inner_wrapper">';
	
	$return_html.= '<div class="sidebar_content '.esc_attr($sidebar_class).'">';
	
	//Display Title
	if(!empty($title))
	{
		$return_html.= '<h2 class="ppb_title">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
	}
	
	//Display Content
	if(!empty($subtitle))
	{
		$return_html.= '<div class="ppb_subtitle">'.rawurldecode($subtitle).'</div>';
	}
	
	if(!empty($title) OR !empty($subtitle))
	{
		$return_html.= '<div class="page_header_sep left"></div>';
	}
	
	//Display Content
	if(!empty($content))
	{
		$return_html.= '<div class="ppb_content">'.do_shortcode(photography_apply_content($content)).'</div>';
	}
	
	//Display contact form
	//Get contact form random ID
	$custom_id = time().rand();
    $pp_contact_form = unserialize(get_option('pp_contact_form_sort_data'));
    wp_enqueue_script("jquery.validate", get_template_directory_uri()."/js/jquery.validate.js", false, THEMEVERSION, true);
    
    wp_register_script("script-contact-form", get_template_directory_uri()."/templates/script-contact-form.php?form=".$custom_id, false, THEMEVERSION, true);
	$params = array(
	  'ajaxurl' => admin_url('admin-ajax.php'),
	  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
	);
	wp_localize_script( 'script-contact-form', 'tgAjax', $params );
	wp_enqueue_script("script-contact-form", get_template_directory_uri()."/templates/script-contact-form.php?form=".$custom_id, false, THEMEVERSION, true);

    $return_html.= '<div id="reponse_msg_'.$custom_id.'" class="contact_form_response"><ul></ul></div>';
    
    $return_html.= '<form id="contact_form_'.$custom_id.'" class="contact_form_wrapper" method="post" action="/wp-admin/admin-ajax.php">';
	$return_html.= '<input type="hidden" id="action" name="action" value="photography_contact_mailer"/>';

    if(is_array($pp_contact_form) && !empty($pp_contact_form))
    {
        foreach($pp_contact_form as $form_input)
        {
        	switch($form_input)
        	{
    				case 1:
    				
    				$return_html.= '<label for="your_name">'.esc_html__('Name *', 'photography-custom-post' ).'</label>
    				<input id="your_name" name="your_name" type="text" class="required_field" placeholder="'.esc_html__('Name *', 'photography-custom-post' ).'"/>
    				';	

    				break;
    				
    				case 2:
    				
    				$return_html.= '<label for="email">'.esc_html__('Email *', 'photography-custom-post' ).'</label>
    				<input id="email" name="email" type="text" class="required_field email" placeholder="'.esc_html__('Email *', 'photography-custom-post' ).'"/>
    				';	

    				break;
    				
    				case 3:
    				
    				$return_html.= '<label for="message">'.esc_html__('Message *', 'photography-custom-post' ).'</label>
    				<textarea id="message" name="message" rows="7" cols="10" class="required_field" style="width:95.5%;" placeholder="'.esc_html__('Message *', 'photography-custom-post' ).'"></textarea>
    				';	

    				break;
    				
    				case 4:
    				
    				$return_html.= '<label for="address">'.esc_html__('Address', 'photography-custom-post' ).'</label>
    				<input id="address" name="address" type="text" placeholder="'.esc_html__('Address', 'photography-custom-post' ).'"/>
    				';	

    				break;
    				
    				case 5:
    				
    				$return_html.= '<label for="phone">'.esc_html__('Phone', 'photography-custom-post' ).'</label>
    				<input id="phone" name="phone" type="text" placeholder="'.esc_html__('Phone', 'photography-custom-post' ).'"/>
    				';

    				break;
    				
    				case 6:
    				
    				$return_html.= '<label for="mobile">'.esc_html__('Mobile', 'photography-custom-post' ).'</label>
    				<input id="mobile" name="mobile" type="text" placeholder="'.esc_html__('Mobile', 'photography-custom-post' ).'"/>
    				';		

    				break;
    				
    				case 7:
    				
    				$return_html.= '<label for="company">'.esc_html__('Company Name', 'photography-custom-post' ).'</label>
    				<input id="company" name="company" type="text" placeholder="'.esc_html__('Company Name', 'photography-custom-post' ).'"/>
    				';

    				break;
    				
    				case 8:
    				
    				$return_html.= '<label for="country">'.esc_html__('Country', 'photography-custom-post' ).'</label>				
    				<input id="country" name="country" type="text" placeholder="'.esc_html__('Country', 'photography-custom-post' ).'"/>
    				';
    				break;
    			}
    		}
    	}

    	$pp_contact_enable_captcha = get_option('pp_contact_enable_captcha');
    	
    	if(!empty($pp_contact_enable_captcha))
    	{
    	
    	$return_html.= '<div id="captcha-wrap">
    		<div class="captcha-box">
    			<img src="'.get_template_directory_uri().'/get_captcha.php" alt="" id="captcha" />
    		</div>
    		<div class="text-box">
    			<label>Type the two words:</label>
    			<input name="captcha-code" type="text" id="captcha-code">
    		</div>
    		<div class="captcha-action">
    			<img src="'.get_template_directory_uri().'/images/refresh.jpg"  alt="" id="captcha-refresh" />
    		</div>
    	</div>
    	<br class="clear"/><br/>';
    
    }
    
    $return_html.= '<br/><br/><div class="contact_submit_wrapper">
    	<input id="contact_submit_btn'.$custom_id.'" name="contact_submit_btn'.$custom_id.'" type="submit" class="solidbg" value="'.esc_html__('Send', 'photography-custom-post' ).'"/>
    </div>';
    
	$return_html.= '</form>';
	
	
	$return_html.= '</div>';
	
	//Display Sidebar
	$return_html.= '<div class="sidebar_wrapper '.esc_attr($sidebar_class).'"><div class="sidebar"><div class="content"><ul class="sidebar_widget">';
	$return_html.= photography_get_dynamic_sidebar(rawurldecode($sidebar));
	$return_html.= '</ul></div></div></div>';
	
	$return_html.= '</div></div></div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('ppb_contact_sidebar', 'ppb_contact_sidebar_func');


function ppb_map_func($atts) {
	//extract short code attr
	extract(shortcode_atts(array(
		'height' => 600,
		'slug' => '',
		'lat' => 0,
		'long' => 0,
		'zoom' => 8,
		'type' => '',
		'popup' => '',
		'address' => '',
		'marker' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="one nopadding">';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);

	$custom_id = time().rand();
	$return_html = '<div class="map_shortcode_wrapper" id="map'.$custom_id.'" style="width:100%;height:'.esc_attr($height).'px">';
	$return_html.= '<div class="map-marker" ';
	
	if(!empty($popup))
	{
		$return_html.= 'data-title="'.esc_attr(rawurldecode($popup)).'" ';
	}
	
	if(!empty($lat) && !empty($long))
	{
		$return_html.= 'data-latlng="'.esc_attr(rawurldecode($lat)).','.esc_attr(rawurldecode($long)).'" ';
	}
	
	if(!empty($address))
	{
		$return_html.= 'data-address="'.esc_attr(rawurldecode($address)).'" ';
	}
	
	if(!empty($marker))
	{
		$return_html.= 'data-icon="'.esc_attr(rawurldecode($marker)).'" ';
	}
		
	$return_html.= '>';
	
	if(!empty($popup))
	{
		$return_html.= '<div class="map-infowindow">'.rawurldecode($popup).'</div>';
	}
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	$ext_attr = array(
		'id' => 'map'.$custom_id,
		'zoom' => $zoom,
		'type' => $type,
	);
	
	$ext_attr_serialize = serialize($ext_attr);
	
	//Setup Google Map API Key
	photography_set_map_api();
	
	wp_enqueue_script("simplegmaps", get_template_directory_uri()."/js/jquery.simplegmaps.min.js", false, THEMEVERSION, true);
	wp_enqueue_script("script-contact-map".$custom_id, get_template_directory_uri()."/templates/script-map-shortcode.php?data=".$ext_attr_serialize, false, THEMEVERSION, true);

	return $return_html;

}

add_shortcode('ppb_map', 'ppb_map_func');


function ppb_image_poppup_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'slug' => '',
		'title' => '',
		'subtitle' => '',
		'layout' => 'contain',
		'bgcolor' => '',
		'fontcolor' => '',
		'textalign' => 'left',
		'padding' => 60,
		'background' => '',
		'background_position' => '',
		'custom_css' => '',
		'builder_id' => '',
	), $atts));
	
	//Set begin wrapper div for live builder
	$return_html = photography_live_builder_begin_wrapper($builder_id);
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}

	$return_html.= '<div '.$sec_id.' class=" ';
	
	if($layout == 'contain')
	{
		$return_html.= 'standard_wrapper';
	}
	$return_html.= ' ppb_popup one ';
	
	if(!empty($background))
	{
		$return_html.= 'withbg ';
		$custom_css.= 'background-image:url('.esc_url($background).');';
	}
	
	if(!empty($background_position))
	{
		$custom_css.= 'background-position: center '.esc_attr($background_position).';';
	}

	$return_html.= '"';
	
	$custom_css.= 'padding:'.esc_attr($padding).'px 0 '.esc_attr($padding).'px 0;';
	
	$custom_css_fontcolor = '';
	$custom_css_bordercolor = '';
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_fontcolor.= 'color:'.esc_attr($fontcolor).';';
		$custom_css_bordercolor.= 'border-color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($custom_css))
	{
		$return_html.= ' style="'.esc_attr(rawurldecode($custom_css)).'" ';
	}
	
	$return_html.= '>';
	
	$return_html.= '<div class="page_content_wrapper"><div class="inner">';
	
	//Add content wrapper
	$return_html.= '<div class="overlay_gallery_wrapper" style="text-align:'.esc_attr($textalign).';background:'.esc_attr($bgcolor).';"><div class="overlay_gallery_border" style="'.esc_attr($custom_css_bordercolor).'"><div class="overlay_gallery_content">';
	
	//Add title and content
	if(!empty($subtitle))
	{
		$return_html.= '<div class="ppb_subtitle" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode($subtitle).'</div>';
	}
	
	//Add title and content
	if(!empty($title))
	{
		$return_html.= '<h2 class="ppb_title" style="'.esc_attr($custom_css_fontcolor).'">'.rawurldecode(photography_get_first_title_word($title)).'</h2>';
	}
	
	if(!empty($content))
	{
		$return_html.= '<hr class="title_break '.esc_attr($textalign).'" style="'.esc_attr($custom_css_bordercolor).'"/>';
		$return_html.= '<div class="ppb_header_content">'.do_shortcode(photography_apply_content($content)).'</div>';
	}
	
	$return_html.= '</div></div></div>';
	//End content wrapper
	
	$return_html.= '</div>';
	
	$return_html.= '</div>';
	
	$return_html.= '</div>';
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);

	return $return_html;

}

add_shortcode('ppb_image_poppup', 'ppb_image_poppup_func');


function ppb_animated_gallery_grid_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'title' => '',
		'slug' => '',
		'gallery_id' => '',
		'rows' => '',
		'builder_id' => '',
	), $atts));
	
	$sec_id = '';
	if(!empty($slug))
	{
		$sec_id = 'id="'.esc_attr($slug).'"';
	}
	
	$return_html = '<div '.$sec_id.' class="'.esc_attr($size).'">';
	
	//Set begin wrapper div for live builder
	$return_html.= photography_live_builder_begin_wrapper($builder_id);
	
	$images_arr = get_post_meta($gallery_id, 'wpsimplegallery_gallery', true);
	
	if(!empty($images_arr))
	{
		//Get contact form random ID
		$custom_id = time().rand();
	
		wp_enqueue_script("photography-modernizr", get_template_directory_uri()."/js/modernizr.js", false, THEMEVERSION, true);
		wp_enqueue_script("photography-jquery-gridrotator", get_template_directory_uri()."/js/jquery.gridrotator.js", false, THEMEVERSION, true);
		wp_enqueue_script("photography-script-gridrotator-".$custom_id, get_template_directory_uri()."/templates/script-gridrotator.php?grid=".$custom_id.'&amp;rows='.$rows, false, THEMEVERSION, true);
		
		$return_html.= '<div id="'.$custom_id.'" class="ri-grid ri-grid-size-3">';
		
		$return_html.= '<ul>';
		
		foreach($images_arr as $key => $image)
		{
			$image_url = wp_get_attachment_image_src($image, 'thumbnail', true);
			$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
			
			$return_html.= '<li><a href="#"><img src="'.esc_url($image_url[0]).'" alt="'.esc_attr($image_alt).'"/></a></li>';
		}
		
		$return_html.= '</ul>';
		$return_html.= '</div>';
	}
	
	//Set end wrapper div for live builder
	$return_html.= photography_live_builder_end_wrapper($builder_id);
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('ppb_animated_gallery_grid', 'ppb_animated_gallery_grid_func');


//Check if Layer slider is installed	
$revslider = ABSPATH . '/wp-content/plugins/revslider/revslider.php';

// Check if the file is available to prevent warnings
$pp_revslider_activated = file_exists($revslider);

if($pp_revslider_activated)
{
	function ppb_revslider_func($atts, $content) {
	
		//extract short code attr
		extract(shortcode_atts(array(
			'size' => 'one',
			'slug' => '',
			'slider_id' => '',
			'display' => '',
			'builder_id' => '',
		), $atts));
		
		$sec_id = '';
		if(!empty($slug))
		{
			$sec_id = 'id="'.esc_attr($slug).'"';
		}
	
		$return_html = '<div '.$sec_id.' class="'.esc_attr($size).' fullwidth ';
		
		if($display == 'force')
		{
			$return_html.= 'slideronly';
		}
		
		$return_html.= '">';
		
		//Set begin wrapper div for live builder
		$return_html.= photography_live_builder_begin_wrapper($builder_id);
		
		$return_html.= do_shortcode('[rev_slider '.$slider_id.']');
		
		//Set end wrapper div for live builder
		$return_html.= photography_live_builder_end_wrapper($builder_id);
		
		$return_html.= '</div>';
	
		return $return_html;
	
	}
	
	add_shortcode('ppb_revslider', 'ppb_revslider_func');
}
?>