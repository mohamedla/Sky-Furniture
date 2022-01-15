$(window).on('load',()=>{
    // Display the search subject
    $('#searchval').text(localStorage.getItem("searchVal"));
    // select sorting way
    $(".orderBy > div").on('click',(event)=>{
        $(event.currentTarget).parent().find('div').removeClass('selected');
        $(event.currentTarget).addClass('selected');
    });
    // Display Filtters Bar
    $('.orderBy .filterbtn').on('click',()=>{
        $('.filtters').show(300);
    });
    // Hide Filtters Bar
    $('.filtters .close').on('click',()=>{
        $('.filtters').hide(300);
    });
    // clear all Filtters
    $('.filtters .clean').on('click',()=>{
        console.log($('.filtters input[type=radio]'));
        $('.filtters input[type=radio]').prop("checked",false);
    });
});