// jquery code
$(window).on('load',()=>{
    // set defult value for isdark in the local storage
    if (localStorage.getItem("isdark") == null) {
        localStorage.setItem("isdark","no");
    }

    // loaded page
    $('#loader-container').addClass("loaded");

    // applay last saved mode
    const daymode = '<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path></svg>';
    const nightmode = '<svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>';
    const root = $(':root');
    if (localStorage.getItem("isdark") == "no") {
        root.css({"--primary":"#F4E7D3","--secondary":"#1F4E5F"});
        $('header .mode').html(nightmode);
    } else {
        root.css({"--primary":"#1F4E5F", "--secondary":"#F4E7D3"});
        $('header .mode').html(daymode);
    };

    // hide or view user option
    let signed = false;
    if (signed) {
      $('header .user-exten .notsign').css({"display":"none"});
    }else{
        $('header .user-exten .sign').css({"display":"none"});
    }

    // change color mode
    $('header .mode').on('click',(event)=>{
        if (localStorage.getItem("isdark") == "yes") {
            root.css({"--primary":"#F4E7D3","--secondary":"#1F4E5F"});
            $(event.target).parent().html(nightmode);
            localStorage.setItem("isdark","no");
        } else {
            root.css({"--primary":"#1F4E5F", "--secondary":"#F4E7D3"});
            $(event.target).parent().html(daymode);
            localStorage.setItem("isdark","yes");
        }
    });

    // scroll to the top of page
    $('.topscroll').on('click',()=>{
        window.scroll({top:0,behavior: "smooth"});
    });

    // toggle the search bar
    $('nav .searchTriger').on('click',()=>{
        $('section.searchbar').slideToggle(400);
    });

    // sidebar
        //  display sidebar
        $('nav .sidebar-triger').on('click',()=>{
            $('section.sidebar-container').fadeIn(500 , "linear");
        });

        // hide sidebar using closer
        $('section.sidebar-container .closer').on('click',()=>{
            $('section.sidebar-container').fadeOut(500 , "linear");
        });

        // hide sidebar using out click
        $('section .sidebar').on('click', (event)=>{
            event.stopPropagation();
        });
        $('section.sidebar-container').on('click',()=>{
            $('section.sidebar-container').fadeOut(500 , "linear");
        });
    
    // submit search
    $('section.searchbar .content .btn').on('click',()=>{
        localStorage.setItem("searchVal",$('#searchvalue').val());
        window.location.href = "./search.html";
    });
});