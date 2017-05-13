<?php

function dropcap_func($atts, $content) {
	extract(shortcode_atts(array(
		'style' => 1
	), $atts));

	//get first char
	$first_char = mb_substr($content, 0, 1);
	$text_len = strlen($content);
	$rest_text = mb_substr($content, 1, $text_len);

	$return_html = '<span class="dropcap'.esc_attr($style).'">'.$first_char.'</span>';
	$return_html.= do_shortcode($rest_text);

	return $return_html;

}
add_shortcode('dropcap', 'dropcap_func');


function quote_func($atts, $content) {
	$return_html = '<blockquote>'.do_shortcode($content).'</blockquote>';

	return $return_html;
}
add_shortcode('quote', 'quote_func');


function tg_small_content_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => ''
	), $atts));

	$return_html = '<div class="post_excerpt ';
	if(!empty($class))
	{
		$return_html.= $class;
	}
	
	$return_html.= '">'.do_shortcode($content).'</div>';

	return $return_html;
}
add_shortcode('tg_small_content', 'tg_small_content_func');


function pre_func($atts, $content) {
	$return_html = '<pre>'.strip_tags($content).'</pre>';

	return $return_html;
}
add_shortcode('pre', 'pre_func');


function tg_button_func($atts, $content) {
	extract(shortcode_atts(array(
		'href' => '',
		'align' => '',
		'bg_color' => '',
		'text_color' => '',
		'size' => 'small',
		'style' => '',
		'color' => '',
		'shadow' => '',
		'target' => '_self',
	), $atts));

	if(!empty($color))
	{
		switch(strtolower($color))
		{
			case 'black':
				$bg_color = '#000000';
				$text_color = '#ffffff';
			break;

			case 'grey':
				$bg_color = '#97a2a2';
				$text_color = '#ffffff';
			break;

			case 'white':
				$bg_color = '#f5f5f5';
				$text_color = '#444444';
			break;

			case 'blue':
				$bg_color = '#5babe1';
				$text_color = '#ffffff';
			break;
			
			case 'dark blue':
				$bg_color = '#2980b9';
				$text_color = '#ffffff';
			break;

			case 'yellow':
				$bg_color = '#f2ce3e';
				$text_color = '#ffffff';
			break;

			case 'red':
				$bg_color = '#cb5f54';
				$text_color = '#ffffff';
			break;

			case 'orange':
				$bg_color = '#f4ae40';
				$text_color = '#ffffff';
			break;

			case 'green':
				$bg_color = '#76bb2c';
				$text_color = '#ffffff';
			break;
			
			case 'emerald':
				$bg_color = '#4ec380';
				$text_color = '#ffffff';
			break;

			case 'pink':
				$bg_color = '#ea6288';
				$text_color = '#ffffff';
			break;

			case 'purple':
				$bg_color = '#a368bc';
				$text_color = '#ffffff';
			break;
		}
	}
	
	if(!empty($bg_color))
	{
		$border_color = $bg_color;
	}
	else
	{
		$border_color = 'transparent';
	}
	
	//Get darker shadow color
	$shadow_color = '#'.photography_hex_darker(substr($bg_color, 1), 12);
	
	if(!empty($bg_color))
	{
		$return_html = '<a class="button '.esc_attr($size).' '.esc_attr($align).'" style="background-color:'.esc_attr($bg_color).' !important;color:'.esc_attr($text_color).' !important;border:1px solid '.esc_attr($bg_color).' !important;';
		
		if(!empty($shadow))
		{
			$return_html.= 'box-shadow: 0 3px 0 0 '.esc_attr($shadow_color).';';
		}
		
		$return_html.= $style.'"';
	}
	else
	{
		$return_html = '<a class="button '.esc_attr($size).' '.esc_attr($align).'"';
	}
	
	if(!empty($href))
	{
		$return_html.= ' onclick="window.open(\''.esc_url($href).'\', \''.esc_js($target).'\')"';
	}

	$return_html.= '>'.$content.'</a>';

	return $return_html;

}
add_shortcode('tg_button', 'tg_button_func');


function tg_social_icons_func($atts, $content) {

	extract(shortcode_atts(array(
		'style' => '',
		'size' => 'small',
	), $atts));

	$return_html = '<div class="social_wrapper shortcode '.esc_attr($style).' '.esc_attr($size).'"><ul>';
	
	$pp_facebook_url = get_option('pp_facebook_url');
    if(!empty($pp_facebook_url))
    {
		$return_html.='<li class="facebook"><a target="_blank" title="Facebook" href="'.esc_url($pp_facebook_url).'"><i class="fa fa-facebook-official"></i></a></li>';
	}
	
	$pp_twitter_username = get_option('pp_twitter_username');
	if(!empty($pp_twitter_username))
	{
		$return_html.='<li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/'.$pp_twitter_username.'"><i class="fa fa-twitter"></i></a></li>';
	}
	
	$pp_flickr_username = get_option('pp_flickr_username');
		    		
	if(!empty($pp_flickr_username))
	{
		$return_html.='<li class="flickr"><a target="_blank" title="Flickr" href="https://flickr.com/people/'.esc_attr($pp_flickr_username).'"><i class="fa fa-flickr"></i></a></li>';
	}
		    		
	$pp_youtube_url = get_option('pp_youtube_url');
	if(!empty($pp_youtube_url))
	{
		$return_html.='<li class="youtube"><a target="_blank" title="Youtube" href="'.esc_url($pp_youtube_url).'"><i class="fa fa-youtube"></i></a></li>';
	}

	$pp_vimeo_username = get_option('pp_vimeo_username');
	if(!empty($pp_vimeo_username))
	{
		$return_html.='<li class="vimeo"><a target="_blank" title="Vimeo" href="https://vimeo.com/'.$pp_vimeo_username.'"><i class="fa fa-vimeo-square"></i></a></li>';
	}

	$pp_tumblr_username = get_option('pp_tumblr_username');
	if(!empty($pp_tumblr_username))
	{
		$return_html.='<li class="tumblr"><a target="_blank" title="Tumblr" href="https://'.$pp_tumblr_username.'.tumblr.com"><i class="fa fa-tumblr"></i></a></li>';
	}
	
	$pp_google_url = get_option('pp_google_url');
    		
    if(!empty($pp_google_url))
    {
		$return_html.='<li class="google"><a target="_blank" title="Google+" href="'.esc_url($pp_google_url).'"><i class="fa fa-google-plus"></i></a></li>';
	}
		    		
	$pp_dribbble_username = get_option('pp_dribbble_username');
	if(!empty($pp_dribbble_username))
	{
		$return_html.='<li class="dribbble"><a target="_blank" title="Dribbble" href="https://dribbble.com/'.$pp_dribbble_username.'"><i class="fa fa-dribbble"></i></a></li>';
	}
	
	$pp_linkedin_url = get_option('pp_linkedin_url');
    if(!empty($pp_linkedin_url))
    {
		$return_html.='<li class="linkedin"><a target="_blank" title="Linkedin" href="'.$pp_linkedin_url.'"><i class="fa fa-linkedin"></i></a></li>';
	}
		            
	$pp_pinterest_username = get_option('pp_pinterest_username');
	if(!empty($pp_pinterest_username))
	{
		$return_html.='<li class="pinterest"><a target="_blank" title="Pinterest" href="https://pinterest.com/'.$pp_pinterest_username.'"><i class="fa fa-pinterest"></i></a></li>';
	}
		        	
	$pp_instagram_username = get_option('pp_instagram_username');
	if(!empty($pp_instagram_username))
	{
		$return_html.='<li class="instagram"><a target="_blank" title="Instagram" href="https://instagram.com/'.strtolower($pp_instagram_username).'"><i class="fa fa-instagram"></i></a></li>';
	}
	
	$pp_behance_username = get_option('pp_behance_username');
    if(!empty($pp_behance_username))
	{
		$return_html.='<li class="behance"><a target="_blank" title="Behance" href="https://behance.net/'.$pp_behance_username.'"><i class="fa fa-behance-square"></i></a></li>';
	}
	
	$pp_500px_url = get_option('pp_500px_url');
			    		
	if(!empty($pp_500px_url))
	{
		$return_html.='<li class="500px"><a target="_blank" title="500px" href="'.$pp_500px_url.'"><i class="fa fa-500px"></i></a></li>';
	}
	
	$return_html.= '</ul></div>';

	return $return_html;

}
add_shortcode('tg_social_icons', 'tg_social_icons_func');


function tg_social_share_func($atts, $content) {
	$return_html = '<div class="social_share_wrapper shortcode">';
	$return_html.='<h5>'.esc_html__( 'Share On', 'photography-custom-post' ).'</h5><br/><br/>';
	$return_html.='<ul>';
	$return_html.='<li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"><i class="fa fa-facebook marginright"></i></a></li>';
	$return_html.='<li><a target="_blank" href="https://twitter.com/intent/tweet?original_referer='.get_permalink().'&url='.get_permalink().'"><i class="fa fa-twitter marginright"></i></a></li>';
	$return_html.='<li><a target="_blank" href="http://www.pinterest.com/pin/create/button/?url='.urlencode(get_permalink()).'"><i class="fa fa-pinterest marginright"></i></a></li>';
	$return_html.='<li><a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"><i class="fa fa-google-plus marginright"></i></a></li>';
	$return_html.='</ul>';
	$return_html.='</div>';

	return $return_html;
}
add_shortcode('tg_social_share', 'tg_social_share_func');


