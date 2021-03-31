let index_input_elem = document.querySelector(".index_input")
let index_submit_elem = document.querySelector(".submit")

console.log(index_input_elem.classList.contains("shortened"))

index_input_elem.addEventListener("keyup", () => {
    if (index_input_elem.classList.contains("shortened")) {
        index_input_elem.classList.toggle("shortened")
    }
    if (index_input_elem.value != "") {
        index_submit_elem.disabled = false
    } else {
        index_submit_elem.disabled = true
    }
})