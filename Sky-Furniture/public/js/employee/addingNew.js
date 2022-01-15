$('form').on("submit",(event)=>{
    event.preventDefault();
    const thisForm = $(event.currentTarget);
    $.post(thisForm.attr('action'),thisForm.serialize(),(res)=>{
        let divClass;
        (res.isAdded)? divClass ="success":divClass="error";
        let respons = ` <div class="${divClass}">
                            ${res.message}
                        </div>`;
        $('.message').html(respons);
    });
});