function highlight_func($atts, $content) {
	extract(shortcode_atts(array(
		'type' => 'yellow',
	), $atts));
	
	$return_html = '';
	$return_html.= '<span class="highlight_'.esc_attr($type).'">'.strip_tags($content).'</span>';

	return $return_html;
}
add_shortcode('highlight', 'highlight_func');


function one_half_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_half '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div>';	

	return $return_html;
}
add_shortcode('one_half', 'one_half_func');


function one_half_bg_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'bg' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'padding' => 20,
	), $atts));

	$return_html = '<div class="one_half_bg '.esc_attr($class).'"';
	
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($bg))
	{
		$custom_css.= 'background: transparent url('.esc_url($bg).') no-repeat;'.esc_attr($style).';';
	}
	
	$return_html.= ' style="'.esc_attr($custom_css).'">';
	$return_html.= '<div style="padding:'.esc_attr($padding).'px;box-sizing:border-box">';
	$return_html.= do_shortcode($content).'</div></div>';	

	return $return_html;
}
add_shortcode('one_half_bg', 'one_half_bg_func');


function one_half_last_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_half last '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div><br class="clear"/>';

	return $return_html;
}
add_shortcode('one_half_last', 'one_half_last_func');


function one_third_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_third '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div>';

	return $return_html;
}
add_shortcode('one_third', 'one_third_func');


function one_third_bg_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'bg' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'padding' => 10,
	), $atts));

	$return_html = '<div class="one_third_bg '.esc_attr($class).'"';
	
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($bg))
	{
		$return_html.= 'background: transparent url('.esc_url($bg).') no-repeat;'.esc_attr($style).';';
	}
	
	$return_html.= ' style="'.esc_attr($custom_css).'">';
	$return_html.= '<div style="padding:'.esc_attr($padding).'px;box-sizing:border-box">';
	$return_html.= do_shortcode($content).'</div></div>';	

	return $return_html;
}
add_shortcode('one_third_bg', 'one_third_bg_func');


function one_third_last_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_third last '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div><br class="clear"/>';

	return $return_html;
}
add_shortcode('one_third_last', 'one_third_last_func');


function two_third_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="two_third '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div>';

	return $return_html;
}
add_shortcode('two_third', 'two_third_func');


function two_third_bg_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'bg' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'padding' => 20,
	), $atts));

	$return_html = '<div class="two_third_bg '.esc_attr($class).'"';
	
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($bg))
	{
		$return_html.= 'background: transparent url('.esc_url($bg).') no-repeat;'.esc_attr($style).';';
	}
	
	$return_html.= ' style="'.esc_attr($custom_css).'">';
	$return_html.= '<div style="padding:'.esc_attr($padding).'px;box-sizing:border-box">';
	$return_html.= do_shortcode($content).'</div></div>';	

	return $return_html;
}
add_shortcode('two_third_bg', 'two_third_bg_func');


function two_third_last_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="two_third last '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div><br class="clear"/>';

	return $return_html;
}
add_shortcode('two_third_last', 'two_third_last_func');


function one_fourth_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_fourth '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div>';

	return $return_html;
}
add_shortcode('one_fourth', 'one_fourth_func');


function one_fourth_bg_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'bg' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'custom_css' => '',
		'padding' => 10,
	), $atts));

	$return_html = '<div class="one_fourth_bg '.esc_attr($class).'"';
	
	if(!empty($bgcolor))
	{
		$custom_css.= 'background-color:'.esc_attr($bgcolor).';';
	}
	if(!empty($fontcolor))
	{
		$custom_css.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($bg))
	{
		$return_html.= 'background: transparent url('.esc_url($bg).') no-repeat;'.esc_attr($style).';';
	}
	
	$return_html.= ' style="'.esc_attr($custom_css).'">';
	$return_html.= '<div style="padding:'.esc_attr($padding).'px;box-sizing:border-box">';
	$return_html.= do_shortcode($content).'</div></div>';	

	return $return_html;
}
add_shortcode('one_fourth_bg', 'one_fourth_bg_func');


function one_fourth_last_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_fourth last '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div><br class="clear"/>';

	return $return_html;
}
add_shortcode('one_fourth_last', 'one_fourth_last_func');


function one_fifth_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_fifth '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div>';

	return $return_html;
}
add_shortcode('one_fifth', 'one_fifth_func');


function one_fifth_last_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_fifth last '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div><br class="clear"/>';

	return $return_html;
}
add_shortcode('one_fifth_last', 'one_fifth_last_func');


function one_sixth_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_sixth '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div>';

	return $return_html;
}
add_shortcode('one_sixth', 'one_sixth_func');


function one_sixth_last_func($atts, $content) {
	extract(shortcode_atts(array(
		'class' => '',
		'custom_css' => '',
	), $atts));

	$return_html = '<div class="one_sixth last '.esc_attr($class).'" style="'.esc_attr($custom_css).'">'.do_shortcode($content).'</div><br class="clear"/>';

	return $return_html;
}
add_shortcode('one_sixth_last', 'one_sixth_last_func');


function tg_pre_func($atts, $content) {
	extract(shortcode_atts(array(
		'title' => '',
		'close' => 1,
	), $atts));
	
	$return_html = '';
	$return_html.= '<pre>';
	$return_html.= $content;
	$return_html.= '</pre>';

	return $return_html;
}
add_shortcode('tg_pre', 'tg_pre_func');


function tg_map_func($atts) {
	//extract short code attr
	extract(shortcode_atts(array(
		'width' => 400,
		'height' => 300,
		'lat' => 0,
		'long' => 0,
		'zoom' => 12,
		'type' => '',
		'popup' => '',
		'address' => '',
		'marker' => '',
	), $atts));

	$custom_id = time().rand();
	$return_html = '<div class="map_shortcode_wrapper" id="map'.$custom_id.'" style="width:'.esc_attr($width).'px;height:'.esc_attr($height).'px">';
	$return_html.= '<div class="map-marker" ';
	
	if(!empty($popup))
	{
		$return_html.= 'data-title="'.esc_attr($popup).'" ';
	}
	
	if(!empty($lat) && !empty($long))
	{
		$return_html.= 'data-latlng="'.esc_attr($lat.','.$long).'" ';
	}
	
	if(!empty($address))
	{
		$return_html.= 'data-address="'.esc_attr($address).'" ';
	}
	
	if(!empty($marker))
	{
		$return_html.= 'data-icon="'.esc_attr($marker).'" ';
	}
		
	$return_html.= '>';
	
	if(!empty($popup))
	{
		$return_html.= '<div class="map-infowindow">'.$popup.'</div>';
	}
	
	$return_html.= '</div>';
	$return_html.= '</div>';
	
	$ext_attr = array(
		'id' => 'map'.$custom_id,
		'zoom' => $zoom,
		'type' => $type,
	);
	
	$ext_attr_serialize = serialize($ext_attr);
	
	//Setup Google Map API Key
	photography_set_map_api();
	
	wp_enqueue_script("photography-simplegmaps", get_template_directory_uri()."/js/jquery.simplegmaps.min.js", false, THEMEVERSION, true);
	wp_enqueue_script("photography-script-contact-map".$custom_id, get_template_directory_uri()."/templates/script-map-shortcode.php?data=".$ext_attr_serialize, false, THEMEVERSION, true);

	return $return_html;

}

add_shortcode('tg_map', 'tg_map_func');


