let checkbox = document.querySelectorAll(".check");
let form_checkbox = document.querySelectorAll(".toggle-form");
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



checkbox.forEach(element => {
    element.addEventListener("click", ()=> {
    
        if (element.checked) {
            element.value = 1
        } else {
            element.value = 0
        }

        form_checkbox[element.dataset.indexNumber].submit()
    }) 
});