jQuery(document).ready(function($) {
  let $productImageContainer = $('.woocommerce-product-gallery__wrapper');

  $('.wc-pao-addon-checkbox').change(function() {

    // Check if the checkbox is checked
    if ($(this).is(':checked')) {

      // Get the URL of the topping image associated with this checkbox
      let toppingImageName = $(this).val();
      let toppingImage = 'https://stoneypoint.bcitwebdeveloper.ca/wp-content/uploads/2023/07/' + toppingImageName + '.png';

      // Append the topping image to the product image container
      $productImageContainer.prepend('<div class="topping-image-wrapper"><img class="topping-image" src="' + toppingImage + '" alt="' + toppingImageName + '"></div>');

    } else {

      // Remove the topping image
      let toppingImageName = $(this).val();
      let toppingImage = 'https://stoneypoint.bcitwebdeveloper.ca/wp-content/uploads/2023/07/' + toppingImageName + '.png';
      $('.topping-image[src="' + toppingImage + '"]').parent().remove();

    }

  });

});