function tg_grid_gallery_func($atts, $content) {
	extract(shortcode_atts(array(
		'gallery_id' => '',
		'layout' => 'wide',
		'columns' => 4,
		'items' => 0,
	), $atts));

	$images_arr = get_post_meta($gallery_id, 'wpsimplegallery_gallery', true);
	$images_arr = photography_resort_gallery_img($images_arr);
	
	$return_html = '';
	$custom_id = time().rand();
	
	if(!is_numeric($columns))
	{
		$columns = 4;
	}
	
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
		
		case 5:
			$wrapper_class = 'five_cols';
			$grid_wrapper_class = 'classic5_cols';
			$column_class = 'one_fifth gallery5';
		break;
	}
	
	//Check if enable infinite scroll
	if($items > 0)
	{
		wp_register_script("photography-script-gallery-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-gallery-infinite-scroll.php?id=".$custom_id.'&gallery_id='.$gallery_id.'&items='.$items.'&columns='.$columns, false, THEMEVERSION, true);
		$params = array(
		  'ajaxurl' => admin_url('admin-ajax.php'),
		  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
		);
		
		wp_localize_script("photography-script-gallery-infinite-scroll-".$custom_id, 'tgAjax', $params );
		wp_enqueue_script("photography-script-gallery-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-gallery-infinite-scroll.php?id=".$custom_id.'&gallery_id='.$gallery_id.'&items='.$items.'&columns='.$columns.'&type=grid', false, THEMEVERSION, true);
	}

	if(!empty($images_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_filter_wrapper gallery '.esc_attr($wrapper_class).' ' .esc_attr($layout).'" data-columns="'.esc_attr($columns).'">';
		
		$i = 0;
		foreach($images_arr as $key => $image)
		{
			if ($items == 0 OR $i < $items) 
			{
				$image_url = wp_get_attachment_image_src($image, 'original', true);
				$small_image_url = wp_get_attachment_image_src($image, 'photography-gallery-grid', true);
				
				$image_caption = get_post_field('post_excerpt', $image);
				$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
				
				$tg_lightbox_enable_caption = kirki_get_option('tg_lightbox_enable_caption');
				
				//Get image purchase URL
				$photography_purchase_url = get_post_meta($image, 'photography_purchase_url', true);
				
				if(!empty($photography_purchase_url))
				{
				    $image_caption.= '<a href="'.esc_url($photography_purchase_url).'" class="button ghost"><i class="fa fa-shopping-cart marginright"></i>'.esc_html__( 'Purchase', 'photography-translation' ).'</a>';
				}
				
				$return_html.= '<div class="element grid  ' .esc_attr($grid_wrapper_class).'">';
				$return_html.= '<div class="'.esc_attr($column_class).' static filterable gallery_type animated'.esc_attr($key+1).'">';
				$return_html.= '<a class="fancy-gallery" href="'.esc_url($image_url[0]).'" ';
				
				if(!empty($tg_lightbox_enable_caption)) 
				{
					$return_html.= 'data-caption="'.esc_attr($image_caption).'" ';
				}
				
				$return_html.= '>';
				$return_html.= '<img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($image_alt).'"/>';
				
				$return_html.= '</a>';
				$return_html.= '</div>';
				$return_html.= '</div>';
				
				$i++;
			}
			else
			{
				break;
			}
		}
		
		$return_html.= '</div>';
		
		//Check if enable infinite scroll
		if($items > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr(count($images_arr)).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	else
	{
		$return_html.= esc_html__( 'Empty gallery item. Please make sure you have upload image to it or check the short code.', 'photography-custom-post' );
	}

	return $return_html;
}
add_shortcode('tg_grid_gallery', 'tg_grid_gallery_func');


function tg_masonry_gallery_func($atts, $content) {
	extract(shortcode_atts(array(
		'gallery_id' => '',
		'layout' => 'wide',
		'columns' => 4,
		'items' => 0,
	), $atts));

	$images_arr = get_post_meta($gallery_id, 'wpsimplegallery_gallery', true);
	$images_arr = photography_resort_gallery_img($images_arr);
	
	$return_html = '';
	$custom_id = time().rand();
	
	if(!is_numeric($columns))
	{
		$columns = 4;
	}
	
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
		
		case 5:
			$wrapper_class = 'five_cols';
			$grid_wrapper_class = 'classic5_cols';
			$column_class = 'one_fifth gallery5';
		break;
	}
	
	//Check if enable infinite scroll
	if($items > 0)
	{
		wp_register_script("photography-script-gallery-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-gallery-infinite-scroll.php?id=".$custom_id.'&gallery_id='.$gallery_id.'&items='.$items.'&columns='.$columns.'&type=masonry', false, THEMEVERSION, true);
		$params = array(
		  'ajaxurl' => admin_url('admin-ajax.php'),
		  'ajax_nonce' => wp_create_nonce('tgajax-post-contact-nonce'),
		);
		
		wp_localize_script("photography-script-gallery-infinite-scroll-".$custom_id, 'tgAjax', $params );
		wp_enqueue_script("photography-script-gallery-infinite-scroll-".$custom_id, get_template_directory_uri()."/templates/script-gallery-infinite-scroll.php?id=".$custom_id.'&gallery_id='.$gallery_id.'&items='.$items.'&columns='.$columns.'&type=masonry', false, THEMEVERSION, true);
	}

	if(!empty($images_arr))
	{
		if($layout == 'contain')
		{
			$return_html.= '<div class="standard_wrapper">';
		}
	
		$return_html.= '<div id="'.$custom_id.'" class="portfolio_filter_wrapper gallery '.esc_attr($wrapper_class).' ' .esc_attr($layout).'" data-columns="'.esc_attr($columns).'">';
		
		$i = 0;
		foreach($images_arr as $key => $image)
		{
			if ($items == 0 OR $i < $items) 
			{
				$image_url = wp_get_attachment_image_src($image, 'original', true);
				$small_image_url = wp_get_attachment_image_src($image, 'photography-gallery-masonry', true);
				
				$image_caption = get_post_field('post_excerpt', $image);
				$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
				
				$tg_lightbox_enable_caption = kirki_get_option('tg_lightbox_enable_caption');
				
				//Get image purchase URL
				$photography_purchase_url = get_post_meta($image, 'photography_purchase_url', true);
				
				if(!empty($photography_purchase_url))
				{
				    $image_caption.= '<a href="'.esc_url($photography_purchase_url).'" class="button ghost"><i class="fa fa-shopping-cart marginright"></i>'.esc_html__( 'Purchase', 'photography-translation' ).'</a>';
				}
				
				$return_html.= '<div class="element grid  ' .esc_attr($grid_wrapper_class).'">';
				$return_html.= '<div class="'.esc_attr($column_class).' static filterable gallery_type animated'.esc_attr($key+1).'">';
				$return_html.= '<a class="fancy-gallery" href="'.esc_url($image_url[0]).'" ';
				
				if(!empty($tg_lightbox_enable_caption)) 
				{
					$return_html.= 'data-caption="'.esc_attr($image_caption).'" ';
				}
				
				$return_html.= '>';
				$return_html.= '<img src="'.esc_url($small_image_url[0]).'" alt="'.esc_attr($image_alt).'"/>';
				
				$return_html.= '</a>';
				$return_html.= '</div>';
				$return_html.= '</div>';
				
				$i++;
			}
			else
			{
				break;
			}
		}
		
		$return_html.= '</div>';
		
		//Check if enable infinite scroll
		if($items > 0)
		{
			$return_html.= '<div class="infinite_loading" id="'.$custom_id.'_loading"><i class="fa fa-circle-o-notch fa-spin"></i></div>';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_offset" name="'.$custom_id.'_offset" value="'.esc_attr($items).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_total" name="'.$custom_id.'_total" value="'.esc_attr(count($images_arr)).'" />';
			$return_html.= '<input type="hidden" id="'.$custom_id.'_status" name="'.$custom_id.'_status" value="0" />';
		}
		
		if($layout == 'contain')
		{
			$return_html.= '</div>';
		}
	}
	else
	{
		$return_html.= esc_html__( 'Empty gallery item. Please make sure you have upload image to it or check the short code.', 'photography-custom-post' );
	}

	return $return_html;
}
add_shortcode('tg_masonry_gallery', 'tg_masonry_gallery_func');


function tg_image_func($atts, $content) {
	extract(shortcode_atts(array(
		'src' => '',
		'animation' => '',
		'frame' => '',
		'style' => '',
	), $atts));

	$return_html = '';
	$frame_class = '';
	
	switch($frame)
	{
		case 'border':
		default:
			$frame_class = 'border';
		break;
		
		case 'glow':
			$frame_class = 'glow';
		break;
		
		case 'dropshadow':
			$frame_class = 'dropshadow';
		break;
		
		case 'bottomshadow':
			$frame_class = 'bottomshadow';
		break;
	}
	
	$image_class = '';
	if(!empty($animation))
	{
		$image_class = 'animated';
	}
	
	if(!empty($frame))
	{
		$return_html.= '<div class="image_classic_frame '.esc_attr($frame_class).'">';
	}
	$return_html.= '<img src="'.esc_url($src).'" alt="" class="'.esc_attr($image_class).'" data-animation="'.esc_attr($animation).'" style="'.esc_attr($style).'" />';
	if(!empty($frame))
	{
		$return_html.= '</div>';
	}

	return $return_html;

}
add_shortcode('tg_image', 'tg_image_func');


function tg_teaser_func($atts, $content) {
	extract(shortcode_atts(array(
		'image' => '',
		'columns' => 'one_third',
		'title' => '',
		'align' => '',
		'bgcolor' => '',
		'fontcolor' => '',
		'padding' => '',
	), $atts));

	$custom_wrapper = '';
	$custom_header = '';
	
	if(!empty($bgcolor))
	{
		$custom_wrapper.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($fontcolor))
	{
		$custom_wrapper.= 'color:'.esc_attr($fontcolor).';';
		$custom_header.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($padding))
	{
		$custom_wrapper.= 'padding:'.esc_attr($padding).'px;';
	}
	
	$return_html = '<div class="teaser_wrapper '.esc_attr($columns).' '.esc_attr($align).'" style="'.esc_attr($custom_wrapper).'">';
	
	if(!empty($image))
	{
		//Get image width and height
    	$image_id = photography_get_image_id($image);
    	$obj_image = wp_get_attachment_image_src($image_id, 'original');
    	$image_width = 0;
    	$image_height = 0;
    	
    	if(isset($obj_image[1]))
    	{
    		$image_width = $obj_image[1];
    	}
    	if(isset($obj_image[2]))
    	{
    		$image_height = $obj_image[2];
    	}
    	    		
		$return_html.= '<img src="'.esc_url($image).'" alt="" ';
		
		if($image_width > 0 && $image_height > 0)
		{
			$return_html.= 'width="'.$image_width.'" height="'.$image_height.'"';
		}
		
		$return_html.= ' />';
	}
	
	if(!empty($title) OR !empty($content))
	{
		$return_html.= '<div class="teaser_content_wrapper">';
		
		if(!empty($title))
		{
			$return_html.= '<h5 style="'.esc_attr($custom_header).'">'.$title.'</h5>';
		}
		
		if(!empty($content))
		{
			$return_html.= '<div class="teaser_content">'.do_shortcode($content).'</div>';
		}
		
		$return_html.= '</div>';
	}
	
	$return_html.= '</div>';

	return $return_html;

}
add_shortcode('tg_teaser', 'tg_teaser_func');


function tg_grid_portfolio_func($atts, $content) {
	extract(shortcode_atts(array(
		'columns' => '3',
		'items' => '-1',
		'cat' => '',
	), $atts));

	//Get portfolios items
	$args = array(
	    'numberposts' => $items,
	    'order' => 'ASC',
	    'orderby' => 'menu_order',
	    'post_type' => array('portfolios'),
	    'suppress_filters' => 0,
	);

	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	$columns_class = 'three_cols';
	switch($columns)
	{
		case 2:
			$columns_class = 'two_cols';
		break;
		
		case 3:
		default:
			$columns_class = 'three_cols';
			$columns = 3;
		break;
		
		case 4:
			$columns_class = 'four_cols';
		break;
	}
	
	$return_html = '';
	$custom_id = time().rand();

	if(!empty($portfolios_arr))
	{
		$return_html.= '<div id="'.$custom_id.'" class="photo_wall_wrapper shortcode" data-columns="'.esc_attr($columns).'">';
		
		foreach($portfolios_arr as $key => $portoflio_item)
		{
			$image_url = '';
	    	$portfolio_ID = $portoflio_item->ID;
	    			
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
	    	
	    	$last_class = '';
	    	if(($key)%3==0)
	    	{
	    		$last_class = 'last';
	    	}
	    	
	    	$return_html.= '<div class="wall_entry '.esc_attr($columns_class).'">';
	    	
	    	if(!empty($image_url[0]))
			{
				$return_html.= '<div class="wall_thumbnail dynamic_height gallery_type animated'.($key+1).'">';
				
		    	$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
		    	$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
		    		
		    	switch($portfolio_type)
		    	{
		    		case 'External Link':
		    			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
		    	
				    	$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
	
				        $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		    	
		    		break;
		    		//end external link
		    		
		    		case 'Portfolio Content':
	        		default:

						$return_html.= '<a href="'.esc_url(get_permalink($portfolio_ID)).'">
			        		<img src="'.esc_url($small_image_url[0]).'" alt="" />
			        	';
		    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		        
		    		break;
		    		//end external link
		    		
		    		case 'Fullscreen Vimeo Video':
	        		case 'Fullscreen Youtube Video':
	        		case 'Fullscreen Self-Hosted Video':

			        	$return_html.= '<a href="'.esc_url(get_permalink($portfolio_ID)).'">
			        		<img src="'.esc_url($small_image_url[0]).'" alt="" />
			        	';
		    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		        
	        		break;
	        		//end fullscreen video Content
	        		
	        		case 'Image':
		    	
				    	$return_html.= '<a data-title="'.esc_attr($portoflio_item->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		    	
		    		break;
		    		//end image
		    		
		    		case 'Youtube Video':
		    	
				    	$return_html.= '<a title="'.esc_attr($portoflio_item->post_title).'" href="#video_'.$portfolio_video_id.'" class="lightbox_youtube">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
			    		
				    	$return_html.= '<div style="display:none;">
				    	    <div id="video_'.$portfolio_video_id.'" style="width:900px;height:488px" class="video-container">
				    	        
				    	        <iframe title="YouTube video player" width="900" height="488" src="//www.youtube.com/embed/'.$portfolio_video_id.'?theme=dark&amp;rel=0&amp;wmode=transparent" allowfullscreen></iframe>
				    	        
				    	    </div>	
				    	</div>';
		    	
		    		break;
		    		//end youtube
		    	
			    	case 'Vimeo Video':
				    	$return_html.= '<a title="'.esc_attr($portoflio_item->post_title).'" href="#video_'.$portfolio_video_id.'" class="lightbox_vimeo">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
				    		
				    	$return_html.= '<div style="display:none;">
				    	    <div id="video_'.$portfolio_video_id.'" style="width:900px;height:506px" class="video-container">
				    	    
				    	        <iframe src="//player.vimeo.com/video/'.$portfolio_video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="900" height="506"></iframe>
				    	        
				    	    </div>	
				    	</div>';
			    	
			    	break;
			    	//end vimeo
			    		
			    	case 'Self-Hosted Video':
			    	
			    		//Get video URL
			    		$portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
			    		$preview_image = wp_get_attachment_image_src($image_id, 'large', true);

				    	$return_html.= '<a title="'.esc_attr($portoflio_item->post_title).'" href="#video_self_'.$key.'" class="lightbox_vimeo">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			
				    	$return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'></h4>
				    	</div>
				    	</a>';
				    		
				    	$return_html.= '<div style="display:none;">
				    	    <div id="video_self_'.$key.'" style="width:900px;height:488px" class="video-container">
				    	    
				    	        <div id="self_hosted_vid_'.$key.'"></div>';
				    	$return_html.= do_shortcode('[jwplayer id="self_hosted_vid_'.$key.'" file="'.esc_url($portfolio_mp4_url).'" image="'.esc_url($preview_image[0]).'" width="900" height="488"]');
			    	        
			    	    $return_html.= '</div></div>';
			    	
			    		break;
			    		//end self-hosted
			    	}
			    	//end switch
				
				$return_html.= '</div>';
			}
	    	
	    	$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	else
	{
		$return_html.= esc_html__( 'Empty portfolio item. Please make sure you have created portfolio item or check the short code.', 'photography-custom-post' );
	}

	$return_html.= '<br class="clear"/>';
	wp_enqueue_script("photography-script-portfolio-shortcode-".$custom_id, get_template_directory_uri()."/templates/script-portfolio-shortcode.php?id=".$custom_id, false, THEMEVERSION, true);

	return $return_html;
}
add_shortcode('tg_grid_portfolio', 'tg_grid_portfolio_func');


function tg_filter_portfolio_func($atts, $content) {
	extract(shortcode_atts(array(
		'columns' => '3',
		'items' => '-1',
		'cat' => '',
	), $atts));

	//Get portfolios items
	$args = array(
	    'numberposts' => $items,
	    'order' => 'ASC',
	    'orderby' => 'menu_order',
	    'post_type' => array('portfolios'),
	    'suppress_filters' => 0,
	);

	if(!empty($cat))
	{
		$args['portfoliosets'] = $cat;
	}
	
	$portfolios_arr = get_posts($args);
	
	$columns_class = 'three_cols';
	switch($columns)
	{
		case 2:
			$columns_class = 'two_cols';
		break;
		
		case 3:
		default:
			$columns_class = 'three_cols';
			$columns = 3;
		break;
		
		case 4:
			$columns_class = 'four_cols';
		break;
	}
	
	$return_html = '';
	
	//Get all sets and sorting option
	$pp_portfolio_set_sort = get_option('pp_portfolio_set_sort');
	
	$sets_arr = get_terms('portfoliosets', 'hide_empty=0&hierarchical=0&parent=0&orderby='.$pp_portfolio_set_sort);
	
	//Random portfolio wrapper ID
	$portfolio_wrapper_id = rand().time();
	    
	if(!empty($sets_arr) && empty($term))
	{
	    $return_html.= '<ul class="portfolio_filters portfolio-main filter shortcode"> 
	    	<li class="all-projects active">
	    		<a data-target="'.esc_attr($portfolio_wrapper_id).'" class="active" href="javascript:;" data-filter="*">'.esc_html__( 'All', 'photography-custom-post' ).'</a>
	    		<span class="separator">/</span>
	    	</li>';
	    	
	    	foreach($sets_arr as $key => $set_item)
	    	{
		    	$return_html.= '<li class="cat-item '.esc_attr($set_item->slug).'" data-type="'.esc_attr($set_item->slug).'" style="clear:none">
		    		<a data-target="'.esc_attr($portfolio_wrapper_id).'" data-filter=".'.esc_attr($set_item->slug).'" href="javascript:;" title="'.esc_attr($set_item->name).'">'.$set_item->name.'</a>
		    		<span class="separator">/</span>
		    	</li>';
	    	}
	    $return_html.= '</ul><br class="clear"/>';
	}

	if(!empty($portfolios_arr))
	{
		$return_html.= '<div id="'.$portfolio_wrapper_id.'" class="photo_wall_wrapper shortcode" data-columns="'.esc_attr($columns).'">';
		
		foreach($portfolios_arr as $key => $portoflio_item)
		{
			$image_url = '';
	    	$portfolio_ID = $portoflio_item->ID;
	    			
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
	    	
	    	$last_class = '';
	    	if(($key)%3==0)
	    	{
	    		$last_class = 'last';
	    	}
	    	
	    	$portfolio_item_set = '';
	    	$portfolio_item_sets = wp_get_object_terms($portfolio_ID, 'portfoliosets');
	    	
	    	if(is_array($portfolio_item_sets))
	    	{
	    	    foreach($portfolio_item_sets as $set)
	    	    {
	    	    	$portfolio_item_set.= $set->slug.' ';
	    	    }
	    	}
	    	
	    	$return_html.= '<div class="wall_entry '.esc_attr($columns_class).' '.esc_attr($portfolio_item_set).'">';
	    	
	    	if(!empty($image_url[0]))
			{
				$return_html.= '<div class="wall_thumbnail dynamic_height gallery_type animated'.($key+1).'">';
				
		    	$portfolio_type = get_post_meta($portfolio_ID, 'portfolio_type', true);
		    	$portfolio_video_id = get_post_meta($portfolio_ID, 'portfolio_video_id', true);
		    		
		    	switch($portfolio_type)
		    	{
		    		case 'External Link':
		    			$portfolio_link_url = get_post_meta($portfolio_ID, 'portfolio_link_url', true);
		    	
				    	$return_html.= '<a target="_blank" href="'.esc_url($portfolio_link_url).'">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
	
				        $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		    	
		    		break;
		    		//end external link
		    		
		    		case 'Portfolio Content':
	        		default:

						$return_html.= '<a href="'.esc_url(get_permalink($portfolio_ID)).'">
			        		<img src="'.esc_url($small_image_url[0]).'" alt="" />
			        	';
		    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		        
		    		break;
		    		//end external link
		    		
		    		case 'Fullscreen Vimeo Video':
	        		case 'Fullscreen Youtube Video':
	        		case 'Fullscreen Self-Hosted Video':

			        	$return_html.= '<a href="'.esc_url(get_permalink($portfolio_ID)).'">
			        		<img src="'.esc_url($small_image_url[0]).'" alt="" />
			        	';
		    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		        
	        		break;
	        		//end fullscreen video Content
	        		
	        		case 'Image':
		    	
				    	$return_html.= '<a data-title="'.esc_attr($portoflio_item->post_title).'" href="'.esc_url($image_url[0]).'" class="fancy-gallery">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
		    	
		    		break;
		    		//end image
		    		
		    		case 'Youtube Video':
		    	
				    	$return_html.= '<a title="'.esc_attr($portoflio_item->post_title).'" href="#video_'.$portfolio_video_id.'" class="lightbox_youtube">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			    	
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
			    		
				    	$return_html.= '<div style="display:none;">
				    	    <div id="video_'.$portfolio_video_id.'" style="width:900px;height:488px" class="video-container">
				    	        
				    	        <iframe title="YouTube video player" width="900" height="488" src="//www.youtube.com/embed/'.$portfolio_video_id.'?theme=dark&amp;rel=0&amp;wmode=transparent" allowfullscreen></iframe>
				    	        
				    	    </div>	
				    	</div>';
		    	
		    		break;
		    		//end youtube
		    	
			    	case 'Vimeo Video':
				    	$return_html.= '<a title="'.esc_attr($portoflio_item->post_title).'" href="#video_'.$portfolio_video_id.'" class="lightbox_vimeo">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			
			            $return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'</h4>
				    	</div>
				    	</a>';
				    		
				    	$return_html.= '<div style="display:none;">
				    	    <div id="video_'.$portfolio_video_id.'" style="width:900px;height:506px" class="video-container">
				    	    
				    	        <iframe src="https://player.vimeo.com/video/'.$portfolio_video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="900" height="506"></iframe>
				    	        
				    	    </div>	
				    	</div>';
			    	
			    	break;
			    	//end vimeo
			    		
			    	case 'Self-Hosted Video':
			    	
			    		//Get video URL
			    		$portfolio_mp4_url = get_post_meta($portfolio_ID, 'portfolio_mp4_url', true);
			    		$preview_image = wp_get_attachment_image_src($image_id, 'large', true);

				    	$return_html.= '<a title="'.esc_attr($portoflio_item->post_title).'" href="#video_self_'.$key.'" class="lightbox_vimeo">
				    		<img src="'.esc_url($small_image_url[0]).'" alt="" />
				    	';
			
				    	$return_html.= '<div class="thumb_content">
				    	    <h4>'.$portoflio_item->post_title.'></h4>
				    	</div>
				    	</a>';
				    		
				    	$return_html.= '<div style="display:none;">
				    	    <div id="video_self_'.$key.'" style="width:900px;height:488px" class="video-container">
				    	    
				    	        <div id="self_hosted_vid_'.$key.'"></div>';
				    	$return_html.= do_shortcode('[jwplayer id="self_hosted_vid_'.$key.'" file="'.esc_url($portfolio_mp4_url).'" image="'.esc_url($preview_image[0]).'" width="900" height="488"]');
			    	        
			    	    $return_html.= '</div></div>';
			    	
			    		break;
			    		//end self-hosted
			    	}
			    	//end switch
				
				$return_html.= '</div>';
			}
	    	
	    	$return_html.= '</div>';
		}
		
		$return_html.= '</div>';
	}
	else
	{
		$return_html.= esc_html__( 'Empty portfolio item. Please make sure you have created portfolio item or check the short code.', 'photography-custom-post' );
	}

	$return_html.= '<br class="clear"/>';
	wp_enqueue_script("photography-script-portfolio-shortcode-".$portfolio_wrapper_id, get_template_directory_uri()."/templates/script-portfolio-shortcode.php?id=".$portfolio_wrapper_id, false, THEMEVERSION, true);

	return $return_html;
}
add_shortcode('tg_filter_portfolio', 'tg_filter_portfolio_func');


function tg_promo_box_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'bgcolor' => '',
		'fontcolor' => '',
		'bordercolor' => '',
		'button_text' => '',
		'button_url' => '',
		'buttoncolor' => '',
	), $atts));
	
	$custom_promobox = '';
	
	if(!empty($bgcolor))
	{
		$custom_promobox.= 'background-color:'.esc_attr($bgcolor).';';
	}
	
	if(!empty($fontcolor))
	{
		$custom_promobox.= 'color:'.esc_attr($fontcolor).';';
	}
	
	if(!empty($bordercolor))
	{
		$custom_promobox.= 'border-color:'.esc_attr($bordercolor).';';
	}
	
	$return_html = '<div class="promo_box" style="'.$custom_promobox.'">';
	
	$custom_button = '';
	if(!empty($buttoncolor))
	{
		$custom_button = 'background-color:'.esc_attr($buttoncolor).';border-color:'.esc_attr($buttoncolor).';';
	}
	
	if(!empty($button_text))
	{
		$return_html.= '<a href="'.esc_url($button_url).'" class="button" style="'.$custom_button.'">'.$button_text.'</a>';
	}

	$return_html.= $content;
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('tg_promo_box', 'tg_promo_box_func');


function tg_alert_box_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'style' => 'general',
	), $atts));
	
	$fa_class = 'fa-bullhorn';
	switch($style)
	{
		case 'error':
			$fa_class = 'fa-exclamation-circle';
		break;
		
		case 'success':
			$fa_class = 'fa-flag';
		break;
		
		case 'notice':
			$fa_class = 'fa-info-circle';
		break;
	}
	
	$custom_id = time().rand();
	
	$return_html = '<div id="'.$custom_id.'" class="alert_box '.esc_attr($style).'">';
	$return_html.= '<i class="fa '.esc_attr($fa_class).' alert_icon"></i>';
	$return_html.= '<div class="alert_box_msg">'.do_shortcode($content).'</div>';
	$return_html.= '<a href="#" class="close_alert" data-target="'.esc_attr($custom_id).'"><i class="fa fa-times"></i></a>';
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('tg_alert_box', 'tg_alert_box_func');


