<?php


class GoodwishEdgeTwitterFramework implements  iGoodwishEdgeRender {
    public function render($factory) {
        $twitterApi = EdgefTwitterApi::getInstance();
        $message = '';

        if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
            if(!empty($_GET['oauth_token'])) {
                update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
            }

            if(!empty($_GET['oauth_verifier'])) {
                update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
            }

            $responseObj = $twitterApi->obtainAccessToken();
            if($responseObj->status) {
                $message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'goodwish');
            } else {
                $message = $responseObj->message;
            }
        }

        $buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'goodwish') : esc_html__('Connect with Twitter', 'goodwish');
        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="edgtf-page-form-section" id="edgtf_enable_social_share_twitter">

            <div class="edgtf-field-desc">
                <h4><?php esc_html_e('Connect with Twitter', 'goodwish'); ?></h4>

                <p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'goodwish'); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a id="edgtf-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
                            <input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
							<?php wp_nonce_field( 'qodef_twitter_connect_nonce', 'qodef_twitter_connect_nonce' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
    <?php }
}

class GoodwishEdgeInstagramFramework implements  iGoodwishEdgeRender {
    public function render($factory) {
        $instagram_api = EdgefInstagramApi::getInstance();
        $message = '';

        //if code wasn't saved to database
        if(!get_option('edgtf_instagram_code')) {
            //check if code parameter is set in URL. That means that user has connected with Instagram
            if(!empty($_GET['code'])) {
                //update code option so we can use it later
                $instagram_api->storeCode();
                $instagram_api->getAccessToken();
                $message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'goodwish');

            } else {
                $instagram_api->storeCodeRequestURI();
            }
        }

        $buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'goodwish') : esc_html__('Connect with Instagram', 'goodwish');

        ?>
        <?php if($message !== '') { ?>
            <div class="alert alert-success" style="margin-top: 20px;">
                <span><?php echo esc_html($message); ?></span>
            </div>
        <?php } ?>
        <div class="edgtf-page-form-section" id="edgtf_enable_social_share_instagram">

            <div class="edgtf-field-desc">
                <h4><?php esc_html_e('Connect with Instagram', 'goodwish'); ?></h4>

                <p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'goodwish'); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
    <?php }
}

/*
   Class: GoodwishEdgeImagesVideos
   A class that initializes Edge Images Videos
*/
class GoodwishEdgeOptionsFramework implements iGoodwishEdgeRender {
    private $label;
    private $description;


    function __construct($label="",$description="") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        ?>

        <div class="edgtf-portfolio-additional-item-holder" style="display: none">
            <div class="edgtf-portfolio-toggle-holder">
                <div class="edgtf-portfolio-toggle edgtf-toggle-desc">
                    <span class="number">1</span><span class="edgtf-toggle-inner"><?php esc_html_e('Additional Sidebar Item', 'goodwish'); ?><em><?php esc_html_e('(Order Number, Item Title)', 'goodwish'); ?></em></span>
                </div>
                <div class="edgtf-portfolio-toggle edgtf-portfolio-control">
                    <span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgtf-portfolio-toggle-content">
                <div class="edgtf-page-form-section">
                    <div class="edgtf-section-content">
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-lg-2">
                                    <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" >
                                </div>
                                <div class="col-lg-10">
                                    <em class="edgtf-field-description"><?php esc_html_e('Item Title', 'goodwish'); ?> </em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="optionLabel_x" name="optionLabel_x" >
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgtf-field-description"><?php esc_html_e('Item Text', 'goodwish'); ?></em>
                                    <textarea class="form-control edgtf-input edgtf-form-element" id="optionValue_x" name="optionValue_x" ></textarea>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-12">
                                    <em class="edgtf-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="optionUrl_x" name="optionUrl_x" >
                                </div>
                            </div>
                        </div><!-- close div.edgtf-section-content -->
                    </div><!-- close div.container-fluid -->
                </div>
            </div>
        </div>
        <?php
        $no = 1;
        $portfolios = get_post_meta( $post->ID, 'edgt_portfolios', true );
        if ( is_array($portfolios) && count($portfolios)>1) {
            usort($portfolios, "goodwish_edge_compare_portfolio_options");
        }
        while (isset($portfolios[$no-1])) {
            $portfolio = $portfolios[$no-1];
            ?>
            <div class="edgtf-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
                <div class="edgtf-portfolio-toggle-holder">
                    <div class="edgtf-portfolio-toggle edgtf-toggle-desc">
                        <span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner"><?php esc_html_e('Additional Sidebar Item -', 'goodwish'); ?> <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
                    </div>
                    <div class="edgtf-portfolio-toggle edgtf-portfolio-control">
                        <span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
                        <a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="edgtf-portfolio-toggle-content" style="display: none">
                    <div class="edgtf-page-form-section">
                        <div class="edgtf-section-content">
                            <div class="container-fluid">
                                <div class="row">

                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Order Number', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" >
                                    </div>
                                    <div class="col-lg-10">
                                        <em class="edgtf-field-description"><?php esc_html_e('Item Title', 'goodwish'); ?> </em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="edgtf-field-description"><?php esc_html_e('Item Text', 'goodwish'); ?></em>
                                        <textarea class="form-control edgtf-input edgtf-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" ><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="edgtf-field-description"><?php esc_html_e('Enter Full URL for Item Text Link', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" >
                                    </div>
                                </div>
                            </div><!-- close div.edgtf-section-content -->
                        </div><!-- close div.container-fluid -->
                    </div>
                </div>
            </div>
            <?php
            $no++;
        }
        ?>

        <div class="edgtf-portfolio-add">
            <a class="edgtf-add-item btn btn-sm btn-primary" href="#"> <?php esc_html_e('Add New Item', 'goodwish'); ?></a>


            <a class="edgtf-toggle-all-item btn btn-sm btn-default pull-right" href="#"> <?php esc_html_e('Expand All', 'goodwish'); ?></a>
            <?php /* <a class="edgtf-remove-last-item-row btn btn-sm btn-default pull-right" href="#"> Remove Last Row</a> */ ?>
        </div>




        <?php

    }
}


/*
   Class: GoodwishEdgeSlideElementsFramework
   A class that initializes elements for Slider
*/
class GoodwishEdgeSlideElementsFramework implements iGoodwishEdgeRender {
    private $label;
    private $description;


    function __construct($label="",$description="") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        global $post;
        global $goodwish_edge_fonts_array;
        global $goodwish_edge_IconCollections;

        $custom_positions = get_post_meta( $post->ID, 'edgtf_slide_holder_elements_alignment', true ) == 'custom';
        $default_screen_width = get_post_meta( $post->ID, 'edgtf_slide_elements_default_width', true );
        if ($default_screen_width == '') $default_screen_width = 1920;

        $screen_widths = array(
            // These values must match those in map.php (for slider), slider.php and shortcodes.js
            "mobile" => 600,
            "tabletp" => 800,
            "tabletl" => 1024,
            "laptop" => 1440
        );
        ?>

