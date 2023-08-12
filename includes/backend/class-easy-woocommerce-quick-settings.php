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
            'title'  => __( 'General Settings', 'easy-woo-quick-view' ),
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
                    'title'    => __( 'Button Position', 'easy-woo-quick-view' ),
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
        
            )
            ) );
        
            // Modal Settings
            CSF::createSection( $prefix, array(
            'name'   => 'ewqv_modal_settings',
            'title'  => __( 'Modal Settings', 'easy-woo-quick-view' ),
            'fields' => array(
                array(
                    'id'          => 'ewqv_bg_color',
                    'type'        => 'color',
                    'title' => __( 'Background Color', 'easy-woo-quick-view' ),
                    'output_mode' => 'background-color',
                    'default' => '#ffffff'
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