function tg_tab_func($atts, $content) {
	//extract short code attr
	extract(shortcode_atts(array(
		'tab1' => '',
		'tab2' => '',
		'tab3' => '',
		'tab4' => '',
		'tab5' => '',
		'tab6' => '',
		'tab7' => '',
		'tab8' => '',
		'tab9' => '',
		'tab10' => '',
	), $atts));
	
	$tab_arr = array(
		$tab1,
		$tab2,
		$tab3,
		$tab4,
		$tab5,
		$tab6,
		$tab7,
		$tab8,
		$tab9,
		$tab10,
	);

	//Add jquery ui script dynamically
	wp_enqueue_script("jquery-ui-core");
	wp_enqueue_script("jquery-ui-tabs");
	wp_enqueue_script('photography-custom-tab', get_template_directory_uri()."/js/custom-tab.js", false, THEMEVERSION, true);

	$return_html = '<div class="tabs"><ul>';

	foreach($tab_arr as $key=>$tab)
	{
		//display title1
		if(!empty($tab))
		{
			$return_html.= '<li><a href="#tabs-'.($key+1).'">'.$tab.'</a></li>';
		}
	}

	$return_html.= '</ul>';
	$return_html.= do_shortcode($content);
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('tg_tab', 'tg_tab_func');


function tg_ver_tab_func($atts, $content) {
	//extract short code attr
	extract(shortcode_atts(array(
		'tab1' => '',
		'tab2' => '',
		'tab3' => '',
		'tab4' => '',
		'tab5' => '',
		'tab6' => '',
		'tab7' => '',
		'tab8' => '',
		'tab9' => '',
		'tab10' => '',
		'align' => 'left',
	), $atts));
	
	$tab_arr = array(
		$tab1,
		$tab2,
		$tab3,
		$tab4,
		$tab5,
		$tab6,
		$tab7,
		$tab8,
		$tab9,
		$tab10,
	);

	//Add jquery ui script dynamically
	wp_enqueue_script("jquery-ui-core");
	wp_enqueue_script("jquery-ui-tabs");
	wp_enqueue_script('photography-custom-tab', get_template_directory_uri()."/js/custom-tab.js", false, THEMEVERSION, true);

	$return_html = '<div class="tabs vertical '.$align.'"><ul>';

	foreach($tab_arr as $key=>$tab)
	{
		//display title1
		if(!empty($tab))
		{
			$return_html.= '<li><a href="#tabs-'.($key+1).'">'.$tab.'</a></li>';
		}
	}

	$return_html.= '</ul>';
	$return_html.= do_shortcode($content);
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('tg_ver_tab', 'tg_ver_tab_func');


function tab_func($atts, $content) {
	//extract short code attr
	extract(shortcode_atts(array(
		'id' => '',
	), $atts));
	
	$return_html = '';
	$return_html.= '<div id="tabs-'.$id.'" class="tab_wrapper"><br class="clear"/>'.do_shortcode($content).'</div>';

	return $return_html;

}

add_shortcode('tab', 'tab_func');


function tg_accordion_func($atts, $content) {
	//extract short code attr
	extract(shortcode_atts(array(
		'title' => '',
		'icon' => '',
		'close' => 0,
	), $atts));

	$close_class = '';

	if(!empty($close))
	{
		$close_class = 'pp_accordion_close';
	}
	else
	{
		$close_class = 'pp_accordion';
	}

	//Add jquery ui script dynamically
	wp_enqueue_script("jquery-ui-core");
	wp_enqueue_script("jquery-ui-accordion");
	wp_enqueue_script('photography-custom-accordion', get_template_directory_uri()."/js/custom-accordion.js", false, THEMEVERSION, true);

	$return_html = '<div class="'.esc_attr($close_class).' ';
	
	if(!empty($icon))
	{
		$return_html.= 'has_icon';
	}
	
	$return_html.= '"><h3><a href="#">';
	
	if(!empty($icon))
	{
		$return_html.= '<i class="fa '.esc_attr($icon).'"></i>';
	}
	
	$return_html.= $title.'</a></h3>';
	$return_html.= '<div><p>';
	$return_html.= do_shortcode($content);
	$return_html.= '</p></div></div>';

	return $return_html;
}

add_shortcode('tg_accordion', 'tg_accordion_func');


function tg_service_vertical_func($atts, $content) {
	remove_filter('the_content', 'pp_formatter', 99);

	//extract short code attr
	extract(shortcode_atts(array(
		'items' => 3,
		'cat' => '',
		'align' => 'left',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$return_html = '';
	
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

	if(!empty($services_arr) && is_array($services_arr))
	{
		$return_html.= '<ul class="icon_list">';
	
		foreach($services_arr as $key => $service)
		{
			
			$return_html.= '<li>';
			
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
				    $service_icon_code = '<img src="'.esc_url($image_url[0]).'" alt="" />';
				}
			}
			
			if(!empty($service_icon_code))
			{
				$return_html.= '<div class="service_icon vertical '.esc_attr($align).'">'.$service_icon_code.'<div class="service_border"></div></div>';
			}
			
			$return_html.= '<div class="service_wrapper '.esc_attr($align).'">';
			
			$return_html.= '<div class="service_title list">';
			$return_html.= '<strong>'.$service->post_title.'</strong>';
			$return_html.= '<div class="service_content">'.$service->post_content.'</div>';
			$return_html.= '</div>';
			
			$return_html.= '</div>';
			
			$return_html.= '</li>';
		}
		
		$return_html.= '</ul>';
	}
	
	return $return_html;
}

add_shortcode('tg_service_vertical', 'tg_service_vertical_func');


function tg_service_columns_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'items' => 3,
		'category' => '',
		'order' => 'default',
		'columns' => '3',
		'align' => 'left',
		'custom_css' => '',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$return_html = '<div class="'.esc_attr($size).' withpadding" ';
	if(!empty($custom_css))
	{
		$return_html.= 'style="'.urldecode($custom_css).'" ';
	}
	$return_html.= '>';
	
	$return_html.='<div class="page_content_wrapper" style="text-align:center">';
	
	$service_order = 'ASC';
	$service_order_by = 'menu_order';
	switch($order)
	{
		case 'default':
			$service_order = 'ASC';
			$service_order_by = 'menu_order';
		break;
		
		case 'newest':
			$service_order = 'DESC';
			$service_order_by = 'post_date';
		break;
		
		case 'oldest':
			$service_order = 'ASC';
			$service_order_by = 'post_date';
		break;
		
		case 'title':
			$service_order = 'ASC';
			$service_order_by = 'title';
		break;
		
		case 'random':
			$service_order = 'ASC';
			$service_order_by = 'rand';
		break;
	}
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $service_order,
	    'orderby' => $service_order_by,
	    'post_type' => array('services'),
	);
	
	if(!empty($category))
	{
		$args['servicecats'] = $category;
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
			
			$return_html.= '<div class="'.esc_attr($columns_class).' '.esc_attr($last_class).'">';
			
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
				    $service_icon_code = '<img src="'.esc_url($image_url[0]).'" alt="" />';
				}
			}
			$return_html.= '<div class="service_wrapper '.urldecode($align).'">';
			
			if(!empty($service_icon_code))
			{
				$return_html.= '<div class="service_icon">'.$service_icon_code.'</div>';
			}
			
			$return_html.= '<div class="service_title">';
			$return_html.= '<'.$service_h.'>'.$service->post_title.'</'.$service_h.'>';
			$return_html.= '<div class="service_content">'.$service->post_content.'</div>';
			$return_html.= '</div>';
			
			$return_html.= '</div>';
			$return_html.= '</div>';
			
			if(($key+1)%$columns==0)
			{
				$return_html.= '<br class="clear"/><br/>';
			}
		}
		
		$return_html.= '</div>';
		
		if(!empty($content))
		{
			$return_html.= '</div>';
		}
	}
	
	$return_html.= '</div></div>';
	
	return $return_html;
}

