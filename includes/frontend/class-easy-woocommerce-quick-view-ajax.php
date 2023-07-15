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

		$product_id = isset( $_POST['product_id'] ) ? absint( $_POST['product_id'] ) : 0;

		// Retrieve the necessary product information
		$product = wc_get_product( $product_id );
		$product_name = $product->get_name();
		$product_price = $product->get_price_html();
		$product_description = $product->get_description();
		$product_image_url = wp_get_attachment_image_url( get_post_thumbnail_id( $product_id ), 'full' );

		// Build the product details HTML
		$html = '<div class="product-details">';
		$html .= '<div class="easy-product-images">';
		$html .= '<div class="wqv-product-images-slider">';
		$html .= '<div class="product-image"><img src="' . $product_image_url . '" alt="' . $product_name . '"></div>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<div class="product-info">';
		$html .= '<h2>' . $product_name . '</h2>';
		$html .= '<p><strong>Price: </strong>' . $product_price . '</p>';
		$html .= '<div>' . $product_description . '</div>';
		// Add the form under the product description
		$html .= '<form class="cart" action="" method="post" enctype="multipart/form-data">';
		$html .= '<div class="quantity">';
		$html .= '<label class="screen-reader-text" for="">Belt quantity</label>';
		$html .= '<input type="number" id="" class="input-text qty text" name="quantity" value="1" aria-label="Product quantity" size="4" min="1" step="1" inputmode="numeric">';
		$html .= '</div>';
		$html .= '<button type="submit" name="add-to-cart" value="' . $product_id . '" class="single_add_to_cart_button button">Add to cart</button>';
		$html .= '</form>';
		$html .= '</div>';
		$html .= '</div>';

		wp_die( $html );
	}

}
