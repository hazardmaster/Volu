<?php

if ( ! function_exists('goodwish_edge_social_options_map') ) {

	function goodwish_edge_social_options_map() {

		goodwish_edge_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'goodwish'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = goodwish_edge_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Social Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow social share on networks of your choice', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_panel_social_networks, #edgtf_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = goodwish_edge_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' 			=> esc_html__('Show Social Share On', 'goodwish'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Posts', 'goodwish'),
			'description'	=> esc_html__('Show Social Share on Blog Posts', 'goodwish'),
			'parent'		=> $panel_show_social_share_on
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Pages', 'goodwish'),
			'description'	=> esc_html__('Show Social Share on Pages', 'goodwish'),
			'parent'		=> $panel_show_social_share_on
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_attachment',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Media', 'goodwish'),
			'description'	=> esc_html__('Show Social Share for Images and Videos', 'goodwish'),
			'parent'		=> $panel_show_social_share_on
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_portfolio-item',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Portfolio Item', 'goodwish'),
			'description'	=> esc_html__('Show Social Share for Portfolio Items', 'goodwish'),
			'parent'		=> $panel_show_social_share_on
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_edge-event',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Event', 'goodwish'),
			'description'	=> esc_html__('Show Social Share for Events', 'goodwish'),
			'parent'		=> $panel_show_social_share_on
		));

		if (goodwish_edge_is_give_installed()){
			goodwish_edge_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_give_forms',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Give Forms', 'goodwish'),
				'description'	=> esc_html__('Show Social Share for Give Forms', 'goodwish'),
				'parent'		=> $panel_show_social_share_on
			));
		}
		
		if(goodwish_edge_is_woocommerce_installed()){
			goodwish_edge_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Product', 'goodwish'),
				'description'	=> esc_html__('Show Social Share for Product Items', 'goodwish'),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = goodwish_edge_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title'				=> esc_html__('Social Networks', 'goodwish'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title'		=> esc_html__('Share on Facebook', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Facebook', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = goodwish_edge_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title'		=> esc_html__('Share on Twitter', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Twitter', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = goodwish_edge_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_twitter_share_container
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label'			=> esc_html__('Via', 'goodwish'),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title'		=> esc_html__('Share on Google Plus', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Google Plus', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = goodwish_edge_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title'		=> esc_html__('Share on LinkedIn', 'goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via LinkedIn', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = goodwish_edge_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title'		=> esc_html__('Share on Tumblr', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Tumblr', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = goodwish_edge_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title'		=> esc_html__('Share on Pinterest', 'goodwish')
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Pinterest', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = goodwish_edge_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		goodwish_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title'		=> esc_html__('Share on VK', 'goodwish'),
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'goodwish'),
			'description'	=> esc_html__('Enabling this option will allow sharing via VK', 'goodwish'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = goodwish_edge_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		goodwish_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'goodwish'),
			'parent'		=> $enable_vk_container
		));

		if(defined('EDGEF_TWITTER_FEED_VERSION')) {
            $twitter_panel = goodwish_edge_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'goodwish'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            goodwish_edge_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('EDGEF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = goodwish_edge_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'goodwish'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            goodwish_edge_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'goodwish_edge_options_map', 'goodwish_edge_social_options_map', 17);
}