add_shortcode('tg_service_columns', 'tg_service_columns_func');


function tg_divider_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'style' => 'normal'
	), $atts));

	
	$return_html = '<hr class="'.$style.'"/>';
	if($style == 'totop')
	{
		$return_html.= '<a class="hr_totop" href="#">'.esc_html__( 'Go to top', 'photography-custom-post' ).'&nbsp;<i class="fa fa-arrow-up"></i></a>';
	}

	return $return_html;

}

add_shortcode('tg_divider', 'tg_divider_func');


function tg_team_func($atts, $content) {
	remove_filter('the_content', 'pp_formatter', 99);

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'columns' => 3,
		'items' => 4,
		'cat' => '',
	), $atts));
	
	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	if(!is_numeric($columns))
	{
		$columns = 3;
	}
	
	$return_html ='<div>';
	
	$team_order = 'ASC';
	$team_order_by = 'menu_order';
	
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
	
	//Get portfolio items
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
					
			if(has_post_thumbnail($member_ID, 'team_member'))
			{
			    $image_id = get_post_thumbnail_id($member_ID);
			    $small_image_url = wp_get_attachment_image_src($image_id, 'team_member', true);
			}
			
			$last_class = '';
			if(($key+1)%$count_column==0)
			{
				$last_class = 'last';
			}
			
			//Begin display HTML
			$return_html.= '<div class="'.esc_attr($columns_class).' animated'.($key+1).' '.$last_class.'">';
			
			if(!empty($small_image_url[0]))
			{
				$return_html.= '<div class="post_img animate ';
				
				$member_facebook = get_post_meta($member_ID, 'member_facebook', true);
			    $member_twitter = get_post_meta($member_ID, 'member_twitter', true);
			    $member_google = get_post_meta($member_ID, 'member_google', true);
			    $member_linkedin = get_post_meta($member_ID, 'member_linkedin', true);
				
				if(empty($member_facebook) && empty($member_twitter) && empty($member_google) && empty($member_linkedin))
				{
					$return_html.= 'static';
				}
				
				$return_html.='" style="margin-bottom:10px"><img class="team_pic" src="'.esc_url($small_image_url[0]).'" alt=""/>';
				
				if(!empty($member_facebook) OR !empty($member_twitter) OR !empty($member_google) OR !empty($member_linkedin))
				{
					$return_html.= '<div class="thumb_content shortcode">';
					$return_html.= '<div class="social_follow">'.esc_html__( 'Follow', 'photography-custom-post' ).'</div><ul class="social_wrapper team">';
					
					if(!empty($member_twitter))
					{
					    $return_html.= '<li><a title="'.$member->post_title.' on Twitter" target="_blank" class="tooltip" href="https://twitter.com/'.$member_twitter.'"><i class="fa fa-twitter"></i></a></li>';
					}
	 
					if(!empty($member_facebook))
					{
					    $return_html.= '<li><a title="'.$member->post_title.' on Facebook" target="_blank" class="tooltip" href="https://facebook.com/'.$member_facebook.'"><i class="fa fa-fa-facebook-official"></i></a></li>';
					}
					
					if(!empty($member_google))
					{
					    $return_html.= '<li><a title="'.$member->post_title.' on Google+" target="_blank" class="tooltip" href="'.esc_url($member_google).'"><i class="fa fa-google-plus"></i></a></li>';
					}
					    
					if(!empty($member_linkedin))
					{
					    $return_html.= '<li><a title="'.$member->post_title.' on Linkedin" target="_blank" class="tooltip" href="'.esc_url($member_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';
					}
					
					$return_html.= '</ul>';
					$return_html.= '</div>';
				}
				
				$return_html.= '</div>';
			    
			}
			
			$team_position = get_post_meta($member_ID, 'team_position', true);
			
			//Display portfolio detail
			$return_html.= '<br class="clear"/><div id="portfolio_desc_'.$member_ID.'" class="portfolio_desc team shortcode '.$last_class.'">';
            $return_html.= '<h5>'.$member->post_title.'</h5>';
            if(!empty($team_position))
            {
            	$return_html.= '<span class="portfolio_excerpt">'.$team_position.'</span>';
            }
            if(!empty($member->post_content))
            {
            	$return_html.= '<p>'.$member->post_content.'</p>';
            }
			$return_html.= '</div>';
			$return_html.= '</div>';
			
			if(($key+1)%$count_column==0)
			{
				$return_html.= '<br class="clear"/>';
			}
		}
		
		$return_html.= '</div>';
	}
	
	$return_html.= '</div>';
	
	return $return_html;
}

