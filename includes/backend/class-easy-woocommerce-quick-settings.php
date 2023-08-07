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
            'nav'              => 'inline',
            'theme'            => 'light',
            'class'            => 'easy_woo_quick_view_framework',
            'menu_position'    => 59,
            'framework_title'  => __( 'Easy WooCommerce Quick View Settings', 'easy-woo-quick-view' ),
            ) );
        
            // Create a sub-tab
            CSF::createSection( $prefix, array(
            'name'   => 'quick_view_btn_settings',
            'title'  => __( 'General', 'woo-quickview' ),
            'icon'   => 'fa fa-wrench',
            'fields' => array(
                array(
                'id'    => 'opt-text',
                'type'  => 'text',
                'title' => 'Simple Text',
                ),
        
            )
            ) );
        
            // Create a sub-tab
            CSF::createSection( $prefix, array(
            'name'   => 'popup_settings',
            'title'  => __( 'Modal', 'woo-quickview' ),
            'icon'   => 'fas fa-external-link-alt',
            'fields' => array(
        
                // A textarea field
                array(
                'id'    => 'opt-textarea',
                'type'  => 'textarea',
                'title' => 'Simple Textarea',
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