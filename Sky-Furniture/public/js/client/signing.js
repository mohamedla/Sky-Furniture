$(window).on('load',()=>{
    // Display or hide password
    $('#show-pass').on('click', ()=>{
        if ($('input#password').attr("type") == 'password') {
            $('input#password').attr("type","text");
            $('#show-pass svg').toggle();
        }else{
            $('input#password').attr("type","password");
            $('#show-pass svg').toggle();
        }
    });
});