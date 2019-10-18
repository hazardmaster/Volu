<?php

/*
   Interface: iGoodwishEdgeLayoutNode
   A interface that implements Layout Node methods
*/
interface iGoodwishEdgeLayoutNode
{
    public function hasChidren();
    public function getChild($key);
    public function addChild($key, $value);
}

/*
   Interface: iGoodwishEdgeRender
   A interface that implements Render methods
*/
interface iGoodwishEdgeRender
{
    public function render($factory);
}

/*
   Class: GoodwishEdgePanel
   A class that initializes Edge Panel
*/
class GoodwishEdgePanel implements iGoodwishEdgeLayoutNode, iGoodwishEdgeRender {

    public $children;
    public $title;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($title="",$name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
        $this->children = array();
        $this->title = $title;
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            if (goodwish_edge_option_get_value($this->hidden_property)==$this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (goodwish_edge_option_get_value($this->hidden_property)==$value)
                        $hidden = true;

                }
            }
        }
        ?>
        <div class="edgtf-page-form-section-holder" id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <h3 class="edgtf-page-section-title"><?php echo esc_html($this->title); ?></h3>
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iGoodwishEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: GoodwishEdgeContainer
   A class that initializes Edge Container
*/
class GoodwishEdgeContainer implements iGoodwishEdgeLayoutNode, iGoodwishEdgeRender {

    public $children;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
        $this->children = array();
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            if (goodwish_edge_option_get_value($this->hidden_property)==$this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (goodwish_edge_option_get_value($this->hidden_property)==$value)
                        $hidden = true;

                }
            }
        }
        ?>
        <div class="edgtf-page-form-container-holder" id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iGoodwishEdgeRender $child, $factory) {
        $child->render($factory);
    }
}


/*
   Class: GoodwishEdgeContainerNoStyle
   A class that initializes Edge Container without css classes
*/
class GoodwishEdgeContainerNoStyle implements iGoodwishEdgeLayoutNode, iGoodwishEdgeRender {

    public $children;
    public $name;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
        $this->children = array();
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function hasChidren() {
        return (count($this->children) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            if (goodwish_edge_option_get_value($this->hidden_property)==$this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (goodwish_edge_option_get_value($this->hidden_property)==$value)
                        $hidden = true;

                }
            }
        }
        ?>
        <div id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iGoodwishEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: GoodwishEdgeGroup
   A class that initializes Edge Group
*/
class GoodwishEdgeGroup implements iGoodwishEdgeLayoutNode, iGoodwishEdgeRender {

    public $children;
    public $title;
    public $description;

    function __construct($title="",$description="") {
        $this->children = array();
        $this->title = $title;
        $this->description = $description;
    }

