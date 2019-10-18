<?php 

if (!function_exists('goodwish_edge_give_form_supports')){
	/*
	* Add comments support for give plugin
	*/
	function goodwish_edge_give_form_supports($give_form_supports){

		$give_form_supports[] = 'comments';

		return $give_form_supports;
	}
	
}


if (!function_exists('goodwish_edge_give_comment_form')) {
	/*
	* Override button from give plugin
	*/
	function goodwish_edge_give_comment_form(){
		comments_template('', true);
	}
}


if(!function_exists('goodwish_edge_get_give_form_category_list')) {
    function goodwish_edge_get_give_form_category_list($category = '', $number = '') {

	    $params = array(
	    	'columns'		 => '1',
		    'category'       => $category,
			'order_by'       => 'date',
			'number'		 => $number,
	    );

	    $html = goodwish_edge_execute_shortcode('edgtf_cause_list', $params);

		echo goodwish_edge_get_module_part($html);
    }
}

?>