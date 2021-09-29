const first_name_input = document.getElementById("first_name").getElementsByTagName("input")[0]
const last_name_input = document.getElementById("last_name").getElementsByTagName("input")[0]
const submit = document.getElementById("submit")
const form = document.getElementsByTagName("form")[0]

addValidTest(first_name_input, (element) => { return isUpper(element.value[0]) })
addValidTest(last_name_input, (element) => { return isUpper(element.value[0]) })

// form.getElementsByTagName("input").for

form.onsubmit = () => {
    return false
}

function addValidTest(element, predicate) {
    element.oninput = () => {
        if (predicate(element)) {
        } else {
            setValid(element, false)
        }
    }
}

function isUpper(str) {
    return str != null && str == str.toUpperCase()
}

function setValid(element, isValid) {
    element.classList.add( isValid ? "valid" : "invalid" )
}