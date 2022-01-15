// add Extra Image Field
const ItemsWraper = document.querySelector('.ItemsWraper'),
    addItem = document.querySelector('.addItem');

function addExtraItemField(fieldContainer){
    let div = document.createElement("div");
    div.innerHTML = "<input class='input-field w-full mb-5' type='text' name='items'>";
    div.classList.add('extraImg');
    fieldContainer.appendChild(div);
}
    addItem.addEventListener('click',()=>{
        addExtraItemField(ItemsWraper);
    });