add_shortcode('tg_team', 'tg_team_func');


function tg_testimonial_slider_func($atts, $content) {
	extract(shortcode_atts(array(
		'size' => 'one',
		'items' => 3,
		'fontcolor' => '',
		'cat' => '',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	wp_enqueue_script("photography-flexslider-js", get_template_directory_uri()."/js/flexslider/jquery.flexslider-min.js", false, THEMEVERSION, true);
	wp_enqueue_script("photography-sciprt-testimonials-flexslider", get_template_directory_uri()."/templates/script-testimonials-flexslider.php", false, THEMEVERSION, true);
	
	$return_html ='<div>';
	
	$testimonials_order = 'ASC';
	$testimonials_order_by = 'menu_order';
	
	//Get testimonial items
	$args = array(
	    'numberposts' => $items,
	    'order' => $testimonials_order,
	    'orderby' => $testimonials_order_by,
	    'post_type' => array('testimonials'),
	);
	
	if(!empty($cat) && $cat != 'null')
	{
		$args['testimonialcats'] = $cat;
	}
	$testimonial_arr = get_posts($args);
	$return_html = '';
	
	if(!empty($testimonial_arr) && is_array($testimonial_arr))
	{
		$return_html.= '<div class="testimonial_slider_wrapper" ';
		
		if(!empty($fontcolor))
		{
		    $return_html.= 'style="color:'.$fontcolor.'"';
		}
		
		$return_html.= '>';
		$return_html.= '<div class="flexslider" data-height="750">';
		$return_html.= '<ul class="slides">';
		
		foreach($testimonial_arr as $key => $testimonial)
		{
			$testimonial_ID = $testimonial->ID;
		
			//Get testimonial meta
			$testimonial_name = get_post_meta($testimonial_ID, 'testimonial_name', true);
			$testimonial_position = get_post_meta($testimonial_ID, 'testimonial_position', true);
			$testimonial_company_name = get_post_meta($testimonial_ID, 'testimonial_company_name', true);
			$testimonial_company_website = get_post_meta($testimonial_ID, 'testimonial_company_website', true);
			
			$return_html.= '<li>';
			$return_html.= '<div class="testimonial_slider_wrapper">';
			
			if(!empty($testimonial->post_content))
			{
				$return_html.= $testimonial->post_content;
			}
			
			if(!empty($testimonial_name))
			{
				$return_html.= '<div class="testimonial_slider_meta">';
				$return_html.= '<h6 ';
				
				if(!empty($fontcolor))
				{
				    $return_html.= 'style="color:'.esc_attr($fontcolor).'"';
				}
				
				$return_html.= '>'.$testimonial_name.'</h6>';
					
				if(!empty($testimonial_position))
				{
				    $return_html.= '<div class="testimonial_slider_meta_position">'.$testimonial_position.'</div>';
				}
				
				if(!empty($testimonial_company_name))
				{
				    $return_html.= '-<div class="testimonial_slider_meta_company">';
				    
				    if(!empty($testimonial_company_website))
				    {
				    	$return_html.= '<a href="'.esc_url($testimonial_company_website).'" target="_blank" ';
				    	
				    	if(!empty($fontcolor))
						{
							$return_html.= 'style="color:'.esc_attr($fontcolor).'"';
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
			$return_html.= '</li>';
		}
		
		$return_html.= '</ul>';
		$return_html.= '</div>';
		$return_html.= '</div>';
	}

	return $return_html;
}
add_shortcode('tg_testimonial_slider', 'tg_testimonial_slider_func');


function tg_lightbox_func($atts, $content) {

	extract(shortcode_atts(array(
		'type' => 'image',
		'src' => '',
		'href' => '',
		'youtube_id' => '',
		'vimeo_id' => '',
	), $atts));

	$class = 'lightbox';

	if($type != 'image')
	{
		$class = 'img_frame';
	}

	if($type == 'youtube')
	{
		$href = '#video_'.$youtube_id;
		$class = 'lightbox_youtube';
	}

	if($type == 'vimeo')
	{
		$href = '#video_'.$vimeo_id;
		$class = 'lightbox_vimeo';
	}
	
	$return_html = '<div class="post_img">';
	$return_html.= '<a href="'.esc_url($href).'" class="'.esc_attr($class).'">';
	
	if(!empty($src))
	{
		$return_html.= '<img src="'.esc_url($src).'"img_frame"/>';
	}

	if(!empty($youtube_id))
	{
		$return_html.= '<div style="display:none;"><div id="video_'.$youtube_id.'" class="video-container"><iframe width="900" height="488" src="https://www.youtube.com/embed/'.$youtube_id.'?theme=dark&amp;rel=0&amp;wmode=opaque" frameborder="0"></iframe></div></div>';
	}

	if(!empty($vimeo_id))
	{
		$return_html.= '<div style="display:none;"><div id="video_'.$vimeo_id.'" class="video-container"><iframe src="https://player.vimeo.com/video/'.$vimeo_id.'?title=0&amp;byline=0&amp;portrait=0" width="900" height="506" frameborder="0"></iframe></div></div>';
	}
	
	$return_html.= '</a></div>';

	return $return_html;

}

add_shortcode('tg_lightbox', 'tg_lightbox_func');


function tg_youtube_func($atts) {
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));

	$custom_id = time().rand();

	$return_html = '<div class="video-container"><iframe title="YouTube video player" width="'.esc_attr($width).'" height="'.esc_attr($height).'" src="https://www.youtube.com/embed/'.$video_id.'?theme=dark&rel=0&wmode=transparent" frameborder="0" allowfullscreen></iframe></div>';

	return $return_html;
}

add_shortcode('tg_youtube', 'tg_youtube_func');


function tg_vimeo_func($atts, $content) {
	extract(shortcode_atts(array(
		'width' => 640,
		'height' => 385,
		'video_id' => '',
	), $atts));

	$custom_id = time().rand();

	$return_html = '<div class="video-container"><iframe src="https://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0" width="'.esc_attr($width).'" height="'.esc_attr($height).'" frameborder="0"></iframe></div>';

	return $return_html;
}

add_shortcode('tg_vimeo', 'tg_vimeo_func');

function tg_animate_counter_func($atts, $content) {
	extract(shortcode_atts(array(
		'start' => 0,
		'end' => 100,
		'fontsize' => 60,
		'fontcolor' => '',
		'count_subject' => '',
	), $atts));

	$custom_id = time().rand();

	wp_enqueue_script("photography-odometer-js", get_template_directory_uri()."/js/odometer.min.js", false, THEMEVERSION, true);
	wp_enqueue_script("photography-script-animate-counter".$custom_id, get_template_directory_uri()."/templates/script-animate-counter-shortcode.php?id=".$custom_id."&start=".$start."&end=".$end."&fontsize=".$fontsize, false, THEMEVERSION, true);
	
	$return_html = '<div class="animate_counter_wrapper">';
	
	if(!empty($content))
	{
		$return_html.= $content.'<br/>';
	}
	
	$return_html.= '<div id="'.$custom_id.'" class="odometer" style="font-size:'.esc_attr($fontsize).'px;line-height:'.esc_attr($fontsize).'px;';
	
	if(!empty($fontcolor))
	{
		$return_html.= 'color:'.esc_attr($fontcolor);
	}
	
	$return_html.= '">'.$start.'</div>';
	$return_html.= '<div class="count_separator"><span></span></div>';
	$return_html.= '<div class="counter_subject"';
	
	if(!empty($fontcolor))
	{
		$return_html.= ' style="color:'.esc_attr($fontcolor).'"';
	}
	
	$return_html.= '>'.$count_subject.'</div>';
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('tg_animate_counter', 'tg_animate_counter_func');

function tg_animate_circle_func($atts, $content) {
	extract(shortcode_atts(array(
		'percent' => 100,
		'dimension' => 200,
		'width' => 10,
		'color' => '',
		'fontsize' => '20',
		'subject' => '',
	), $atts));

	$custom_id = time().rand();

	wp_enqueue_style("photography-jquery-circliful", get_template_directory_uri()."/css/jquery.circliful.css", false, THEMEVERSION, "all");
	wp_enqueue_script("photography-jquery-circliful", get_template_directory_uri()."/js/jquery.circliful.min.js", false, THEMEVERSION, true);
	wp_enqueue_script("photography-script-animate-counter".$custom_id, get_template_directory_uri()."/templates/script-animate-circle-shortcode.php?id=".$custom_id, false, THEMEVERSION, true);
	
	$return_html = '
				<div class="visual_circle">
					<div id="'.$custom_id.'" data-dimension="'.esc_attr($dimension).'" data-width="'.esc_attr($width).'" data-percent="'.esc_attr($percent).'" data-fgcolor="'.esc_attr($color).'" data-bgcolor="#f0f0f0" data-text="'.esc_attr($content).'" data-fontsize="'.esc_attr($fontsize).'" data-info="'.esc_attr($subject).'"></div>';
				
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('tg_animate_circle', 'tg_animate_circle_func');

function tg_animate_bar_func($atts, $content) {
	extract(shortcode_atts(array(
		'percent' => 0,
		'color' => '',
		'height' => 3,
	), $atts));
	
	if($percent < 0)
	{
		$percent = 0;
	}
	
	if($percent > 100)
	{
		$percent = 100;
	}
	
	$return_html = '<div class="progress_bar"><div class="progress_holder">';
	$return_html.= '<div class="progress_bar_title"><h7>'.$content.'</h7></div>';
	$return_html.= '<div class="progress_number"><h7>'.$percent.'%</h7></div>';
	$return_html.= '</div>';
	$return_html.= '<div class="progress_bar_holder" ';
	
	if(!empty($height))
	{
		$return_html.= 'style="height:'.esc_attr($height).'px;"';
	}
	
	$return_html.= '>';
	$return_html.= '<div class="progress_bar_content" data-score="'.esc_attr($percent).'" style="width:0;background:'.esc_attr($color).';';
	
	if(!empty($height))
	{
		$return_html.= 'height:'.esc_attr($height).'px;';
	}
	
	$return_html.= '"></div>';
	$return_html.= '</div>';
	$return_html.= '</div>';

	return $return_html;
}

add_shortcode('tg_animate_bar', 'tg_animate_bar_func');


function tg_pricing_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'size' => 'one',
		'skin' => 'normal',
		'items' => 3,
		'category' => '',
		'columns' => '3',
		'highlightcolor' => '#001d2c',
	), $atts));

	if(!is_numeric($items))
	{
		$items = 4;
	}
	
	$return_html = '';
	
	$pricing_order = 'ASC';
	$pricing_order_by = 'menu_order';
	
	//Get portfolio items
	$args = array(
	    'numberposts' => $items,
	    'order' => $pricing_order,
	    'orderby' => $pricing_order_by,
	    'post_type' => array('pricing'),
	);
	
	if(!empty($category))
	{
		$args['pricingcats'] = $category;
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
		$return_html.= '<div class="pricing_content_wrapper '.esc_attr($skin).'">';
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
	
	$return_html.= '<br class="clear"/>';
	
	return $return_html;
}

add_shortcode('tg_pricing', 'tg_pricing_func');


function tg_gallery_slider_func($atts, $content) {
	extract(shortcode_atts(array(
		'gallery_id' => '',
		'size' => 'original',
		'autoplay' => '',
		'caption' => '',
		'timer' => 5,
		'fullwidth' => 0,
	), $atts));
	
	wp_enqueue_script("photography-flexslider-js", get_template_directory_uri()."/js/flexslider/jquery.flexslider-min.js", false, THEMEVERSION, true);
	wp_enqueue_script("photography-script-gallery-flexslider", get_template_directory_uri()."/templates/script-gallery-flexslider.php?autoplay=".$autoplay.'&amp;caption='.$caption.'&amp;timer='.$timer, false, THEMEVERSION, true);

	$images_arr = get_post_meta($gallery_id, 'wpsimplegallery_gallery', true);
	$images_arr = photography_resort_gallery_img($images_arr);
	
	$return_html = '';

	if(!empty($images_arr))
	{
		$return_html.= '<div class="slider_wrapper">';
		$return_html.= '<div class="flexslider tg_gallery ';
		
		if(!empty($fullwidth))
		{
			$return_html.= 'fullwidth';
		}
		
		$return_html.= '" data-height="750">';
		$return_html.= '<ul class="slides">';
		
		foreach($images_arr as $key => $image)
		{
			$image_url = wp_get_attachment_image_src($image, $size, true);
			$image_alt = get_post_meta($image, '_wp_attachment_image_alt', true);
			
			$return_html.= '<li>';
			$return_html.= '<img src="'.esc_url($image_url[0]).'" alt="'.esc_attr($image_alt).'"/>';
			
			if(!empty($caption))
			{
				//Get image meta data
		    	$image_caption = get_post_field('post_excerpt', $image);
			
				$return_html.= '<div class="gallery_image_caption">'.$image_caption.'</div>';
			}
			
			$return_html.= '</li>';
		}
		
		$return_html.= '</ul>';
		$return_html.= '</div>';
		$return_html.= '</div>';
	}
	else
	{
		$return_html.= esc_html__( 'Empty gallery item. Please make sure you have upload image to it or check the short code.', 'photography-custom-post' );
	}

	return $return_html;
}
add_shortcode('tg_gallery_slider', 'tg_gallery_slider_func');


function tg_audio_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'src' => '',
		'width' => '80',
		'height' => '30',
	), $atts));

	$custom_id = time().rand();
	
	wp_enqueue_style("photography-mediaelementplayer", get_template_directory_uri()."/js/mediaelement/mediaelementplayer.css", false, THEMEVERSION, "all");
	wp_enqueue_script("photography-mediaelement-and-player.min", get_template_directory_uri()."/js/mediaelement/mediaelement-and-player.min.js", false, THEMEVERSION);
	wp_enqueue_script("photography-script-audio-shortcode", get_template_directory_uri()."/templates/script-audio-shortcode.php?id=".$custom_id, false, THEMEVERSION, true);
	
	$return_html = '<audio id="'.$custom_id.'" src="'.esc_url($src).'" width="'.esc_attr($width).'" height="'.esc_attr($height).'"></audio>';
	return $return_html;
}

