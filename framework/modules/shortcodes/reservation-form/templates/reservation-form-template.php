<div class="edgtf-rf-holder">
	<?php if($open_table_id !== '') : ?>
		<form class="edgtf-rf" target="_blank" action="http://www.opentable.com/restaurant-search.aspx" name="edgtf-rf">
			<div class="edgtf-rf-row clearfix">
				<div class="edgtf-rf-col-holder">
					<div class="edgtf-rf-field-holder clearfix">
						<select name="partySize" class="edgtf-ot-people">
							<option value="1"><?php esc_html_e('1 Person', 'goodwish'); ?></option>
							<option value="2"><?php esc_html_e('2 People', 'goodwish'); ?></option>
							<option value="3"><?php esc_html_e('3 People', 'goodwish'); ?></option>
							<option value="4"><?php esc_html_e('4 People', 'goodwish'); ?></option>
							<option value="5"><?php esc_html_e('5 People', 'goodwish'); ?></option>
							<option value="6"><?php esc_html_e('6 People', 'goodwish'); ?></option>
							<option value="7"><?php esc_html_e('7 People', 'goodwish'); ?></option>
							<option value="8"><?php esc_html_e('8 People', 'goodwish'); ?></option>
							<option value="9"><?php esc_html_e('9 People', 'goodwish'); ?></option>
							<option value="10"><?php esc_html_e('10 People', 'goodwish'); ?></option>
						</select>
					<span class="edgtf-rf-icon">
						<i class="fa fa-users" aria-hidden="true"></i>
					</span>
					</div>
				<span class="edgtf-rf-label">
					<?php esc_html_e('For', 'goodwish'); ?>
				</span>
				</div>
				<div class="edgtf-rf-col-holder">
					<div class="edgtf-rf-field-holder clearfix">
						<input type="text" value="<?php echo date('m.d.Y'); ?>" class="edgtf-ot-date" name="startDate">
					<span class="edgtf-rf-icon">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					</span>
					</div>
				<span class="edgtf-rf-label">
					<?php esc_html_e('At', 'goodwish'); ?>
				</span>

				</div>
				<div class="edgtf-rf-col-holder edgtf-rf-time-col">
					<div class="edgtf-rf-field-holder clearfix">
						<select name="ResTime" class="edgtf-ot-time">
							<option value="5:30pm"><?php esc_html_e( '6:30 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '7:00 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '7:30 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '8:00 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '8:30 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '9:00 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '9:30 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '10:00 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '10:30 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '11:00 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '11:30 am', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '12:00 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '12:30 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '1:00 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '1:30 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '2:00 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '2:30 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '3:00 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '3:30 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '4:00 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '4:30 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '5:00 pm', 'goodwish' ); ?></option>
							<option value="5:30pm"><?php esc_html_e( '5:30 pm', 'goodwish' ); ?></option>
							<option value="6:00pm"><?php esc_html_e( '6:00 pm', 'goodwish' ); ?></option>
							<option value="6:30pm"><?php esc_html_e( '6:30 pm', 'goodwish' ); ?></option>
							<option value="7:00pm" selected="selected"><?php esc_html_e( '7:00 pm', 'goodwish' ); ?></option>
							<option value="7:30pm"><?php esc_html_e( '7:30 pm', 'goodwish' ); ?></option>
							<option value="8:00pm"><?php esc_html_e( '8:00 pm', 'goodwish' ); ?></option>
							<option value="8:30pm"><?php esc_html_e( '8:30 pm', 'goodwish' ); ?></option>
							<option value="9:00pm"><?php esc_html_e( '9:00 pm', 'goodwish' ); ?></option>
							<option value="9:30pm"><?php esc_html_e( '9:30 pm', 'goodwish' ); ?></option>
							<option value="10:00pm"><?php esc_html_e( '10:00 pm', 'goodwish' ); ?></option>
							<option value="10:30pm"><?php esc_html_e( '10:30 pm', 'goodwish' ); ?></option>
							<option value="11:00pm"><?php esc_html_e( '11:00 pm', 'goodwish' ); ?></option>
							<option value="11:30pm"><?php esc_html_e( '11:30 pm', 'goodwish' ); ?></option>
						</select>
					<span class="edgtf-rf-icon">
						<i class="fa fa-clock-o" aria-hidden="true"></i>
					</span>
					</div>
				</div>
				<div class="edgtf-rf-col-holder edgtf-rf-btn-holder">
					<?php if(goodwish_edge_core_installed()) : ?>
						<?php echo goodwish_edge_get_button_html(
							array(
								'type'         => '',
								'html_type'	   => 'button',
								'text'         => esc_html__('Book a Table', 'goodwish'),
								'input_name'   => 'edgtf-rf-submit',
							)
						) ?>
					<?php else: ?>
						<input type="submit" class="edgtf-btn edgtf-btn-solid" name="edgtf-rf-time">
					<?php endif; ?>
				</div>
			</div>

			<input type="hidden" name="RestaurantID" class="RestaurantID" value="<?php echo esc_attr($open_table_id); ?>">
			<input type="hidden" name="rid" class="rid" value="<?php echo esc_attr($open_table_id); ?>">
			<input type="hidden" name="GeoID" class="GeoID" value="15">
			<input type="hidden" name="txtDateFormat" class="txtDateFormat" value="MM/dd/yyyy">
			<input type="hidden" name="RestaurantReferralID" class="RestaurantReferralID" value="<?php echo esc_attr($open_table_id); ?>">

		</form>
		<p class="edgtf-rf-copyright"><?php esc_html_e('Powered by OpenTable', 'goodwish'); ?></p>
	<?php else: ?>
		<p><?php esc_html_e("You haven't added OpenTable ID", 'goodwish'); ?></p>
	<?php endif; ?>
</div>