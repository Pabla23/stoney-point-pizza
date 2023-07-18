jQuery(document).ready(function ($) {

    // Default selection for sliders on page load
    let index = 0;

    $(".specialty-item").hide();
    $(".specialty-item").eq(index).show();

    $(".pizza-item").hide();
    $(".pizza-item").eq(index).show();

    $(".pizza-type-button").eq(index).addClass("selected");
    $(".specialty-type-button").eq(index).addClass("selected");

    // Show/Hide sliders based on button selection for pizza type
    $(".pizza-type-button").click(function () {
        let index = $(this).data('index');
        $(".pizza-type-button").removeClass("selected");
        $(this).addClass("selected");
        $(".pizza-item").hide();
        $(".pizza-item").eq(index).show();
    });

    // Show/Hide sliders based on button selection for specialty type
    $(".specialty-type-button").click(function () {
        let index = $(this).data('index');
        $(".specialty-type-button").removeClass("selected");
        $(this).addClass("selected");
        $(".specialty-item").hide();
        $(".specialty-item").eq(index).show();
    });
});