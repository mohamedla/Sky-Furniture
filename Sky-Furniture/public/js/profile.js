$(window).on('load',()=>{
    // enable editing
    $('button.edit').on('click',(event)=>{
        $(event.currentTarget).parent().parent().find("input").attr('disabled',false);
        $(event.currentTarget).parent().parent().find("input").css("color","rgb(31, 78, 95)");
        $(event.currentTarget).hide();
        $(event.currentTarget).parent().parent().find("button.save").show();
    });
    // save edits
    $('button.save').on('click',(event)=>{
        $(event.currentTarget).parent().parent().find("input").attr('disabled',true);
        $(event.currentTarget).parent().parent().find("input").css("color","var(--secondary)");
        $(event.currentTarget).hide();
        $(event.currentTarget).parent().parent().find("button.edit").show();
    });
});