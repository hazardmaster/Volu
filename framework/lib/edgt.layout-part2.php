<?php

class GoodwishEdgeFieldImageVideo extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch switch-type">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "image") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Image', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "video") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Video', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (goodwish_edge_option_get_value($name) == "image") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldYesEmpty extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (goodwish_edge_option_get_value($name) == "yes") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldFlagPage extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (goodwish_edge_option_get_value($name) == "page") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldFlagPost extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "post") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (goodwish_edge_option_get_value($name) == "post") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldFlagMedia extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "attachment") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (goodwish_edge_option_get_value($name) == "attachment") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldFlagPortfolio extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "portfolio_page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (goodwish_edge_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldFlagProduct extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $dependence_hide_on_yes = "";
        if(isset($args["dependence_hide_on_yes"]))
            $dependence_hide_on_yes = $args["dependence_hide_on_yes"];
        $dependence_show_on_yes = "";
        if(isset($args["dependence_show_on_yes"]))
            $dependence_show_on_yes = $args["dependence_show_on_yes"];
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="field switch">
                                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "product") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (goodwish_edge_option_get_value($name) == "product") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldRange extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $range_min = 0;
        $range_max = 1;
        $range_step = 0.01;
        $range_decimals = 2;
        if(isset($args["range_min"]))
            $range_min = $args["range_min"];
        if(isset($args["range_max"]))
            $range_max = $args["range_max"];
        if(isset($args["range_step"]))
            $range_step = $args["range_step"];
        if(isset($args["range_decimals"]))
            $range_decimals = $args["range_decimals"];
        ?>

        <div class="edgtf-page-form-section">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="edgtf-slider-range-wrapper">
                                <div class="form-inline">
                                    <input type="text"
                                           class="form-control edgtf-form-element edgtf-form-element-xsmall pull-left edgtf-slider-range-value"
                                           name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>

                                    <div class="edgtf-slider-range small"
                                         data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldRangeSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        ?>

        <div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <div class="edgtf-slider-range-wrapper">
                <div class="form-inline">
                    <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
                    <input type="text"
                           class="form-control edgtf-form-element edgtf-form-element-xxsmall pull-left edgtf-slider-range-value"
                           name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>

                    <div class="edgtf-slider-range xsmall"
                         data-step="0.01" data-max="1" data-start="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"></div>
                </div>

            </div>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldRadio extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

        $checked = "";
        if ($default_value == $value)
            $checked = "checked";
        $html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'name' => true,
                'value' => true,
                'checked' => true
            ),
            'br' => true
        ));

    }

}

class GoodwishEdgeFieldRadioGroup extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        $dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
        $show = !empty($args["show"]) ? $args["show"] : array();
        $hide = !empty($args["hide"]) ? $args["hide"] : array();

        $use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
        $hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
        $hide_radios = $use_images ? 'display: none' : '';
        $checked_value = goodwish_edge_option_get_value($name);
        ?>

        <div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>

            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(is_array($options) && count($options)) { ?>
                                <div class="edgtf-radio-group-holder <?php if($use_images) echo "with-images"; ?>">
                                    <?php foreach($options as $key => $atts) {
                                        $selected = false;
                                        if($checked_value == $key) {
                                            $selected = true;
                                        }

                                        $show_val = "";
                                        $hide_val = "";
                                        if($dependence) {
                                            if(array_key_exists($key, $show)) {
                                                $show_val = $show[$key];
                                            }

                                            if(array_key_exists($key, $hide)) {
                                                $hide_val = $hide[$key];
                                            }
                                        }
                                        ?>
                                        <label class="radio-inline">
                                            <input
                                                <?php echo goodwish_edge_get_inline_attr($show_val, 'data-show'); ?>
                                                <?php echo goodwish_edge_get_inline_attr($hide_val, 'data-hide'); ?>
                                                <?php if($selected) echo "checked"; ?> <?php goodwish_edge_inline_style($hide_radios); ?>
                                                type="radio"
                                                name="<?php echo esc_attr($name);  ?>"
                                                value="<?php echo esc_attr($key); ?>"
                                                <?php if($dependence) goodwish_edge_class_attribute("dependence"); ?>> <?php if(!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

                                            <?php if($use_images) { ?>
                                                <img title="<?php if(!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
                                            <?php } ?>
                                        </label>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php
    }

}

class GoodwishEdgeFieldCheckBox extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

        $checked = "";
        if ($default_value == $value)
            $checked = "checked";
        $html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
        echo wp_kses($html, array(
            'input' => array(
                'type' => true,
                'name' => true,
                'value' => true,
                'checked' => true
            ),
            'br' => true
        ));

    }

}

