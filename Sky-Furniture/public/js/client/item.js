$(window).on('load',()=>{
    // add to favourit
    $('.details .addList .addFav').on('click',(event)=>{
        $(event.currentTarget).toggleClass('added');
    });
    //add to main cart
    var mainCartText = "Remove From Cart";
    $('.details .addList #addtocartmain').on('click',(event)=>{
        $(event.currentTarget).toggleClass('added').text(mainCartText);
        if (mainCartText == "Remove From Cart") {
            mainCartText = "Add To Cart";
        } else {
            mainCartText = "Remove From Cart";
        }
    });
    // display details description
    $(".ItemDel .extraDel #description").on('click',(event)=>{
        $(".ItemDel .extraDel #materials-box").slideUp(1);
        $(".ItemDel .extraDel #materials").removeClass("selected");
        $(event.currentTarget).toggleClass("selected");
        $(".ItemDel .extraDel #description-box").slideToggle(500);
    });
    // display details materials
    $(".ItemDel .extraDel #materials").on('click',(event)=>{
        $(".ItemDel .extraDel #description-box").slideUp(1);
        $(".ItemDel .extraDel #description").removeClass("selected");
        $(event.currentTarget).toggleClass("selected");
        $(".ItemDel .extraDel #materials-box").slideToggle(500);
    });
});

