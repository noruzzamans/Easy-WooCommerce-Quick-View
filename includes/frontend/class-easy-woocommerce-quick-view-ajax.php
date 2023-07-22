<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Easy_WooCommerce_Quick_View_Ajax {

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
			<div class="product-details">
				<div class="easy-product-images">
					<div class="easy-product-images-slider">
						<div class="easy-product-image"><img src="<?php echo $product_image_url; ?>" alt="<?php echo $product_name; ?>">
						</div>
					</div>
				</div>
				<div class="summary entry-summary">
					<?php do_action( 'woocommerce_single_product_summary'); ?>
				</div>
			</div>
			<?php
			wp_reset_postdata();
		}
		wp_die();
	}

}
