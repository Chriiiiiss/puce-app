let form_elements = document.querySelectorAll("label");
let input_elements = document.querySelectorAll(".form-style");
let recover_label = document.querySelector("body")
let active_input = document.querySelector("body")

document.addEventListener("click", () => {
    if (active_input.value == "" ) {
        recover_label.classList.remove("form-top")
    }
    recover_label = document.querySelector("body")
    active_input = document.activeElement
    if (active_input.classList.contains("form-style")) {
        recover_label = active_input.parentElement.querySelector("label")
        recover_label.classList.add("form-top")
    }
})
