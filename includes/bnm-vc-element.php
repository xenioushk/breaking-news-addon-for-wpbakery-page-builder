<?php

add_action("vc_after_init", "bnm_vc_addon_function");

function bnm_vc_addon_function()
{

    // Start VC Coding

    $bnm_default_color_schemes = ['red', 'green', 'blue', 'orange', 'pink', 'purple', 'olive', 'yellow', 'gray', 'chocolate'];

    $theme_manager = get_option('bnm_theme_manager');

    $bnm_ticker_themes = [];

    foreach ($bnm_default_color_schemes as $theme_key_id => $theme_key_title) :

        $bnm_ticker_themes[ucfirst($theme_key_title)] = $theme_key_title;

    endforeach;

    if (is_array($theme_manager) && count($theme_manager['colors']) > 0) :

        foreach ($theme_manager['colors'] as $themes_key => $themes) :


            $bnm_ticker_themes[$themes['theme_name']] = $themes_key;

        endforeach;

    endif;


    $bnm_ticker_themes['Custom Theme'] = "custom";

    $settings = array(
        "name" => __("Breaking news", "bnm_vc"),
        "base" => "bwl_bnm",
        "icon" => "icon-bnm-vc-addon",
        "category" => __("BWL Breaking News", "bnm_vc"),
        "content_element" => true,
        "params" => array(

            array(
                "holder" => "div",
                "type" => "textfield",
                "class" => "",
                "heading" => __("Ticker  title", "bnm_vc"),
                "param_name" => "title",
                "value" => "",
                "description" => __("Add custom title of breaking news ticker. Default: Breaking", "bnm_vc"),
                "group" => "General"
            ),
            array(
                "type" => 'checkbox',
                "heading" => __('Hide ticker title?', 'bnm_vc'),
                "param_name" => "show_title",
                "group" => __('General', 'bnm_vc'),
                "description" => "",
                "value" => array(__('Hide, please!', 'bnm_vc') => '0')
            ),
            array(
                "type" => "hidden",
                "class" => "",
                "heading" => __("Value", "bnm_vc"),
                "param_name" => "inline",
                "value" => 1,
                "description" => __("", "bnm_vc"),
                "group" => "General",
            ),
            array(
                "type" => "number",
                "class" => "",
                "heading" => __("No of items to display", "bnm_vc"),
                "param_name" => "limit",
                "value" => "",
                "description" => __("", "bnm_vc"),
                "group" => "General",
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Order Settings", "bnm_vc"),
                "param_name" => "orderby",
                "value" => array(
                    "Select" => "",
                    "Date" => 'date',
                    "ID" => 'ID',
                    "Title" => 'title',
                    "Random" => 'rand'
                ),
                "group" => "General",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Order Type", "bnm_vc"),
                "param_name" => "order",
                "value" => array(
                    "Select" => "",
                    "Ascending" => 'ASC',
                    "Descending" => 'DESC'
                ),
                "group" => "General",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Custom Post Filter", "bnm_vc"),
                "param_name" => "filter_type",
                "value" => array(
                    "Default ( Posts Marked as breaking )" => "",
                    "Only header ticker posts" => '1',
                    "Only footer ticker posts" => '2',
                    "Only widget ticker posts" => '3',
                    "Display tweets" => 'tweets',
                    "Display categories posts" => 'category',
                    "Display tags posts" => 'tags',
                ),
                "group" => "Filters",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => "bnm_cat",
                "value" => "",
                "heading" => __("Categories", "bnm_vc"),
                "param_name" => "categoriess",
                "description" => __("Just drag and drop your required categories in to right box.", "bnm_vc"),
                "group" => "Filters",
                "dependency" => array('element' => "filter_type", 'value' => array('category'))
            ),
            array(
                "type" => "bnm_tags",
                "value" => "",
                "heading" => __("Tags", "bnm_vc"),
                "param_name" => "tags",
                "description" => __("Just drag and drop your required tags in to right box.", "bnm_vc"),
                "group" => "Filters",
                "dependency" => array('element' => "filter_type", 'value' => array('tags'))
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Select Theme", "bnm_vc"),
                "param_name" => "theme",
                "value" => $bnm_ticker_themes,
                "group" => "Themes",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Ticker background', 'bnm_vc'),
                "param_name" => "ticbg",
                "value" => "#F9F9F9",
                "description" => __('Set text color for pricing box content.', 'bnm_vc'),
                "group" => __('Themes', 'bnm_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Text background', 'bnm_vc'),
                "param_name" => "tbg",
                "value" => "#3C3C3C",
                "description" => __('Set text color for pricing box content.', 'bnm_vc'),
                "group" => __('Themes', 'bnm_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Title Text color', 'bnm_vc'),
                "param_name" => "tfc",
                "value" => "#FFFFFF",
                "description" => __('Set text color for pricing box content.', 'bnm_vc'),
                "group" => __('Themes', 'bnm_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Post Text background', 'bnm_vc'),
                "param_name" => "pfc",
                "value" => "#3C3C3C",
                "description" => __('Set text color for pricing box content.', 'bnm_vc'),
                "group" => __('Themes', 'bnm_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Post Text color', 'bnm_vc'),
                "param_name" => "pfhc",
                "value" => "#FFFFFF",
                "description" => __('Set text color for pricing box content.', 'bnm_vc'),
                "group" => __('Themes', 'bnm_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => "colorpicker",
                "heading" => __('Date Text color', 'bnm_vc'),
                "param_name" => "date_font_color",
                "value" => "#FFFFFF",
                "description" => __('Set text color for pricing box content.', 'bnm_vc'),
                "group" => __('Themes', 'bnm_vc'),
                "dependency" => array('element' => "theme", 'value' => array('custom'))
            ),
            array(
                "type" => 'checkbox',
                "heading" => __('Hide Navigation Button?', 'bnm_vc'),
                "param_name" => "btn_show",
                "group" => __('Navigation', 'bnm_vc'),
                "description" => "",
                "value" => array(__('Hide please!', 'bnm_vc') => '0')
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Navigation Icon", "bnm_vc"),
                "param_name" => "next_prev_btn_icon",
                "value" => array(
                    "Select" => "",
                    "Arrow" => 'arrow',
                    "Angle" => 'angle',
                    "Caret" => 'caret',
                    "Chevron" => 'chevron',
                    "Chevron circle" => 'chevron-cricle'
                ),
                "group" => "Navigation",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation Type", "bnm_vc"),
                "param_name" => "atype",
                "value" => array(
                    'Select' => '',
                    'Bounce' => 'bounce',
                    'Fade' => 'fade',
                    'Fade left' => 'fadeleft',
                    'Fade right' => 'faderight',
                    'Flash' => 'flash',
                    'Flipx' => 'flipx',
                    'Light speed' => 'lightspeed',
                    'Pulse' => 'pulse',
                    'Roll' => 'roll',
                    'Rotate' => 'rotate',
                    'Shake' => 'shake',
                    'Slide' => 'slide',
                    'Slideup' => 'slideup',
                    'Swing' => 'swing',
                    'Tada' => 'tada',
                    'Wobble' => 'wobble'
                ),
                "group" => "Animation",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => __("Animation Speed", "bnm_vc"),
                "param_name" => "atype",
                "value" => array(
                    "Select" => "",
                    "Fast" => '5000',
                    "Medium" => '7000',
                    "Slow" => '15000'
                ),
                "group" => "Animation",
                "description" => __("", "bnm_vc")
            ),
            array(
                "type" => 'checkbox',
                "heading" => __('RTL Mode?', 'bnm_vc'),
                "param_name" => "rtl",
                "group" => __('Settings', 'bnm_vc'),
                "description" => "",
                "value" => array(__('Enable', 'bnm_vc') => '1')
            ),
            array(
                "type" => 'checkbox',
                "heading" => __('Show Date?', 'bnm_vc'),
                "param_name" => "showdate",
                "group" => __('Settings', 'bnm_vc'),
                "description" => "",
                "value" => array(__('Enable', 'bnm_vc') => '1')
            ),
            array(
                "type" => 'checkbox',
                "heading" => __('Show Separator?', 'bnm_vc'),
                "param_name" => "ps",
                "group" => __('Settings', 'bnm_vc'),
                "description" => "",
                "value" => array(__('Enable', 'bnm_vc') => '1')
            )
        )
    );

    vc_map($settings);


    /*------------------------------ Start Custom Fields For BNM ---------------------------------*/

    if (function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('bnm_cat', 'cb_bnm_cat_field', BNM_VC_PLUGIN_DIR . '/assets/scripts/admin.js');
    }

    // Function generate param type "number"
    function cb_bnm_cat_field($settings, $value)
    {

        //    $dependency = vc_generate_dependencies_attributes($settings);
        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $type = isset($settings['type']) ? $settings['type'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';

        if (!empty($value)) {

            $explode_value = explode(',', $value);
        } else {

            $explode_value = [];
        }

        $bnm_category_args = array(
            'taxonomy' => 'category',
            'hide_empty' => 1,
            'orderby' => 'title',
            'order' => 'ASC',
            'suppress_filters' => FALSE
        );

        $bnm_categories = get_categories($bnm_category_args);

        $parent_list = [];

        foreach ($bnm_categories as $category) :

            $parent_list[$category->slug] = $category->name;

        endforeach;

        $selected_list = [];

        // Now we pick those array data which index is cat-1 and cat-2

        if (count($explode_value) > 0) {

            foreach ($explode_value as $key => $value) {

                if (in_array($value, array_keys($parent_list))) {
                    //                echo $parent_list[$value];
                    $selected_list[$value] = $parent_list[$value];
                    //                echo "<br>";
                    unset($parent_list[$value]);
                }
            }
        }

        $parent_list_string = '<ul id="sortable1" class="connectedSortable bnm_connected list">';

        foreach ($parent_list as $key => $value) :
            $parent_list_string .= '<li data-value="' . $key . '">' . $value . '</li>';
        endforeach;

        $parent_list_string .= '</ul>';

        $selected_list_string = '<ul id="sortable2" class="connectedSortable bnm_connected list bnm_cat">';

        foreach ($selected_list as $key => $value) :
            $selected_list_string .= '<li data-value="' . $key . '">' . $value . '</li>';
        endforeach;

        $selected_list_string .= '</ul>';
        $output = "";

        $output .= '<section id="bnm_connected">
                        ' . $parent_list_string . '
                        ' . $selected_list_string . '
                   </section>';

        $output .= '<input type="hidden" class="wpb_vc_param_value wpbc ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';

        return $output;
    }

    // Generate param type "kb_tags"

    if (function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('bnm_tags', 'cb_bnm_tags_field', BNM_VC_PLUGIN_DIR . '/assets/scripts/admin.js');
    }

    // Function generate param type "number"
    function cb_bnm_tags_field($settings, $value)
    {

        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $type = isset($settings['type']) ? $settings['type'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';

        if (!empty($value)) {

            $explode_value = explode(',', $value);
        } else {

            $explode_value = [];
        }

        $bnm_tags_args = [
            'hide_empty' => 0,
            'orderby' => 'ID',
            'order' => 'ASC'
        ];

        $bnm_tags = get_tags($bnm_tags_args);

        $parent_list = [];

        foreach ($bnm_tags as $tag) :

            $parent_list[$tag->slug] = $tag->name;

        endforeach;

        $selected_list = [];

        // Now we pick those array data which index is cat-1 and cat-2

        if (count($explode_value) > 0) {

            foreach ($explode_value as $key => $value) {

                if (in_array($value, array_keys($parent_list))) {

                    $selected_list[$value] = $parent_list[$value];

                    unset($parent_list[$value]);
                }
            }
        }

        $parent_list_string = '<ul id="sortable1" class="connectedSortable bnm_connected list">';

        foreach ($parent_list as $key => $value) :
            $parent_list_string .= '<li data-value="' . $key . '">' . $value . '</li>';
        endforeach;

        $parent_list_string .= '</ul>';

        $selected_list_string = '<ul id="sortable2" class="connectedSortable bnm_connected list bnm_tags">';

        foreach ($selected_list as $key => $value) :
            $selected_list_string .= '<li data-value="' . $key . '">' . $value . '</li>';
        endforeach;

        $selected_list_string .= '</ul>';
        $output = "";

        $output .= '<section id="bnm_connected">
                        ' . $parent_list_string . '
                        ' . $selected_list_string . '
                   </section>';

        $output .= '<input type="hidden" class="wpb_vc_param_value wpbc ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" />';

        return $output;
    }

    //    Generate param type "number"
    if (function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('number', 'bnm_number_field');
    }

    // Function generate param type "number"
    function bnm_number_field($settings, $value)
    {
        //        $dependency = vc_generate_dependencies_attributes($settings);
        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $type = isset($settings['type']) ? $settings['type'] : '';
        $min = isset($settings['min']) ? $settings['min'] : '';
        $max = isset($settings['max']) ? $settings['max'] : '';
        $suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';
        $output = "";
        $output .= '<input type="number" min="' . $min . '" max="' . $max . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="' . $value . '" style="max-width:100px; margin-right: 10px;" />' . $suffix;
        return $output;
    }

    //    Generate param type "hidden"
    if (function_exists('vc_add_shortcode_param')) {
        vc_add_shortcode_param('hidden', 'bnm_hidden_field', BNM_VC_PLUGIN_DIR . '/assets/scripts/admin.js');
    }

    // Function generate param type "hidden"
    function bnm_hidden_field($settings, $value)
    {

        $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
        $type = isset($settings['type']) ? $settings['type'] : '';
        $class = isset($settings['class']) ? $settings['class'] : '';
        $output = '<select name="' . $param_name . '" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '">';
        $output .= '<option value="1" selected=selected>Inline</option>';
        $output .= '</select>';
        return $output;
    }

    /*------------------------------ End Custom Fields For BNM ---------------------------------*/

    // if (class_exists("WPBakeryShortCode")) {

    // Class Name should be WPBakeryShortCode_Your_Short_Code
    // See more in vc_composer/includes/classes/shortcodes/shortcodes.php
    // bwl_bnm is important parameter. It must match with "base" => "bwl_bnm" name

    // class WPBakeryShortCode_bwl_bnm extends WPBakeryShortCode
    // {

    //     public function __construct($settings)
    //     {

    //         parent::__construct($settings); // !Important to call parent constructor to active all logic for shortcode.
    //     }
    //     // Register scripts and styles there (for preview and frontend editor mode).
    //     public function jsCssScripts()
    //     {

    //         // wp_register_style('bnm-vc-admin-style', BNM_VC_PLUGIN_DIR . 'admin/css/bnm-vc-admin-style.css', false, BNM_VC_PLUGIN_VERSION, false);
    //         // wp_enqueue_style('bnm-vc-admin-style');

    //         // wp_register_script('bnm-admin-vc-addon-script', BNM_VC_PLUGIN_DIR . 'admin/js/bnm-vc-custom.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'jquery-ui-sortable'), BNM_VC_PLUGIN_VERSION, TRUE);
    //         // wp_enqueue_script('bnm-admin-vc-addon-script');

    //         // wp_register_style('bnm-sort-style', BNM_VC_PLUGIN_DIR . 'admin/css/bnm-sort.css', false, BNM_VC_PLUGIN_VERSION, false);
    //         // wp_enqueue_style('bnm-sort-style');

    //         //                wp_register_script('test_element', plugins_url('assets/js/test_element.js', __FILE__), array('jquery'), time(), false);
    //         //                wp_register_style('test_element_iframe', plugins_url('assets/front_enqueue_iframe_css.css', __FILE__));

    //     }
    // }
    // } // End Class


}
