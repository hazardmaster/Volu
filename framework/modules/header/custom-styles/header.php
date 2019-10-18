<?php

if(!function_exists('goodwish_edge_header_top_bar_styles')) {
    /**
     * Generates styles for header top bar
     */
    function goodwish_edge_header_top_bar_styles() {
        global $goodwish_edge_options;

        if($goodwish_edge_options['top_bar_height'] !== '') {
            echo goodwish_edge_dynamic_css('.edgtf-top-bar', array('height' => $goodwish_edge_options['top_bar_height'].'px'));
            echo goodwish_edge_dynamic_css('.edgtf-top-bar .edgtf-logo-wrapper a', array('max-height' => $goodwish_edge_options['top_bar_height'].'px'));
        }

        if($goodwish_edge_options['top_bar_in_grid'] == 'yes') {
            $top_bar_grid_selector = '.edgtf-top-bar .edgtf-grid .edgtf-vertical-align-containers';
            $top_bar_grid_styles = array();
            if($goodwish_edge_options['top_bar_grid_background_color'] !== '') {
                $grid_background_color    = $goodwish_edge_options['top_bar_grid_background_color'];
                $grid_background_transparency = 1;

                if(goodwish_edge_options()->getOptionValue('top_bar_grid_background_transparency')  !== '') {
                    $grid_background_transparency = goodwish_edge_options()->getOptionValue('top_bar_grid_background_transparency');
                }

                $grid_background_color = goodwish_edge_rgba_color($grid_background_color, $grid_background_transparency);
                $top_bar_grid_styles['background-color'] = $grid_background_color;
            }

            echo goodwish_edge_dynamic_css($top_bar_grid_selector, $top_bar_grid_styles);
        }

        $background_color = goodwish_edge_options()->getOptionValue('top_bar_background_color');
        $top_bar_styles = array();
        if($background_color !== '') {
            $background_transparency = 1;
            if(goodwish_edge_options()->getOptionValue('top_bar_background_transparency') !== '') {
               $background_transparency = goodwish_edge_options()->getOptionValue('top_bar_background_transparency');
            }

            $background_color = goodwish_edge_rgba_color($background_color, $background_transparency);
            $top_bar_styles['background-color'] = $background_color;
        }

        echo goodwish_edge_dynamic_css('.edgtf-top-bar', $top_bar_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_header_top_bar_styles');
}

if(!function_exists('goodwish_edge_header_standard_extended_logo_area_styles')) {
    /**
     * Generates styles for header standard extended menu
     */
    function goodwish_edge_header_standard_extended_logo_area_styles() {
        global $goodwish_edge_options;

        $logo_area_header_standard_extended_styles = array();

        if($goodwish_edge_options['logo_area_background_color_header_standard_extended'] !== '') {
            $logo_area_background_color        = $goodwish_edge_options['logo_area_background_color_header_standard_extended'];
            $logo_area_background_transparency = 1;

            if($goodwish_edge_options['logo_area_background_transparency_header_standard_extended'] !== '') {
                $logo_area_background_transparency = $goodwish_edge_options['logo_area_background_transparency_header_standard_extended'];
            }

            $logo_area_header_standard_extended_styles['background-color'] = goodwish_edge_rgba_color($logo_area_background_color, $logo_area_background_transparency);
        }

        if(goodwish_edge_options()->getOptionValue('logo_area_border_header_standard_extended') == 'yes' &&
            goodwish_edge_options()->getOptionValue('logo_area_border_color_header_standard_extended') !== ''
        ) {

            $logo_area_header_standard_extended_styles['border-bottom'] = '1px solid '.goodwish_edge_options()->getOptionValue('logo_area_border_color_header_standard_extended');
        }

        if($goodwish_edge_options['logo_area_height_header_standard_extended'] !== '') {
            $max_height = intval(goodwish_edge_filter_px($goodwish_edge_options['logo_area_height_header_standard_extended']) * 0.9).'px';
            echo goodwish_edge_dynamic_css('.edgtf-header-standard-extended .edgtf-page-header .edgtf-logo-wrapper a', array('max-height' => $max_height));

            $logo_area_header_standard_extended_styles['height'] = goodwish_edge_filter_px($goodwish_edge_options['logo_area_height_header_standard_extended']).'px';

        }

        echo goodwish_edge_dynamic_css('.edgtf-header-standard-extended .edgtf-page-header .edgtf-logo-area', $logo_area_header_standard_extended_styles);

        $logo_area_grid_header_standard_extended_styles = array();

        if($goodwish_edge_options['logo_area_in_grid_header_standard_extended'] == 'yes' && $goodwish_edge_options['logo_area_grid_background_color_header_standard_extended'] !== '') {
            $logo_area_grid_background_color        = $goodwish_edge_options['logo_area_grid_background_color_header_standard_extended'];
            $logo_area_grid_background_transparency = 1;

            if($goodwish_edge_options['logo_area_grid_background_transparency_header_standard_extended'] !== '') {
                $logo_area_grid_background_transparency = $goodwish_edge_options['logo_area_grid_background_transparency_header_standard_extended'];
            }

            $logo_area_grid_header_standard_extended_styles['background-color'] = goodwish_edge_rgba_color($logo_area_grid_background_color, $logo_area_grid_background_transparency);
        }

        if(goodwish_edge_options()->getOptionValue('logo_area_in_grid_border_header_standard_extended') == 'yes' &&
            goodwish_edge_options()->getOptionValue('logo_area_in_grid_border_color_header_standard_extended') !== ''
        ) {

            $logo_area_grid_header_standard_extended_styles['border-bottom'] = '1px solid '.goodwish_edge_options()->getOptionValue('logo_area_in_grid_border_color_header_standard_extended');

        } else if(goodwish_edge_options()->getOptionValue('logo_area_in_grid_border_header_standard_extended') == 'no') {
            $logo_area_grid_header_standard_extended_styles['border'] = '0';
        }

        echo goodwish_edge_dynamic_css('.edgtf-header-standard-extended .edgtf-page-header .edgtf-logo-area .edgtf-grid .edgtf-vertical-align-containers', $logo_area_grid_header_standard_extended_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_header_standard_extended_logo_area_styles');
}

if(!function_exists('goodwish_edge_header_standard_menu_area_styles')) {
    /**
     * Generates styles for header standard menu
     */
    function goodwish_edge_header_standard_menu_area_styles() {
        global $goodwish_edge_options;

        $menu_area_header_standard_styles = array();

        if($goodwish_edge_options['menu_area_background_color_header_standard'] !== '') {
            $menu_area_background_color        = $goodwish_edge_options['menu_area_background_color_header_standard'];
            $menu_area_background_transparency = 1;

            if($goodwish_edge_options['menu_area_background_transparency_header_standard'] !== '') {
                $menu_area_background_transparency = $goodwish_edge_options['menu_area_background_transparency_header_standard'];
            }

            $menu_area_header_standard_styles['background-color'] = goodwish_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($goodwish_edge_options['menu_area_height_header_standard'] !== '') {
            $max_height = intval(goodwish_edge_filter_px($goodwish_edge_options['menu_area_height_header_standard']) * 0.9).'px';
            echo goodwish_edge_dynamic_css('.edgtf-header-standard .edgtf-page-header .edgtf-logo-wrapper a', array('max-height' => $max_height));

            $menu_area_header_standard_styles['height'] = goodwish_edge_filter_px($goodwish_edge_options['menu_area_height_header_standard']).'px';

        }

        echo goodwish_edge_dynamic_css('.edgtf-header-standard .edgtf-page-header .edgtf-menu-area', $menu_area_header_standard_styles);

        $menu_area_grid_header_standard_styles = array();

        if($goodwish_edge_options['menu_area_in_grid_header_standard'] == 'yes' && $goodwish_edge_options['menu_area_grid_background_color_header_standard'] !== '') {
            $menu_area_grid_background_color        = $goodwish_edge_options['menu_area_grid_background_color_header_standard'];
            $menu_area_grid_background_transparency = 1;

            if($goodwish_edge_options['menu_area_grid_background_transparency_header_standard'] !== '') {
                $menu_area_grid_background_transparency = $goodwish_edge_options['menu_area_grid_background_transparency_header_standard'];
            }

            $menu_area_grid_header_standard_styles['background-color'] = goodwish_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo goodwish_edge_dynamic_css('.edgtf-header-standard .edgtf-page-header .edgtf-menu-area .edgtf-grid .edgtf-vertical-align-containers', $menu_area_grid_header_standard_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_header_standard_menu_area_styles');
}


if(!function_exists('goodwish_edge_header_standard_extended_menu_area_styles')) {
    /**
     * Generates styles for header standard extended menu
     */
    function goodwish_edge_header_standard_extended_menu_area_styles() {
        global $goodwish_edge_options;

        $menu_area_header_standard_extended_styles = array();

        if($goodwish_edge_options['menu_area_background_color_header_standard_extended'] !== '') {
            $menu_area_background_color        = $goodwish_edge_options['menu_area_background_color_header_standard_extended'];
            $menu_area_background_transparency = 1;

            if($goodwish_edge_options['menu_area_background_transparency_header_standard_extended'] !== '') {
                $menu_area_background_transparency = $goodwish_edge_options['menu_area_background_transparency_header_standard_extended'];
            }

            $menu_area_header_standard_extended_styles['background-color'] = goodwish_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
        }

        if($goodwish_edge_options['menu_area_height_header_standard_extended'] !== '') {

            $menu_area_header_standard_extended_styles['height'] = goodwish_edge_filter_px($goodwish_edge_options['menu_area_height_header_standard_extended']).'px';

        }

        echo goodwish_edge_dynamic_css('.edgtf-header-standard-extended .edgtf-page-header .edgtf-menu-area', $menu_area_header_standard_extended_styles);

        $menu_area_grid_header_standard_extended_styles = array();

        if($goodwish_edge_options['menu_area_in_grid_header_standard_extended'] == 'yes' && $goodwish_edge_options['menu_area_grid_background_color_header_standard_extended'] !== '') {
            $menu_area_grid_background_color        = $goodwish_edge_options['menu_area_grid_background_color_header_standard_extended'];
            $menu_area_grid_background_transparency = 1;

            if($goodwish_edge_options['menu_area_grid_background_transparency_header_standard_extended'] !== '') {
                $menu_area_grid_background_transparency = $goodwish_edge_options['menu_area_grid_background_transparency_header_standard_extended'];
            }

            $menu_area_grid_header_standard_extended_styles['background-color'] = goodwish_edge_rgba_color($menu_area_grid_background_color, $menu_area_grid_background_transparency);
        }

        echo goodwish_edge_dynamic_css('.edgtf-header-standard-extended .edgtf-page-header .edgtf-menu-area .edgtf-grid .edgtf-vertical-align-containers', $menu_area_grid_header_standard_extended_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_header_standard_extended_menu_area_styles');
}

if(!function_exists('goodwish_edge_header_full_screen_menu_area_styles')) {
	/**
	 * Generates styles for header standard menu
	 */
	function goodwish_edge_header_full_screen_menu_area_styles() {
		global $goodwish_edge_options;

		$menu_area_header_full_screen_styles = array();

		if($goodwish_edge_options['menu_area_background_color_header_full_screen'] !== '') {
			$menu_area_background_color        = $goodwish_edge_options['menu_area_background_color_header_full_screen'];
			$menu_area_background_transparency = 1;

			if($goodwish_edge_options['menu_area_background_transparency_header_full_screen'] !== '') {
				$menu_area_background_transparency = $goodwish_edge_options['menu_area_background_transparency_header_full_screen'];
			}

			$menu_area_header_full_screen_styles['background-color'] = goodwish_edge_rgba_color($menu_area_background_color, $menu_area_background_transparency);
		}

		if($goodwish_edge_options['menu_area_height_header_full_screen'] !== '') {
			$max_height = intval(goodwish_edge_filter_px($goodwish_edge_options['menu_area_height_header_full_screen']) * 0.9).'px';
			echo goodwish_edge_dynamic_css('.edgtf-header-full-screen .edgtf-page-header .edgtf-logo-wrapper a', array('max-height' => $max_height));

			$menu_area_header_full_screen_styles['height'] = goodwish_edge_filter_px($goodwish_edge_options['menu_area_height_header_full_screen']).'px';

		}

		echo goodwish_edge_dynamic_css('.edgtf-header-full-screen .edgtf-page-header .edgtf-menu-area', $menu_area_header_full_screen_styles);

	}

	add_action('goodwish_edge_style_dynamic', 'goodwish_edge_header_full_screen_menu_area_styles');
}

if(!function_exists('goodwish_edge_vertical_menu_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function goodwish_edge_vertical_menu_styles() {

        $vertical_header_styles = array();

        $vertical_header_selectors = array(
            '.edgtf-header-vertical .edgtf-vertical-area-background'
        );

        if(goodwish_edge_options()->getOptionValue('vertical_header_background_color') !== '') {
            $vertical_header_styles['background-color'] = goodwish_edge_options()->getOptionValue('vertical_header_background_color');
        }

        if(goodwish_edge_options()->getOptionValue('vertical_header_transparency') !== '') {
            $vertical_header_styles['opacity'] = goodwish_edge_options()->getOptionValue('vertical_header_transparency');
        }

        if(goodwish_edge_options()->getOptionValue('vertical_header_background_image') !== '') {
            $vertical_header_styles['background-image'] = 'url('.goodwish_edge_options()->getOptionValue('vertical_header_background_image').')';
        }


        echo goodwish_edge_dynamic_css($vertical_header_selectors, $vertical_header_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_vertical_menu_styles');
}

if(!function_exists('goodwish_edge_sticky_header_styles')) {
    /**
     * Generates styles for sticky haeder
     */
    function goodwish_edge_sticky_header_styles() {
        global $goodwish_edge_options;

        if($goodwish_edge_options['sticky_header_in_grid'] == 'yes' && $goodwish_edge_options['sticky_header_grid_background_color'] !== '') {
            $sticky_header_grid_background_color        = $goodwish_edge_options['sticky_header_grid_background_color'];
            $sticky_header_grid_background_transparency = 1;

            if($goodwish_edge_options['sticky_header_grid_transparency'] !== '') {
                $sticky_header_grid_background_transparency = $goodwish_edge_options['sticky_header_grid_transparency'];
            }

            echo goodwish_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-grid .edgtf-vertical-align-containers', array('background-color' => goodwish_edge_rgba_color($sticky_header_grid_background_color, $sticky_header_grid_background_transparency)));
        }

        if($goodwish_edge_options['sticky_header_background_color'] !== '') {

            $sticky_header_background_color              = $goodwish_edge_options['sticky_header_background_color'];
            $sticky_header_background_color_transparency = 1;

            if($goodwish_edge_options['sticky_header_transparency'] !== '') {
                $sticky_header_background_color_transparency = $goodwish_edge_options['sticky_header_transparency'];
            }

            echo goodwish_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-sticky-holder', array('background-color' => goodwish_edge_rgba_color($sticky_header_background_color, $sticky_header_background_color_transparency)));
        }

        if($goodwish_edge_options['sticky_header_height'] !== '') {
            $max_height = intval(goodwish_edge_filter_px($goodwish_edge_options['sticky_header_height']) * 0.9).'px';

            echo goodwish_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header', array('height' => $goodwish_edge_options['sticky_header_height'].'px'));
            echo goodwish_edge_dynamic_css('.edgtf-page-header .edgtf-sticky-header .edgtf-logo-wrapper a', array('max-height' => $max_height));
        }

        $sticky_menu_item_styles = array();
        if($goodwish_edge_options['sticky_color'] !== '') {
            $sticky_menu_item_styles['color'] = $goodwish_edge_options['sticky_color'];
        }
        if($goodwish_edge_options['sticky_google_fonts'] !== '-1') {
            $sticky_menu_item_styles['font-family'] = goodwish_edge_get_formatted_font_family($goodwish_edge_options['sticky_google_fonts']);
        }
        if($goodwish_edge_options['sticky_fontsize'] !== '') {
            $sticky_menu_item_styles['font-size'] = $goodwish_edge_options['sticky_fontsize'].'px';
        }
        if($goodwish_edge_options['sticky_lineheight'] !== '') {
            $sticky_menu_item_styles['line-height'] = $goodwish_edge_options['sticky_lineheight'].'px';
        }
        if($goodwish_edge_options['sticky_texttransform'] !== '') {
            $sticky_menu_item_styles['text-transform'] = $goodwish_edge_options['sticky_texttransform'];
        }
        if($goodwish_edge_options['sticky_fontstyle'] !== '') {
            $sticky_menu_item_styles['font-style'] = $goodwish_edge_options['sticky_fontstyle'];
        }
        if($goodwish_edge_options['sticky_fontweight'] !== '') {
            $sticky_menu_item_styles['font-weight'] = $goodwish_edge_options['sticky_fontweight'];
        }
        if($goodwish_edge_options['sticky_letterspacing'] !== '') {
            $sticky_menu_item_styles['letter-spacing'] = $goodwish_edge_options['sticky_letterspacing'].'px';
        }

        $sticky_menu_item_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li > a'
        );

        echo goodwish_edge_dynamic_css($sticky_menu_item_selector, $sticky_menu_item_styles);

        $sticky_menu_item_hover_styles = array();
        if($goodwish_edge_options['sticky_hovercolor'] !== '') {
            $sticky_menu_item_hover_styles['color'] = $goodwish_edge_options['sticky_hovercolor'];
        }

        $sticky_menu_item_hover_selector = array(
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
            '.edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item:hover > a',
            'body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-sticky-nav > ul > li:hover > a',
            'body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-sticky-nav > ul > li.edgtf-active-item:hover > a'
        );

        echo goodwish_edge_dynamic_css($sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_sticky_header_styles');
}

if(!function_exists('goodwish_edge_fixed_header_styles')) {
    /**
     * Generates styles for fixed haeder
     */
    function goodwish_edge_fixed_header_styles() {
        global $goodwish_edge_options;

        if($goodwish_edge_options['fixed_header_grid_background_color'] !== '') {

            $fixed_header_grid_background_color              = $goodwish_edge_options['fixed_header_grid_background_color'];
            $fixed_header_grid_background_color_transparency = 1;

            if($goodwish_edge_options['fixed_header_grid_transparency'] !== '') {
                $fixed_header_grid_background_color_transparency = $goodwish_edge_options['fixed_header_grid_transparency'];
            }

            echo goodwish_edge_dynamic_css('.edgtf-header-type1 .edgtf-fixed-wrapper.fixed .edgtf-grid .edgtf-vertical-align-containers,
                                    .edgtf-header-type3 .edgtf-fixed-wrapper.fixed .edgtf-grid .edgtf-vertical-align-containers',
                array('background-color' => goodwish_edge_rgba_color($fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency)));
        }

        if($goodwish_edge_options['fixed_header_background_color'] !== '') {

            $fixed_header_background_color              = $goodwish_edge_options['fixed_header_background_color'];
            $fixed_header_background_color_transparency = 1;

            if($goodwish_edge_options['fixed_header_transparency'] !== '') {
                $fixed_header_background_color_transparency = $goodwish_edge_options['fixed_header_transparency'];
            }

            echo goodwish_edge_dynamic_css('.edgtf-header-type1 .edgtf-fixed-wrapper.fixed .edgtf-menu-area,
                                    .edgtf-header-type3 .edgtf-fixed-wrapper.fixed .edgtf-menu-area',
                array('background-color' => goodwish_edge_rgba_color($fixed_header_background_color, $fixed_header_background_color_transparency)));
        }

    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_fixed_header_styles');
}

if(!function_exists('goodwish_edge_main_menu_styles')) {
    /**
     * Generates styles for main menu
     */
    function goodwish_edge_main_menu_styles() {
        global $goodwish_edge_options;

        if($goodwish_edge_options['menu_color'] !== '' || $goodwish_edge_options['menu_fontsize'] != '' || $goodwish_edge_options['menu_fontstyle'] !== '' || $goodwish_edge_options['menu_fontweight'] !== '' || $goodwish_edge_options['menu_texttransform'] !== '' || $goodwish_edge_options['menu_letterspacing'] !== '' || $goodwish_edge_options['menu_google_fonts'] != "-1") { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li > a,
            .edgtf-page-header #lang_sel > ul > li > a,
            .edgtf-page-header #lang_sel_click > ul > li > a,
            .edgtf-page-header #lang_sel ul > li:hover > a{
            <?php if($goodwish_edge_options['menu_color']) { ?> color: <?php echo esc_attr($goodwish_edge_options['menu_color']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['menu_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $goodwish_edge_options['menu_google_fonts'])); ?>', sans-serif;
            <?php } ?>
            <?php if($goodwish_edge_options['menu_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($goodwish_edge_options['menu_fontsize']); ?>px; <?php } ?>
            <?php if($goodwish_edge_options['menu_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($goodwish_edge_options['menu_fontstyle']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['menu_fontweight'] !== '') { ?> font-weight: <?php echo esc_attr($goodwish_edge_options['menu_fontweight']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['menu_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($goodwish_edge_options['menu_texttransform']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['menu_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($goodwish_edge_options['menu_letterspacing']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_google_fonts'] != "-1") { ?>
            .edgtf-page-header #lang_sel_list{
            font-family: '<?php echo esc_attr(str_replace('+', ' ', $goodwish_edge_options['menu_google_fonts'])); ?>', sans-serif !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_hovercolor'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
            .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a,
            body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
            body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a,
            .edgtf-page-header #lang_sel ul li a:hover,
            .edgtf-page-header #lang_sel_click > ul > li a:hover{
            color: <?php echo esc_attr($goodwish_edge_options['menu_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_activecolor'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a,
            body:not(.edgtf-menu-item-first-level-bg-color) .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a{
            color: <?php echo esc_attr($goodwish_edge_options['menu_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_item_icon_position'] == "top" && $goodwish_edge_options['menu_item_icon_size'] !== "") { ?>
            body.edgtf-menu-with-large-icons .edgtf-main-menu.edgtf-default-nav > ul > li > a span.edgtf-item-inner i{
            font-size: <?php echo esc_attr($goodwish_edge_options['menu_item_icon_size']); ?>px !important;
            }
        <?php } ?>

	    <?php if($goodwish_edge_options['menu_item_style'] == 'small_item' && $goodwish_edge_options['menu_text_background_color'] !== '') { ?>
		    .edgtf-main-menu.edgtf-default-nav > ul > li > a span.edgtf-item-inner{
		    background-color: <?php echo esc_attr($goodwish_edge_options['menu_text_background_color']); ?>;
		    }
	    <?php } ?>
        <?php if($goodwish_edge_options['menu_item_style'] == 'large_item' && $goodwish_edge_options['menu_text_background_color'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li > a{
            background-color: <?php echo esc_attr($goodwish_edge_options['menu_text_background_color']); ?>;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_hover_background_color'] !== '') {
            $menu_hover_background_color = $goodwish_edge_options['menu_hover_background_color'];

            if($goodwish_edge_options['menu_hover_background_color_transparency'] !== '') {
                $menu_hover_background_color_rgb = goodwish_edge_hex2rgb($menu_hover_background_color);
                $menu_hover_background_color     = 'rgba('.$menu_hover_background_color_rgb[0].', '.$menu_hover_background_color_rgb[1].', '.$menu_hover_background_color_rgb[2].', '.$goodwish_edge_options['menu_hover_background_color_transparency'].')';
            } ?>

            <?php if($goodwish_edge_options['menu_item_style'] == 'small_item') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a span.edgtf-item-inner,
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a span.edgtf-item-inner {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
                }
            <?php } elseif($goodwish_edge_options['menu_item_style'] == 'large_item') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a {
                background-color: <?php echo esc_attr($menu_hover_background_color); ?>;
                }
            <?php } ?>
        <?php } ?>

        <?php if($goodwish_edge_options['menu_active_background_color'] !== '') {
            $menu_active_background_color = $goodwish_edge_options['menu_active_background_color'];

            if($goodwish_edge_options['menu_active_background_color_transparency'] !== '') {
                $menu_active_background_color_rgb = goodwish_edge_hex2rgb($menu_active_background_color);
                $menu_active_background_color     = 'rgba('.$menu_active_background_color_rgb[0].', '.$menu_active_background_color_rgb[1].', '.$menu_active_background_color_rgb[2].', '.$goodwish_edge_options['menu_active_background_color_transparency'].')';
            }
            ?>
            <?php if($goodwish_edge_options['menu_item_style'] == 'small_item') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a span.edgtf-item-inner {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
                }
            <?php } elseif($goodwish_edge_options['menu_item_style'] == 'large_item') { ?>
                .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a {
                background-color: <?php echo esc_attr($menu_active_background_color); ?>;
                }
            <?php } ?>
        <?php } ?>


        <?php if($goodwish_edge_options['menu_light_hovercolor'] !== '') { ?>
            .edgtf-light-header .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
            .edgtf-light-header .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a{
            color: <?php echo esc_attr($goodwish_edge_options['menu_light_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_light_activecolor'] !== '') { ?>
            .edgtf-light-header .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a{
            color: <?php echo esc_attr($goodwish_edge_options['menu_light_activecolor']); ?> !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_dark_hovercolor'] !== '') { ?>
            .edgtf-dark-header .edgtf-main-menu.edgtf-default-nav > ul > li:hover > a,
            .edgtf-dark-header .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item:hover > a{
            color: <?php echo esc_attr($goodwish_edge_options['menu_dark_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_dark_activecolor'] !== '') { ?>
            .edgtf-dark-header .edgtf-main-menu.edgtf-default-nav > ul > li.edgtf-active-item > a{
            color: <?php echo esc_attr($goodwish_edge_options['menu_dark_activecolor']); ?>;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_lineheight'] != "" || $goodwish_edge_options['menu_padding_left_right'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li > a span.edgtf-item-inner{
            <?php if($goodwish_edge_options['menu_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($goodwish_edge_options['menu_lineheight']); ?>px; <?php } ?>
            <?php if($goodwish_edge_options['menu_padding_left_right']) { ?> padding: 0  <?php echo esc_attr($goodwish_edge_options['menu_padding_left_right']); ?>px; <?php } ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['menu_margin_left_right'] !== '') { ?>
            .edgtf-main-menu.edgtf-default-nav > ul > li{
            margin: 0  <?php echo esc_attr($goodwish_edge_options['menu_margin_left_right']); ?>px;
            }
        <?php } ?>

        <?php
        if($goodwish_edge_options['dropdown_background_color'] != "" || $goodwish_edge_options['dropdown_background_transparency'] != "") {

            //dropdown background and transparency styles
            $dropdown_bg_color_initial        = '#ffffff';
            $dropdown_bg_transparency_initial = 1;

            $dropdown_bg_color        = $goodwish_edge_options['dropdown_background_color'] !== "" ? $goodwish_edge_options['dropdown_background_color'] : $dropdown_bg_color_initial;
            $dropdown_bg_transparency = $goodwish_edge_options['dropdown_background_transparency'] !== "" ? $goodwish_edge_options['dropdown_background_transparency'] : $dropdown_bg_transparency_initial;

            $dropdown_bg_color_rgb = goodwish_edge_hex2rgb($dropdown_bg_color);

            ?>

            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li ul,
            .shopping_cart_dropdown,
            .edgtf-drop-down .edgtf-menu-narrow .edgtf-menu-second .edgtf-menu-inner ul,
            .edgtf-main-menu.edgtf-default-nav #lang_sel ul ul,
            .edgtf-main-menu.edgtf-default-nav #lang_sel_click  ul ul,
            .header-widget.widget_nav_menu ul ul,
            .edgtf-drop-down .edgtf-menu-wide.wide-background .edgtf-menu-second{
            background-color: <?php echo esc_attr($dropdown_bg_color); ?>;
            background-color: rgba(<?php echo esc_attr($dropdown_bg_color_rgb[0]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[1]); ?>,<?php echo esc_attr($dropdown_bg_color_rgb[2]); ?>,<?php echo esc_attr($dropdown_bg_transparency); ?>);
            }

        <?php } //end dropdown background and transparency styles ?>

        <?php
        if($goodwish_edge_options['dropdown_top_padding'] !== '') {

            $menu_inner_ul_top = 15; //default value without border
            if($goodwish_edge_options['dropdown_top_padding'] !== '') {
                ?>
                .edgtf-drop-down .edgtf-menu-narrow .edgtf-menu-second .edgtf-menu-inner ul,
                .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul{
                padding-top: <?php echo esc_attr($goodwish_edge_options['dropdown_top_padding']); ?>px;
                }
                <?php
                $menu_inner_ul_top = $goodwish_edge_options['dropdown_top_padding']; //overwrite default value
            } ?>
            .edgtf-drop-down .edgtf-menu-narrow .edgtf-menu-second .edgtf-menu-inner ul li ul,
            body.edgtf-slide-from-bottom .edgtf-drop-down .edgtf-menu-narrow .edgtf-menu-second .edgtf-menu-inner ul li:hover ul,
            body.edgtf-slide-from-top .edgtf-menu-narrow .edgtf-menu-second .edgtf-menu-inner ul li:hover ul{
            top:-<?php echo esc_attr($menu_inner_ul_top); ?>px;
            }

        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_bottom_padding'] !== '') { ?>
		    .edgtf-drop-down .edgtf-menu-narrow .edgtf-menu-second .edgtf-menu-inner ul,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul{
            padding-bottom: <?php echo esc_attr($goodwish_edge_options['dropdown_bottom_padding']); ?>px;
            }
        <?php } ?>

        <?php
        $dropdown_separator_full_width = 'no';
        if($goodwish_edge_options['enable_dropdown_separator_full_width'] == "yes") {
            $dropdown_separator_full_width = $goodwish_edge_options['enable_dropdown_separator_full_width']; ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner > ul > li:last-child > a,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner > ul > li > ul > li:last-child > a,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner > ul > li > ul > li > ul > li:last-child > a{
            border-bottom:1px solid transparent;
            }

        <?php }
        if($dropdown_separator_full_width !== 'yes' && $goodwish_edge_options['dropdown_separator_color'] !== "") {
            ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li a,
            .header-widget.widget_nav_menu ul.menu li ul li a {
            border-color: <?php echo esc_attr($goodwish_edge_options['dropdown_separator_color']); ?>;
            }
        <?php } ?>
        <?php
        if($dropdown_separator_full_width == 'yes') {
            ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li,
            .header-widget.widget_nav_menu ul.menu li ul li{
	        border-bottom-width:1px;
	        border-bottom-style:solid;
            <?php if($goodwish_edge_options['dropdown_separator_color'] !== "") {?> border-bottom-color: <?php echo esc_attr($goodwish_edge_options['dropdown_separator_color']); ?>; <?php } ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_top_position'] !== '') { ?>
            header .edgtf-drop-down .edgtf-menu-second {
            top: <?php echo esc_attr($goodwish_edge_options['dropdown_top_position']).'%;'; ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_color'] !== '' || $goodwish_edge_options['dropdown_fontsize'] !== '' || $goodwish_edge_options['dropdown_lineheight'] !== '' || $goodwish_edge_options['dropdown_fontstyle'] !== '' || $goodwish_edge_options['dropdown_fontweight'] !== '' || $goodwish_edge_options['dropdown_google_fonts'] != "-1" || $goodwish_edge_options['dropdown_texttransform'] !== '' || $goodwish_edge_options['dropdown_letterspacing'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner > ul > li > a,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner > ul > li > h4,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul > li > h4,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul > li > a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second ul li ul li.menu-item-has-children > a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li.menu-item-has-children > a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel ul li li a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel_click ul li ul li a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel ul ul a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel_click ul ul a{
            <?php if(!empty($goodwish_edge_options['dropdown_color'])) { ?> color: <?php echo esc_attr($goodwish_edge_options['dropdown_color']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $goodwish_edge_options['dropdown_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($goodwish_edge_options['dropdown_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($goodwish_edge_options['dropdown_fontsize']); ?>px; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($goodwish_edge_options['dropdown_lineheight']); ?>px; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($goodwish_edge_options['dropdown_fontstyle']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($goodwish_edge_options['dropdown_fontweight']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($goodwish_edge_options['dropdown_texttransform']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($goodwish_edge_options['dropdown_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_color'] !== '') { ?>
            .shopping_cart_dropdown ul li
            .item_info_holder .item_left a,
            .shopping_cart_dropdown ul li .item_info_holder .item_right .amount,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total,
            .shopping_cart_dropdown .cart_bottom .subtotal_holder .total_amount{
            color: <?php echo esc_attr($goodwish_edge_options['dropdown_color']); ?>;
            }
        <?php } ?>

        <?php if(!empty($goodwish_edge_options['dropdown_hovercolor'])) { ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner > ul > li:hover > a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second ul li ul li.menu-item-has-children:hover > a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li.menu-item-has-children:hover > a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel ul li li:hover a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel_click ul li ul li:hover a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel ul li:hover > a,
            .edgtf-main-menu.edgtf-default-nav #lang_sel_click ul li:hover > a{
            color: <?php echo esc_attr($goodwish_edge_options['dropdown_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($goodwish_edge_options['dropdown_background_hovercolor'])) { ?>
            .edgtf-drop-down li:not(.edgtf-menu-wide) .edgtf-menu-second .edgtf-menu-inner > ul > li:hover{
            background-color: <?php echo esc_attr($goodwish_edge_options['dropdown_background_hovercolor']); ?>;
            }
        <?php } ?>

        <?php if(!empty($goodwish_edge_options['dropdown_padding_top_bottom'])) { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second>.edgtf-menu-inner>ul>li.edgtf-sub>ul>li>a,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second ul li a,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul.right li a{
            padding-top: <?php echo esc_attr($goodwish_edge_options['dropdown_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($goodwish_edge_options['dropdown_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_wide_color'] !== '' || $goodwish_edge_options['dropdown_wide_fontsize'] !== '' || $goodwish_edge_options['dropdown_wide_lineheight'] !== '' || $goodwish_edge_options['dropdown_wide_fontstyle'] !== '' || $goodwish_edge_options['dropdown_wide_fontweight'] !== '' || $goodwish_edge_options['dropdown_wide_google_fonts'] !== "-1" || $goodwish_edge_options['dropdown_wide_texttransform'] !== '' || $goodwish_edge_options['dropdown_wide_letterspacing'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul > li > a{
            <?php if($goodwish_edge_options['dropdown_wide_color'] !== '') { ?> color: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_color']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_google_fonts'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $goodwish_edge_options['dropdown_wide_google_fonts'])); ?>', sans-serif !important;
            <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_fontsize'] !== '') { ?> font-size: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_fontsize']); ?>px; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_lineheight'] !== '') { ?> line-height: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_lineheight']); ?>px; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_fontstyle'] !== '') { ?> font-style: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_fontstyle']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_fontweight'] !== '') { ?>font-weight: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_fontweight']); ?>; <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_texttransform'] !== '') { ?> text-transform: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_texttransform']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_letterspacing'] !== '') { ?> letter-spacing: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_letterspacing']); ?>px;  <?php } ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_wide_hovercolor'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul > li:hover > a {
            color: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_hovercolor']); ?> !important;
            }
        <?php } ?>

        <?php if(!empty($goodwish_edge_options['dropdown_wide_background_hovercolor'])) { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner > ul > li:hover > a{
            background-color: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_background_hovercolor']); ?>
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_wide_padding_top_bottom'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second>.edgtf-menu-inner > ul > li.edgtf-sub > ul > li > a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second ul li a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul.right li a{
            padding-top: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_padding_top_bottom']); ?>px;
            padding-bottom: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_padding_top_bottom']); ?>px;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_color_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_fontsize_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_lineheight_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_fontstyle_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_fontweight_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_google_fonts_thirdlvl'] != "-1" || $goodwish_edge_options['dropdown_texttransform_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_letterspacing_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li a{
            <?php if($goodwish_edge_options['dropdown_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($goodwish_edge_options['dropdown_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $goodwish_edge_options['dropdown_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($goodwish_edge_options['dropdown_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($goodwish_edge_options['dropdown_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($goodwish_edge_options['dropdown_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($goodwish_edge_options['dropdown_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($goodwish_edge_options['dropdown_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($goodwish_edge_options['dropdown_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($goodwish_edge_options['dropdown_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($goodwish_edge_options['dropdown_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($goodwish_edge_options['dropdown_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li:hover > a,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li ul li:hover > a{
            color: <?php echo esc_attr($goodwish_edge_options['dropdown_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_background_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li:hover,
            .edgtf-drop-down .edgtf-menu-second .edgtf-menu-inner ul li ul li:hover{
            background-color: <?php echo esc_attr($goodwish_edge_options['dropdown_background_hovercolor_thirdlvl']); ?>;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_wide_color_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_wide_fontsize_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_wide_lineheight_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_wide_fontstyle_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_wide_fontweight_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_wide_google_fonts_thirdlvl'] != "-1" || $goodwish_edge_options['dropdown_wide_texttransform_thirdlvl'] !== '' || $goodwish_edge_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li a,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second ul li ul li a{
            <?php if($goodwish_edge_options['dropdown_wide_color_thirdlvl'] !== '') { ?> color: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_color_thirdlvl']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_google_fonts_thirdlvl'] != "-1") { ?>
                font-family: '<?php echo esc_attr(str_replace('+', ' ', $goodwish_edge_options['dropdown_wide_google_fonts_thirdlvl'])); ?>', sans-serif;
            <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_fontsize_thirdlvl'] !== '') { ?> font-size: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_fontsize_thirdlvl']); ?>px;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_lineheight_thirdlvl'] !== '') { ?> line-height: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_lineheight_thirdlvl']); ?>px;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_fontstyle_thirdlvl'] !== '') { ?> font-style: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_fontstyle_thirdlvl']); ?>;   <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_fontweight_thirdlvl'] !== '') { ?> font-weight: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_fontweight_thirdlvl']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_texttransform_thirdlvl'] !== '') { ?> text-transform: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_texttransform_thirdlvl']); ?>;  <?php } ?>
            <?php if($goodwish_edge_options['dropdown_wide_letterspacing_thirdlvl'] !== '') { ?> letter-spacing: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_letterspacing_thirdlvl']); ?>px;  <?php } ?>
            }
        <?php } ?>
        <?php if($goodwish_edge_options['dropdown_wide_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li) > a:hover,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li ul li > a:hover{
            color: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_hovercolor_thirdlvl']); ?> !important;
            }
        <?php } ?>

        <?php if($goodwish_edge_options['dropdown_wide_background_hovercolor_thirdlvl'] !== '') { ?>
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li.edgtf-sub ul li:hover,
            .edgtf-drop-down .edgtf-menu-wide .edgtf-menu-second .edgtf-menu-inner ul li ul li:hover{
            background-color: <?php echo esc_attr($goodwish_edge_options['dropdown_wide_background_hovercolor_thirdlvl']); ?>;
            }
        <?php }
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_main_menu_styles');
}

if(!function_exists('goodwish_edge_vertical_main_menu_styles')) {
    /**
     * Generates styles for vertical main main menu
     */
    function goodwish_edge_vertical_main_menu_styles() {
        $dropdown_styles = array();

        if(goodwish_edge_options()->getOptionValue('vertical_dropdown_background_color') !== '') {
            $dropdown_styles['background-color'] = goodwish_edge_options()->getOptionValue('vertical_dropdown_background_color');
        }

        $dropdown_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-dropdown-float .menu-item .edgtf-menu-second',
            '.edgtf-header-vertical .edgtf-vertical-dropdown-float .edgtf-menu-second .edgtf-menu-inner ul ul'
        );

        echo goodwish_edge_dynamic_css($dropdown_selector, $dropdown_styles);

        $fist_level_styles = array();
        $fist_level_hover_styles = array();

        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_color') !== '') {
            $fist_level_styles['color'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_color');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_google_fonts') !== '-1') {
            $fist_level_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('vertical_menu_1st_google_fonts'));
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_fontsize') !== '') {
            $fist_level_styles['font-size'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_fontsize').'px';
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_lineheight') !== '') {
            $fist_level_styles['line-height'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_lineheight').'px';
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_texttransform') !== '') {
            $fist_level_styles['text-transform'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_texttransform');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_fontstyle') !== '') {
            $fist_level_styles['font-style'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_fontstyle');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_fontweight') !== '') {
            $fist_level_styles['font-weight'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_fontweight');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_letter_spacing') !== '') {
            $fist_level_styles['letter-spacing'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_letter_spacing').'px';
        }

        if(goodwish_edge_options()->getOptionValue('vertical_menu_1st_hover_color') !== '') {
            $fist_level_hover_styles['color'] = goodwish_edge_options()->getOptionValue('vertical_menu_1st_hover_color');
        }

        $first_level_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a'
        );
        $first_level_hover_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a:hover',
            '.edgtf-header-vertical .edgtf-vertical-menu > ul > li > a.edgtf-active-item'
        );

        echo goodwish_edge_dynamic_css($first_level_selector, $fist_level_styles);
        echo goodwish_edge_dynamic_css($first_level_hover_selector, $fist_level_hover_styles);

        $second_level_styles = array();
        $second_level_hover_styles = array();

        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_color') !== '') {
            $second_level_styles['color'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_color');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_google_fonts') !== '-1') {
            $second_level_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_google_fonts'));
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_fontsize') !== '') {
            $second_level_styles['font-size'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_fontsize').'px';
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_lineheight') !== '') {
            $second_level_styles['line-height'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_lineheight').'px';
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_texttransform') !== '') {
            $second_level_styles['text-transform'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_texttransform');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_fontstyle') !== '') {
            $second_level_styles['font-style'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_fontstyle');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_fontweight') !== '') {
            $second_level_styles['font-weight'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_fontweight');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_letter_spacing') !== '') {
            $second_level_styles['letter-spacing'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_letter_spacing').'px';
        }

        if(goodwish_edge_options()->getOptionValue('vertical_menu_2nd_hover_color') !== '') {
            $second_level_hover_styles['color'] = goodwish_edge_options()->getOptionValue('vertical_menu_2nd_hover_color');
        }

        $second_level_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-menu .edgtf-menu-second .edgtf-menu-inner > ul > li > a'
        );

        $second_level_hover_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-menu .edgtf-menu-second .edgtf-menu-inner > ul > li > a:hover',
            '.edgtf-header-vertical .edgtf-vertical-menu .edgtf-menu-second .edgtf-menu-inner > ul > li > a.edgtf-active-item'
        );

        echo goodwish_edge_dynamic_css($second_level_selector, $second_level_styles);
        echo goodwish_edge_dynamic_css($second_level_hover_selector, $second_level_hover_styles);

        $third_level_styles = array();
        $third_level_hover_styles = array();

        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_color') !== '') {
            $third_level_styles['color'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_color');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_google_fonts') !== '-1') {
            $third_level_styles['font-family'] = goodwish_edge_get_formatted_font_family(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_google_fonts'));
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_fontsize') !== '') {
            $third_level_styles['font-size'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_fontsize').'px';
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_lineheight') !== '') {
            $third_level_styles['line-height'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_lineheight').'px';
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_texttransform') !== '') {
            $third_level_styles['text-transform'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_texttransform');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_fontstyle') !== '') {
            $third_level_styles['font-style'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_fontstyle');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_fontweight') !== '') {
            $third_level_styles['font-weight'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_fontweight');
        }
        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_letter_spacing') !== '') {
            $third_level_styles['letter-spacing'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_letter_spacing').'px';
        }

        if(goodwish_edge_options()->getOptionValue('vertical_menu_3rd_hover_color') !== '') {
            $third_level_hover_styles['color'] = goodwish_edge_options()->getOptionValue('vertical_menu_3rd_hover_color');
        }

        $third_level_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-menu .edgtf-menu-second .edgtf-menu-inner ul li ul li a'
        );

        $third_level_hover_selector = array(
            '.edgtf-header-vertical .edgtf-vertical-menu .edgtf-menu-second .edgtf-menu-inner ul li ul li a:hover',
            '.edgtf-header-vertical .edgtf-vertical-menu .edgtf-menu-second .edgtf-menu-inner ul li ul li a.edgtf-active-item'
        );

        echo goodwish_edge_dynamic_css($third_level_selector, $third_level_styles);
        echo goodwish_edge_dynamic_css($third_level_hover_selector, $third_level_hover_styles);
    }

    add_action('goodwish_edge_style_dynamic', 'goodwish_edge_vertical_main_menu_styles');
}