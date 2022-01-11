$(window).on('load',()=>{
    $("#orderchanges").on('click',()=>{
        $(".submiting .orderchanges").slideUp(1000,()=>{
            $(".submiting #finalsubmit").slideDown(1000);
        });
    });
    $(".submit div").on('click',()=>{
        alert('Order Submited Succefully');
        window.location.href = "index.html";
    });
});