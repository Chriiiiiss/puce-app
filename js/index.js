let index_input_elem = document.querySelector(".index_input")
let index_submit_elem = document.querySelector(".submit")

console.log(index_input_elem.value);

index_input_elem.addEventListener("keyup", () => {
    console.log("hello");
    if (index_input_elem.value != "") {
        index_submit_elem.disabled = false
    } else {
        index_submit_elem.disabled = true
    }
})