class GoodwishEdgeFieldDate extends GoodwishEdgeFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];
		?>

		<div class="edgtf-page-form-section" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.edgtf-field-desc -->

			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<input type="text"
								   class="datepicker form-control edgtf-input edgtf-form-element"
								   name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"
								/></div>
					</div>
				</div>
			</div>
			<!-- close div.edgtf-section-content -->

		</div>
	<?php

	}

}


class GoodwishEdgeFieldFactory {

    public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array()) {


        switch ( strtolower( $field_type ) ) {

            case 'text':
                $field = new GoodwishEdgeFieldText();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat);
                break;

            case 'textsimple':
                $field = new GoodwishEdgeFieldTextSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'textarea':
                $field = new GoodwishEdgeFieldTextArea();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'textareasimple':
                $field = new GoodwishEdgeFieldTextAreaSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'color':
                $field = new GoodwishEdgeFieldColor();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'colorsimple':
                $field = new GoodwishEdgeFieldColorSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'image':
                $field = new GoodwishEdgeFieldImage();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'imagesimple':
                $field = new GoodwishEdgeFieldImageSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'font':
                $field = new GoodwishEdgeFieldFont();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'fontsimple':
                $field = new GoodwishEdgeFieldFontSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'select':
                $field = new GoodwishEdgeFieldSelect();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'selectblank':
                $field = new GoodwishEdgeFieldSelectBlank();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'selectsimple':
                $field = new GoodwishEdgeFieldSelectSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'selectblanksimple':
                $field = new GoodwishEdgeFieldSelectBlankSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'yesno':
                $field = new GoodwishEdgeFieldYesNo();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'yesnosimple':
                $field = new GoodwishEdgeFieldYesNoSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'onoff':
                $field = new GoodwishEdgeFieldOnOff();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'portfoliofollow':
                $field = new GoodwishEdgeFieldPortfolioFollow();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'zeroone':
                $field = new GoodwishEdgeFieldZeroOne();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'imagevideo':
                $field = new GoodwishEdgeFieldImageVideo();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'yesempty':
                $field = new GoodwishEdgeFieldYesEmpty();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'flagpost':
                $field = new GoodwishEdgeFieldFlagPost();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'flagpage':
                $field = new GoodwishEdgeFieldFlagPage();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'flagmedia':
                $field = new GoodwishEdgeFieldFlagMedia();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'flagportfolio':
                $field = new GoodwishEdgeFieldFlagPortfolio();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'flagproduct':
                $field = new GoodwishEdgeFieldFlagProduct();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'range':
                $field = new GoodwishEdgeFieldRange();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'rangesimple':
                $field = new GoodwishEdgeFieldRangeSimple();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'radio':
                $field = new GoodwishEdgeFieldRadio();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'checkbox':
                $field = new GoodwishEdgeFieldCheckBox();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;

            case 'date':
                $field = new GoodwishEdgeFieldDate();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            case 'radiogroup':
                $field = new GoodwishEdgeFieldRadioGroup();
                $field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
                break;
            default:
                break;

        }

    }

}

/*
   Class: GoodwishEdgeMultipleImages
   A class that initializes Edge Multiple Images
*/
class GoodwishEdgeMultipleImages implements iGoodwishEdgeRender {
    private $name;
    private $label;
    private $description;


