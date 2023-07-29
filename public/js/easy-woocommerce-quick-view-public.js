(function($) {
	'use strict';

	$(document).ready(function() {
		$('.easy_woo_quick_view_btn').on('click', function(e) {
			e.preventDefault();
			let productId = $(this).data('product-id');

			// AJAX request to retrieve the product details
			$.ajax({
				url: easy_woocommerce_quick_view.ajax_url,
				type: 'POST',
				data: {
					action: 'easy_woocommerce_quick_view',
					nonce: easy_woocommerce_quick_view.nonce,
					product_id: productId
				},
				success: function(response) {
					// Open the Magnific Popup and display the product details
					$.magnificPopup.open({
						items: {
							src: response
						},
						type: 'inline',
						mainClass: 'mfp-ewqv',
						closeBtnInside: true,
						closeOnBgClick: true,
						showCloseBtn: true,
					});
					if (typeof wc_add_to_cart_variation_params !== 'undefined') {
						var form_variation = $('.product-details').find('.variations_form');
						form_variation.each(function () {
							$(this).wc_variation_form();
						});
					}
				},
				error: function() {
					console.log('Error retrieving product details.');
				}
			});
		});
	});
})(jQuery);


