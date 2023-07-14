(function($) {
	'use strict';

	$(document).ready(function() {
		$('.easy_woo_quick_view_btn').on('click', function(e) {
			e.preventDefault();
			var productId = $(this).data('product-id');

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
							src: '<div class="product-details">' + response + '</div>'
						},
						type: 'inline',
						mainClass: 'mfp-fade',
						closeBtnInside: true,
						closeOnBgClick: true,
						showCloseBtn: true,
						// Add any other options you need
					});
				},
				error: function() {
					console.log('Error retrieving product details.');
				}
			});
		});
	});
})(jQuery);


