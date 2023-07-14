<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Easy_WooCommerce_Quick_View_Btn {

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

    /**
     * Register plugin frontend.
     */
	public function render_easy_woo_quick_view_btn(){
        add_action( 'woocommerce_after_shop_loop_item', array( $this, 'add_easy_woo_quick_view_button' ), 11 );
	}

    public function add_easy_woo_quick_view_button(){
        echo  $this->add_easy_woo_quick_view_buton_html();
    }

    public function add_easy_woo_quick_view_buton_html() {

        global $product;
        $label = 'Quick View';
        $product_id = $product->get_id();
        
        return '<a href="#" id="easy_woo_quick_view_btn" class="easy_woo_quick_view_btn button" data-product-id="'. $product_id .'">'. $label .'</a>';
    }
}