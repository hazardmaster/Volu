<?php
	if(!function_exists('goodwish_edge_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function goodwish_edge_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'goodwish_edge_layerslider_overrides');
	}
?>