let checkbox = document.querySelector(".check");
let form_checkbox = document.querySelector(".toggle-form");
const button = document.querySelector('.add-link-button');
const popUp = document.querySelector('.popUp');
let tmp = "true"

const linkButton = () => 
{
    if (tmp =="true")
    {
        popUp.style.display = ("flex")
        tmp = 'false'
    }
    else
    {
        popUp.style.display = ("none")
        tmp = 'true'
    } 
}
button.addEventListener('click',linkButton)

checkbox.addEventListener("click", ()=> {

    if (checkbox.checked) {
        checkbox.value = 1
    } else {
        checkbox.value = 0
    }

    console.log(checkbox.value);

    form_checkbox.submit()
})