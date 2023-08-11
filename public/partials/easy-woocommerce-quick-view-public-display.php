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

	}

}

Easy_Woocommerce_Quick_View_Public_Display::get_instance();