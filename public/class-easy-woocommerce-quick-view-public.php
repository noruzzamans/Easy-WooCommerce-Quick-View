<?php

require_once EASY_WOO_QUICK_VIEW_PATH . 'includes/backend/class-easy-woocommerce-quick-settings.php';

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/noruzzamanrubel
 * @since      1.0.0
 *
 * @package    Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Woocommerce_Quick_View
 * @subpackage Easy_Woocommerce_Quick_View/public
 * @author     Noruzzaman <noruzzamanrubel@gmail.com>
 */
class Easy_Woocommerce_Quick_View_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		$settings  							= Easy_WooCommerce_Quick_View_Settings::get_settings();
        $ewqv_btn_border_radius_top        	= isset($settings['ewqv_btn_border_radius_top']) ? $settings['ewqv_btn_border_radius_top'] : '';
        $ewqv_btn_border_radius_right      	= isset($settings['ewqv_btn_border_radius_right']) ? $settings['ewqv_btn_border_radius_right'] : '';
        $ewqv_btn_border_radius_bottom     	= isset($settings['ewqv_btn_border_radius_bottom']) ? $settings['ewqv_btn_border_radius_bottom'] : '';
        $ewqv_btn_border_radius_left       	= isset($settings['ewqv_btn_border_radius_left']) ? $settings['ewqv_btn_border_radius_left'] : '';

		$ewqv_modal_z_index					= isset($settings['ewqv_modal_z_index']) ? $settings['ewqv_modal_z_index'] : '';
		$ewqv_close_btn_switch				= isset($settings['ewqv_close_btn_switch']) ? $settings['ewqv_close_btn_switch'] : '';
		$ewqv_review_link_switch			= isset($settings['ewqv_review_link_switch']) ? $settings['ewqv_review_link_switch'] : '';

		$ewqv_cart_btn_border_radius_top    = isset($settings['ewqv_content_add_to_cart_btn_border_radius_top']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_top'] : '';
        $ewqv_cart_btn_border_radius_right  = isset($settings['ewqv_content_add_to_cart_btn_border_radius_right']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_right'] : '';
        $ewqv__cart_btn_border_radius_bottom= isset($settings['ewqv_content_add_to_cart_btn_border_radius_bottom']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_bottom'] : '';
        $ewqv_cart_btn_border_radius_left   = isset($settings['ewqv_content_add_to_cart_btn_border_radius_left']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_left'] : '';

        $ewqv_scrollbar_bg   			    = isset($settings['ewqv_scrollbar_bg']) ? $settings['ewqv_scrollbar_bg'] : '';
		
        $ewqv_content_variation_description = isset($settings['ewqv_content_variation_description']) ? $settings['ewqv_content_variation_description'] : '';


        ?>
        <style>
            a.easy_woo_quick_view_btn {
                transition: ease-in-out .5s !important;
            }
            a.easy_woo_quick_view_btn {
                border-top-left-radius:     <?php echo esc_html($ewqv_btn_border_radius_top); ?>px!important;
                border-top-right-radius:    <?php echo esc_html($ewqv_btn_border_radius_right); ?>px!important;
                border-bottom-right-radius: <?php echo esc_html($ewqv_btn_border_radius_bottom); ?>px!important;
                border-bottom-left-radius:  <?php echo esc_html($ewqv_btn_border_radius_left); ?>px!important;
            }
			.mfp-bg.mfp-ewqv {
				<?php if(array_key_exists('ewqv_modal_z_index', $settings)): ?>
				z-index: <?php echo esc_html($settings['ewqv_modal_z_index']);?>!important;
				<?php endif; ?>
            }
			.easy-wqv-product-modal .mfp-close {
				<?php if($ewqv_close_btn_switch == '0') : ?>
					display: none;
				<?php endif; ?>	
			}
			.easy-wqv-summary-content::-webkit-scrollbar-thumb {
				background: <?php echo $ewqv_scrollbar_bg;?>!important;
			}
			.easy-wqv-summary-content .woocommerce-product-rating .woocommerce-review-link {
				<?php if($ewqv_review_link_switch == '0') : ?>
					display: none;
				<?php endif; ?>	
			}
			.easy-wqv-summary-content .woocommerce-variation-description {
				<?php if($ewqv_content_variation_description == '0') : ?>
					display: none;
				<?php endif; ?>	
			}
			.easy-wqv-summary-content .cart .single_add_to_cart_button {
				transition: ease-in-out .5s !important;
                border-top-left-radius:     <?php echo esc_html($ewqv_cart_btn_border_radius_top); ?>px!important;
                border-top-right-radius:    <?php echo esc_html($ewqv_cart_btn_border_radius_right); ?>px!important;
                border-bottom-right-radius: <?php echo esc_html($ewqv__cart_btn_border_radius_bottom); ?>px!important;
                border-bottom-left-radius:  <?php echo esc_html($ewqv_cart_btn_border_radius_left); ?>px!important;
			}
        </style>
        <?php

		wp_enqueue_style( $this->plugin_name. '-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name. '-slick', plugin_dir_url( __FILE__ ) . 'css/slick.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name.'-magnific', plugin_dir_url( __FILE__ ) . 'css/easy-woocommerce-quick-view-public-magnific.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/easy-woocommerce-quick-view-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'wc-add-to-cart-variation' );
		wp_enqueue_script( $this->plugin_name.'-slick', plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-public-slick.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name.'-magnific', plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-public-magnific.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/easy-woocommerce-quick-view-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script($this->plugin_name, 'easy_woocommerce_quick_view', array(
			'ajax_url' => admin_url('admin-ajax.php'),
			'nonce'    => wp_create_nonce( 'easy_woocommerce_quick_view_nonce' ),
		));
		
		$settings = Easy_WooCommerce_Quick_View_Settings::get_settings();
		$ewqv_position = $settings['ewqv_btn_position'];
		if($ewqv_position){
			wp_localize_script($this->plugin_name, 'ewqv_btn', array(
				'ewqv_btn_position'    => $ewqv_position,
			));
		}
	}

}
