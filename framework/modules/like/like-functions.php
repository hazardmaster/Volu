<?php

if ( ! function_exists('goodwish_edge_like') ) {
	/**
	 * Returns GoodwishEdgeLike instance
	 *
	 * @return GoodwishEdgeLike
	 */
	function goodwish_edge_like() {
		return GoodwishEdgeLike::get_instance();
	}

}

function goodwish_edge_get_like() {

	echo wp_kses(goodwish_edge_like()->add_like(), array(
		'span' => array(
			'class' => true,
			'aria-hidden' => true,
			'style' => true,
			'id' => true
		),
		'i' => array(
			'class' => true,
			'style' => true,
			'id' => true
		),
		'a' => array(
			'href' => true,
			'class' => true,
			'id' => true,
			'title' => true,
			'style' => true
		)
	));
}

if ( ! function_exists('goodwish_edge_like_latest_posts') ) {
	/**
	 * Add like to latest post
	 *
	 * @return string
	 */
	function goodwish_edge_like_latest_posts() {
		return goodwish_edge_like()->add_like();
	}

}

/*if ( ! function_exists('goodwish_edge_like_portfolio_list') ) {
	/**
	 * Add like to portfolio project
	 *
	 * @param $portfolio_project_id
	 * @return string
	 */
	/*function goodwish_edge_like_portfolio_list($portfolio_project_id) {
		return goodwish_edge_like()->add_like_portfolio_list($portfolio_project_id);
	}

}*/