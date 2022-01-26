//  Declare Fuction to use inside Html
    // enable and disable editing in a field
    const editIcon = '<svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>',
        saveIcon = '<svg class="save" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>';
    function change(event) {
        const target  = $(event.currentTarget);
        if (target.children().attr("class") == "edit") {
            target.html(saveIcon);
            target.parent().find(".input").prop("readonly",false);
            target.parent().find(".input").toggleClass("disabled").toggleClass("enabled");
        } else if(target.children().attr("class") == "save") {
            // check if the input is not empty
            if (target.parent().find('input').val() != "") {
                target.html(editIcon);
                target.parent().find(".input").prop("readonly",true);
                target.parent().find(".input").toggleClass("disabled").toggleClass("enabled");
            }else{
                alert('Empty Or Un Valid Values Can\'t Be Saved')
            }
        }
    }
$(window).on('load',()=>{
    // enable and disable input field
    $("form .change").on("click",(event)=>{change(event);});
    // submitting form using ajax
    $('form').on("submit",(event)=>{
        event.preventDefault();
        const thisForm = $(event.currentTarget);
        $.post(thisForm.attr('action'),thisForm.serialize(),(res)=>{
            alert(res.message);
        });
    });
});
