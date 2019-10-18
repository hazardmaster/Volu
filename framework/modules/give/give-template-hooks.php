<?php 

if (!function_exists('goodwish_edge_give_sidebar_options')){
	function goodwish_edge_give_sidebar_options($options){

		$options['before_widget'] = '<div class="widget %2$s">';
		$options['after_widget'] = '</div>';
		$options['before_title'] = '<h4 class="edgtf-widget-title">';
		$options['after_title'] = '</h4>' . goodwish_edge_get_separator_html(array('position' => 'left', 'class_name' => 'edgtf-sidebar-title-separator'));
		
		return $options;
	}
}

if (!function_exists('goodwish_edge_give_btn')){
	/*
	* Override button from give plugin
	*/
	function goodwish_edge_give_btn($output){
		$form_id = get_the_ID();
		$display_label_field = get_post_meta( $form_id, '_give_reveal_label', true );

		$display_label = $display_label_field !== '' ? $display_label_field : esc_html__( 'Donate', 'goodwish' );

		if (get_post_meta( $form_id, '_give_payment_display', true ) == 'modal' || get_post_meta( $form_id, '_give_payment_display', true ) == 'button'){
			$output = '<button type="button" class="give-btn edgtf-btn edgtf-btn-medium edgtf-btn-solid give-btn-modal">' . $display_label . '</button>';
		}

		return $output;
	}
}

if (!function_exists('goodwish_edge_give_progress')){
	/*
	* Override progress bar from give plugin
	*/
	function goodwish_edge_give_progress($form_id, $args) {
		$goal_option = get_post_meta( $form_id, '_give_goal_option', true );
		$form        = new Give_Donate_Form( $form_id );
		$goal        = $form->goal;
		$goal_format = get_post_meta( $form_id, '_give_goal_format', true );
		$income      = $form->get_earnings();
		$color       = get_post_meta( $form_id, '_give_goal_color', true );

		if ($color == ''){
			$color = goodwish_edge_options()->getOptionValue('first_color') !== "" ? goodwish_edge_options()->getOptionValue('first_color') : '#ffb422';
		}

		if ($goal_option == 'disabled'){
			return;
		}

		$inactive_color = '#fff';
		$number_color = '#000';

		$progress = round( ( $income / $goal ) * 100, 2 );

		$income = give_human_format_large_amount( give_format_amount( $income ) );
		$goal = give_human_format_large_amount( give_format_amount( $goal ) );

		if ($progress > 100){
			$progress = 100;
		}

		if (!empty($args['progress_color']) && $args['progress_color'] == 'light'){
			$color = '#fff';
			$inactive_color = 'rgba(255,255,255,0.4)';
			$number_color = '#fff';
		}

		if ($goal_format == 'percentage'){
			if (shortcode_exists('edgtf_progress_bar')){ ?>
				<div class="edgtf-give-progress give-goal-progress">
					<?php 
					echo goodwish_edge_execute_shortcode('edgtf_progress_bar',array(
						'percent' => $progress,
						'active_color' => $color,
						'inactive_color' => $inactive_color,
						'number_color' => $number_color
						)
					);
					?>
					<div class="edgtf-give-progress-btm">
						<div class="edgtf-give-progress-raised">
							<h6 class="edgtf-give-progress-title"><?php esc_html_e('Raised: ','goodwish')?></h6>
							<span class="edgtf-give-progress-amount"><?php echo esc_html(apply_filters( 'give_goal_amount_raised_output', give_currency_filter( $income )));?></span>
						</div>
						<div class="edgtf-give-progress-goal">
							<h6 class="edgtf-give-progress-title"><?php esc_html_e('Goal: ','goodwish')?></h6>
							<span class="edgtf-give-progress-amount"><?php echo esc_html(apply_filters( 'give_goal_amount_target_output', give_currency_filter( $goal )));?></span>
						</div>
					</div>
				</div>
				<?php
			}
		}
		else{
			give_get_template( 'shortcode-goal', array( 'form_id' => $form_id, 'args' => $args ) );
		}
	}
}

