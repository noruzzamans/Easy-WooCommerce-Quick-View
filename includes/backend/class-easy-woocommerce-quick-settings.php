<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Easy_WooCommerce_Quick_View_Settings {

    /**
     * Plugin settings prefix.
     *
     * @var string
     */
    public static $prefix = EASY_WOO_QUICK_VIEW_SLUG;

    /**
     * The single instance of the class.
     */
    protected static $instance;

    /**
     * Returns single instance of the class
     */
    public static function get_instance() {
        if ( is_null( self::$instance ) ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function __construct() {

	}

    public function register_easy_woo_quick_view_options_settings(){

            // Set a unique slug-like ID
            $prefix = EASY_WOO_QUICK_VIEW_SLUG;
        
            // Create options
            CSF::createOptions( $prefix, array(
            'menu_title' => 'Easy Woo Quick View',
            'menu_slug'  => 'easy-woo-quick-view',
            'menu_type'        => 'menu',
            'ajax_save'        => true,
            'show_reset_all'   => false,
            'show_search'      => false,
            'show_footer'      => false,
            'show_all_options' => false,
            'show_sub_menu'    => false,
            'show_reset_section'=> false,
            'nav'              => 'inline',
            'theme'            => 'light',
            'class'            => 'easy_woo_quick_view_framework',
            'menu_position'    => 59,
            'framework_title'  => __( 'Easy WooCommerce Quick View Settings', 'easy-woo-quick-view' ),
            // footer
            'footer_text'   => '',
            'footer_after'  => '',
            'footer_credit' => __( 'If you find <strong>Easy WooCommerce Quick View</strong> helpful, kindly consider leaving a <a class="easy_woo_footer_credit" href="https://wordpress.org/plugins/easy-woo-quick-view/#reviews" target="_blank">★★★★★</a> rating. Your review holds significant value for us, aiding in our continuous growth and improvement.', 'easy-woo-quick-view' ),
            ) );
        
            // General Settings
            CSF::createSection( $prefix, array(
            'name'   => 'ewqv_general_settings',
            'title'  => __( 'Button Settings', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'id'    => 'ewqv_switch',
                    'type'  => 'switcher',
                    'default' => true,
                    'output'  => '.easy_woo_quick_view_btn',
                    'title'  => __( 'Enable Quick View', 'easy-woo-quick-view' ),
                ), 
                array(
                    'id'       => 'ewqv_btn_position',
                    'type'     => 'select',
                    'title'    => __( 'Position', 'easy-woo-quick-view' ),
                    'subtitle' => __( 'Choose the placement of the quick view button.', 'easy-woo-quick-view' ),
                    'options'  => array(
                        'over_product_image'        => __( 'Over Product Image', 'easy-woo-quick-view' ),
                        'over_product_image_hover'        => __( 'Over Product Image Hover', 'easy-woo-quick-view' ),
                        'after_title'        => __( 'After Title', 'easy-woo-quick-view' ),
                        'after_rating'        => __( 'After Rating', 'easy-woo-quick-view' ),
                        'after_price'        => __( 'After Price', 'easy-woo-quick-view' ),
                        'before_add_to_cart'        => __( 'Before Add to Cart button', 'easy-woo-quick-view' ),
                        'after_add_to_cart'         => __( 'After Add to Cart button', 'easy-woo-quick-view' ),
                    ),
                    'default'  => 'after_add_to_cart',
                ),
                array(
                    'id'      => 'ewqv_btn_label',
                    'type'    => 'text',
                    'title'   => __( 'Text', 'easy-woo-quick-view' ),
                    'default' => __( 'Quick View', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'               => 'ewqv_btn_font_family',
                    'title'            => __( 'Typography', 'easy-woo-quick-view' ),
                    'type'             => 'typography',
                    'output'           => 'a.easy_woo_quick_view_btn',
                    'output_important' => true,
                    'font_family'      => true,
                    'font_weight'      => true,
                    'subset'           => true,
                    'font_style'       => true,
                    'font_size'        => true,
                    'line_height'      => true,
                    'letter_spacing'   => true,
                    'text_align'       => true,
                    'text_transform'   => true,
                    'color'            => false,
                    'default'          => array(
                        'font-family' => '',
                        'font-size'   => '16',
                        'font-weight' => '500',
                        'unit'        => 'px',
                        'type'        => 'google',
                    ),
                ),
                array(
                    'id'      => 'ewqv_btn_bg_color',
                    'type'        => 'color',
                    'title' => __( 'Background Color', 'easy-woo-quick-view' ),
                    'output_mode' => 'background-color',
                    'output_important' => true,
                    'output' => 'a.easy_woo_quick_view_btn',
                    'default' => '#eb7a61'
                ),
                array(
                    'id'      => 'ewqv_btn_bg_hover_color',
                    'type'        => 'color',
                    'title' => __( 'Background Hover Color', 'easy-woo-quick-view' ),
                    'output_mode' => 'background-color',
                    'output_important' => true,
                    'output' => 'a.easy_woo_quick_view_btn:hover',
                    'default' => '#15c7a4'
                ),
                array(
                    'id'      => 'ewqv_btn_color',
                    'type'        => 'color',
                    'title' => __( 'Text Color', 'easy-woo-quick-view' ),
                    'output_important' => true,
                    'output' => 'a.easy_woo_quick_view_btn',
                    'default' => '#ffffff'
                ),
                array(
                    'id'      => 'ewqv_btn_hover_color',
                    'type'        => 'color',
                    'title' => __( 'Text Hover Color', 'easy-woo-quick-view' ),
                    'output_important' => true,
                    'output' => 'a.easy_woo_quick_view_btn:hover',
                    'default' => '#ffffff'
                ),
                array(
                    'id'               => 'ewqv_btn_padding',
                    'type'             => 'spacing',
                    'title'            => __( 'Padding', 'easy-woo-quick-view' ),
                    'output'           => 'a.easy_woo_quick_view_btn',
                    'output_mode'      => 'padding',
                    'output_important' => true,
                    'default'          => array(
                        'top'    => '10',
                        'right'  => '16',
                        'bottom' => '10',
                        'left'   => '16',
                        'unit'   => 'px',
                    ),
                ),
                array(
                    'id'               => 'ewqv_btn_margin',
                    'type'             => 'spacing',
                    'title'            => __( 'Margin', 'easy-woo-quick-view' ),
                    'output'           => 'a.easy_woo_quick_view_btn',
                    'output_mode'      => 'margin',
                    'output_important' => true,
                    'default'          => array(
                        'top'    => '16',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                    ),
                ),
                array(
                    'id'               => 'ewqv_btn_border',
                    'type'             => 'border',
                    'title'            => __( 'Border', 'easy-woo-quick-view' ),
                    'output'           => 'a.easy_woo_quick_view_btn',
                    'output_important' => true,
                    'default'          => array(
                        'style'  => 'solid',
                        'color'  => '#ffffff',
                        'top'    => '0',
                        'right'  => '0',
                        'bottom' => '0',
                        'left'   => '0',
                        'unit'   => 'px',
                    ),
                ),
                array(
                    'type'    => 'subheading',
                    'content' => __( 'Border radius', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_top',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => __( 'Top', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_right',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => __( 'Right', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_bottom',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => __( 'Bottom', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'      => 'ewqv_btn_border_radius_left',
                    'type'    => 'number',
                    'unit'    => 'px',
                    'default' => '0',
                    'title'   => __( 'Left', 'easy-woo-quick-view' ),
                ),                            
            )
            ) );
        
            // Modal Settings
            CSF::createSection( $prefix, array(
            'name'   => 'ewqv_modal_settings',
            'title'  => __( 'Modal Settings', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => __( 'Global Setting', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_modal_width_height',
                    'type'              => 'dimensions',
                    'title'             => __( 'Modal Size', 'easy-woo-quick-view' ),
                    'subtitle'          => __( 'For best results, use 2:1 width-to-height ratio.', 'easy-woo-quick-view' ),
                    'output'            => '.easy-wqv-product-modal',
                    'output_important'  => true,
                    'default'           => array(
                      'width'           => '900',
                      'height'          => '450',
                      'unit'            => 'px',
                    ),
                ),
                array(
                    'id'                => 'ewqv_modal_z_index',
                    'type'              => 'number',
                    'title'             => __( 'Modal Z-Index', 'easy-woo-quick-view' ),
                    'default'           => 999999
                ),
                array(
                    'id'                => 'ewqv_modal_bg_color',
                    'type'              => 'color',
                    'title'             => __( 'Background Color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal',
                    'default'           => '#ffffff'
                ),
                array(
                    'id'                => 'ewqv_modal_bg_overlay',
                    'type'              => 'color',
                    'title'             => __( 'Background Overlay Color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.mfp-bg.mfp-ewqv',
                    'default'           => '#0b0b0b'
                ),
                array(
                    'type'              => 'subheading',
                    'content'           => __( 'Close Button Setting', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch',
                    'type'              => 'switcher',
                    'default'           => true,
                    'title'             => __( 'Button Show/Hide', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_bg',
                    'type'              => 'color',
                    'title'             => __( 'Button Background Color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close',
                    'default'           => 'transparent'
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_bg_hover',
                    'type'              => 'color',
                    'title'             => __( 'Button Background Hover Color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close:hover',
                    'default'           => '#eb7a61'
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_color',
                    'type'              => 'color',
                    'title'             => __( 'Button Icon Color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close',
                    'default'           => '#333'
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_hover_color',
                    'type'              => 'color',
                    'title'             => __( 'Button Icon Hover Color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close:hover',
                    'default'           => '#fff'
                ),
                array(
                    'id'                => 'ewqv_modal_content_padding',
                    'type'              => 'spacing',
                    'title'             => __( 'Content Wrapper Padding', 'easy-woo-quick-view' ),
                    'output'            => '.easy-wqv-summary-wrapper',
                    'output_mode'       => 'padding',
                    'output_important'  => true,
                    'default'           => array(
                        'top'    => '20',
                        'right'  => '20',
                        'bottom' => '20',
                        'left'   => '20',
                        'unit'   => 'px',
                    ),
                ),              
            )
            ) );

            // Thumbnails Settings
            CSF::createSection( $prefix, array(
                'name'   => 'ewqv_thumbnails_settings',
                'title'  => __( 'Thumbnails Settings', 'easy-woo-quick-view' ),
                'fields' => array(
             
                )
            ) );
            // Content Settings
            CSF::createSection( $prefix, array(
                'name'   => 'ewqv_content_settings',
                'title'  => __( 'Content Settings', 'easy-woo-quick-view' ),
                'fields' => array(
                    array(
                        'id'                => 'ewqv_modal_content_padding',
                        'type'              => 'spacing',
                        'title'             => __( 'Content Wrapper Padding', 'easy-woo-quick-view' ),
                        'output'            => '.easy-wqv-summary-wrapper',
                        'output_mode'       => 'padding',
                        'output_important'  => true,
                        'default'           => array(
                            'top'    => '20',
                            'right'  => '20',
                            'bottom' => '20',
                            'left'   => '20',
                            'unit'   => 'px',
                        ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Product Info Show/Hide Options', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_title_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Title', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_rating_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Rating', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_Price_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Price', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_excerpt_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Excerpt', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_add_to_cart_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Add To Cart', 'easy-woo-quick-view' ),
                    ), 
                    array(
                        'id'                => 'ewqv_meta_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Meta', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_social_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Social Share', 'easy-woo-quick-view' ),
                    ),        
                )
            ) );
  
    }

    /**
     * Return plugin all settings.
     *
     * @return string|array Settings values.
     */
    public static function get_settings() {
        return get_option( Easy_WooCommerce_Quick_View_Settings::$prefix );
    }

}