    function __construct($name,$label="",$description="") {
        global $goodwish_edge_Framework;
        $this->name = $name;
        $this->label = $label;
        $this->description = $description;
        $goodwish_edge_Framework->edgtMetaBoxes->addOption($this->name,"");
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="edgtf-page-form-section">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($this->label); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="edgt-gallery-images-holder clearfix">
                                <?php
                                $image_gallery_val = get_post_meta( $post->ID, $this->name , true );
                                if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

                                if(isset($image_gallery_array) && count($image_gallery_array)!=0):

                                    foreach($image_gallery_array as $gimg_id):

                                        $gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
                                        echo '<li class="edgt-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

                                    endforeach;

                                endif;
                                ?>
                            </ul>
                            <input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $this->name) ?>" name="<?php echo esc_attr( $this->name) ?>">
                            <div class="edgtf-gallery-uploader">
                                <a class="edgtf-gallery-upload-btn btn btn-sm btn-primary"
                                   href="javascript:void(0)"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                <a class="edgtf-gallery-clear-btn btn btn-sm btn-default pull-right"
                                   href="javascript:void(0)"><?php esc_html_e('Remove All', 'goodwish'); ?></a>
                            </div>
							<?php wp_nonce_field( 'qodef_gallery_upload_get_images_' . esc_attr( $this->name ), 'qodef_gallery_upload_get_images_' . esc_attr( $this->name ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }
}

/*
   Class: GoodwishEdgeImagesVideos
   A class that initializes Edge Images Videos
*/
class GoodwishEdgeImagesVideos implements iGoodwishEdgeRender {
    private $label;
    private $description;


    function __construct($label="",$description="") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>
        <div class="edgtf_hidden_portfolio_images" style="display: none">
            <div class="edgtf-page-form-section">


                <div class="edgtf-field-desc">
                    <h4><?php echo esc_html($this->label); ?></h4>

                    <p><?php echo esc_html($this->description); ?></p>
                </div>
                <!-- close div.edgtf-field-desc -->

