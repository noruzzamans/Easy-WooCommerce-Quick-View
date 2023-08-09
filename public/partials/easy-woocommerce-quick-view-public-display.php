<?php
require_once EASY_WOO_QUICK_VIEW_PATH . 'includes/backend/class-easy-woocommerce-quick-settings.php';

class Easy_Woocommerce_Quick_View_Public_Display {

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
        $settings  = Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_switch                           = $settings['ewqv_switch'];
        var_dump($ewqv_switch);
	}

}

Easy_Woocommerce_Quick_View_Public_Display::get_instance();