    public function hasChidren() {
        return (count($this->children) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        ?>

        <div class="edgtf-page-form-section">


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($this->title); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <?php
                    foreach ($this->children as $child) {
                        $this->renderChild($child, $factory);
                    }
                    ?>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php
    }

    public function renderChild(iGoodwishEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: GoodwishEdgeNotice
   A class that initializes Edge Notice
*/
class GoodwishEdgeNotice implements iGoodwishEdgeRender {

    public $children;
    public $title;
    public $description;
    public $notice;
    public $hidden_property;
    public $hidden_value;
    public $hidden_values;

    function __construct($title="",$description="",$notice="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
        $this->children = array();
        $this->title = $title;
        $this->description = $description;
        $this->notice = $notice;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
        $this->hidden_values = $hidden_values;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            if (goodwish_edge_option_get_value($this->hidden_property)==$this->hidden_value)
                $hidden = true;
            else {
                foreach ($this->hidden_values as $value) {
                    if (goodwish_edge_option_get_value($this->hidden_property)==$value)
                        $hidden = true;

                }
            }
        }
        ?>

        <div class="edgtf-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($this->title); ?></h4>

                <p><?php echo esc_html($this->description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->

            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="alert alert-warning">
                        <?php echo esc_html($this->notice); ?>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php
    }
}

/*
   Class: GoodwishEdgeRow
   A class that initializes Edge Row
*/
class GoodwishEdgeRow implements iGoodwishEdgeLayoutNode, iGoodwishEdgeRender {

    public $children;
    public $next;

    function __construct($next=false) {
        $this->children = array();
        $this->next = $next;
    }

    public function hasChidren() {
        return (count($this->children) > 0)?true:false;
    }

    public function getChild($key) {
        return $this->children[$key];
    }

    public function addChild($key, $value) {
        $this->children[$key] = $value;
    }

    public function render($factory) {
        ?>
        <div class="row<?php if ($this->next) echo " next-row"; ?>">
            <?php
            foreach ($this->children as $child) {
                $this->renderChild($child, $factory);
            }
            ?>
        </div>
        <?php
    }

    public function renderChild(iGoodwishEdgeRender $child, $factory) {
        $child->render($factory);
    }
}

/*
   Class: GoodwishEdgeTitle
   A class that initializes Edge Title
*/
class GoodwishEdgeTitle implements iGoodwishEdgeRender {
    private $name;
    private $title;
    public $hidden_property;
    public $hidden_values = array();

    function __construct($name="",$title="",$hidden_property="",$hidden_value="") {
        $this->title = $title;
        $this->name = $name;
        $this->hidden_property = $hidden_property;
        $this->hidden_value = $hidden_value;
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            if (goodwish_edge_option_get_value($this->hidden_property)==$this->hidden_value)
                $hidden = true;
        }
        ?>
        <h5 class="edgtf-page-section-subtitle" id="edgtf_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
        <?php
    }
}

/*
   Class: GoodwishEdgeField
   A class that initializes Edge Field
*/
class GoodwishEdgeField implements iGoodwishEdgeRender {
    private $type;
    private $name;
    private $default_value;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    public $hidden_property;
    public $hidden_values = array();


    function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
        global $goodwish_edge_Framework;
        $this->type = $type;
        $this->name = $name;
        $this->default_value = $default_value;
        $this->label = $label;
        $this->description = $description;
        $this->options = $options;
        $this->args = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values = $hidden_values;
        $goodwish_edge_Framework->edgtOptions->addOption($this->name,$this->default_value, $type);
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            foreach ($this->hidden_values as $value) {
                if (goodwish_edge_option_get_value($this->hidden_property)==$value)
                    $hidden = true;

            }
        }
        $factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
    }
}

/*
   Class: GoodwishEdgeMetaField
   A class that initializes Edge Meta Field
*/
class GoodwishEdgeMetaField implements iGoodwishEdgeRender {
    private $type;
    private $name;
    private $default_value;
    private $label;
    private $description;
    private $options = array();
    private $args = array();
    public $hidden_property;
    public $hidden_values = array();


    function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
        global $goodwish_edge_Framework;
        $this->type = $type;
        $this->name = $name;
        $this->default_value = $default_value;
        $this->label = $label;
        $this->description = $description;
        $this->options = $options;
        $this->args = $args;
        $this->hidden_property = $hidden_property;
        $this->hidden_values = $hidden_values;
        $goodwish_edge_Framework->edgtMetaBoxes->addOption($this->name,$this->default_value);
    }

    public function render($factory) {
        $hidden = false;
        if (!empty($this->hidden_property)){
            foreach ($this->hidden_values as $value) {
                if (goodwish_edge_option_get_value($this->hidden_property)==$value)
                    $hidden = true;

            }
        }
        $factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
    }
}

abstract class GoodwishEdgeFieldType {

    abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );

}

class GoodwishEdgeFieldText extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array()) {
		$col_width = 12;
		if(isset($args["col_width"])) {
            $col_width = $args["col_width"];
        }

        $suffix = !empty($args['suffix']) ? $args['suffix'] : false;

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'edgtf-repeater-field';
		} else {
			$id = $name;
			$value = goodwish_edge_option_get_value($name);
		}

        ?>

		<div class="edgtf-page-form-section  <?php echo esc_attr($class); ?>" id="edgtf_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="edgtf-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.edgtf-field-desc -->

			<div class="edgtf-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
                            <?php if($suffix) : ?>
                            <div class="input-group">
                            <?php endif; ?>
                                <input type="text"
                                    class="form-control edgtf-input edgtf-form-element"
                                    name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"/>
                                <?php if($suffix) : ?>
                                    <div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
                                <?php endif; ?>
                            <?php if($suffix) : ?>
                            </div>
                            <?php endif; ?>

                        </div>
					</div>
				</div>
			</div>
			<!-- close div.edgtf-section-content -->

		</div>
        <?php

    }

}

class GoodwishEdgeFieldTextSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false,  $repeat = array()) {

		$suffix = !empty($args['suffix']) ? $args['suffix'] : false;
		$class = '';

		if (!empty($repeat)) {
			$id = str_replace(array('[',']'),'',$name) . '-' .rand();
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'edgtf-repeater-field';
		} else {
			$id = $name;
			$value = goodwish_edge_option_get_value($name);
		}

		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="edgtf_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
			<?php if($suffix) : ?>
			<div class="input-group">
            <?php endif; ?>
				<input type="text"
				   class="form-control edgtf-input edgtf-form-element"
				   name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"/>
				<?php if($suffix) : ?>
					<div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
				<?php endif; ?>
			<?php if($suffix) : ?>
			</div>
			<?php endif; ?>
		</div>
        <?php

    }

}

class GoodwishEdgeFieldTextArea extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
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
							<textarea class="form-control edgtf-form-element"
                                      name="<?php echo esc_attr($name); ?>"
                                      rows="5"><?php echo esc_html(htmlspecialchars(goodwish_edge_option_get_value($name))); ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldTextAreaSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        ?>

        <div class="col-lg-3">
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <textarea class="form-control edgtf-form-element"
                      name="<?php echo esc_attr($name); ?>"
                      rows="5"><?php echo esc_html(goodwish_edge_option_get_value($name)); ?></textarea>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldColor extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
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
                            <input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>" class="my-color-field"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldColorSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        ?>

        <div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>" class="my-color-field"/>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldImage extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
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
                            <div class="edgtf-media-uploader">
                                <div<?php if (!goodwish_edge_option_has_value($name)) { ?> style="display: none"<?php } ?>
                                    class="edgtf-media-image-holder">
                                    <img src="<?php if (goodwish_edge_option_has_value($name)) { echo esc_url(goodwish_edge_get_attachment_thumb_url(goodwish_edge_option_get_value($name))); } ?>" alt="<?php esc_html_e('Image3', 'goodwish'); ?>"
                                         class="edgtf-media-image img-thumbnail"/>
                                </div>
                                <div style="display: none"
                                     class="edgtf-media-meta-fields">
                                    <input type="hidden" class="edgtf-media-upload-url"
                                           name="<?php echo esc_attr($name); ?>"
                                           value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
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
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldImageSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        ?>


        <div class="col-lg-3" id="edgtf_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <div class="edgtf-media-uploader">
                <div<?php if (!goodwish_edge_option_has_value($name)) { ?> style="display: none"<?php } ?>
                    class="edgtf-media-image-holder">
                    <img src="<?php if (goodwish_edge_option_has_value($name)) { echo esc_url(goodwish_edge_get_attachment_thumb_url(goodwish_edge_option_get_value($name))); } ?>" alt="<?php esc_html_e('Image4', 'goodwish'); ?>"
                         class="edgtf-media-image img-thumbnail"/>
                </div>
                <div style="display: none"
                     class="edgtf-media-meta-fields">
                    <input type="hidden" class="edgtf-media-upload-url"
                           name="<?php echo esc_attr($name); ?>"
                           value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
                </div>
                <a class="edgtf-media-upload-btn btn btn-sm btn-primary"
                   href="javascript:void(0)"
                   data-frame-title="<?php esc_attr_e('Select Image', 'goodwish'); ?>"
                   data-frame-button-text="<?php esc_html_e('Select Image', 'goodwish'); ?>"><?php esc_html_e('Upload', 'goodwish'); ?></a>
                <a style="display: none;" href="javascript: void(0)"
                   class="edgtf-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'goodwish'); ?></a>
            </div>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldFont extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        global $goodwish_edge_fonts_array;
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
                        <div class="col-lg-3">
                            <select class="form-control edgtf-form-element"
                                    name="<?php echo esc_attr($name); ?>">
                                <option value="-1"><?php esc_html_e('Default', 'goodwish');?></option>
                                <?php foreach($goodwish_edge_fonts_array as $fontArray) { ?>
                                    <option <?php if (goodwish_edge_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldFontSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        global $goodwish_edge_fonts_array;
        ?>


        <div class="col-lg-3">
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgtf-form-element"
                    name="<?php echo esc_attr($name); ?>">
                <option value="-1"><?php esc_html_e('Default', 'goodwish');?></option>
                <?php foreach($goodwish_edge_fonts_array as $fontArray) { ?>
                    <option <?php if (goodwish_edge_option_get_value($name) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
                <?php } ?>
            </select>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldSelect extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if(isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if(isset($args["hide"]))
            $hide = $args["hide"];
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
                        <div class="col-lg-3">
                            <select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                                <?php foreach($show as $key=>$value) { ?>
                                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                <?php foreach($hide as $key=>$value) { ?>
                                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                    name="<?php echo esc_attr($name); ?>">
                                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                                    <option <?php if (goodwish_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldSelectBlank extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if(isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if(isset($args["hide"]))
            $hide = $args["hide"];
        ?>

        <div class="edgtf-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


            <div class="edgtf-field-desc">
                <h4><?php echo esc_html($label); ?></h4>

                <p><?php echo esc_html($description); ?></p>
            </div>
            <!-- close div.edgtf-field-desc -->



            <div class="edgtf-section-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3">
                            <select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                                <?php foreach($show as $key=>$value) { ?>
                                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                <?php foreach($hide as $key=>$value) { ?>
                                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                                <?php } ?>
                                    name="<?php echo esc_attr($name); ?>">
                                <option <?php if (goodwish_edge_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                                    <option <?php if (goodwish_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- close div.edgtf-section-content -->

        </div>
        <?php

    }

}

class GoodwishEdgeFieldSelectSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if(isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if(isset($args["hide"]))
            $hide = $args["hide"];
        ?>


        <div class="col-lg-3">
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (goodwish_edge_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (goodwish_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldSelectBlankSimple extends GoodwishEdgeFieldType {

    public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
        global $goodwish_edge_options;
        $dependence = false;
        if(isset($args["dependence"]))
            $dependence = true;
        $show = array();
        if(isset($args["show"]))
            $show = $args["show"];
        $hide = array();
        if(isset($args["hide"]))
            $hide = $args["hide"];
        ?>


        <div class="col-lg-3">
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <select class="form-control edgtf-form-element<?php if ($dependence) { echo " dependence"; } ?>"
                <?php foreach($show as $key=>$value) { ?>
                    data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                <?php foreach($hide as $key=>$value) { ?>
                    data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
                <?php } ?>
                    name="<?php echo esc_attr($name); ?>">
                <option <?php if (goodwish_edge_option_get_value($name) == "") { echo "selected='selected'"; } ?>  value=""></option>
                <?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
                    <option <?php if (goodwish_edge_option_get_value($name) == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
                <?php } ?>
            </select>
        </div>
        <?php

    }

}

class GoodwishEdgeFieldYesNo extends GoodwishEdgeFieldType {

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
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if (goodwish_edge_option_get_value($name) == "yes") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
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

class GoodwishEdgeFieldYesNoSimple extends GoodwishEdgeFieldType {

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

        <div class="col-lg-3">
            <em class="edgtf-field-description"><?php echo esc_html($label); ?></em>
            <p class="field switch">
                <label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                <input type="checkbox" id="checkbox" class="checkbox"
                       name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if (goodwish_edge_option_get_value($name) == "yes") { echo " selected"; } ?>/>
                <input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
            </p>
        </div>
        <?php

    }
}

class GoodwishEdgeFieldOnOff extends GoodwishEdgeFieldType {

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
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "on") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('On', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "off") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Off', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if (goodwish_edge_option_get_value($name) == "on") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
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

class GoodwishEdgeFieldPortfolioFollow extends GoodwishEdgeFieldType {

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
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "portfolio_single_no_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (goodwish_edge_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
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

class GoodwishEdgeFieldZeroOne extends GoodwishEdgeFieldType {

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
                                       class="cb-enable<?php if (goodwish_edge_option_get_value($name) == "1") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'goodwish') ?></span></label>
                                <label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
                                       class="cb-disable<?php if (goodwish_edge_option_get_value($name) == "0") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'goodwish') ?></span></label>
                                <input type="checkbox" id="checkbox" class="checkbox"
                                       name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (goodwish_edge_option_get_value($name) == "1") { echo " selected"; } ?>/>
                                <input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(goodwish_edge_option_get_value($name)); ?>"/>
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