                <div class="edgtf-section-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-2">
                                <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish');?></em>
                                <input type="text"
                                       class="form-control edgtf-input edgtf-form-element"
                                       id="portfolioimgordernumber_x"
                                       name="portfolioimgordernumber_x"/></div>
                            <div class="col-lg-10">
                                <em class="edgtf-field-description"><?php esc_html_e('Image/Video title (only for gallery layout - Portfolio Style 6)', 'goodwish');?></em>
                                <input type="text"
                                       class="form-control edgtf-input edgtf-form-element"
                                       id="portfoliotitle_x"
                                       name="portfoliotitle_x"/></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="edgtf-field-description"><?php esc_html_e('Image', 'goodwish');?></em>
                                <div class="edgtf-media-uploader">
                                    <div style="display: none"
                                         class="edgtf-media-image-holder">
                                        <img src="" alt="<?php esc_html_e('Image5', 'goodwish'); ?>"
                                             class="edgtf-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                         class="edgtf-media-meta-fields">
                                        <input type="hidden" class="edgtf-media-upload-url"
                                               name="portfolioimg_x"
                                               id="portfolioimg_x"/>
                                        <input type="hidden"
                                               class="edgtf-media-upload-height"
                                               name="edgt_options_theme[media-upload][height]"
                                               value=""/>
                                        <input type="hidden"
                                               class="edgtf-media-upload-width"
                                               name="edgt_options_theme[media-upload][width]"
                                               value=""/>
                                    </div>
                                    <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                       href="javascript:void(0)"
                                       data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                                       data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                       class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-3">
                                <em class="edgtf-field-description"><?php esc_html_e('Video type', 'goodwish');?></em>
                                <select class="form-control edgtf-form-element edgtf-portfoliovideotype"
                                        name="portfoliovideotype_x" id="portfoliovideotype_x">
                                    <option value=""></option>
                                    <option value="youtube"><?php esc_html_e('Youtube', 'goodwish');?></option>
                                    <option value="vimeo"><?php esc_html_e('Vimeo', 'goodwish');?></option>
                                    <option value="self"><?php esc_html_e('Self hosted', 'goodwish');?></option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <em class="edgtf-field-description"><?php esc_html_e('Video ID', 'goodwish');?></em>
                                <input type="text"
                                       class="form-control edgtf-input edgtf-form-element"
                                       id="portfoliovideoid_x"
                                       name="portfoliovideoid_x"/></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <em class="edgtf-field-description"><?php esc_html_e('Video image', 'goodwish');?></em>
                                <div class="edgtf-media-uploader">
                                    <div style="display: none"
                                         class="edgtf-media-image-holder">
                                        <img src="" alt="<?php esc_html_e('Image6', 'goodwish'); ?>"
                                             class="edgtf-media-image img-thumbnail"/>
                                    </div>
                                    <div style="display: none"
                                         class="edgtf-media-meta-fields">
                                        <input type="hidden" class="edgtf-media-upload-url"
                                               name="portfoliovideoimage_x"
                                               id="portfoliovideoimage_x"/>
                                        <input type="hidden"
                                               class="edgtf-media-upload-height"
                                               name="edgt_options_theme[media-upload][height]"
                                               value=""/>
                                        <input type="hidden"
                                               class="edgtf-media-upload-width"
                                               name="edgt_options_theme[media-upload][width]"
                                               value=""/>
                                    </div>
                                    <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                       href="javascript:void(0)"
                                       data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                                       data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                    <a style="display: none;" href="javascript: void(0)"
                                       class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-4">
                                <em class="edgtf-field-description"><?php esc_html_e('Video webm', 'goodwish');?></em>
                                <input type="text"
                                       class="form-control edgtf-input edgtf-form-element"
                                       id="portfoliovideowebm_x"
                                       name="portfoliovideowebm_x"/></div>
                            <div class="col-lg-4">
                                <em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'goodwish'); ?></em>
                                <input type="text"
                                       class="form-control edgtf-input edgtf-form-element"
                                       id="portfoliovideomp4_x"
                                       name="portfoliovideomp4_x"/></div>
                            <div class="col-lg-4">
                                <em class="edgtf-field-description"><?php esc_html_e('Video ogv', 'goodwish'); ?></em>
                                <input type="text"
                                       class="form-control edgtf-input edgtf-form-element"
                                       id="portfoliovideoogv_x"
                                       name="portfoliovideoogv_x"/></div>
                        </div>
                        <div class="row next-row">
                            <div class="col-lg-12">
                                <a class="edgtf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'goodwish'); ?></a>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- close div.edgtf-section-content -->

            </div>
        </div>

