const first_name_input = document.getElementById("first_name").getElementsByTagName("input")[0]
const last_name_input = document.getElementById("last_name").getElementsByTagName("input")[0]
const email_input = document.getElementById("email").getElementsByTagName("input")[0]
const gender_male_input = document.getElementById("gender-male").getElementsByTagName("input")[0]
const gender_female_input = document.getElementById("gender-female").getElementsByTagName("input")[0]
const age_selector = document.getElementById("age").getElementsByTagName("select")[0]

const submit = document.getElementById("submit")
const modal_window = document.getElementById("modal_window")
const modal_window_content = document.getElementById("modal_window_content")
const form = document.getElementsByTagName("form")[0]

const valid_class = "valid"
const invalid_class = "invalid"

addValidTest(first_name_input, (element) => { return isUpper(element.value[0]) })
addValidTest(last_name_input, (element) => { return isUpper(element.value[0]) })

form.onsubmit = () => {
    if (isFormValid(form)) {
        fillModalWindow()
        showModalWindow()
    }
    return false
}

function fillModalWindow() {
    modal_window_content.innerHTML =
        first_name_input.value + "<br>" +
        last_name_input.value + "<br>" +
        email_input.value + "<br>" + 
        get_gender() + "<br>" + 
        age_selector.value
}

function get_gender() {
    if (gender_male_input.checked) {
        return "male"
    } else if (gender_female_input.cheked) {
        return "female"
    }
}

function showModalWindow() {
    modal_window.style.display = "block"
}

function isFormValid(form) {

    returned = true
    inputs = form.getElementsByTagName("input");
    for (let i = 0; i < inputs.length; i++) {
        if (!isValid(inputs[i])) {
            returned = false
            break
        }
    }
    return returned
}

function addValidTest(element, predicate) {
    element.oninput = () => {
        if (predicate(element)) {
            setValid(element, true)
        } else {
            setValid(element, false)
        }
    }
}

function isValid(element) {
    if (element.classList.contains(invalid_class)) {
        return false
    }
    return true
}

function isUpper(str) {
    return str != null && str == str.toUpperCase()
}

function setValid(element, isValid) {
    if (isValid) {
        element.classList.remove(invalid_class)
        element.classList.add(valid_class)
    } else {
        element.classList.remove(valid_class)
        element.classList.add(invalid_class)
    }
}