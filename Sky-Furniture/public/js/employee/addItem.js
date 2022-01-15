//  Declare Fuction to use inside Html
    // remove Field
    function remove (event){
        $(event.currentTarget).parent().parent().remove();
    }
    // preview Uploaded Image
    function imgSelect(event) {
        var file = event.currentTarget.files[0];
        $(event.currentTarget).parent().find('img').attr("src",URL.createObjectURL(file));
    }
$(window).on('load',()=>{
    // Add new input field
    function addField(event,field) {
        $(event.currentTarget).parent().parent().append(field);
    }
    // remove input field
    $("form .remove").on("click",(event)=>{remove(event);});
        // add color field
    $("form .addColor").on("click",(event)=>{
        const colorField = `
        <div class="input-2col mt-1">
            <div class="input-con">
                <input class="input mr-1 disabled" required type="text" name="color">
            </div>
            <div class="input-con">
                <input class="input disabled" required min="0" type="number" name="pieces"><div class="remove" onclick="remove(event);">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>
        </div>`;
        addField(event,colorField);
    });
        // add Image Feild
    $("form .addImg").on("click",event=>{
        const imgField = `
        <div class="input-con">
            <img id="image-0" src="" alt="Extra Image">
            <input id="image-0" class="input disabled" style="width: 80%;" required value="Italian Bosshkash Chair" onchange = "imgSelect(event);" type="file" name="extraImg1" accept="image/*">
        <div>
        <div class="remove" onclick="remove(event);">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
        </div>`;
        addField(event,imgField);
    });
    // Preview Uploaded Image
    $("form input[type='file']").on("change",(event)=>{
        imgSelect(event);
    });
})