        <?php
        $no = 1;
        $portfolio_images = get_post_meta( $post->ID, 'edgt_portfolio_images', true );
        if (count($portfolio_images)>1) {
            usort($portfolio_images, "goodwish_edge_compare_portfolio_videos");
        }
        while (isset($portfolio_images[$no-1])) {
            $portfolio_image = $portfolio_images[$no-1];
            ?>
            <div class="edgtf_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">

                <div class="edgtf-page-form-section">


                    <div class="edgtf-field-desc">
                        <h4><?php echo esc_html($this->label); ?></h4>

                        <p><?php echo esc_html($this->description); ?></p>
                    </div>
                    <!-- close div.edgtf-field-desc -->

                    <div class="edgtf-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <em class="edgtf-field-description"><?php esc_html_e('Upload', 'goodwish'); ?><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                    <input type="text"
                                           class="form-control edgtf-input edgtf-form-element"
                                           id="portfolioimgordernumber_<?php echo esc_attr($no); ?>"
                                           name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>"/></div>
                                <div class="col-lg-10">
                                    <em class="edgtf-field-description"><?php esc_html_e('Upload', 'goodwish'); ?><?php esc_html_e('Image/Video title (only for gallery layout - Portfolio Style 6)', 'goodwish'); ?></em>
                                    <input type="text"
                                           class="form-control edgtf-input edgtf-form-element"
                                           id="portfoliotitle_<?php echo esc_attr($no); ?>"
                                           name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>"/></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgtf-field-description"><?php esc_html_e('Image', 'goodwish'); ?></em>
                                    <div class="edgtf-media-uploader">
                                        <div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?> class="edgtf-media-image-holder">
                                            <img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(goodwish_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_html_e('Image7', 'goodwish'); ?>"
                                                 class="edgtf-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                             class="edgtf-media-meta-fields">
                                            <input type="hidden" class="edgtf-media-upload-url"
                                                   name="portfolioimg[]"
                                                   id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                   value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                            <input type="hidden"
                                                   class="edgtf-media-upload-height"
                                                   name="edgt_options_theme[media-upload][height]"
                                                   value=""/>
                                            <input type="hidden"
                                                   class="edgtf-media-upload-width"
                                                   name="edgt_options_theme[media-upload][width]"
                                                   value=""/>
                                        </div>
                                        <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                           href="javascript:void(0)"
                                           data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                                           data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                           class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Video type', 'goodwish'); ?></em>
                                    <select class="form-control edgtf-form-element edgtf-portfoliovideotype"
                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                        <option value=""></option>
                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('Youtube', 'goodwish'); ?></option>
                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo', 'goodwish'); ?></option>
                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self hosted', 'goodwish'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Video ID', 'goodwish'); ?></em>
                                    <input type="text"
                                           class="form-control edgtf-input edgtf-form-element"
                                           id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"/></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgtf-field-description"><?php esc_html_e('Video image', 'goodwish'); ?></em>
                                    <div class="edgtf-media-uploader">
                                        <div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                            class="edgtf-media-image-holder">
                                            <img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(goodwish_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_html_e('Image8', 'goodwish'); ?>"
                                                 class="edgtf-media-image img-thumbnail"/>
                                        </div>
                                        <div style="display: none"
                                             class="edgtf-media-meta-fields">
                                            <input type="hidden" class="edgtf-media-upload-url"
                                                   name="portfoliovideoimage[]"
                                                   id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                   value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                            <input type="hidden"
                                                   class="edgtf-media-upload-height"
                                                   name="edgt_options_theme[media-upload][height]"
                                                   value=""/>
                                            <input type="hidden"
                                                   class="edgtf-media-upload-width"
                                                   name="edgt_options_theme[media-upload][width]"
                                                   value=""/>
                                        </div>
                                        <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                           href="javascript:void(0)"
                                           data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                                           data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)"
                                           class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-4">
                                    <em class="edgtf-field-description"><?php esc_html_e('Video webm', 'goodwish'); ?></em>
                                    <input type="text"
                                           class="form-control edgtf-input edgtf-form-element"
                                           id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"/></div>
                                <div class="col-lg-4">
                                    <em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'goodwish'); ?></em>
                                    <input type="text"
                                           class="form-control edgtf-input edgtf-form-element"
                                           id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"/></div>
                                <div class="col-lg-4">
                                    <em class="edgtf-field-description"><?php esc_html_e('Video ogv', 'goodwish'); ?></em>
                                    <input type="text"
                                           class="form-control edgtf-input edgtf-form-element"
                                           id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                           name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])):""; ?>"/></div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <a class="edgtf_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video', 'goodwish'); ?></a>
                                </div>
                            </div>



                        </div>
                    </div>
                    <!-- close div.edgtf-section-content -->

                </div>
            </div>
            <?php
            $no++;
        }
        ?>
        <br />
        <a class="edgtf_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/" ><?php esc_html_e('Add portfolio image/video', 'goodwish'); ?></a>
        <?php

    }
}


/*
   Class: GoodwishEdgeImagesVideos
   A class that initializes Edge Images Videos
*/
class GoodwishEdgeImagesVideosFramework implements iGoodwishEdgeRender {
    private $label;
    private $description;