if (!function_exists('goodwish_edge_give_content_part')){
	function goodwish_edge_give_content_part($form_id, $args) {

		$content = get_post_meta( $form_id, '_give_form_content', true );
		$content = apply_filters( 'the_content', $content );

		$content_holder = '<div class="edgtf-give-content">';

		$content_holder .= '<h3 class="edgtf-give-form-title">'.get_the_title().'</h3>';

		$content_holder .= $content;
		$content_holder .= goodwish_edge_get_social_share_html();

		$content_holder .= '</div>';

		echo goodwish_edge_get_module_part($content_holder);
	}
}


if (!function_exists('goodwish_edge_add_content')){

	function goodwish_edge_add_content($form_id, $args){
		$show_content = get_post_meta( $form_id, '_give_display_content', true );
		$content_placement = get_post_meta( $form_id, '_give_content_placement', true );

		if ($show_content == 'enabled' && $content_placement == 'give_pre_form') {
			add_action('goodwish_edge_before_form','goodwish_edge_give_content_part',10, 2);
		}
		elseif($show_content == 'enabled' && $content_placement == 'give_post_form'){
			add_action('goodwish_edge_give_after_form','goodwish_edge_give_content_part',10, 2);
		}
	}
}



if (!function_exists('goodwish_edge_give_donation_form')){

	function goodwish_edge_give_donation_form($final_output, $args){

		$form_id = get_the_ID();

		if ( isset( $args['id'] ) ) {
			$form_id = $args['id'];
		}

		$defaults = apply_filters( 'give_form_args_defaults', array(
			'form_id' => $form_id,
		) );

		$args = wp_parse_args( $args, $defaults );

		$form = new Give_Donate_Form( $args['form_id'] );

		//bail if no form ID.
		if ( empty( $form->ID ) ) {
			return false;
		}

		$payment_mode = give_get_chosen_gateway( $form->ID );

		$form_action = add_query_arg( apply_filters( 'give_form_action_args', array(
			'payment-mode' => $payment_mode,
		) ),
			give_get_current_page_url()
		);

		//Sanity Check: Donation form not published or user doesn't have permission to view drafts.
		if (
			( 'publish' !== $form->post_status && ! current_user_can( 'edit_give_forms', $form->ID ) )
			|| ( 'trash' === $form->post_status )
		) {
			return false;
		}

		//Get the form wrap CSS classes.
		$form_wrap_classes = $form->get_form_wrap_classes( $args ).' edgtf-give-single';

		//Get the <form> tag wrap CSS classes.
		$form_classes = $form->get_form_classes( $args );

		goodwish_edge_add_content($form->ID, $args);

		$display_modal = get_post_meta( $form_id, '_give_payment_display', true ) == 'modal' || get_post_meta( $form_id, '_give_payment_display', true ) == 'button';

		ob_start();

		/**
		 * Fires while outputting donation form, before the form wrapper div.
		 *
		 * @since 1.0
		 *
		 * @param int   $form_id The form ID.
		 * @param array $args    An array of form arguments.
		 */

		do_action( 'give_pre_form_output', $form->ID, $args );

		?>
	    <div id="give-form-<?php echo esc_attr($form->ID); ?>-wrap" class="<?php echo esc_attr($form_wrap_classes); ?>">

			<?php if ($display_modal){
				do_action('goodwish_edge_before_form', $form->ID, $args);
			} ?>

	    	<div class="edgtf-give-top-content">

				<?php do_action('goodwish_edge_give_content_top'); ?>

	    		<?php if (!$display_modal){

	    			do_action('goodwish_edge_before_form', $form->ID, $args);
					do_action('goodwish_edge_give_progress_part', $form->ID, $args);
					do_action('goodwish_edge_give_frontend_warning');
	    		} ?>

				<?php if ( $form->is_close_donation_form() ) {

					// Get Goal thank you message.
					$goal_achieved_message = get_post_meta( $form->ID, '_give_form_goal_achieved_message', true );
					$goal_achieved_message = ! empty( $goal_achieved_message ) ? apply_filters( 'the_content', $goal_achieved_message ) : '';

					// Print thank you message.
					echo apply_filters( 'give_goal_closed_output', $goal_achieved_message, $form->ID );

				} else { ?>
					<div class="edgtf-give-btn">
                        <?php
                        // Set form html tags.
                        $form_html_tags = array(
                        'id'     => "give-form-{$form_id}",
                        'class'  => $form_classes,
                        'action' => esc_url_raw( $form_action ),
                        );

                        /**
                        * Filter the form html tags.
                        *
                        * @since 1.8.17
                        *
                        * @param array            $form_html_tags Array of form html tags.
                        * @param Give_Donate_Form $form           Form object.
                        */
                        $form_html_tags = apply_filters( 'give_form_html_tags', (array) $form_html_tags, $form );
                        ?>
                        <form <?php echo give_get_attribute_str( $form_html_tags ); ?> method="post">
<!--			                <input type="hidden" name="give-form-id" value="--><?php //echo esc_attr($form->ID); ?><!--"/>-->
<!--			                <input type="hidden" name="give-form-title" value="--><?php //echo htmlentities( $form->post_title ); ?><!--"/>-->
<!--			                <input type="hidden" name="give-current-url"-->
<!--			                       value="--><?php //echo htmlspecialchars( give_get_current_page_url() ); ?><!--"/>-->
<!--			                <input type="hidden" name="give-form-url"-->
<!--			                       value="--><?php //echo htmlspecialchars( give_get_current_page_url() ); ?><!--"/>-->
<!--			                <input type="hidden" name="give-form-minimum"-->
<!--			                       value="--><?php //echo give_format_amount( give_get_form_minimum_price( $form->ID ) ); ?><!--"/>-->

			                <!-- The following field is for robots only, invisible to humans: -->
			                <span class="give-hidden" style="display: none !important;">
								<label for="give-form-honeypot-<?php echo esc_attr($form_id); ?>"></label>
								<input id="give-form-honeypot-<?php echo esc_attr($form_id); ?>" type="text" name="give-honeypot"
			                           class="give-honeypot give-hidden"/>
							</span>

							<?php

							// Price ID hidden field for variable (mult-level) donation forms.
							if ( give_has_variable_prices( $form_id ) ) {
								// Get default selected price ID.
								$prices   = apply_filters( 'give_form_variable_prices', give_get_variable_prices( $form_id ), $form_id );
								$price_id = 0;
								//loop through prices.
								foreach ( $prices as $price ) {
									if ( isset( $price['_give_default'] ) && $price['_give_default'] === 'default' ) {
										$price_id = $price['_give_id']['level_id'];
									};
								}
								?>
			                    <input type="hidden" name="give-price-id" value="<?php echo esc_attr($price_id); ?>"/>
							<?php }

							/**
							 * Fires while outputting donation form, before all other fields.
							 *
							 * @since 1.0
							 *
							 * @param int   $form_id The form ID.
							 * @param array $args    An array of form arguments.
							 */
							do_action( 'give_checkout_form_top', $form->ID, $args );

							/*since 1.8.11*/
							do_action( 'give_donation_form_top', $form->ID, $args, $form);

							/**
							 * Fires while outputting donation form, for payment gateway fields.
							 *
							 * @since 1.7
							 *
							 * @param int              $form_id The form ID.
							 * @param array            $args    An array of form arguments.
							 * @param Give_Donate_Form $form    Form object.
							 */
							do_action( 'give_payment_mode_select', $form->ID, $args, $form );

							/**
							 * Fires while outputing donation form, after all other fields.
							 *
							 * @since 1.0
							 *
							 * @param int   $form_id The form ID.
							 * @param array $args    An array of form arguments.
							 */
							do_action( 'give_checkout_form_bottom', $form->ID, $args );

							/*since 1.8.11*/
							do_action( 'give_donation_form_bottom', $form->ID, $args, $form);

							?>
			            </form>
			        </div>

					<?php
				}
				?>
			</div>
            <?php 
				/**
				 * Show form title:
				 * 1. if show_title params set to true
				 * 2. if admin set form display_style to button
				 */
			
				if ($display_modal){
					do_action('goodwish_edge_give_progress_part', $form->ID, $args);
					do_action('goodwish_edge_give_frontend_warning');
				}
				do_action( 'goodwish_edge_give_after_form', $form->ID, $args );
			?>
	    </div><!--end #give-form-<?php echo absint( $form->ID ); ?>-->
		<?php
	

	}

	
}

?>