(function($) {
	'use strict';

	$(document).ready(function() {

		if (typeof ewqv_btn !== 'undefined' && ewqv_btn.icon) {
			let iconClass = ewqv_btn.icon;
			let iconElement = $('<i class="' + iconClass + '"></i>');
			if (ewqv_btn.icon_position === 'before') {
				$('.easy_woo_quick_view_btn').prepend(iconElement);
			} else {
				$('.easy_woo_quick_view_btn').append(iconElement);
			}
		}


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
						var form_variation = $('.easy-wqv-product-modal').find('.variations_form');
						form_variation.each(function () {
							$(this).wc_variation_form();
						});
					}

					// $('#easy-wqv-image-slider').lightSlider({
					// 	gallery: true,
					// 	item: 1,
					// 	loop: true,
					// 	slideMargin: 0,
					// 	thumbItem: 4,
					// 	enableDrag: false,
					// 	currentPagerPosition: 'left',
					// });
				// Check if there are gallery images
				let hasGalleryImages = $('#easy-wqv-image-slider .easy-wqv-product-image').length > 1;

				// Initialize Slick slider only if there are gallery images
				if (hasGalleryImages) {
					$('#easy-wqv-image-slider').slick({
						// Other options
						dots: true,
						infinite: true,
						slidesToShow: 1,
						slidesToScroll: 1,
						prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
						nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>'
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