    function __construct($label="",$description="") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <!--Image hidden start-->
        <div class="edgtf-hidden-portfolio-images"  style="display: none">
            <div class="edgtf-portfolio-toggle-holder">
                <div class="edgtf-portfolio-toggle edgtf-toggle-desc">
                    <span class="number">1</span><span class="edgtf-toggle-inner"><?php esc_html_e('Remove', 'goodwish'); ?></em></span>
                </div>
                <div class="edgtf-portfolio-toggle edgtf-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgtf-portfolio-toggle-content">
                <div class="edgtf-page-form-section">
                    <div class="edgtf-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="edgtf-media-uploader">
                                        <em class="edgtf-field-description"><?php esc_html_e('Image', 'goodwish'); ?> </em>
                                        <div style="display: none" class="edgtf-media-image-holder">
                                            <img src="" alt="<?php esc_html_e('Image9', 'goodwish'); ?>" class="edgtf-media-image img-thumbnail">
                                        </div>
                                        <div  class="edgtf-media-meta-fields">
                                            <input type="hidden" class="edgtf-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
                                            <input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'goodwish' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x">
                                </div>
                                <div class="col-lg-8">
                                    <em class="edgtf-field-description"><?php esc_html_e('Image Title (works only for Gallery portfolio type selected)', 'goodwish'); ?> </em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
                                </div>
                            </div>
                            <input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                            <input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
                            <input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
                            <input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
                            <input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
                            <input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

                        </div><!-- close div.container-fluid -->
                    </div><!-- close div.edgtf-section-content -->
                </div>
            </div>
        </div>
        <!--Image hidden End-->

