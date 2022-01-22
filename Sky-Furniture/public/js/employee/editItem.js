//  Declare Fuction to use inside Html
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
    },
});
// remove Field
function remove(event) {
    const itsDiv = $(event.currentTarget).parent().parent();
    // send data to server
    const thisForm = $("form");
    $.post(
        thisForm.attr("action"),
        { input_name: itsDiv.find("input").prop("name"), process: "del" }, // request data
        (res) => {
            alert(res.message);
            if (res.isRemoved) {
                // check if the field is already removed
                itsDiv.remove();
            }
        }
    );
}
// enable and disable editing in a field
const editIcon =
        '<svg class="edit" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>',
    saveIcon =
        '<svg class="save" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>';
/*function change(event) {
    const thisForm = $("form"); // the eding form
    const target = $(event.currentTarget); // event target
    const theInput = target.parent().find(".input"); // the taget input
    // check if the event to edit or to save
    if (target.children().attr("class") == "edit") {
        target.html(saveIcon); // changing icon
        // check if the input type is file or not
        if (theInput.prop('type') == 'file') {
            theInput.prop("disabled", false); // make input file enable
        } else {
            theInput.prop("readonly", false); // make input enable
        }
        theInput.toggleClass("disabled").toggleClass("enabled"); // change the style class
    } else if (target.children().attr("class") == "save") {
        // check if the input is not empty
        if (theInput.val() != "") {
            // check if the input type is file or not
            if (theInput.attr('type') != 'file') {
                const data = (theInput.serialize()).split('=');
                $.post(
                    thisForm.attr("action"),
                    {data: data , name: theInput.attr('name').split('_')[0], process: 'edit' },// request data
                    (res) => {
                        alert(res.message); // alerting message
                    }
                );
            }else{
                const file = theInput[0].files;// get the uploaded file
                let formData = new FormData; // create new form of data
                // adding data to the form
                formData.append('file',file[0]);
                formData.append('name',theInput.attr('name').split('_')[0]);
                if(typeof theInput.attr('name').split('_')[1] !== undefined && theInput.attr('name').split('_')[0] === 'image'){
                    formData.append('id', theInput.attr('name').split('_')[1]);
                }
                formData.append('process','edit');
                $.ajax({
                    url: thisForm.attr("action"),
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: (res) => {
                        alert(res.message); // alerting message
                    }
                });
            }
            target.html(editIcon); //change icon
            if (theInput.prop('type') == 'file') {
                theInput.prop("disabled", true); // make input file disnable
            } else {
                theInput.prop("readonly", true); // make input for read only
            }
            theInput.toggleClass("disabled").toggleClass("enabled"); // change styl class
        } else {
            alert("Empty Or Un Valid Values Can't Be Saved"); // empty alert
        }
    }
}*/

function change(event) {
    const target = $(event.currentTarget);
    const theInput = target.parent().find(".input");
    if (target.children().attr("class") == "edit") {
        target.html(saveIcon);
        theInput.prop("readonly", false);
        theInput.toggleClass("disabled").toggleClass("enabled");
    } else if (target.children().attr("class") == "save") {
        // check if the input is not empty
        if (target.parent().find(".input").val() != "") {
            target.html(editIcon);
            theInput.prop("readonly", true);
            theInput.toggleClass("disabled").toggleClass("enabled");
        } else {
            alert("Empty Or Un Valid Values Can't Be Saved");
        }
    }
}

// preview Uploaded Image
function imgSelect(event) {
    var file = event.currentTarget.files[0];
    $(event.currentTarget)
        .parent()
        .find("img")
        .attr("src", URL.createObjectURL(file));
}
$(window).on("load", () => {
    // enable and disable input field
    $("form .change").on("click", (event) => {
        change(event);
    });
    // remove input field
    $("form .remove").on("click", (event) => {
        remove(event);
    });
    // Add new input field
    function addField(event, field) {
        $(event.currentTarget).parent().parent().append(field);
    }
    $("form").on("submit", (event) => {
        event.preventDefault();
        const thisForm = $(event.currentTarget);
        const formData = new FormData(thisForm[0]);
        // $.post(thisForm.attr('action'),formData,(res)=>{
        //     alert(res.message);
        // });
        $.ajax({
            url: thisForm.attr("action"),
            data: formData,
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            success: (res) => {// coustomize the result of the request
                if (res.isRemoved) { // every thing goes will
                    $("#item_message").attr("background-color", "lightgreen");
                } else { // some thing went wrong
                    $("#item_message").attr("background-color", "lightred");
                    console.log(res.message);
                }
                $("#item_message").fadeIn().find("span").text(res.message);// display the response message
                setTimeout(() => {
                    $("#item_message").fadeOut(1500);
                }, 3000); // set time out to remove the response message
            },
        });
    });
    // add color field
    const colorCount = 1;
    $("form .addColor").on("click", (event) => {
        let colorField;
        if ($("form").parent().hasClass("new")) {
            colorField = `
            <div class="input-2col mt-1">
                <div class="pre_color" style="background-color: #000">

                </div>
                <div class="input-con">
                    <input class="input mr-1 disabled" required type="text" name="color_new_${colorCount}">
                </div>
                <div class="input-con">
                    <input class="input disabled" required min="0" type="number" name="pieces_new_${colorCount}">
                    <div class="remove" onclick="remove(event);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </div>
                </div>
            </div>`;
        } else {
            colorField = `
            <div class="input-2col mb-1">
                <div class="input-con mr-1">
                    <div class="pre_color" style="background-color: #000">
                    </div>
                    <input class="input enabled" required type="text" name="color_new_${colorCount}">
                    <div class="change" onclick="change(event);">
                        <svg class="save" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                </div>
                <div class="input-con"><input class="input enabled" required min="0" type="number" name="pieces_new_${colorCount}">
                    <div class="change" onclick="change(event);">
                        <svg class="save" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="remove" onclick="remove(event);">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </div>
                </div>
            </div>`;
        }
        addField(event, colorField);
        colorCount++;
    });
    // add Image Feild
    let imgCount = 1;
    $("form .addImg").on("click", (event) => {
        let imgField;
        if ($("form").parent().hasClass("new")) {
            imgField = `
            <div class="input-con">
                <img id="image-new${imgCount}" src="" alt="Extra Image">
                <input id="image-new${imgCount}" class="input disabled" style="width: 80%;" required onchange = "imgSelect(event);" type="file" name="image_new_${imgCount}" accept="image/*">
            <div>
            <div class="remove" onclick="remove(event);">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
            </div>`;
        } else {
            imgField = `<div class="input-con">
                    <img id="image-new${imgCount}" src="" alt="Extra Image">
                    <input id="image-new${imgCount}" class="input enabled" style="width: 80%;" required onchange = "imgSelect(event);" type="file" name="image_new_${imgCount}" accept="image/*">
                    <div class="change" onclick="change(event);">
                        <svg class="save" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>/svg>
                    </div>
                    <div>
                        <div class="remove" onclick="remove(event);">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </div>
                    </div>
                </div>`;
        }
        addField(event, imgField);
        imgCount++;
    });
    // Preview Uploaded Image
    $("form input[type='file']").on("change", (event) => {
        imgSelect(event);
    });
});
