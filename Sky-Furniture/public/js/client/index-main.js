$(window).on('load',()=>{
    // scroll the sliders horz
    var slidVal = 0;
    $('.slider-container .scroll-arrow.right').on('click',(event)=>{
        const slider = ($(event.currentTarget).parent().find(".slider"))[0];
        var maxSlideVal = slider.scrollWidth - slider.clientWidth;
        if (slidVal < maxSlideVal) {
            slidVal += 300;
        }
        slider.scroll({left:slidVal,behavior: "smooth"});
    });

    $('.slider-container .scroll-arrow.left').on('click',(event)=>{
        if (slidVal > 0) {
            slidVal -= 300;
        }
        ($(event.currentTarget).parent().find(".slider"))[0].scroll({left:slidVal,behavior: "smooth"});
    });

    // add to favourit
    $('.card .favourit-budge > div').on('click',(event)=>{
        $(event.currentTarget).toggleClass('added');
    });

    // add to cart
    $('.card .addtocart').on('click',(event)=>{
        $(event.currentTarget).toggleClass('added');
    });
});