        <!--Video Hidden Start-->
        <div class="edgtf-hidden-portfolio-videos"  style="display: none">
            <div class="edgtf-portfolio-toggle-holder">
                <div class="edgtf-portfolio-toggle edgtf-toggle-desc">
                    <span class="number">2</span><span class="edgtf-toggle-inner"><?php esc_html_e('Video - (Order Number, Video Title)', 'goodwish'); ?></span>
                </div>
                <div class="edgtf-portfolio-toggle edgtf-portfolio-control">
                    <span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgtf-portfolio-toggle-content">
                <div class="edgtf-page-form-section">
                    <div class="edgtf-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="edgtf-media-uploader">
                                        <em class="edgtf-field-description"><?php esc_html_e('Cover Video Image', 'goodwish'); ?> </em>
                                        <div style="display: none" class="edgtf-media-image-holder">
                                            <img src="" alt="<?php esc_html_e('Image10', 'goodwish'); ?>" class="edgtf-media-image img-thumbnail">
                                        </div>
                                        <div style="display: none" class="edgtf-media-meta-fields">
                                            <input type="hidden" class="edgtf-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
                                            <input type="hidden" class="edgtf-media-upload-height" name="edgt_options_theme[media-upload][height]" value="">
                                            <input type="hidden" class="edgtf-media-upload-width" name="edgt_options_theme[media-upload][width]" value="">
                                        </div>
                                        <a class="edgtf-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="<?php esc_attr_e( 'Select Image', 'goodwish' ); ?>" data-frame-button-text="Select Image"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                        <a style="display: none;" href="javascript: void(0)" class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                    </div>
                                </div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" >
                                        </div>
                                        <div class="col-lg-10">
                                            <em class="edgtf-field-description"><?php esc_html_e('Video Title (works only for Gallery portfolio type selected)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliotitle_x" name="portfoliotitle_x" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Video type', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-form-element edgtf-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
                                                <option value=""></option>
                                                <option value="youtube"><?php esc_html_e('Youtube', 'goodwish'); ?></option>
                                                <option value="vimeo"><?php esc_html_e('Vimeo', 'goodwish'); ?></option>
                                                <option value="self"><?php esc_html_e('Self hosted', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-2 edgtf-video-id-holder">
                                            <em class="edgtf-field-description" id="videoId"><?php esc_html_e('Video ID', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" >
                                        </div>
                                    </div>

                                    <div class="row next-row edgtf-video-self-hosted-path-holder">
                                        <div class="col-lg-4">
                                            <em class="edgtf-field-description"><?php esc_html_e('Video webm', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" >
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" >
                                        </div>
                                        <div class="col-lg-4">
                                            <em class="edgtf-field-description"><?php esc_html_e('Video ogv', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
                            <input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
                        </div><!-- close div.container-fluid -->
                    </div><!-- close div.edgtf-section-content -->
                </div>
            </div>
        </div>
        <!--Video Hidden End-->


        <?php
        $no = 1;
        $portfolio_images = get_post_meta( $post->ID, 'edgt_portfolio_images', true );
        if ( is_array($portfolio_images) && count($portfolio_images)>1) {
            usort($portfolio_images, "goodwish_edge_compare_portfolio_videos");
        }
        while (isset($portfolio_images[$no-1])) {
            $portfolio_image = $portfolio_images[$no-1];
            if (isset($portfolio_image['portfolioimgtype']))
                $portfolio_img_type = $portfolio_image['portfolioimgtype'];
            else {
                if (stripslashes($portfolio_image['portfolioimg']) == true)
                    $portfolio_img_type = "image";
                else
                    $portfolio_img_type = "video";
            }
            if ($portfolio_img_type == "image") {
                ?>

                <div class="edgtf-portfolio-images edgtf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="edgtf-portfolio-toggle-holder">
                        <div class="edgtf-portfolio-toggle edgtf-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner"><?php esc_html_e('Image - ', 'goodwish'); ?><em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
                        </div>
                        <div class="edgtf-portfolio-toggle edgtf-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
                            <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="edgtf-portfolio-toggle-content" style="display: none">
                        <div class="edgtf-page-form-section">
                            <div class="edgtf-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="edgtf-media-uploader">
                                                <em class="edgtf-field-description"><?php esc_html_e('Image', 'goodwish'); ?> </em>
                                                <div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
                                                    class="edgtf-media-image-holder">
                                                    <img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(goodwish_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfolioimg']))); } ?>" alt="<?php esc_html_e('Image11', 'goodwish'); ?>"
                                                         class="edgtf-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="edgtf-media-meta-fields">
                                                    <input type="hidden" class="edgtf-media-upload-url"
                                                           name="portfolioimg[]"
                                                           id="portfolioimg_<?php echo esc_attr($no); ?>"
                                                           value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
                                                    <input type="hidden"
                                                           class="edgtf-media-upload-height"
                                                           name="edgt_options_theme[media-upload][height]"
                                                           value=""/>
                                                    <input type="hidden"
                                                           class="edgtf-media-upload-width"
                                                           name="edgt_options_theme[media-upload][width]"
                                                           value=""/>
                                                </div>
                                                <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                                   href="javascript:void(0)"
                                                   data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                                                   data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                   class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
                                        </div>
                                        <div class="col-lg-8">
                                            <em class="edgtf-field-description"><?php esc_html_e('Image Title (works only for Gallery portfolio type selected)', 'goodwish'); ?> </em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
                                        </div>
                                    </div>
                                    <input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
                                    <input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
                                    <input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
                                    <input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
                                    <input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
                                    <input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
                                </div><!-- close div.container-fluid -->
                            </div><!-- close div.edgtf-section-content -->
                        </div>
                    </div>
                </div>

                <?php
            } else {
                ?>
                <div class="edgtf-portfolio-videos edgtf-portfolio-media" rel="<?php echo esc_attr($no); ?>">
                    <div class="edgtf-portfolio-toggle-holder">
                        <div class="edgtf-portfolio-toggle edgtf-toggle-desc">
                            <span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner"><?php esc_html_e('Video -', 'goodwish'); ?> <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
                        </div>
                        <div class="edgtf-portfolio-toggle edgtf-portfolio-control">
                            <a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="edgtf-portfolio-toggle-content" style="display: none">
                        <div class="edgtf-page-form-section">
                            <div class="edgtf-section-content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="edgtf-media-uploader">
                                                <em class="edgtf-field-description"><?php esc_html_e('Cover Video Image', 'goodwish'); ?> </em>
                                                <div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
                                                    class="edgtf-media-image-holder">
                                                    <img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(goodwish_edge_get_attachment_thumb_url(stripslashes($portfolio_image['portfoliovideoimage']))); } ?>" alt="<?php esc_html_e('Image12', 'goodwish'); ?>"
                                                         class="edgtf-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="edgtf-media-meta-fields">
                                                    <input type="hidden" class="edgtf-media-upload-url"
                                                           name="portfoliovideoimage[]"
                                                           id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
                                                           value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
                                                    <input type="hidden"
                                                           class="edgtf-media-upload-height"
                                                           name="edgt_options_theme[media-upload][height]"
                                                           value=""/>
                                                    <input type="hidden"
                                                           class="edgtf-media-upload-width"
                                                           name="edgt_options_theme[media-upload][width]"
                                                           value=""/>
                                                </div>
                                                <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                                                   href="javascript:void(0)"
                                                   data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                                                   data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                                                <a style="display: none;" href="javascript: void(0)"
                                                   class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-10">
                                            <div class="row">
                                                <div class="col-lg-2">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" >
                                                </div>
                                                <div class="col-lg-10">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Video Title (works only for Gallery portfolio type selected)', 'goodwish'); ?> </em>
                                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" >
                                                </div>
                                            </div>
                                            <div class="row next-row">
                                                <div class="col-lg-2">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Video Type', 'goodwish'); ?></em>
                                                    <select class="form-control edgtf-form-element edgtf-portfoliovideotype"
                                                            name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
                                                        <option value=""></option>
                                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('Youtube', 'goodwish'); ?></option>
                                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo', 'goodwish'); ?></option>
                                                        <option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self hosted', 'goodwish'); ?></option>
                                                    </select>
                                                </div>
                                                <div class="col-lg-2 edgtf-video-id-holder">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Video ID', 'goodwish'); ?></em>
                                                    <input type="text"
                                                           class="form-control edgtf-input edgtf-form-element"
                                                           id="portfoliovideoid_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
                                                           />
                                                </div>
                                            </div>

                                            <div class="row next-row edgtf-video-self-hosted-path-holder">
                                                <div class="col-lg-4">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Video webm', 'goodwish'); ?></em>
                                                    <input type="text"
                                                           class="form-control edgtf-input edgtf-form-element"
                                                           id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm'])? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
                                                           /></div>
                                                <div class="col-lg-4">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Video mp4', 'goodwish'); ?></em>
                                                    <input type="text"
                                                           class="form-control edgtf-input edgtf-form-element"
                                                           id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
                                                           /></div>
                                                <div class="col-lg-4">
                                                    <em class="edgtf-field-description"><?php esc_html_e('Video ogv', 'goodwish'); ?></em>
                                                    <input type="text"
                                                           class="form-control edgtf-input edgtf-form-element"
                                                           id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
                                                           name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
                                                           /></div>
                                            </div>
                                        </div>

                                    </div>
                                    <input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
                                    <input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
                                </div><!-- close div.container-fluid -->
                            </div><!-- close div.edgtf-section-content -->
                        </div>
                    </div>
                </div>
                <?php
            }
            $no++;
        }
        ?>

        <div class="edgtf-portfolio-add">
            <a class="edgtf-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i> <?php esc_html_e('Add Image', 'goodwish'); ?></a>
            <a class="edgtf-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e('Add Video', 'goodwish'); ?> </a>

            <a class="edgtf-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('Expand All', 'goodwish'); ?></a>
            <?php /* <a class="edgtf-remove-last-row-media btn btn-sm btn-default pull-right" href="#"> Remove last row</a> */ ?>
        </div>
        <?php

    }
}