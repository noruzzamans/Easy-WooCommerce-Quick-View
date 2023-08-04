<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Easy_WooCommerce_Quick_View_Ajax {

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

		add_action( 'wp_ajax_easy_woocommerce_quick_view', [$this, 'easy_woocommerce_quick_view'] );
        add_action( 'wp_ajax_nopriv_easy_woocommerce_quick_view', [$this, 'easy_woocommerce_quick_view'] );

		add_action( 'easy_wqv_product_summary', 'woocommerce_template_single_title', 5 );
		add_action( 'easy_wqv_product_summary', 'woocommerce_template_single_rating', 10 );
		add_action( 'easy_wqv_product_summary', 'woocommerce_template_single_price', 15 );
		add_action( 'easy_wqv_product_summary', 'woocommerce_template_single_excerpt', 20 );
		add_action( 'easy_wqv_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
		add_action( 'easy_wqv_product_summary', 'woocommerce_template_single_meta', 30 );

		add_filter( 'woocommerce_add_to_cart_form_action', array( $this, 'easy_woocommerce_quick_view_avoid_redirecting_to_single_page' ), 10, 1 );
	}

	/**
	 * Ajax callback function
	 */
	public function easy_woocommerce_quick_view() {
		$nonce = $_POST['nonce'];

		if ( ! wp_verify_nonce( $nonce, 'easy_woocommerce_quick_view_nonce' ) ) {
			die( 'Nonce not verified!' );
		}

		global $post, $product;
		$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;
		$product = wc_get_product( $product_id );
		$product_name = $product->get_name();
		$product_image_url = wp_get_attachment_image_url( get_post_thumbnail_id( $product_id ), 'full' );

		if ( $product ) {
			$post = get_post( $product_id );
			setup_postdata( $post );
			?>
			<div class="easy-wqv-product-modal">
				<div class="easy-wqv-product-images">
					<div class="easy-wqv-product-images-slider">
							<div class="easy-wqv-product-image"><img src="<?php echo $product_image_url; ?>" alt="<?php echo $product_name; ?>">
							</div>
					</div>
				</div>
				<div class="summary entry-summary easy-wqv-summary-wrapper">
					<div class="summary-content easy-wqv-summary-content">
						<?php do_action( 'easy_wqv_product_summary'); ?>
					</div>
				</div>
			</div>
			<?php
			wp_reset_postdata();
		}
		wp_die();
	}

	/**
	 * Check if is quick view
	 */
	public function easy_woocommerce_quick_view_is_quick_view() {
        // phpcs:ignore WordPress.Security.NonceVerification.Recommended
        return ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_REQUEST['action'] ) && 'easy_woocommerce_quick_view' === $_REQUEST['action'] );
    }

	/**
	 * Avoid redirect to single product page on add to cart action in quick view
	 */
	public function easy_woocommerce_quick_view_avoid_redirecting_to_single_page($value){
		if ( $this->easy_woocommerce_quick_view_is_quick_view() ) {
            return '';
        }
        return $value;
	}

}
Easy_WooCommerce_Quick_View_Ajax::get_instance();