        <div class="edgtf-slide-element-additional-item-holder" style="display: none">
            <div class="edgtf-slide-element-toggle-holder">
                <div class="edgtf-slide-element-toggle edgtf-toggle-desc">
                    <span class="number">1</span><span class="edgtf-toggle-inner"> <?php esc_html_e('Slide Element', 'goodwish'); ?></span>
                </div>
                <div class="edgtf-slide-element-toggle edgtf-slide-element-control">
                    <span class="toggle-slide-element-item"><i class="fa fa-caret-up"></i></span>
                    <a href="#" class="remove-slide-element-item"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="edgtf-slide-element-toggle-content">
                <div class="edgtf-page-form-section">
                    <div class="edgtf-section-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"> <?php esc_html_e('Element Type', 'goodwish'); ?></em>
                                    <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-type-selector" id="slideelementtype_x" name="slideelementtype_x" >
                                        <option value="text"> <?php esc_html_e('Text', 'goodwish'); ?></option>
                                        <option value="image"> <?php esc_html_e('Image', 'goodwish'); ?></option>
                                        <option value="button"> <?php esc_html_e('Button', 'goodwish'); ?></option>
                                        <option value="section-link"> <?php esc_html_e('Anchor Link', 'goodwish'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-9">
                                    <em class="edgtf-field-description"> <?php esc_html_e('Element Name (For Your Own Reference)', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementname_x" name="slideelementname_x" >
                                </div>
                            </div>
                            <div class="row next-row edgtf-slide-element-type-fields edgtf-setf-section-link" style="display: none">
                                <div class="col-lg-12">
                                    <em class="edgtf-field-description"><?php esc_html_e('Anchor Link is always rendered at the bottom of the slide, centrally aligned.', 'goodwish'); ?></em>
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Element Visible?', 'goodwish'); ?></em>
                                    <select class="form-control edgtf-input edgtf-form-element" id="slideelementvisible_x" name="slideelementvisible_x" >
                                        <option value="yes"><?php esc_html_e('Yes', 'goodwish'); ?></option>
                                        <option value="no"><?php esc_html_e('No', 'goodwish'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                    <em class="edgtf-field-description"><?php esc_html_e('Text', 'goodwish'); ?><?php esc_html_e('Pivot Point', 'goodwish'); ?></em>
                                    <select class="form-control edgtf-input edgtf-form-element" id="slideelementpivot_x" name="slideelementpivot_x" >
                                        <option value="top-left"><?php esc_html_e('Top - Left', 'goodwish'); ?></option>
                                        <option value="top-center"><?php esc_html_e('Top - Center', 'goodwish'); ?></option>
                                        <option value="top-right"><?php esc_html_e('Top - Right', 'goodwish'); ?></option>
                                        <option value="middle-left"><?php esc_html_e('Middle - Left', 'goodwish'); ?></option>
                                        <option value="middle-center"><?php esc_html_e('Middle - Center', 'goodwish'); ?></option>
                                        <option value="middle-right"><?php esc_html_e('Middle - Right', 'goodwish'); ?></option>
                                        <option value="bottom-left"><?php esc_html_e('Bottom - Left', 'goodwish'); ?></option>
                                        <option value="bottom-center"><?php esc_html_e('Bottom - Center', 'goodwish'); ?></option>
                                        <option value="bottom-right"><?php esc_html_e('Bottom - Right', 'goodwish'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                    <em class="edgtf-field-description"><?php esc_html_e('Order', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementzindex_x" name="slideelementzindex_x" value="" >
                                </div>
                            </div>
                            <div class="row next-row edgtf-slide-element-all-but-custom"<?php if ($custom_positions) { ?> style="display:none"<?php } ?>>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Margin - Top (px)', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmargintop_x" name="slideelementmargintop_x" >
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Margin - Bottom (px)', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmarginbottom_x" name="slideelementmarginbottom_x" >
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Margin - Left (px)', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmarginleft_x" name="slideelementmarginleft_x" >
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Margin - Right (px)', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmarginright_x" name="slideelementmarginright_x" >
                                </div>
                            </div>

                            <div class="edgtf-slide-element-type-fields edgtf-setf-text">
                                <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative width (F/C*100 or blank for auto width)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextwidth_x" name="slideelementtextwidth_x" value="" >
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative height (G/D*100 or blank for auto height)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextheight_x" name="slideelementtextheight_x" value="" >
                                    </div>
                                </div>
                                <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextleft_x" name="slideelementtextleft_x" value="" >
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtexttop_x" name="slideelementtexttop_x" value="" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Item Text', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtext_x" name="slideelementtext_x" value="" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Link', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextlink_x" name="slideelementtextlink_x" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementtexttarget_x" name="slideelementtexttarget_x" >
                                            <option value="_self"><?php esc_html_e('Self', 'goodwish'); ?></option>
                                            <option value="_blank"><?php esc_html_e('Blank', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Hover Color for Link', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementtextlinkhovercolor_x" name="slideelementtextlinkhovercolor_x" class="my-color-field"/>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Text Style', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementtextstyle_x" name="slideelementtextstyle_x" >
                                            <option value="small"><?php esc_html_e('Small Text', 'goodwish'); ?></option>
                                            <option value="normal" selected><?php esc_html_e('Normal Text', 'goodwish'); ?></option>
                                            <option value="large"><?php esc_html_e('Large Text', 'goodwish'); ?></option>
                                            <option value="extra-large"><?php esc_html_e('Extra Large Text', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Text Style Options', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-options-selector-text" id="slideelementtextoptions_x" name="slideelementtextoptions_x" >
                                            <option value="simple"><?php esc_html_e('Simple', 'goodwish'); ?></option>
                                            <option value="advanced"><?php esc_html_e('Advanced', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="edgtf-slide-elements-advanced-text-options" style="display: none">
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementfontcolor_x" name="slideelementfontcolor_x" value="" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Size (px)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementfontsize_x" name="slideelementfontsize_x" value="" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Line Height (px)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementlineheight_x" name="slideelementlineheight_x" value="" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Letter Spacing (px)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementletterspacing_x" name="slideelementletterspacing_x" value="" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Family', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element"
                                                    id="slideelementfontfamily_x"
                                                    name="slideelementfontfamily_x"
                                                    >
                                                <option value="-1"><?php esc_html_e('Default', 'goodwish'); ?></option>
                                                <?php foreach($goodwish_edge_fonts_array as $fontArray) { ?>
                                                    <option value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Style', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementfontstyle_x" name="slideelementfontstyle_x" >
                                                <option value=""></option>
                                                <option value="normal"><?php esc_html_e('normal', 'goodwish'); ?></option>
                                                <option value="italic"><?php esc_html_e('italic', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Weight', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementfontweight_x" name="slideelementfontweight_x" >
                                                <option value=""></option>
                                                <?php for ($i=1; $i<=9; $i++) { ?>
                                                    <option value="<?php echo esc_attr($i*100); ?>"><?php echo esc_html($i*100); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Text Transform', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementtexttransform_x" name="slideelementtexttransform_x" >
                                                <option value=""></option>
                                                <option value="none"><?php esc_html_e('None', 'goodwish'); ?></option>
                                                <option value="capitalize"><?php esc_html_e('Capitalize', 'goodwish'); ?></option>
                                                <option value="uppercase"><?php esc_html_e('Uppercase', 'goodwish'); ?></option>
                                                <option value="lowercase"><?php esc_html_e('Lowercase', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Background Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementtextbgndcolor_x; ?>" name="slideelementtextbgndcolor_x" value="" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Background Transparency (0-1)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextbgndtransparency_x; ?>" name="slideelementtextbgndtransparency_x" value="" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Thickness (px)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextborderthickness_x" name="slideelementtextborderthickness_x" value="" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Style', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementtextborderstyle_x" name="slideelementtextborderstyle_x" >
                                                <option value=""></option>
                                                <option value="solid"><?php esc_html_e('solid', 'goodwish'); ?></option>
                                                <option value="dashed"><?php esc_html_e('dashed', 'goodwish'); ?></option>
                                                <option value="dotted"><?php esc_html_e('dotted', 'goodwish'); ?></option>
                                                <option value="double"><?php esc_html_e('double', 'goodwish'); ?></option>
                                                <option value="groove"><?php esc_html_e('groove', 'goodwish'); ?></option>
                                                <option value="ridge"><?php esc_html_e('ridge', 'goodwish'); ?></option>
                                                <option value="inset"><?php esc_html_e('inset', 'goodwish'); ?></option>
                                                <option value="outset"><?php esc_html_e('outset', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementtextbordercolor_x" name="slideelementtextbordercolor_x" value="" class="my-color-field"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="edgtf-slide-element-type-fields edgtf-setf-image" style="display: none">
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="edgtf-field-description"><?php esc_html_e('Image', 'goodwish'); ?></em>
                                        <div class="edgtf-media-uploader">
                                            <div style="display: none"
                                                 class="edgtf-media-image-holder">
                                                <img src="" alt="<?php esc_html_e('Image13', 'goodwish'); ?>"
                                                     class="edgtf-media-image img-thumbnail"/>
                                            </div>
                                            <div style="display: none"
                                                 class="form-control edgtf-input edgtf-form-element edgtf-media-meta-fields">
                                                <input type="hidden" class="edgtf-media-upload-url"
                                                       id="slideelementimageurl_x"
                                                       name="slideelementimageurl_x"
                                                       value=""/>
                                                <input type="hidden" class="edgtf-media-upload-height"
                                                       name="slideelementimageuploadheight_x"
                                                       value=""/>
                                                <input type="hidden"
                                                       class="edgtf-media-upload-width"
                                                       name="slideelementimageuploadwidth_x"
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
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative width (F/C*100 or blank for auto width)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimagewidth_x" name="slideelementimagewidth_x" value="" >
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative height (G/D*100 or blank for auto height)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimageheight_x" name="slideelementimageheight_x" value="" >
                                    </div>
                                </div>
                                <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimageleft_x" name="slideelementimageleft_x" value="" >
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimagetop_x" name="slideelementimagetop_x" value="" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Link', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimagelink_x" name="slideelementimagelink_x" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementimagetarget_x" name="slideelementimagetarget_x" >
                                            <option value="_self"><?php esc_html_e('Self', 'goodwish'); ?></option>
                                            <option value="_blank"><?php esc_html_e('Blank', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Border Thickness (px)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimageborderthickness_x" name="slideelementimageborderthickness_x" value="" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Border Style', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementimageborderstyle_x" name="slideelementimageborderstyle_x" >
                                            <option value=""></option>
                                            <option value="solid"><?php esc_html_e('solid', 'goodwish'); ?></option>
                                            <option value="dashed"><?php esc_html_e('dashed', 'goodwish'); ?></option>
                                            <option value="dotted"><?php esc_html_e('dotted', 'goodwish'); ?></option>
                                            <option value="double"><?php esc_html_e('double', 'goodwish'); ?></option>
                                            <option value="groove"><?php esc_html_e('groove', 'goodwish'); ?></option>
                                            <option value="ridge"><?php esc_html_e('ridge', 'goodwish'); ?></option>
                                            <option value="inset"><?php esc_html_e('inset', 'goodwish'); ?></option>
                                            <option value="outset"><?php esc_html_e('outset', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Border Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementimagebordercolor_x" name="slideelementimagebordercolor_x" value="" class="my-color-field"/>
                                    </div>
                                </div>
                            </div>

                            <div class="edgtf-slide-element-type-fields edgtf-setf-button" style="display: none">
                                <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonleft_x" name="slideelementbuttonleft_x" >
                                    </div>
                                    <div class="col-lg-6">
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontop_x" name="slideelementbuttontop_x" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Button Text', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontext_x" name="slideelementbuttontext_x" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Link', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonlink_x" name="slideelementbuttonlink_x" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontarget_x" name="slideelementbuttontarget_x" >
                                            <option value="_self"><?php esc_html_e('Self', 'goodwish'); ?></option>
                                            <option value="_blank"><?php esc_html_e('Blank', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Button Size', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonsize_x" name="slideelementbuttonsize_x" >
                                            <option value="" ><?php esc_html_e('Default', 'goodwish'); ?></option>
                                            <option value="small"><?php esc_html_e('Small', 'goodwish'); ?></option>
                                            <option value="medium"><?php esc_html_e('Medium', 'goodwish'); ?></option>
                                            <option value="large"><?php esc_html_e('Large', 'goodwish'); ?></option>
                                            <option value="huge"><?php esc_html_e('Extra Large', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Button Type', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontype_x" name="slideelementbuttontype_x" >
                                            <option value="" ><?php esc_html_e('Default', 'goodwish'); ?></option>
                                            <option value="outline"><?php esc_html_e('Outline', 'goodwish'); ?></option>
                                            <option value="solid"><?php esc_html_e('Solid', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-all-but-custom"<?php if ($custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Keep in Line with Other Buttons?', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttoninline_x" name="slideelementbuttoninline_x" >
                                            <option value="no"><?php esc_html_e('No', 'goodwish'); ?></option>
                                            <option value="yes"><?php esc_html_e('Yes', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Font Size (px)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonfontsize_x" name="slideelementbuttonfontsize_x" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Font Weight (px)', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonfontweight_x" name="slideelementbuttonfontweight_x" >
                                            <option value=""></option>
                                            <?php for ($i=1; $i<=9; $i++) { ?>
                                                <option value="<?php echo esc_attr($i*100); ?>"><?php echo esc_html($i*100); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Font Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementbuttonfontcolor_x" name="slideelementbuttonfontcolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Font Hover Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementbuttonfonthovercolor_x" name="slideelementbuttonfonthovercolor_x" class="my-color-field"/>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Background Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementbuttonbgndcolor_x" name="slideelementbuttonbgndcolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Background Hover Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementbuttonbgndhovercolor_x" name="slideelementbuttonbgndhovercolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Border Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementbuttonbordercolor_x" name="slideelementbuttonbordercolor_x" class="my-color-field"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Border Hover Color', 'goodwish'); ?></em>
                                        <input type="text" id="slideelementbuttonborderhovercolor_x" name="slideelementbuttonborderhovercolor_x" class="my-color-field"/>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Icon Pack', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-button-icon-pack"
                                                id="slideelementbuttoniconpack_x"
                                                name="slideelementbuttoniconpack_x"
                                                >
                                            <?php
                                            $icon_packs = $goodwish_edge_IconCollections->getIconCollectionsEmpty("no_icon");
                                            foreach ($icon_packs as $key=>$value) { ?>
                                                <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                    foreach ($goodwish_edge_IconCollections->iconCollections as $collection_key => $collection_object) {
                                        $icons_array = $collection_object->getIconsArray();
                                        ?>
                                        <div class="col-lg-3 edgtf-slide-element-button-icon-collection <?php echo esc_attr($collection_key); ?>" style="display: none">
                                            <em class="edgtf-field-description"><?php esc_html_e('Button Icon', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element"
                                                    id="slideelementbuttonicon_<?php echo esc_attr($collection_key); ?>_x"
                                                    name="slideelementbuttonicon_<?php echo esc_attr($collection_key); ?>_x"
                                                    >
                                                <?php
                                                foreach ($icons_array as $key=>$value) { ?>
                                                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>

                            <div class="edgtf-slide-element-type-fields edgtf-setf-section-link" style="display: none">
                                <!--
								<div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
									<div class="col-lg-6">
										<em class="edgtf-field-description">Relative position - Left (X/C*100)</em>
										<input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinkleft_x" name="slideelementsectionlinkleft_x" >
									</div>
									<div class="col-lg-6">
										<em class="edgtf-field-description">Relative position - Top (Y/D*100)</em>
										<input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinktop_x" name="slideelementsectionlinktop_x" >
									</div>
								</div>
								-->
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Target Section Anchor (i.e. "#products")', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinkanchor_x" name="slideelementsectionlinkanchor_x" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Anchor Link Text (i.e. "Scroll Down")', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinktext_x" name="slideelementsectionlinktext_x" >
                                    </div>
                                </div>
                            </div>

                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Animation', 'goodwish'); ?></em>
                                    <select class="form-control edgtf-input edgtf-form-element" id="slideelementanimation_x" name="slideelementanimation_x" >
                                        <option value="default"><?php esc_html_e('Default', 'goodwish'); ?></option>
                                        <option value="none"><?php esc_html_e('No Animation', 'goodwish'); ?></option>
                                        <option value="flip"><?php esc_html_e('Flip', 'goodwish'); ?></option>
                                        <option value="spin"><?php esc_html_e('Spin', 'goodwish'); ?></option>
                                        <option value="fade"><?php esc_html_e('Fade In', 'goodwish'); ?></option>
                                        <option value="from_bottom"><?php esc_html_e('Fly In From Bottom', 'goodwish'); ?></option>
                                        <option value="from_top"><?php esc_html_e('Fly In From Top', 'goodwish'); ?></option>
                                        <option value="from_left"><?php esc_html_e('Fly In From Left', 'goodwish'); ?></option>
                                        <option value="from_right"><?php esc_html_e('Fly In From Right', 'goodwish'); ?></option>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Animation Delay (i.e. "0.5s" or "400ms")', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementanimationdelay_x" name="slideelementanimationdelay_x" >
                                </div>
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Animation Duration (i.e. "0.5s" or "400ms")', 'goodwish'); ?></em>
                                    <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementanimationduration_x" name="slideelementanimationduration_x" >
                                </div>
                            </div>
                            <div class="row next-row">
                                <div class="col-lg-3">
                                    <em class="edgtf-field-description"><?php esc_html_e('Element Responsiveness', 'goodwish'); ?></em>
                                    <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-responsiveness-selector" id="slideelementresponsive_x" name="slideelementresponsive_x" >
                                        <option value="proportional"><?php esc_html_e('Preserve proportions', 'goodwish'); ?></option>
                                        <option value="stages"><?php esc_html_e('Scale based on stage coefficients', 'goodwish'); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="edgtf-slide-responsive-scale-factors" style="display:none">
                                <div class="row next-row">
                                    <div class="col-lg-12">
                                        <em class="edgtf-field-description"><?php esc_html_e('Enter below the scale factors for each responsive stage, relative to the values above (or to the original size for images).', 'goodwish'); ?><br/><?php esc_html_e('Scale factor of 1 leaves the element at the same size as for the default screen width of', 'goodwish'); ?> <span class="edgtf-slide-dynamic-def-width"><?php echo esc_html($default_screen_width); ?></span><?php esc_html_e('px, while setting it to zero hides the element.', 'goodwish'); ?><div class="edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>><?php esc_html_e('If you also wish to change the position of the element for a certain stage, enter the desired position in the corresponding fields.', 'goodwish'); ?></div></em>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Mobile', 'goodwish'); ?><br>(<?php esc_html_e('up to', 'goodwish'); ?> <?php echo esc_html($screen_widths["mobile"]); ?>px)</em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscalemobile_x" name="slideelementscalemobile_x" placeholder="0.5">
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementleftmobile_x" name="slideelementleftmobile_x" >
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtopmobile_x" name="slideelementtopmobile_x" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Tablet (Portrait)', 'goodwish'); ?><br>(<?php echo esc_html($screen_widths["mobile"]+1); ?>px - <?php echo esc_html($screen_widths["tabletp"]); ?>px)</em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscaletabletp_x" name="slideelementscaletabletp_x" placeholder="0.6">
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementlefttabletp_x" name="slideelementlefttabletp_x" >
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtoptabletp_x" name="slideelementtoptabletp_x" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Tablet (Landscape)', 'goodwish'); ?><br>(<?php echo esc_html($screen_widths["tabletp"]+1); ?>px - <?php echo esc_html($screen_widths["tabletl"]); ?>px)</em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscaletabletl_x" name="slideelementscaletabletl_x" placeholder="0.7">
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementlefttabletl_x" name="slideelementlefttabletl_x" >
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtoptabletl_x" name="slideelementtoptabletl_x" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Laptop', 'goodwish'); ?><br>(<?php echo esc_html($screen_widths["tabletl"]+1); ?>px - <?php echo esc_html($screen_widths["laptop"]); ?>px)</em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscalelaptop_x" name="slideelementscalelaptop_x" placeholder="0.8">
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementleftlaptop_x" name="slideelementleftlaptop_x" >
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtoplaptop_x" name="slideelementtoplaptop_x" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Desktop', 'goodwish'); ?><br>(<?php esc_html_e('above', 'goodwish'); ?> <?php echo esc_html($screen_widths["laptop"]); ?>px)</em>
                                    </div>
                                    <div class="col-lg-2">
                                        <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscaledesktop_x" name="slideelementscaledesktop_x" placeholder="1">
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementleftdesktop_x" name="slideelementleftdesktop_x" >
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtopdesktop_x" name="slideelementtopdesktop_x" >
                                    </div>
                                </div>
                            </div>
                        </div><!-- close div.edgtf-section-content -->
                    </div><!-- close div.container-fluid -->
                </div>
            </div>
        </div>
        <?php
        $no = 1;
        $slide_elements = get_post_meta( $post->ID, 'edgt_slide_elements', true );
        if (count($slide_elements)>1) {
            //usort($slide_elements, "goodwish_edge_compare_portfolio_options");
        }
        while (isset($slide_elements[$no-1])) {
            $slide_element = $slide_elements[$no-1];
            ?>
            <div class="edgtf-slide-element-additional-item" rel="<?php echo esc_attr($no); ?>">
                <div class="edgtf-slide-element-toggle-holder">
                    <div class="edgtf-slide-element-toggle edgtf-toggle-desc">
                        <span class="number"><?php echo esc_html($no); ?></span><span class="edgtf-toggle-inner"><?php esc_html_e('Slide Element -', 'goodwish'); ?> <em><?php echo esc_html(stripslashes($slide_element['slideelementname'])); ?></em></span>
                    </div>
                    <div class="edgtf-slide-element-toggle edgtf-slide-element-control">
                        <span class="toggle-slide-element-item"><i class="fa fa-caret-down"></i></span>
                        <a href="#" class="remove-slide-element-item"><i class="fa fa-times"></i></a>
                    </div>
                </div>
                <div class="edgtf-slide-element-toggle-content" style="display: none">
                    <div class="edgtf-page-form-section">
                        <div class="edgtf-section-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Element Type', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-type-selector" id="slideelementtype_<?php echo esc_attr($no); ?>" name="slideelementtype[]" >
                                            <option value="text" <?php echo esc_attr($slide_element['slideelementtype']) == "text" ? "selected" : ""; ?>><?php esc_html_e('Text', 'goodwish'); ?></option>
                                            <option value="image" <?php echo esc_attr($slide_element['slideelementtype']) == "image" ? "selected" : ""; ?>><?php esc_html_e('Image', 'goodwish'); ?></option>
                                            <option value="button" <?php echo esc_attr($slide_element['slideelementtype']) == "button" ? "selected" : ""; ?>><?php esc_html_e('Button', 'goodwish'); ?></option>
                                            <option value="section-link" <?php echo esc_attr($slide_element['slideelementtype']) == "section-link" ? "selected" : ""; ?>><?php esc_html_e('Anchor Link', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-9">
                                        <em class="edgtf-field-description"><?php esc_html_e('Element Name (For Your Own Reference)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementname_<?php esc_attr($no); ?>" name="slideelementname[]" value="<?php echo esc_attr($slide_element['slideelementname']); ?>" >
                                    </div>
                                </div>
                                <div class="row next-row edgtf-slide-element-type-fields edgtf-setf-section-link"<?php if ($slide_element['slideelementtype'] != "section-link") { ?> style="display: none"<?php } ?>>
                                    <div class="col-lg-12">
                                        <em class="edgtf-field-description"><?php esc_html_e('Anchor Link is always rendered at the bottom of the slide, centrally aligned.', 'goodwish'); ?></em>
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Element Visible?', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementvisible_<?php echo esc_attr($no); ?>" name="slideelementvisible[]" >
                                            <option value="yes" <?php if (isset($slide_element['slideelementvisible'])) {echo esc_attr($slide_element['slideelementvisible']) == "yes" ? "selected" : "";}  ?>><?php esc_html_e('Yes', 'goodwish'); ?></option>
                                            <option value="no" <?php if (isset($slide_element['slideelementvisible'])) {echo esc_attr($slide_element['slideelementvisible']) == "no" ? "selected" : "";}  ?>><?php esc_html_e('No', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Desktop', 'goodwish'); ?>Pivot Point</em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementpivot_<?php echo esc_attr($no); ?>" name="slideelementpivot[]" >
                                            <option value="top-left" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "top-left" ? "selected" : "";}  ?>><?php esc_html_e('Top - Left', 'goodwish'); ?></option>
                                            <option value="top-center" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "top-center" ? "selected" : "";}  ?>><?php esc_html_e('Top - Center', 'goodwish'); ?></option>
                                            <option value="top-right" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "top-right" ? "selected" : "";}  ?>><?php esc_html_e('Top - Right', 'goodwish'); ?></option>
                                            <option value="middle-left" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "middle-left" ? "selected" : "";}  ?>><?php esc_html_e('Middle - Left', 'goodwish'); ?></option>
                                            <option value="middle-center" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "middle-center" ? "selected" : "";}  ?>><?php esc_html_e('Middle - Center', 'goodwish'); ?></option>
                                            <option value="middle-right" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "middle-right" ? "selected" : "";}  ?>><?php esc_html_e('Middle - Right', 'goodwish'); ?></option>
                                            <option value="bottom-left" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "bottom-left" ? "selected" : "";}  ?>><?php esc_html_e('Bottom - Left', 'goodwish'); ?></option>
                                            <option value="bottom-center" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "bottom-center" ? "selected" : "";}  ?>><?php esc_html_e('Bottom - Center', 'goodwish'); ?></option>
                                            <option value="bottom-right" <?php if (isset($slide_element['slideelementpivot'])) {echo esc_attr($slide_element['slideelementpivot']) == "bottom-right" ? "selected" : "";}  ?>><?php esc_html_e('Bottom - Right', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <em class="edgtf-field-description"><?php esc_html_e('Order', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementzindex_<?php esc_attr($no); ?>" name="slideelementzindex[]" value="<?php echo isset($slide_element['slideelementzindex']) ? esc_attr($slide_element['slideelementzindex']) : ''; ?>" >
                                    </div>
                                </div>
                                <div class="row next-row edgtf-slide-element-all-but-custom"<?php if ($custom_positions) { ?> style="display:none"<?php } ?>>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Margin - Top (px)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmargintop_<?php esc_attr($no); ?>" name="slideelementmargintop[]" value="<?php echo isset($slide_element['slideelementmargintop']) ? esc_attr($slide_element['slideelementmargintop']) : ''; ?>" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Margin - Bottom (px)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmarginbottom_<?php esc_attr($no); ?>" name="slideelementmarginbottom[]" value="<?php echo isset($slide_element['slideelementmarginbottom']) ? esc_attr($slide_element['slideelementmarginbottom']) : ''; ?>" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Margin - Left (px)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmarginleft_<?php esc_attr($no); ?>" name="slideelementmarginleft[]" value="<?php echo isset($slide_element['slideelementmarginleft']) ? esc_attr($slide_element['slideelementmarginleft']) : ''; ?>" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Margin - Right (px)', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementmarginright_<?php esc_attr($no); ?>" name="slideelementmarginright[]" value="<?php echo isset($slide_element['slideelementmarginright']) ? esc_attr($slide_element['slideelementmarginright']) : ''; ?>" >
                                    </div>
                                </div>

                                <div class="edgtf-slide-element-type-fields edgtf-setf-text"<?php if ($slide_element['slideelementtype'] != "text") { ?> style="display: none"<?php } ?>>
                                    <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative width (F/C*100 or blank for auto width)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextwidth_<?php esc_attr($no); ?>" name="slideelementtextwidth[]" value="<?php echo isset($slide_element['slideelementtextwidth']) ? esc_attr($slide_element['slideelementtextwidth']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative height (G/D*100 or blank for auto height)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextheight_<?php esc_attr($no); ?>" name="slideelementtextheight[]" value="<?php echo isset($slide_element['slideelementtextheight']) ? esc_attr($slide_element['slideelementtextheight']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextleft_<?php esc_attr($no); ?>" name="slideelementtextleft[]" value="<?php echo isset($slide_element['slideelementtextleft']) ? esc_attr($slide_element['slideelementtextleft']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtexttop_<?php esc_attr($no); ?>" name="slideelementtexttop[]" value="<?php echo isset($slide_element['slideelementtexttop']) ? esc_attr($slide_element['slideelementtexttop']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Item Text', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtext_<?php esc_attr($no); ?>" name="slideelementtext[]" value="<?php echo esc_attr($slide_element['slideelementtext']); ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Link', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextlink_<?php echo esc_attr($no); ?>" name="slideelementtextlink[]" value="<?php echo isset($slide_element['slideelementtextlink']) ? esc_attr($slide_element['slideelementtextlink']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementtexttarget_<?php echo esc_attr($no); ?>" name="slideelementtexttarget[]" >
                                                <option value="_self" <?php if (isset($slide_element['slideelementtexttarget'])) {echo esc_attr($slide_element['slideelementtexttarget']) == "_self" ? "selected" : "";} ?>><?php esc_html_e('Self', 'goodwish'); ?></option>
                                                <option value="_blank" <?php if (isset($slide_element['slideelementtexttarget'])) {echo esc_attr($slide_element['slideelementtexttarget']) == "_blank" ? "selected" : "";} ?>><?php esc_html_e('Blank', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Color for Link', 'goodwish'); ?> </em>
                                            <input type="text" id="slideelementtextlinkhovercolor_<?php esc_attr($no); ?>" name="slideelementtextlinkhovercolor[]" value="<?php echo isset($slide_element['slideelementtextlinkhovercolor']) ? esc_attr($slide_element['slideelementtextlinkhovercolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Text Style', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementtextstyle_<?php echo esc_attr($no); ?>" name="slideelementtextstyle[]" >
                                                <option value="small" <?php if (isset($slide_element['slideelementtextstyle'])) {echo esc_attr($slide_element['slideelementtextstyle']) == "small" ? "selected" : "";} ?>><?php esc_html_e('Small Text', 'goodwish'); ?></option>
                                                <option value="normal" <?php if (isset($slide_element['slideelementtextstyle'])) {echo esc_attr($slide_element['slideelementtextstyle']) == "normal" ? "selected" : "";} ?>><?php esc_html_e('Normal Text', 'goodwish'); ?></option>
                                                <option value="large" <?php if (isset($slide_element['slideelementtextstyle'])) {echo esc_attr($slide_element['slideelementtextstyle']) == "large" ? "selected" : "";}  ?>><?php esc_html_e('Large Text', 'goodwish'); ?></option>
                                                <option value="extra-large" <?php if (isset($slide_element['slideelementtextstyle'])) {echo esc_attr($slide_element['slideelementtextstyle']) == "extra-large" ? "selected" : "";} ?>><?php esc_html_e('Extra Large Text', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Text Style Options', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-options-selector edgtf-slide-element-options-selector-text" id="slideelementtextoptions_<?php echo esc_attr($no); ?>" name="slideelementtextoptions[]" >
                                                <option value="simple" <?php if (isset($slide_element['slideelementtextoptions'])) {echo esc_attr($slide_element['slideelementtextoptions']) == "simple" ? "selected" : "";}  ?>><?php esc_html_e('Simple', 'goodwish'); ?></option>
                                                <option value="advanced" <?php if (isset($slide_element['slideelementtextoptions'])) {echo esc_attr($slide_element['slideelementtextoptions']) == "advanced" ? "selected" : "";}  ?>><?php esc_html_e('Advanced', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="edgtf-slide-elements-advanced-text-options"<?php if (isset($slide_element['slideelementtextoptions']) && $slide_element['slideelementtextoptions'] != "advanced") { ?> style="display: none"<?php } ?>>
                                        <div class="row next-row">
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?><?php esc_html_e('Font Color', 'goodwish'); ?></em>
                                                <input type="text" id="slideelementfontcolor_<?php esc_attr($no); ?>" name="slideelementfontcolor[]" value="<?php echo esc_attr($slide_element['slideelementfontcolor']); ?>" class="my-color-field"/>
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Font Size (px)', 'goodwish'); ?></em>
                                                <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementfontsize_<?php esc_attr($no); ?>" name="slideelementfontsize[]" value="<?php echo esc_attr($slide_element['slideelementfontsize']); ?>" >
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Line Height (px)', 'goodwish'); ?></em>
                                                <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementlineheight_<?php esc_attr($no); ?>" name="slideelementlineheight[]" value="<?php echo esc_attr($slide_element['slideelementlineheight']); ?>" >
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Letter Spacing (px)', 'goodwish'); ?></em>
                                                <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementletterspacing_<?php esc_attr($no); ?>" name="slideelementletterspacing[]" value="<?php echo esc_attr($slide_element['slideelementletterspacing']); ?>" >
                                            </div>
                                        </div>
                                        <div class="row next-row">
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Font Family', 'goodwish'); ?></em>
                                                <select class="form-control edgtf-input edgtf-form-element"
                                                        id="slideelementfontfamily_<?php echo esc_attr($no); ?>"
                                                        name="slideelementfontfamily[]"
                                                        >
                                                    <option value="-1"><?php esc_html_e('Default', 'goodwish'); ?></option>
                                                    <?php foreach($goodwish_edge_fonts_array as $fontArray) { ?>
                                                        <option <?php if (isset($slide_element['slideelementfontfamily']) && $slide_element['slideelementfontfamily'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Font Style', 'goodwish'); ?></em>
                                                <select class="form-control edgtf-input edgtf-form-element" id="slideelementfontstyle_<?php echo esc_attr($no); ?>" name="slideelementfontstyle[]" >
                                                    <option value="" <?php if (isset($slide_element['slideelementfontstyle'])) {echo esc_attr($slide_element['slideelementfontstyle']) == "" ? "selected" : "";} ?>></option>
                                                    <option value="normal" <?php if (isset($slide_element['slideelementfontstyle'])) {echo esc_attr($slide_element['slideelementfontstyle']) == "normal" ? "selected" : "";}  ?>><?php esc_html_e('normal', 'goodwish'); ?></option>
                                                    <option value="italic" <?php if (isset($slide_element['slideelementfontstyle'])) {echo esc_attr($slide_element['slideelementfontstyle']) == "italic" ? "selected" : "";} ?>><?php esc_html_e('italic', 'goodwish'); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Font Weight', 'goodwish'); ?></em>
                                                <select class="form-control edgtf-input edgtf-form-element" id="slideelementfontweight_<?php echo esc_attr($no); ?>" name="slideelementfontweight[]" >
                                                    <option value="" <?php if (isset($slide_element['slideelementfontweight'])) {echo esc_attr($slide_element['slideelementfontweight']) == "" ? "selected" : "";} ?>></option>
                                                    <?php for ($i=1; $i<=9; $i++) { ?>
                                                        <option value="<?php echo esc_attr($i*100); ?>" <?php if (isset($slide_element['slideelementfontweight'])) {echo (int)$slide_element['slideelementfontweight'] == $i*100 ? "selected" : "";} ?>><?php echo esc_html($i*100); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Text Transform', 'goodwish'); ?></em>
                                                <select class="form-control edgtf-input edgtf-form-element" id="slideelementtexttransform_<?php echo esc_attr($no); ?>" name="slideelementtexttransform[]" >
                                                    <option value="" <?php if (isset($slide_element['slideelementtexttransform'])) {echo esc_attr($slide_element['slideelementtexttransform']) == "" ? "selected" : "";} ?>></option>
                                                    <option value="none" <?php if (isset($slide_element['slideelementtexttransform'])) {echo esc_attr($slide_element['slideelementtexttransform']) == "none" ? "selected" : "";}  ?>><?php esc_html_e('None', 'goodwish'); ?></option>
                                                    <option value="capitalize" <?php if (isset($slide_element['slideelementtexttransform'])) {echo esc_attr($slide_element['slideelementtexttransform']) == "capitalize" ? "selected" : "";}  ?>><?php esc_html_e('Capitalize', 'goodwish'); ?></option>
                                                    <option value="uppercase" <?php if (isset($slide_element['slideelementtexttransform'])) {echo esc_attr($slide_element['slideelementtexttransform']) == "uppercase" ? "selected" : "";} ?>><?php esc_html_e('Uppercase', 'goodwish'); ?></option>
                                                    <option value="lowercase" <?php if (isset($slide_element['slideelementtexttransform'])) {echo esc_attr($slide_element['slideelementtexttransform']) == "lowercase" ? "selected" : "";} ?>><?php esc_html_e('Lowercase', 'goodwish'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row next-row">
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Background Color', 'goodwish'); ?></em>
                                                <input type="text" id="slideelementtextbgndcolor_<?php esc_attr($no); ?>" name="slideelementtextbgndcolor[]" value="<?php echo isset($slide_element['slideelementtextbgndcolor']) ? esc_attr($slide_element['slideelementtextbgndcolor']) : ''; ?>" class="my-color-field"/>
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Background Transparency (0-1)', 'goodwish'); ?></em>
                                                <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextbgndtransparency_<?php esc_attr($no); ?>" name="slideelementtextbgndtransparency[]" value="<?php echo isset($slide_element['slideelementtextbgndtransparency']) ? esc_attr($slide_element['slideelementtextbgndtransparency']) : ''; ?>" >
                                            </div>
                                        </div>
                                        <div class="row next-row">
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Border Thickness (px)', 'goodwish'); ?></em>
                                                <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtextborderthickness_<?php esc_attr($no); ?>" name="slideelementtextborderthickness[]" value="<?php echo isset($slide_element['slideelementtextborderthickness']) ? esc_attr($slide_element['slideelementtextborderthickness']) : ''; ?>" >
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Border Style', 'goodwish'); ?></em>
                                                <select class="form-control edgtf-input edgtf-form-element" id="slideelementtextborderstyle_<?php echo esc_attr($no); ?>" name="slideelementtextborderstyle[]" >
                                                    <option value="" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "" ? "selected" : "";} ?>></option>
                                                    <option value="solid" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "solid" ? "selected" : "";}  ?>><?php esc_html_e('solid', 'goodwish'); ?></option>
                                                    <option value="dashed" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "dashed" ? "selected" : "";}  ?>><?php esc_html_e('dashed', 'goodwish'); ?></option>
                                                    <option value="dotted" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "dotted" ? "selected" : "";} ?>><?php esc_html_e('dotted', 'goodwish'); ?></option>
                                                    <option value="double" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "double" ? "selected" : "";} ?>><?php esc_html_e('double', 'goodwish'); ?></option>
                                                    <option value="groove" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "groove" ? "selected" : "";}  ?>><?php esc_html_e('groove', 'goodwish'); ?></option>
                                                    <option value="ridge" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "ridge" ? "selected" : "";}  ?>><?php esc_html_e('ridge', 'goodwish'); ?></option>
                                                    <option value="inset" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "inset" ? "selected" : "";} ?>><?php esc_html_e('inset', 'goodwish'); ?></option>
                                                    <option value="outset" <?php if (isset($slide_element['slideelementtextborderstyle'])) {echo esc_attr($slide_element['slideelementtextborderstyle']) == "outset" ? "selected" : "";} ?>><?php esc_html_e('outset', 'goodwish'); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <em class="edgtf-field-description"><?php esc_html_e('Border Color', 'goodwish'); ?></em>
                                                <input type="text" id="slideelementtextbordercolor_<?php esc_attr($no); ?>" name="slideelementtextbordercolor[]" value="<?php echo isset($slide_element['slideelementtextbordercolor']) ? esc_attr($slide_element['slideelementtextbordercolor']) : ''; ?>" class="my-color-field"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="edgtf-slide-element-type-fields edgtf-setf-image"<?php if ($slide_element['slideelementtype'] != "image") { ?> style="display: none"<?php } ?>>
                                    <div class="row next-row">
                                        <div class="col-lg-12">
                                            <em class="edgtf-field-description"><?php esc_html_e('Image', 'goodwish'); ?></em>
                                            <div class="edgtf-media-uploader">
                                                <div<?php if ($slide_element['slideelementimageurl'] == "") { ?> style="display: none"<?php } ?>
                                                    class="edgtf-media-image-holder">
                                                    <img src="<?php if ($slide_element['slideelementimageurl'] != "") { echo esc_url(goodwish_edge_get_attachment_thumb_url($slide_element['slideelementimageurl'])); } ?>" alt="<?php esc_html_e('Image14', 'goodwish'); ?>"
                                                         class="edgtf-media-image img-thumbnail"/>
                                                </div>
                                                <div style="display: none"
                                                     class="form-control edgtf-input edgtf-form-element edgtf-media-meta-fields">
                                                    <input type="hidden" class="edgtf-media-upload-url"
                                                           id="slideelementimageurl_<?php esc_attr($no); ?>"
                                                           name="slideelementimageurl[]"
                                                           value="<?php echo esc_attr($slide_element['slideelementimageurl']); ?>"/>
                                                    <input type="hidden" class="edgtf-media-upload-height"
                                                           name="slideelementimageuploadheight[]"
                                                           value="<?php echo esc_attr($slide_element['slideelementimageuploadheight']); ?>"/>
                                                    <input type="hidden"
                                                           class="edgtf-media-upload-width"
                                                           name="slideelementimageuploadwidth[]"
                                                           value="<?php echo esc_attr($slide_element['slideelementimageuploadwidth']); ?>"/>
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
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative width (F/C*100 or blank for auto width)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimagewidth_<?php esc_attr($no); ?>" name="slideelementimagewidth[]" value="<?php echo isset($slide_element['slideelementimagewidth']) ? esc_attr($slide_element['slideelementimagewidth']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative height (G/D*100 or blank for auto height)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimageheight_<?php esc_attr($no); ?>" name="slideelementimageheight[]" value="<?php echo isset($slide_element['slideelementimageheight']) ? esc_attr($slide_element['slideelementimageheight']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimageleft_<?php esc_attr($no); ?>" name="slideelementimageleft[]" value="<?php echo isset($slide_element['slideelementimageleft']) ? esc_attr($slide_element['slideelementimageleft']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimagetop_<?php esc_attr($no); ?>" name="slideelementimagetop[]" value="<?php echo isset($slide_element['slideelementimagetop']) ? esc_attr($slide_element['slideelementimagetop']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Link', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimagelink_<?php echo esc_attr($no); ?>" name="slideelementimagelink[]" value="<?php echo isset($slide_element['slideelementimagelink']) ? esc_attr($slide_element['slideelementimagelink']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementimagetarget_<?php echo esc_attr($no); ?>" name="slideelementimagetarget[]" >
                                                <option value="_self" <?php if (isset($slide_element['slideelementimagetarget'])) {echo esc_attr($slide_element['slideelementimagetarget']) == "_self" ? "selected" : "";} ?>><?php esc_html_e('Self', 'goodwish'); ?></option>
                                                <option value="_blank" <?php if (isset($slide_element['slideelementimagetarget'])) {echo esc_attr($slide_element['slideelementimagetarget']) == "_blank" ? "selected" : "";} ?>><?php esc_html_e('Blank', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Thickness (px)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementimageborderthickness_<?php esc_attr($no); ?>" name="slideelementimageborderthickness[]" value="<?php echo isset($slide_element['slideelementimageborderthickness']) ? esc_attr($slide_element['slideelementimageborderthickness']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Style', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementimageborderstyle_<?php echo esc_attr($no); ?>" name="slideelementimageborderstyle[]" >
                                                <option value="" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "" ? "selected" : "";} ?>></option>
                                                <option value="solid" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "solid" ? "selected" : "";}  ?>><?php esc_html_e('solid', 'goodwish'); ?></option>
                                                <option value="dashed" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "dashed" ? "selected" : "";}  ?>><?php esc_html_e('dashed', 'goodwish'); ?></option>
                                                <option value="dotted" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "dotted" ? "selected" : "";} ?>><?php esc_html_e('dotted', 'goodwish'); ?></option>
                                                <option value="double" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "double" ? "selected" : "";} ?>><?php esc_html_e('double', 'goodwish'); ?></option>
                                                <option value="groove" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "groove" ? "selected" : "";}  ?>><?php esc_html_e('groove', 'goodwish'); ?></option>
                                                <option value="ridge" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "ridge" ? "selected" : "";}  ?>><?php esc_html_e('ridge', 'goodwish'); ?></option>
                                                <option value="inset" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "inset" ? "selected" : "";} ?>><?php esc_html_e('inset', 'goodwish'); ?></option>
                                                <option value="outset" <?php if (isset($slide_element['slideelementimageborderstyle'])) {echo esc_attr($slide_element['slideelementimageborderstyle']) == "outset" ? "selected" : "";} ?>><?php esc_html_e('outset', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementimagebordercolor_<?php esc_attr($no); ?>" name="slideelementimagebordercolor[]" value="<?php echo isset($slide_element['slideelementimagebordercolor']) ? esc_attr($slide_element['slideelementimagebordercolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="edgtf-slide-element-type-fields edgtf-setf-button"<?php if ($slide_element['slideelementtype'] != "button") { ?> style="display: none"<?php } ?>>
                                    <div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonleft_<?php esc_attr($no); ?>" name="slideelementbuttonleft[]" value="<?php echo isset($slide_element['slideelementbuttonleft']) ? esc_attr($slide_element['slideelementbuttonleft']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-6">
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontop_<?php esc_attr($no); ?>" name="slideelementbuttontop[]" value="<?php echo isset($slide_element['slideelementbuttontop']) ? esc_attr($slide_element['slideelementbuttontop']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Button Text', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontext_<?php echo esc_attr($no); ?>" name="slideelementbuttontext[]" value="<?php echo isset($slide_element['slideelementbuttontext']) ? esc_attr($slide_element['slideelementbuttontext']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Link', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonlink_<?php echo esc_attr($no); ?>" name="slideelementbuttonlink[]" value="<?php echo isset($slide_element['slideelementbuttonlink']) ? esc_attr($slide_element['slideelementbuttonlink']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Target', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontarget_<?php echo esc_attr($no); ?>" name="slideelementbuttontarget[]" >
                                                <option value="_self" <?php if (isset($slide_element['slideelementbuttontarget'])) {echo esc_attr($slide_element['slideelementbuttontarget']) == "_self" ? "selected" : "";} ?>><?php esc_html_e('Self', 'goodwish'); ?></option>
                                                <option value="_blank" <?php if (isset($slide_element['slideelementbuttontarget'])) {echo esc_attr($slide_element['slideelementbuttontarget']) == "_blank" ? "selected" : "";} ?>><?php esc_html_e('Blank', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Button Size', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonsize_<?php echo esc_attr($no); ?>" name="slideelementbuttonsize[]" >
                                                <option value="" <?php if (isset($slide_element['slideelementbuttonsize'])) {echo esc_attr($slide_element['slideelementbuttonsize']) == "" ? "selected" : "";} ?>><?php esc_html_e('Default', 'goodwish'); ?></option>
                                                <option value="small" <?php if (isset($slide_element['slideelementbuttonsize'])) {echo esc_attr($slide_element['slideelementbuttonsize']) == "small" ? "selected" : "";}  ?>><?php esc_html_e('Small', 'goodwish'); ?></option>
                                                <option value="medium" <?php if (isset($slide_element['slideelementbuttonsize'])) {echo esc_attr($slide_element['slideelementbuttonsize']) == "medium" ? "selected" : "";} ?>><?php esc_html_e('Medium', 'goodwish'); ?></option>
                                                <option value="large" <?php if (isset($slide_element['slideelementbuttonsize'])) {echo esc_attr($slide_element['slideelementbuttonsize']) == "large" ? "selected" : "";} ?>><?php esc_html_e('Large', 'goodwish'); ?></option>
                                                <option value="huge" <?php if (isset($slide_element['slideelementbuttonsize'])) {echo esc_attr($slide_element['slideelementbuttonsize']) == "huge" ? "selected" : "";} ?>><?php esc_html_e('Extra Large', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Button Type', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttontype_<?php echo esc_attr($no); ?>" name="slideelementbuttontype[]" >
                                                <option value="" <?php if (isset($slide_element['slideelementbuttontype'])) {echo esc_attr($slide_element['slideelementbuttontype']) == "" ? "selected" : "";} ?>><?php esc_html_e('Default', 'goodwish'); ?></option>
                                                <option value="outline" <?php if (isset($slide_element['slideelementbuttontype'])) {echo esc_attr($slide_element['slideelementbuttontype']) == "outline" ? "selected" : "";}  ?>><?php esc_html_e('Outline', 'goodwish'); ?></option>
                                                <option value="solid" <?php if (isset($slide_element['slideelementbuttontype'])) {echo esc_attr($slide_element['slideelementbuttontype']) == "solid" ? "selected" : "";} ?>><?php esc_html_e('Solid', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-all-but-custom"<?php if ($custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Keep in Line with Other Buttons?', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttoninline_<?php echo esc_attr($no); ?>" name="slideelementbuttoninline[]" >
                                                <option value="no" <?php if (isset($slide_element['slideelementbuttoninline'])) {echo esc_attr($slide_element['slideelementbuttoninline']) == "no" ? "selected" : "";}  ?>><?php esc_html_e('No', 'goodwish'); ?></option>
                                                <option value="yes" <?php if (isset($slide_element['slideelementbuttoninline'])) {echo esc_attr($slide_element['slideelementbuttoninline']) == "yes" ? "selected" : "";} ?>><?php esc_html_e('Yes', 'goodwish'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Size (px)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonfontsize_<?php echo esc_attr($no); ?>" name="slideelementbuttonfontsize[]" value="<?php echo isset($slide_element['slideelementbuttonfontsize']) ? esc_attr($slide_element['slideelementbuttonfontsize']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Weight (px)', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element" id="slideelementbuttonfontweight_<?php echo esc_attr($no); ?>" name="slideelementbuttonfontweight[]" >
                                                <option value="" <?php if (isset($slide_element['slideelementbuttonfontweight'])) {echo esc_attr($slide_element['slideelementbuttonfontweight']) == "" ? "selected" : "";} ?>></option>
                                                <?php for ($i=1; $i<=9; $i++) { ?>
                                                    <option value="<?php echo esc_attr($i*100); ?>" <?php if (isset($slide_element['slideelementbuttonfontweight'])) {echo (int)$slide_element['slideelementbuttonfontweight'] == $i*100 ? "selected" : "";} ?>><?php echo esc_html($i*100); ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementbuttonfontcolor_<?php esc_attr($no); ?>" name="slideelementbuttonfontcolor[]" value="<?php echo isset($slide_element['slideelementbuttonfontcolor']) ? esc_attr($slide_element['slideelementbuttonfontcolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Font Hover Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementbuttonfonthovercolor_<?php esc_attr($no); ?>" name="slideelementbuttonfonthovercolor[]" value="<?php echo isset($slide_element['slideelementbuttonfonthovercolor']) ? esc_attr($slide_element['slideelementbuttonfonthovercolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Background Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementbuttonbgndcolor_<?php esc_attr($no); ?>" name="slideelementbuttonbgndcolor[]" value="<?php echo isset($slide_element['slideelementbuttonbgndcolor']) ? esc_attr($slide_element['slideelementbuttonbgndcolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Background Hover Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementbuttonbgndhovercolor_<?php esc_attr($no); ?>" name="slideelementbuttonbgndhovercolor[]" value="<?php echo isset($slide_element['slideelementbuttonbgndhovercolor']) ? esc_attr($slide_element['slideelementbuttonbgndhovercolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementbuttonbordercolor_<?php esc_attr($no); ?>" name="slideelementbuttonbordercolor[]" value="<?php echo isset($slide_element['slideelementbuttonbordercolor']) ? esc_attr($slide_element['slideelementbuttonbordercolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Border Hover Color', 'goodwish'); ?></em>
                                            <input type="text" id="slideelementbuttonborderhovercolor_<?php esc_attr($no); ?>" name="slideelementbuttonborderhovercolor[]" value="<?php echo isset($slide_element['slideelementbuttonborderhovercolor']) ? esc_attr($slide_element['slideelementbuttonborderhovercolor']) : ''; ?>" class="my-color-field"/>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Icon Pack', 'goodwish'); ?></em>
                                            <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-button-icon-pack"
                                                    id="slideelementbuttoniconpack_<?php echo esc_attr($no); ?>"
                                                    name="slideelementbuttoniconpack[]"
                                                    >
                                                <?php
                                                $icon_packs = $goodwish_edge_IconCollections->getIconCollectionsEmpty("no_icon");
                                                foreach ($icon_packs as $key=>$value) { ?>
                                                    <option <?php if (isset($slide_element['slideelementbuttoniconpack']) && $slide_element['slideelementbuttoniconpack'] == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <?php
                                        foreach ($goodwish_edge_IconCollections->iconCollections as $collection_key => $collection_object) {
                                            $icons_array = $collection_object->getIconsArray();
                                            ?>
                                            <div class="col-lg-3 edgtf-slide-element-button-icon-collection <?php echo esc_attr($collection_key); ?>"<?php if (!isset($slide_element['slideelementbuttoniconpack']) || $slide_element['slideelementbuttoniconpack'] != $collection_key) { ?> style="display: none"<?php } ?>>
                                                <em class="edgtf-field-description"><?php esc_html_e('Button Icon', 'goodwish'); ?></em>
                                                <select class="form-control edgtf-input edgtf-form-element"
                                                        id="slideelementbuttonicon_<?php echo esc_attr($collection_key).'_'.esc_attr($no); ?>"
                                                        name="slideelementbuttonicon_<?php echo esc_attr($collection_key); ?>[]"
                                                        >
                                                    <?php
                                                    foreach ($icons_array as $key=>$value) { ?>
                                                        <option <?php if (isset($slide_element['slideelementbuttonicon_'.$collection_key]) && $slide_element['slideelementbuttonicon_'.$collection_key] == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div class="edgtf-slide-element-type-fields edgtf-setf-section-link"<?php if ($slide_element['slideelementtype'] != "section-link") { ?> style="display: none"<?php } ?>>
                                    <!--
									<div class="row next-row edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
										<div class="col-lg-6">
											<em class="edgtf-field-description">Relative position - Left (X/C*100)</em>
											<input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinkleft_<?php esc_attr($no); ?>" name="slideelementsectionlinkleft[]" value="<?php echo isset($slide_element['slideelementsectionlinkleft']) ? esc_attr($slide_element['slideelementsectionlinkleft']) : ''; ?>" >
										</div>
										<div class="col-lg-6">
											<em class="edgtf-field-description">Relative position - Top (Y/D*100)</em>
											<input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinktop_<?php esc_attr($no); ?>" name="slideelementsectionlinktop[]" value="<?php echo isset($slide_element['slideelementsectionlinktop']) ? esc_attr($slide_element['slideelementsectionlinktop']) : ''; ?>" >
										</div>
									</div>
									-->
                                    <div class="row next-row">
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Target Section Anchor (i.e. "#products")', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinkanchor_<?php esc_attr($no); ?>" name="slideelementsectionlinkanchor[]" value="<?php echo isset($slide_element['slideelementsectionlinkanchor']) ? esc_attr($slide_element['slideelementsectionlinkanchor']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3">
                                            <em class="edgtf-field-description"><?php esc_html_e('Anchor Link Text (i.e. "Scroll Down")', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementsectionlinktext_<?php esc_attr($no); ?>" name="slideelementsectionlinktext[]" value="<?php echo isset($slide_element['slideelementsectionlinktext']) ? esc_attr($slide_element['slideelementsectionlinktext']) : ''; ?>" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Animation', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element" id="slideelementanimation_<?php echo esc_attr($no); ?>" name="slideelementanimation[]" >
                                            <option value="default" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "default" ? "selected" : "";}  ?>><?php esc_html_e('Default', 'goodwish'); ?></option>
                                            <option value="none" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "none" ? "selected" : "";}  ?>><?php esc_html_e('No Animation', 'goodwish'); ?></option>
                                            <option value="flip" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "flip" ? "selected" : "";}  ?>><?php esc_html_e('Flip', 'goodwish'); ?></option>
                                            <option value="Spin" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "Spin" ? "selected" : "";}  ?>><?php esc_html_e('Spin', 'goodwish'); ?></option>
                                            <option value="fade" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "fade" ? "selected" : "";}  ?>><?php esc_html_e('Fade In', 'goodwish'); ?></option>
                                            <option value="from_bottom" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "from_bottom" ? "selected" : "";}  ?>><?php esc_html_e('Fly In From Bottom', 'goodwish'); ?></option>
                                            <option value="from_top" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "from_top" ? "selected" : "";}  ?>><?php esc_html_e('Fly In From Top', 'goodwish'); ?></option>
                                            <option value="from_left" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "from_left" ? "selected" : "";}  ?>><?php esc_html_e('Fly In From Left', 'goodwish'); ?></option>
                                            <option value="from_right" <?php if (isset($slide_element['slideelementanimation'])) {echo esc_attr($slide_element['slideelementanimation']) == "from_right" ? "selected" : "";}  ?>><?php esc_html_e('Fly In From Right', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Animation Delay (i.e. "0.5s" or "400ms")', 'goodwish');?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementanimationdelay_<?php esc_attr($no); ?>" name="slideelementanimationdelay[]" value="<?php echo isset($slide_element['slideelementanimationdelay']) ? esc_attr($slide_element['slideelementanimationdelay']) : ''; ?>" >
                                    </div>
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Animation Duration (i.e. "0.5s" or "400ms")', 'goodwish'); ?></em>
                                        <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementanimationduration_<?php esc_attr($no); ?>" name="slideelementanimationduration[]" value="<?php echo isset($slide_element['slideelementanimationduration']) ? esc_attr($slide_element['slideelementanimationduration']) : ''; ?>" >
                                    </div>
                                </div>
                                <div class="row next-row">
                                    <div class="col-lg-3">
                                        <em class="edgtf-field-description"><?php esc_html_e('Element Responsiveness', 'goodwish'); ?></em>
                                        <select class="form-control edgtf-input edgtf-form-element edgtf-slide-element-responsiveness-selector" id="slideelementresponsive_<?php echo esc_attr($no); ?>" name="slideelementresponsive[]" >
                                            <option value="proportional" <?php if (isset($slide_element['slideelementresponsive'])) {echo esc_attr($slide_element['slideelementresponsive']) == "proportional" ? "selected" : "";}  ?>><?php esc_html_e('Preserve proportions', 'goodwish'); ?></option>
                                            <option value="stages" <?php if (isset($slide_element['slideelementresponsive'])) {echo esc_attr($slide_element['slideelementresponsive']) == "stages" ? "selected" : "";}  ?>><?php esc_html_e('Scale based on stage coefficients', 'goodwish'); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="edgtf-slide-responsive-scale-factors"<?php if (isset($slide_element['slideelementresponsive']) && $slide_element['slideelementresponsive'] == 'proportional') { ?> style="display:none"<?php } ?>>
                                    <div class="row next-row">
                                        <div class="col-lg-12">
                                            <em class="edgtf-field-description"><?php esc_html_e('Enter below the scale factors for each responsive stage, relative to the values above (or to the original size for images).', 'goodwish'); ?><br/><?php esc_html_e('Scale factor of 1 leaves the element at the same size as for the default screen width of ', 'goodwish'); ?><span class="edgtf-slide-dynamic-def-width"><?php echo esc_html($default_screen_width); ?></span><?php esc_html_e('px, while setting it to zero hides the element.', 'goodwish'); ?><div class="edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>><?php esc_html_e('If you also wish to change the position of the element for a certain stage, enter the desired position in the corresponding fields.', 'goodwish'); ?></div></em>
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Mobile','goodwish'); ?><br><?php esc_html_e('up to', 'goodwish'); ?> <?php echo esc_html($screen_widths["mobile"]); ?>px)</em>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscalemobile_<?php esc_attr($no); ?>" name="slideelementscalemobile[]" value="<?php echo isset($slide_element['slideelementscalemobile']) ? esc_attr($slide_element['slideelementscalemobile']) : ''; ?>" placeholder="0.5">
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementleftmobile_<?php esc_attr($no); ?>" name="slideelementleftmobile[]" value="<?php echo isset($slide_element['slideelementleftmobile']) ? esc_attr($slide_element['slideelementleftmobile']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtopmobile_<?php esc_attr($no); ?>" name="slideelementtopmobile[]" value="<?php echo isset($slide_element['slideelementtopmobile']) ? esc_attr($slide_element['slideelementtopmobile']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Tablet (Portrait)', 'goodwish'); ?><br>(<?php echo esc_html($screen_widths["mobile"]+1); ?>px - <?php echo esc_html($screen_widths["tabletp"]); ?>px)</em>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscaletabletp_<?php esc_attr($no); ?>" name="slideelementscaletabletp[]" value="<?php echo isset($slide_element['slideelementscaletabletp']) ? esc_attr($slide_element['slideelementscaletabletp']) : ''; ?>" placeholder="0.6">
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementlefttabletp_<?php esc_attr($no); ?>" name="slideelementlefttabletp[]" value="<?php echo isset($slide_element['slideelementlefttabletp']) ? esc_attr($slide_element['slideelementlefttabletp']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtoptabletp_<?php esc_attr($no); ?>" name="slideelementtoptabletp[]" value="<?php echo isset($slide_element['slideelementtoptabletp']) ? esc_attr($slide_element['slideelementtoptabletp']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Tablet (Landscape)', 'goodwish'); ?><br>(<?php echo esc_html($screen_widths["tabletp"]+1); ?>px - <?php echo esc_html($screen_widths["tabletl"]); ?>px)</em>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscaletabletl_<?php esc_attr($no); ?>" name="slideelementscaletabletl[]" value="<?php echo isset($slide_element['slideelementscaletabletl']) ? esc_attr($slide_element['slideelementscaletabletl']) : ''; ?>" placeholder="0.7">
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementlefttabletl_<?php esc_attr($no); ?>" name="slideelementlefttabletl[]" value="<?php echo isset($slide_element['slideelementlefttabletl']) ? esc_attr($slide_element['slideelementlefttabletl']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtoptabletl_<?php esc_attr($no); ?>" name="slideelementtoptabletl[]" value="<?php echo isset($slide_element['slideelementtoptabletl']) ? esc_attr($slide_element['slideelementtoptabletl']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Laptop', 'goodwish'); ?><br>(<?php echo esc_html($screen_widths["tabletl"]+1); ?>px - <?php echo esc_html($screen_widths["laptop"]); ?>px)</em>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscalelaptop_<?php esc_attr($no); ?>" name="slideelementscalelaptop[]" value="<?php echo isset($slide_element['slideelementscalelaptop']) ? esc_attr($slide_element['slideelementscalelaptop']) : ''; ?>" placeholder="0.8">
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementleftlaptop_<?php esc_attr($no); ?>" name="slideelementleftlaptop[]" value="<?php echo isset($slide_element['slideelementleftlaptop']) ? esc_attr($slide_element['slideelementleftlaptop']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtoplaptop_<?php esc_attr($no); ?>" name="slideelementtoplaptop[]" value="<?php echo isset($slide_element['slideelementtoplaptop']) ? esc_attr($slide_element['slideelementtoplaptop']) : ''; ?>" >
                                        </div>
                                    </div>
                                    <div class="row next-row">
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Desktop', 'goodwish'); ?><br><?php esc_html_e( '(above ', 'goodwish' ); ?><?php echo esc_html($screen_widths["laptop"]); ?>px)</em>
                                        </div>
                                        <div class="col-lg-2">
                                            <em class="edgtf-field-description"><?php esc_html_e('Scale Factor', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementscaledesktop_<?php esc_attr($no); ?>" name="slideelementscaledesktop[]" value="<?php echo isset($slide_element['slideelementscaledesktop']) ? esc_attr($slide_element['slideelementscaledesktop']) : ''; ?>" placeholder="1">
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Left (X/C*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementleftdesktop_<?php esc_attr($no); ?>" name="slideelementleftdesktop[]" value="<?php echo isset($slide_element['slideelementleftdesktop']) ? esc_attr($slide_element['slideelementleftdesktop']) : ''; ?>" >
                                        </div>
                                        <div class="col-lg-3 edgtf-slide-element-custom-only"<?php if (!$custom_positions) { ?> style="display:none"<?php } ?>>
                                            <em class="edgtf-field-description"><?php esc_html_e('Relative position - Top (Y/D*100)', 'goodwish'); ?></em>
                                            <input type="text" class="form-control edgtf-input edgtf-form-element" id="slideelementtopdesktop_<?php esc_attr($no); ?>" name="slideelementtopdesktop[]" value="<?php echo isset($slide_element['slideelementtopdesktop']) ? esc_attr($slide_element['slideelementtopdesktop']) : ''; ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div><!-- close div.edgtf-section-content -->
                        </div><!-- close div.container-fluid -->
                    </div>
                </div>
            </div>
            <?php
            $no++;
        }
        ?>

        <div class="edgtf-slide-element-add">
            <a class="edgtf-add-item btn btn-sm btn-primary" href="#"> <?php esc_html_e('Add New Item', 'goodwish'); ?></a>


            <a class="edgtf-toggle-all-item btn btn-sm btn-default pull-right" href="#"> <?php esc_html_e('Expand All', 'goodwish'); ?></a>
            <?php /* <a class="edgtf-remove-last-item-row btn btn-sm btn-default pull-right" href="#"> Remove Last Row</a> */ ?>
        </div>




        <?php

    }
}

/*
   Class: GoodwishEdgeHolderFrameScheme
   A class that initializes elements for Slider
*/
class GoodwishEdgeHolderFrameScheme implements iGoodwishEdgeRender {
    private $label;
    private $description;


    function __construct($label="",$description="") {
        $this->label = $label;
        $this->description = $description;
    }

    public function render($factory) {
        ?>

        <div class="edgtf-slide-elements-holder-frame-scheme"><img src="<?php echo esc_url(EDGE_ASSETS_ROOT . '/img/holder-frame-scheme.png'); ?>"></div>

        <?php

    }
}

class GoodwishEdgeRepeater implements iGoodwishEdgeRender
{
	private $label;
	private $description;
	private $name;
	private $fields;
	private $num_of_rows;
	private $button_text;

	function __construct($fields, $name, $label = '', $description = '', $button_text = '')
	{
		global $goodwish_edge_Framework;

		$this->label = $label;
		$this->description = $description;
		$this->fields = $fields;
		$this->name = $name;
		$this->num_of_rows = 1;
		$this->button_text = !empty($button_text) ? $button_text : esc_html__('Add New Item','goodwish');

		$counter = 0;
		foreach ($this->fields as $field) {
			if(!isset($this->fields[$counter]['options'])){
				$this->fields[$counter]['options'] = array();
			}
			if(!isset($this->fields[$counter]['args'])){
				$this->fields[$counter]['args'] = array();
			}
			if(!isset($this->fields[$counter]['hidden'])){
				$this->fields[$counter]['hidden'] = false;
			}
			if(!isset($this->fields[$counter]['label'])){
				$this->fields[$counter]['label'] = '';
			}
			if(!isset($this->fields[$counter]['description'])){
				$this->fields[$counter]['description'] = '';
			}
			if(!isset($this->fields[$counter]['default_value'])){
				$this->fields[$counter]['default_value'] = '';
			}

			$goodwish_edge_Framework->edgtMetaBoxes->addOption($this->fields[$counter]['name'], $this->fields[$counter]['default_value']);
			$counter++;
		}
	}

	public function render($factory, $row_fields_num = -1)
	{
		global $post;

		$clones = array();

		if(!empty($post)){
			$clones = get_post_meta($post->ID, $this->fields[0]['name'], true);
		}

		?>
		<div class="edgtf-repeater-wrapper">
			<div class="edgtf-repeater-fields-holder">
				<?php if (empty($clones)) { //first time
					if ($row_fields_num === -1) {
						?>
						<div class="edgtf-repeater-fields-row clearfix">
						<?php
					}
					$counter = 0;
					foreach ($this->fields as $field) {
						if ($row_fields_num !== -1 && $counter % $row_fields_num === 0) { ?>
							<div class="edgtf-repeater-fields-row clearfix">
							<?php
						}
						$factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => 0, 'value' => $field['default_value']));
						$counter++;
						if ($row_fields_num !== -1 && $counter % $row_fields_num === 0) { ?>
							<div class="edgtf-repeater-remove"><a class="edgtf-clone-remove" href="#"><i class="fa fa-times"></i></a></div>
							</div>
							<?php
						}
					}
					if ($row_fields_num === -1) {
						?>
						<div class="edgtf-repeater-remove"><a class="edgtf-clone-remove" href="#"><i class="fa fa-times"></i></a></div>
						</div>
						<?php
					}
				} else {
					$j = 0;
					$index = 0;
					$values = array();
					foreach ($this->fields as $field) {
						if ($j++ === 0) { // avoid unnecessary get_post_meta call
							$values[] = $clones;
						} else {
							$values[] = get_post_meta($post->ID, $field['name'], true);
						}
					}
					while (isset($clones[$index])) { // rows
						$count = 0;
						if ($row_fields_num === -1) {
							?>
							<div class="edgtf-repeater-fields-row clearfix">
							<?php
						}
						foreach ($this->fields as $field) { // columns
							if ($row_fields_num !== -1 && $count % $row_fields_num === 0) { ?>
								<div class="edgtf-repeater-fields-row clearfix">
								<?php
							}

							$factory->render($field['type'], $field['name'], $field['label'], $field['description'], $field['options'], $field['args'], $field['hidden'], array('index' => $index, 'value' => $values[$count][$index]));
							if ($row_fields_num !== -1 && $count % $row_fields_num === 0) { ?>
								<div class="edgtf-repeater-remove"><a class="edgtf-clone-remove" href="#"><i
											class="fa fa-times"></i></a></div>
								</div>
								<?php
							}
							$count++;
						}
						if ($row_fields_num === -1) {
							?>
							<div class="edgtf-repeater-remove">
								<a title="<?php esc_attr_e('Remove section', 'goodwish'); ?>" class="edgtf-clone-remove" href="#">
									<i class="fa fa-times"></i>
								</a>
							</div>
							</div>
							<?php
						}
						++$index;
					}
					$this->num_of_rows = $index;
				}
				?>
			</div>
			<div class="edgtf-repeater-add">
				<a class="edgtf-clone btn btn-sm btn-primary"
				   data-count="<?php echo esc_attr($this->num_of_rows) ?>"
				   href="#"><?php echo esc_html($this->button_text); ?></a>
			</div>
		</div>


		<?php

	}
}