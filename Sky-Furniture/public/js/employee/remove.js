// get the token from meta tag on head and set as header defualt for all ajax requests
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});

// on click event for the the delete div
$(".removeBtn div").on("click",(event)=>{
    event.preventDefault();
    const thisDiv = $(event.currentTarget);
    // ajax request to delete Item 
    $.ajax({
        method: "DELETE",
        url: thisDiv.attr("data_url"),
        success:(res)=>{
            if (res.isRemoved) {
                thisDiv.parent().parent().css('display',"none");
                alert('Item Have Been Removed');
            }else if(res.message !== ""){
                alert(res.message);
            }else{
                alert('Some Thing Went Wrong');
            }
        },
    });
});