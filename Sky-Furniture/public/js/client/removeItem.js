$(window).on('load',()=>{
    // remove an item from cart or favourit
    $(".item .remove").on('click',(event)=>{
        $(event.target).parent().parent().parent().remove();
        if ($('.item').length == 0) {
            var noItem = "<h1>Empty<h1>";
            $('.cart-wrapper').html(noItem);
        }
    });
});