add_shortcode('tg_audio', 'tg_audio_func');


function tg_jwplayer_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'id' => '',
		'file' => '',
		'image' => '',
		'width' => '80',
		'height' => '30',
	), $atts));
	
	wp_enqueue_style("photography-mediaelementplayer", get_template_directory_uri()."/js/mediaelement/mediaelementplayer.css", false, THEMEVERSION, "all");
	
	wp_enqueue_script("photography-swfobject", "https://ajax.googleapis.com/ajax/libs/swfobject/2.1/swfobject.js", false, THEMEVERSION, true);
	
	wp_enqueue_script("photography-jwplayer", get_template_directory_uri()."/js/jwplayer.js", false, THEMEVERSION);
	wp_enqueue_script("photography-mediaelement-and-player.min", get_template_directory_uri()."/js/mediaelement/mediaelement-and-player.min.js", false, THEMEVERSION);
	wp_enqueue_script("photography-script-jwplayer-shortcode".$id, get_template_directory_uri()."/templates/script-jwplayer-shortcode.php?id=".$id."&file=".$file."&image=".$image."&width=".$width."&height=".$height, false, THEMEVERSION, true);
}

add_shortcode('tg_jwplayer', 'tg_jwplayer_func');


function googlefont_func($atts, $content) {

	//extract short code attr
	extract(shortcode_atts(array(
		'font' => '',
		'fontsize' => '',
		'style' => '',
	), $atts));

	$return_html = '';

	if(!empty($font))
	{
		$encoded_font = urlencode($font);
		
		wp_enqueue_style('photography-'.$encoded_font, "https://fonts.googleapis.com/css?family=".$encoded_font, false, "", "all");
		
		$return_html = '<div class="googlefont" style="font-family:'.$font.';font-size:'.esc_attr($fontsize).'px;'.$style.'">'.$content.'</div>';
	}

	return $return_html;
}

