<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Easy_WooCommerce_Quick_View_Ajax {

    public $errors = [];

    public function easy_woocommerce_quick_view() {
        $nonce = $_POST['nonce'];
    
        if (!wp_verify_nonce($nonce, 'easy_woocommerce_quick_view_nonce')) {
            die('Nonce not verified!');
        }
    
        $product_id = isset($_POST['product_id']) ? absint($_POST['product_id']) : 0;
    
        // Load the template file and pass the product ID
        ob_start();
    
        // Retrieve the necessary product information
        $product = wc_get_product($product_id);
        $product_name = $product->get_name();
        $product_price = $product->get_price_html();
        $product_description = $product->get_description();
        $product_image_url = wp_get_attachment_image_url(get_post_thumbnail_id($product_id), 'full');
    
        // Output the product details HTML
        echo '<div class="product-details">';
        echo '<div class="product-image"><img src="' . $product_image_url . '" alt="' . $product_name . '"></div>';
        echo '<h2>' . $product_name . '</h2>';
        echo '<p><strong>Price: </strong>' . $product_price . '</p>';
        echo '<div>' . $product_description . '</div>';
        echo '</div>';
    
        $html = ob_get_clean();
    
        echo $html;
    
        wp_die();
    }
    
}