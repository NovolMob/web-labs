const first_name_input = document.getElementById("first_name").getElementsByTagName("input")[0]
const last_name_input = document.getElementById("last_name").getElementsByTagName("input")[0]
const email_input = document.getElementById("email").getElementsByTagName("input")[0]
const gender_male_input = document.getElementById("gender-male").getElementsByTagName("input")[0]
const gender_female_input = document.getElementById("gender-female").getElementsByTagName("input")[0]
const age_selector = document.getElementById("age").getElementsByTagName("select")[0]

const modal_window = document.getElementById("modal_window")
const form = document.getElementsByTagName("form")[0]

const open_form = document.getElementById("open_form")

const pattern_name = /^[A-Za-zА-Яа-яЁё/s]+$/
const valid_class = "valid"
const invalid_class = "invalid"

addValidTest(first_name_input, (element) => { return isUpper(element.value[0]) && pattern_name.test(element.value) })
addValidTest(last_name_input, (element) => { return isUpper(element.value[0]) && pattern_name.test(element.value) })

open_form.onclick = () => {
    hiddenModalWindow(false)
}

form.onsubmit = () => {
    if (isFormValid(form)) {
        return true
    }
    return false
}

function get_gender() {
    if (gender_male_input.checked) {
        return "male"
    } else if (gender_female_input.cheked) {
        return "female"
    }
}

function hiddenModalWindow(hidden) {
    if (hidden) {
        modal_window.style.display = "none"
    } else {
        modal_window.style.display = "block"
    }
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