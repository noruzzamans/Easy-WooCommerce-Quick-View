<?php

require_once EASY_WOO_QUICK_VIEW_PATH . 'includes/backend/class-easy-woocommerce-quick-settings.php';

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

    public function __construct() {

        $settings       = Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_position  = isset($settings['ewqv_btn_position']) ? $settings['ewqv_btn_position'] : '';
        
        if ( ! empty( $ewqv_position ) ) {
            switch ($ewqv_position) {
                case 'over_product_image':
                    add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 9 );
                    break;
                case 'over_product_image_hover':
                    add_action( 'woocommerce_before_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 10);
                    break;
                case 'after_title':
                    add_action( 'woocommerce_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
                case 'after_rating':
                    add_action( 'woocommerce_after_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 6 );
                    break;
                case 'after_price':
                    add_action( 'woocommerce_after_shop_loop_item_title', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
                case 'before_add_to_cart':
                    add_action( 'woocommerce_after_shop_loop_item', [ $this, 'add_easy_woo_quick_view_button' ], 9 );
                    break;
                case 'after_add_to_cart':
                    add_action( 'woocommerce_after_shop_loop_item', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
                default:
                    add_action( 'woocommerce_after_shop_loop_item', [ $this, 'add_easy_woo_quick_view_button' ], 11 );
                    break;
            }
        }   

	}

    public function add_easy_woo_quick_view_button(){
        $settings       = Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_switch    = isset( $settings['ewqv_switch'] ) ? $settings['ewqv_switch'] : false;
        if($ewqv_switch){
            echo  $this->add_easy_woo_quick_view_buton_html();
        }

    }

    public function add_easy_woo_quick_view_buton_html() {
        $settings       = Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_btn_label = $settings['ewqv_btn_label'];

        global $product;
        $label          = $ewqv_btn_label;
        $product_id     = $product->get_id();
        
        return '<button id="easy_woo_quick_view_btn" class="easy_woo_quick_view_btn button" data-product-id="'. $product_id .'">'. $label .'</button>';
    }
}

Easy_WooCommerce_Quick_View_Btn::get_instance();