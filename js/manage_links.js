let checkbox = document.querySelector(".check");
let form_checkbox = document.querySelector(".toggle-form");


checkbox.addEventListener("click", ()=> {

    if (checkbox.checked) {
        checkbox.value = 1
    } else {
        checkbox.value = 0
    }

    console.log(checkbox.value);

    form_checkbox.submit()
})