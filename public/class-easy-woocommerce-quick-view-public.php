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

        $ewqv_btn_align_position_top       		= isset($settings['ewqv_btn_align_position_top']) ? $settings['ewqv_btn_align_position_top'] : '';
        $ewqv_btn_align_position_top_left   	= isset($settings['ewqv_btn_align_position_top_left']) ? $settings['ewqv_btn_align_position_top_left'] : '';
        $ewqv_btn_align_position_top_right   	= isset($settings['ewqv_btn_align_position_top_right']) ? $settings['ewqv_btn_align_position_top_right'] : '';

		$ewqv_modal_width					= isset($settings['ewqv_modal_width_height']['width']) ? $settings['ewqv_modal_width_height']['width'] : '';
		$ewqv_modal_height					= isset($settings['ewqv_modal_width_height']['height']) ? $settings['ewqv_modal_width_height']['height'] : '';
		$ewqv_modal_z_index					= isset($settings['ewqv_modal_z_index']) ? $settings['ewqv_modal_z_index'] : '';
		$ewqv_close_btn_switch				= isset($settings['ewqv_close_btn_switch']) ? $settings['ewqv_close_btn_switch'] : '';
		$ewqv_review_link_switch			= isset($settings['ewqv_review_link_switch']) ? $settings['ewqv_review_link_switch'] : '';

		$ewqv_slider_dot_switch				= isset($settings['ewqv_slider_dot_switch']) ? $settings['ewqv_slider_dot_switch'] : '';
		$ewqv_slider_btn_icon_size			= isset($settings['ewqv_slider_btn_icon_size']) ? $settings['ewqv_slider_btn_icon_size'] : '';
		$ewqv_slider_btn_icon_color			= isset($settings['ewqv_slider_btn_icon_color']) ? $settings['ewqv_slider_btn_icon_color'] : '';
		$ewqv_slider_btn_icon_hover_color	= isset($settings['ewqv_slider_btn_icon_hover_color']) ? $settings['ewqv_slider_btn_icon_hover_color'] : '';
		$ewqv_slider_btn_icon_bg_color		= isset($settings['ewqv_slider_btn_icon_bg_color']) ? $settings['ewqv_slider_btn_icon_bg_color'] : '';
		$ewqv_slider_btn_icon_bg_hover_color= isset($settings['ewqv_slider_btn_icon_bg_hover_color']) ? $settings['ewqv_slider_btn_icon_bg_hover_color'] : '';

		$ewqv_cart_btn_border_radius_top    = isset($settings['ewqv_content_add_to_cart_btn_border_radius_top']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_top'] : '';
        $ewqv_cart_btn_border_radius_right  = isset($settings['ewqv_content_add_to_cart_btn_border_radius_right']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_right'] : '';
        $ewqv__cart_btn_border_radius_bottom= isset($settings['ewqv_content_add_to_cart_btn_border_radius_bottom']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_bottom'] : '';
        $ewqv_cart_btn_border_radius_left   = isset($settings['ewqv_content_add_to_cart_btn_border_radius_left']) ? $settings['ewqv_content_add_to_cart_btn_border_radius_left'] : '';

        $ewqv_scrollbar_bg   			    = isset($settings['ewqv_scrollbar_bg']) ? $settings['ewqv_scrollbar_bg'] : '';
		
        $ewqv_content_variation_description = isset($settings['ewqv_content_variation_description']) ? $settings['ewqv_content_variation_description'] : '';

        $ewqv_btn_position 					= isset($settings['ewqv_btn_position']) ? $settings['ewqv_btn_position'] : '';
        $ewqv_btn_icon_select 				= isset($settings['ewqv_btn_icon_select']) ? $settings['ewqv_btn_icon_select'] : '';
        $ewqv_btn_icon_margin_right 		= isset($settings['ewqv_btn_icon_margin_right']['right']) ? $settings['ewqv_btn_icon_margin_right']['right'] : '';
        $ewqv_btn_icon_margin_left 			= isset($settings['ewqv_btn_icon_margin_left']['left']) ? $settings['ewqv_btn_icon_margin_left']['left'] : '';
        ?>

        <style>
            .easy_woo_quick_view_btn {
                transition: ease-in-out .5s !important;
            }
			.easy-wqv-summary-content::-webkit-scrollbar-thumb {
				background: <?php echo $ewqv_scrollbar_bg;?>!important;
			}
			.easy_woo_quick_view_btn {
                border-top-left-radius:     <?php echo esc_html($ewqv_btn_border_radius_top); ?>px!important;
                border-top-right-radius:    <?php echo esc_html($ewqv_btn_border_radius_right); ?>px!important;
                border-bottom-right-radius: <?php echo esc_html($ewqv_btn_border_radius_bottom); ?>px!important;
                border-bottom-left-radius:  <?php echo esc_html($ewqv_btn_border_radius_left); ?>px!important;
            }
			.easy-wqv-summary-content .cart .single_add_to_cart_button {
				transition: ease-in-out .5s !important;
                border-top-left-radius:     <?php echo esc_html($ewqv_cart_btn_border_radius_top); ?>px!important;
                border-top-right-radius:    <?php echo esc_html($ewqv_cart_btn_border_radius_right); ?>px!important;
                border-bottom-right-radius: <?php echo esc_html($ewqv__cart_btn_border_radius_bottom); ?>px!important;
                border-bottom-left-radius:  <?php echo esc_html($ewqv_cart_btn_border_radius_left); ?>px!important;
			}
			.easy-wqv-product-modal {
				max-width: <?php echo $ewqv_modal_width ; ?>px !important;
			}
			.easy-wqv-product-modal {
				max-height: <?php echo $ewqv_modal_height ; ?>px !important;
			}
			.easy-wqv-product-modal .slick-arrow i {
				font-size: <?php echo $ewqv_slider_btn_icon_size ; ?>px !important;
			}
			.easy-wqv-product-modal .slick-arrow {
				color: <?php echo $ewqv_slider_btn_icon_color ; ?> !important;
				background-color: <?php echo $ewqv_slider_btn_icon_bg_color ; ?> !important;
				transition: ease-in-out .5s !important;
			}
			.easy-wqv-product-modal .slick-arrow:hover {
				color: <?php echo $ewqv_slider_btn_icon_hover_color ; ?> !important;
				background-color: <?php echo $ewqv_slider_btn_icon_bg_hover_color ; ?> !important;
			}
			<?php if($ewqv_btn_position == 'over_product_image'): ?>
				button.easy_woo_quick_view_btn {
					position: absolute !important;
					top: 	<?php echo $ewqv_btn_align_position_top; ?>px !important;
					left: 	<?php echo $ewqv_btn_align_position_top_left; ?>px !important;
					right: 	<?php echo $ewqv_btn_align_position_top_right; ?>px !important;
				}
			<?php endif; ?>
			<?php if($ewqv_btn_position == 'over_product_image_hover'): ?>
				button.easy_woo_quick_view_btn {
					position: absolute !important;
					opacity: 0;
					top: 	<?php echo $ewqv_btn_align_position_top; ?>px !important;
					left: 	<?php echo $ewqv_btn_align_position_top_left; ?>px !important;
					right: 	<?php echo $ewqv_btn_align_position_top_right; ?>px !important;
				}
				.woocommerce-LoopProduct-link:hover .easy_woo_quick_view_btn {
					opacity: 1;
				} 
			<?php endif; ?>
			<?php if($ewqv_btn_icon_select == 'before'): ?>
				.easy_woo_quick_view_btn i {
					margin-right: <?php echo $ewqv_btn_icon_margin_right ; ?>px;
				}
			<?php endif; ?>
			<?php if($ewqv_btn_icon_select == 'after'): ?>
				.easy_woo_quick_view_btn i {
					margin-left: <?php echo $ewqv_btn_icon_margin_left ; ?>px;
				}
			<?php endif; ?>
			<?php if(array_key_exists('ewqv_modal_z_index', $settings)): ?>
				.mfp-bg.mfp-ewqv {
					z-index: <?php echo esc_html($settings['ewqv_modal_z_index']);?>!important;
				}
			<?php endif; ?>
			<?php if($ewqv_close_btn_switch == '0') : ?>
				.easy-wqv-product-modal .mfp-close {
					display: none;
				}
			<?php endif; ?>	
			<?php if($ewqv_review_link_switch == '0') : ?>
				.easy-wqv-summary-content .woocommerce-product-rating .woocommerce-review-link {
					display: none;
				}
			<?php endif; ?>	
			<?php if($ewqv_content_variation_description == '0') : ?>
				.easy-wqv-summary-content .woocommerce-variation-description {
					display: none;
				}
			<?php endif; ?>	
			<?php if($ewqv_slider_dot_switch == '0') : ?>
				.easy-wqv-product-modal .easy-wqv-product-images-slider .slick-dots {
					display: none !important;
				}
			<?php endif; ?>
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
		
		$settings 				= Easy_WooCommerce_Quick_View_Settings::get_settings();
		$ewqv_icon_switch 		= isset( $settings['ewqv_icon_switch'] ) ? $settings['ewqv_icon_switch'] : '';
		$ewqv_btn_icon 			= isset( $settings['ewqv_btn_icon'] ) ? $settings['ewqv_btn_icon'] : '';
		$ewqv_btn_icon_select 	= isset( $settings['ewqv_btn_icon_select'] ) ? $settings['ewqv_btn_icon_select'] : '';

		$ewqv_slider_btn_left_icon				= isset($settings['ewqv_slider_btn_left_icon']) ? $settings['ewqv_slider_btn_left_icon'] : '';
		$ewqv_slider_btn_right_icon				= isset($settings['ewqv_slider_btn_right_icon']) ? $settings['ewqv_slider_btn_right_icon'] : '';
		if ($ewqv_icon_switch) {
			wp_localize_script($this->plugin_name, 'ewqv_btn', array(
				'icon' 			=> $ewqv_btn_icon,
				'icon_position' => $ewqv_btn_icon_select,
			));
		}
		wp_localize_script($this->plugin_name, 'ewqv_slidrt_icon', array(
			'left' 			=> $ewqv_slider_btn_left_icon,
			'right' => $ewqv_slider_btn_right_icon,
		));
	}

}
