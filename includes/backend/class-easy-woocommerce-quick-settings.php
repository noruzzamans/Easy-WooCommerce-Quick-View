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
            'title'  => __( 'Button', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'id'    => 'ewqv_switch',
                    'type'  => 'switcher',
                    'default' => true,
                    'output'  => '.easy_woo_quick_view_btn',
                    'title'  => __( 'Enable quick view', 'easy-woo-quick-view' ),
                ), 
                array(
                    'id'       => 'ewqv_btn_position',
                    'type'     => 'select',
                    'title'    => __( 'Position', 'easy-woo-quick-view' ),
                    'subtitle' => __( 'Choose the placement of the quick view button.', 'easy-woo-quick-view' ),
                    'options'  => array(
                        'over_product_image'        => __( 'Over product image', 'easy-woo-quick-view' ),
                        'over_product_image_hover'        => __( 'Over product image hover', 'easy-woo-quick-view' ),
                        'after_title'        => __( 'After title', 'easy-woo-quick-view' ),
                        'after_rating'        => __( 'After rating', 'easy-woo-quick-view' ),
                        'after_price'        => __( 'After price', 'easy-woo-quick-view' ),
                        'before_add_to_cart'        => __( 'Before add to cart button', 'easy-woo-quick-view' ),
                        'after_add_to_cart'         => __( 'After add to cart button', 'easy-woo-quick-view' ),
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
                    'id'            => 'ewqv_icon_switch',
                    'type'          => 'switcher',
                    'default'       => false,
                    'title'         => __( 'Enable icon', 'easy-woo-quick-view' ),
                    'desc'          => __( 'To display only the icon, remove the button text.', 'easy-woo-quick-view' ),
                ), 
                array(
                    'id'            => 'ewqv_btn_icon',
                    'type'          => 'icon',
                    'title'         => __( 'Icon', 'easy-woo-quick-view' ),
                    'default'       => 'far fa-eye',
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'                => 'ewqv_btn_icon_font_size',
                    'type'              => 'number',
                    'unit'              => 'px',
                    'title'             => __( 'Icon font size', 'boomdevs-toc' ),
                    'default'           => 16,
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'                => 'ewqv_btn_icon_font_color',
                    'type'              => 'color',
                    'title'             => __( 'Icon color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy_woo_quick_view_btn i',
                    'default'           => '#ffffff',
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'          => 'ewqv_btn_icon_select',
                    'type'        => 'select',
                    'title'       => __( 'Icon position', 'easy-woo-quick-view' ),
                    'options'     => array(
                      'before'  => 'Before',
                      'after'  => 'After',
                    ),
                    'default' => 'before',
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'            => 'ewqv_btn_icon_margin_right',
                    'type'          => 'spacing',
                    'title'         => __( 'Icon margin right', 'easy-woo-quick-view' ),
                    'output_mode'   => 'margin',
                    'top'           => false,
                    'bottom'        => false,
                    'right'         => true,
                    'left'          => false,
                    'default'  => array(
                        'right'  => '0',
                        'unit'   => 'px',
                    ),
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'            => 'ewqv_btn_icon_margin_left',
                    'type'          => 'spacing',
                    'title'         => __( 'Icon margin left', 'easy-woo-quick-view' ),
                    'output_mode'   => 'margin',
                    'top'           => false,
                    'bottom'        => false,
                    'right'         => false,
                    'left'          => true,
                    'default'  => array(
                        'left'  => '0',
                        'unit'   => 'px',
                    ),
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true')
                ),
                array(
                    'id'            => 'ewqv_icon_only_switch',
                    'type'          => 'switcher',
                    'default'       => false,
                    'title'         => __( 'Enable icon only', 'easy-woo-quick-view' ),
                    'dependency'    => array( 'ewqv_icon_switch', '==', 'true' )
                ),
                array(
                    'id'       => 'ewqv_icon_btn_style',
                    'type'     => 'select',
                    'title'    => __( 'Icon button style', 'easy-woo-quick-view' ),
                    'options'  => array(
                        'square'        => __( 'Square', 'easy-woo-quick-view' ),
                        'round'        => __( 'Round', 'easy-woo-quick-view' ),
                        'rounded_square'        => __( 'Rounded square', 'easy-woo-quick-view' ),
                    ),
                    'default'  => 'square',
                    'dependency'    => array( 'ewqv_icon_only_switch', '==', 'true' )
                ),
                array(
                    'id'         => 'ewqv_btn_align_position_top',
                    'type'       => 'number',
                    'unit'       => 'px',
                    'title'      => __( 'Top', 'boomdevs-toc' ),
                    'desc'       => __( 'Position top works when you select Over Product Image or Over Product Image options', 'easy-woo-quick-view' ),
                    'default'    => 0,
                ),
                array(
                    'id'         => 'ewqv_btn_align_position_top_left',
                    'type'       => 'number',
                    'unit'       => 'px',
                    'title'      => __( 'Top left', 'boomdevs-toc' ),
                    'desc'       => __( 'Position top left works when you select Over Product Image or Over Product Image options', 'easy-woo-quick-view' ),
                    'default'    => '',
                ),
                array(
                    'id'         => 'ewqv_btn_align_position_top_right',
                    'type'       => 'number',
                    'unit'       => 'px',
                    'title'      => __( 'Top right', 'boomdevs-toc' ),
                    'default'    => '',
                    'desc'       => __( 'Position top right works when you select Over Product Image or Over Product Image options', 'easy-woo-quick-view' ),
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
                    'title' => __( 'Background color', 'easy-woo-quick-view' ),
                    'output_mode' => 'background-color',
                    'output_important' => true,
                    'output' => '.easy_woo_quick_view_btn',
                    'default' => '#eb7a61'
                ),
                array(
                    'id'      => 'ewqv_btn_bg_hover_color',
                    'type'        => 'color',
                    'title' => __( 'Background hover color', 'easy-woo-quick-view' ),
                    'output_mode' => 'background-color',
                    'output_important' => true,
                    'output' => '.easy_woo_quick_view_btn:hover',
                    'default' => '#15c7a4'
                ),
                array(
                    'id'      => 'ewqv_btn_color',
                    'type'        => 'color',
                    'title' => __( 'Text color', 'easy-woo-quick-view' ),
                    'output_important' => true,
                    'output' => '.easy_woo_quick_view_btn',
                    'default' => '#ffffff'
                ),
                array(
                    'id'      => 'ewqv_btn_hover_color',
                    'type'        => 'color',
                    'title' => __( 'Text hover color', 'easy-woo-quick-view' ),
                    'output_important' => true,
                    'output' => '.easy_woo_quick_view_btn:hover',
                    'default' => '#ffffff'
                ),
                array(
                    'id'               => 'ewqv_btn_padding',
                    'type'             => 'spacing',
                    'title'            => __( 'Padding', 'easy-woo-quick-view' ),
                    'output'           => '.easy_woo_quick_view_btn',
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
                    'output'           => '.easy_woo_quick_view_btn',
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
                    'output'           => '.easy_woo_quick_view_btn',
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
                    'content' => __( 'Border Radius', 'easy-woo-quick-view' ),
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
            'title'  => __( 'Modal', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'type'    => 'subheading',
                    'content' => __( 'Global Setting', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_modal_width_height',
                    'type'              => 'dimensions',
                    'title'             => __( 'Modal size', 'easy-woo-quick-view' ),
                    'subtitle'          => __( 'For best results, use 2:1 width-to-height ratio.', 'easy-woo-quick-view' ),
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
                    'title'             => __( 'Background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal',
                    'default'           => '#ffffff'
                ),
                array(
                    'id'                => 'ewqv_modal_bg_overlay',
                    'type'              => 'color',
                    'title'             => __( 'Background overlay color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.mfp-bg.mfp-ewqv',
                    'default'           => '#0b0b0b'
                ),
                array(
                    'type'              => 'subheading',
                    'content'           => __( 'Close Button', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch',
                    'type'              => 'switcher',
                    'default'           => true,
                    'title'             => __( 'Button show/hide', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_bg',
                    'type'              => 'color',
                    'title'             => __( 'Button background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close',
                    'default'           => 'transparent'
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_bg_hover',
                    'type'              => 'color',
                    'title'             => __( 'Button background hover color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close:hover',
                    'default'           => '#eb7a61'
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_color',
                    'type'              => 'color',
                    'title'             => __( 'Button icon color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close',
                    'default'           => '#333'
                ),
                array(
                    'id'                => 'ewqv_close_btn_switch_hover_color',
                    'type'              => 'color',
                    'title'             => __( 'Button icon hover color', 'easy-woo-quick-view' ),
                    'output_important'  => true,
                    'output'            => '.easy-wqv-product-modal .mfp-close:hover',
                    'default'           => '#fff'
                ),
                array(
                    'type'              => 'subheading',
                    'content'           => __( 'Scrollbar', 'easy-woo-quick-view' ),
                ),
                array(
                    'id'                => 'ewqv_scrollbar_bg',
                    'type'              => 'color',
                    'title'             => __( 'Scrollbar background color', 'easy-woo-quick-view' ),
                    'output_mode'       => 'background',
                    'default'           => '#333333'
                ),     
            )
            ) );

            // Thumbnails Settings
            CSF::createSection( $prefix, array(
                'name'   => 'ewqv_thumbnails_settings',
                'title'  => __( 'Thumbnails', 'easy-woo-quick-view' ),
                'fields' => array(
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Slider', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_slider_dot_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Slider dot show/hide', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_slider_btn_icon_size',
                        'type'    => 'number',
                        'title'   => __( 'Slider icon size', 'easy-woo-quick-view' ),
                        'default' => 24,
                        'unit'    => 'px',
                    ),
                    array(
                        'id'      => 'ewqv_slider_btn_icon_color',
                        'type'    => 'color',
                        'title'   => __( 'Slider icon color', 'easy-woo-quick-view' ),
                        'default' => '#222'
                    ),
                    array(
                        'id'      => 'ewqv_slider_btn_icon_hover_color',
                        'type'    => 'color',
                        'title'   => __( 'Slider icon hover color', 'easy-woo-quick-view' ),
                        'default' => '#fff'
                    ),
                    array(
                        'id'      => 'ewqv_slider_btn_icon_bg_color',
                        'type'    => 'color',
                        'title'   => __( 'Slider icon background color', 'easy-woo-quick-view' ),
                        'output_mode'   => 'background-color',
                        'default' => 'transparent'
                    ),
                    array(
                        'id'      => 'ewqv_slider_btn_icon_bg_hover_color',
                        'type'    => 'color',
                        'title'   => __( 'Slider icon background hover color', 'easy-woo-quick-view' ),
                        'output_mode'   => 'background-color',
                        'default' => '#00000080'
                    ),
                    array(
                        'id'            => 'ewqv_slider_btn_left_icon',
                        'type'          => 'icon',
                        'title'         => __( 'Slider left icon', 'easy-woo-quick-view' ),
                        'default'       => 'fas fa-chevron-left',
                    ),
                    array(
                        'id'            => 'ewqv_slider_btn_right_icon',
                        'type'          => 'icon',
                        'title'         => __( 'Slider right icon', 'easy-woo-quick-view' ),
                        'default'       => 'fas fa-chevron-right',
                    ),
                )
            ) );
            // Content Settings
            CSF::createSection( $prefix, array(
                'name'   => 'ewqv_content_settings',
                'title'  => __( 'Content', 'easy-woo-quick-view' ),
                'fields' => array(
                    array(
                        'id'                => 'ewqv_modal_content_padding',
                        'type'              => 'spacing',
                        'title'             => __( 'Content wrapper padding', 'easy-woo-quick-view' ),
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
                        'content'           => __( 'Product info show/hide options', 'easy-woo-quick-view' ),
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
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Title', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_title_color',
                        'type'              => 'color',
                        'title'             => __( 'Color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .product_title',
                        'default'           => '#222'
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Review and Rating', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_review_link_switch',
                        'type'              => 'switcher',
                        'default'           => true,
                        'title'             => __( 'Review link', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_review_color',
                        'type'              => 'color',
                        'title'             => __( 'Review color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .woocommerce-product-rating .woocommerce-review-link',
                        'default'           => '#222'
                    ),
                    array(
                        'id'                => 'ewqv_content_rating_color',
                        'type'              => 'color',
                        'title'             => __( 'Rating color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .woocommerce-product-rating .star-rating',
                        'default'           => '#dd9933'
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Price', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_price_color',
                        'type'              => 'color',
                        'title'             => __( 'Color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .price',
                        'default'           => '#77a464'
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Excerpt', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_excerpt_color',
                        'type'              => 'color',
                        'title'             => __( 'Color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .woocommerce-product-details__short-description p',
                        'default'           => '#222'
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Variations Form ', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_variation_description',
                        'type'              => 'switcher',
                        'default'           => false,
                        'title'             => __( 'Variation description', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_variation_label_color',
                        'type'              => 'color',
                        'title'             => __( 'Label color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .variations_form .variations th',
                        'default'           => '#222'
                    ),
                    array(
                        'id'                => 'ewqv_content_variation_value_color',
                        'type'              => 'color',
                        'title'             => __( 'Value color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .variations_form .variations td select',
                        'default'           => '#222'
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Add To Cart', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_bg',
                        'type'              => 'color',
                        'title'             => __( 'Button background color', 'easy-woo-quick-view' ),
                        'output_mode'       => 'background',
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'default'           => '#222'
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_bg_hover',
                        'type'              => 'color',
                        'title'             => __( 'Button background hover color', 'easy-woo-quick-view' ),
                        'output_mode'       => 'background',
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button:hover',
                        'default'           => '#222'
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_text_color',
                        'type'              => 'color',
                        'title'             => __( 'Button text color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'default'           => '#ffffff'
                    ),
                    array(
                        'id'                => 'ewqv_content_add_to_cart_text_hover_color',
                        'type'              => 'color',
                        'title'             => __( 'Button text hover color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .cart .single_add_to_cart_button:hover',
                        'default'           => '#ffffff'
                    ),
                    array(
                        'id'               => 'ewqv_content_add_to_cart_btn_padding',
                        'type'             => 'spacing',
                        'title'            => __( 'Button padding', 'easy-woo-quick-view' ),
                        'output'           => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
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
                        'id'               => 'ewqv_content_add_to_cart_btn_margin',
                        'type'             => 'spacing',
                        'title'            => __( 'Button margin', 'easy-woo-quick-view' ),
                        'output'           => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
                        'output_mode'      => 'margin',
                        'output_important' => true,
                        'default'          => array(
                            'top'    => '0',
                            'right'  => '0',
                            'bottom' => '0',
                            'left'   => '0',
                            'unit'   => 'px',
                        ),
                    ),
                    array(
                        'id'               => 'ewqv_content_add_to_cart_btn_border',
                        'type'             => 'border',
                        'title'            => __( 'Button border', 'easy-woo-quick-view' ),
                        'output'           => '.easy-wqv-summary-content .cart .single_add_to_cart_button',
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
                        'content' => __( 'Button Border Radius', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_top',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => __( 'Top', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_right',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => __( 'Right', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_bottom',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => __( 'Bottom', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'      => 'ewqv_content_add_to_cart_btn_border_radius_left',
                        'type'    => 'number',
                        'unit'    => 'px',
                        'default' => '3',
                        'title'   => __( 'Left', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'type'              => 'subheading',
                        'content'           => __( 'Meta', 'easy-woo-quick-view' ),
                    ),
                    array(
                        'id'                => 'ewqv_content_meta_color',
                        'type'              => 'color',
                        'title'             => __( 'Text color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .product_meta, .easy-wqv-summary-content .product_meta .sku_wrapper, .easy-wqv-summary-content .product_meta .posted_in',
                        'default'           => '#222'
                    ),
                    array(
                        'id'                => 'ewqv_content_meta_link_color',
                        'type'              => 'color',
                        'title'             => __( 'Link color', 'easy-woo-quick-view' ),
                        'output_important'  => true,
                        'output'            => '.easy-wqv-summary-content .product_meta a',
                        'default'           => '#1e73be'
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