add_shortcode('googlefont', 'googlefont_func');


// Actual processing of the shortcode happens here
function tg_last_run_shortcode( $content ) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
 
    add_shortcode( 'one_half', 'one_half_func' );
    add_shortcode( 'one_half_last', 'one_half_last_func' );
    add_shortcode( 'one_half_bg', 'one_half_bg_func' );
    add_shortcode( 'one_third', 'one_third_func' );
    add_shortcode( 'one_third_last', 'one_third_last_func' );
    add_shortcode( 'one_third_bg', 'one_third_bg_func' );
    add_shortcode( 'two_third', 'two_third_func' );
    add_shortcode( 'two_third_bg', 'two_third_bg_func' );
    add_shortcode( 'two_third_last', 'two_third_last_func' );
    add_shortcode( 'one_fourth', 'one_fourth_func' );
    add_shortcode( 'one_fourth_bg', 'one_fourth_bg_func' );
    add_shortcode( 'one_fourth_last', 'one_fourth_last_func' );
    add_shortcode( 'one_fifth', 'one_fifth_func' );
    add_shortcode( 'one_fifth_last', 'one_fifth_last_func' );
    add_shortcode( 'tg_gallery', 'tg_gallery_func' );
    add_shortcode( 'tg_image', 'tg_image_func' );
    add_shortcode( 'tg_tab', 'tg_tab_func' );
	add_shortcode( 'tg_ver_tab', 'tg_ver_tab_func' );
    add_shortcode( 'tab', 'tab_func' );
    add_shortcode( 'tg_accordion', 'tg_accordion_func' );
    add_shortcode( 'pp_pre', 'pp_pre_func' );
 
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}
 
add_filter( 'the_content', 'tg_last_run_shortcode', 7 );

?>