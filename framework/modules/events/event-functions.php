<?php

if(!function_exists('goodwish_edge_single_event')) {
    function goodwish_edge_single_event() {
        $slug = goodwish_edge_get_event_single_type();

        $params = array(
            'slug' => $slug
        );

        goodwish_edge_get_module_template_part('templates/single/holder', 'events', '', $params);
    }
}

if(!function_exists('goodwish_edge_get_event_single_type')) {
	function goodwish_edge_get_event_single_type() {
		$slug = get_post_meta(get_the_ID(),'edgtf_event_layout_meta',true);
		return $slug;
	}
}

if(!function_exists('goodwish_edge_get_single_event_images')) {
    function goodwish_edge_get_single_event_images() {
        $image_ids       = get_post_meta(get_the_ID(), 'edgtf_event_images', true);
        $portfolio_media = array();

        if($image_ids !== '') {
            $image_ids = explode(',', $image_ids);

            foreach($image_ids as $image_id) {
                $media                = array();
                $media['title']       = get_the_title($image_id);
                $media['type']        = 'image';
                $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $media['image_src']   = wp_get_attachment_image_src($image_id, 'full');
	            if(empty($media['description'])) {
	                $media['description'] = $media['title'];
	            }

                $portfolio_media[] = $media;
            }
        }

        return $portfolio_media;
    }
}

if(!function_exists('goodwish_edge_event_get_info_part')) {
    function goodwish_edge_event_get_info_part($part) {

        goodwish_edge_get_module_template_part('templates/single/parts/'.$part, 'events');
    }
}

if (!function_exists('goodwish_edge_event_get_categories')) {
	function goodwish_edge_event_get_categories($id = ''){
		if ($id == ''){
			$id = get_the_ID();
		}
		$categories   = wp_get_post_terms($id, 'edge-event-category');
		$category_html = array();

		if(is_array($categories) && count($categories)){
		    foreach($categories as $category) {
		    	$cat_html = '<a itemprop="url" class="edgtf-item-info-category" href="'.esc_url(get_term_link($category->term_id)).'">'.esc_html($category->name).'</a>';
		        $category_html[] = $cat_html;
		    }
		}
		$categories = implode(', ',$category_html);

		return $categories;
	}
}

if (!function_exists('goodwish_edge_event_get_start_date')) {
	function goodwish_edge_event_get_start_date($id = '',$default_format = true){
		if ($id == ''){
			$id = get_the_ID();
		}

		$start_date = '';

		$start_date_temp = strtotime(get_post_meta($id,'edgtf_event_start_date',true));

		if ($start_date_temp){
			if ($default_format){
				$start_date = date(get_option('date_format'),$start_date_temp);
			}
			else{
				$start_date = array();
				$start_date['day'] = date('d',$start_date_temp);
				$start_date['month'] = mysql2date('F', date('Y-m-d H:i:s',$start_date_temp));
				$start_date['year'] = date('Y',$start_date_temp);
			}
		}

		return $start_date;
		
	}
}


/*
** Function that returns start date, end date and duration for event
*/
if (!function_exists('goodwish_edge_event_get_date_params')) {
	function goodwish_edge_event_get_date_params($id = ''){
		if ($id == ''){
			$id = get_the_ID();
		}

		$date_params = array();
		$date_params['start_date'] = esc_html__('Unknown','goodwish');

		$start_date = strtotime(get_post_meta($id,'edgtf_event_start_date',true));
		$end_date = strtotime(get_post_meta($id,'edgtf_event_end_date',true));
		$duration = esc_html__('Unknown','goodwish');

		if ($start_date){
			$date_params['start_date'] = date_i18n(get_option('date_format'),$start_date);
		}

		if ($end_date){
			$date_params['end_date'] = date_i18n(get_option('date_format'), $end_date);
		}
		else{
			$end_date = $start_date;
			$date_params['end_date'] = $date_params['start_date'];
		}

		if($end_date && $start_date) {
			$duration_temp = $end_date - $start_date;
			$duration = $duration_temp / (60*60*24) + 1; //1 is for including end date
			$duration .= ($duration > 1) ? esc_html__(' Days','goodwish') : esc_html__(' Day','goodwish');
		}

		$date_params['duration'] = $duration;

		return $date_params;
		
	}
}

if (!function_exists('goodwish_edge_event_get_date_part')) {
	function goodwish_edge_event_get_date_part(){

		$date_showing = goodwish_edge_options()->getOptionValue('event_single_date_showing');

		if ($date_showing == 'none'){
			return false;
		}

		$date_params['date_showing'] = $date_showing;

		$date_params = array_merge($date_params,goodwish_edge_event_get_date_params());

		return goodwish_edge_get_module_template_part('templates/single/parts/date', 'events','',$date_params);
		
	}
}

if(!function_exists('goodwish_edge_get_event_category_list')) {
    function goodwish_edge_get_event_category_list($category = '') {

	    $number_of_items = 8;
	    $item_layout = 'full-width';

	    $params = array(
			'type'           => $item_layout,
		    'category'       => $category,
			'order_by'       => 'start-date',
		    'show_more'      => 'load-more'
	    );

	    $html = goodwish_edge_execute_shortcode('edgtf_event_list', $params);

		echo goodwish_edge_get_module_part($html);
    }
}