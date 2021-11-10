const question_id = "question"
const question_answer_class = "question-answer"
const question_text_class = "question-text"
const line_div_id = "line_div"
const last_amount_right_answer_tag = "last_amount_right_answer"
const now_amount_right_answer_text = "Количество правильный ответов "
const last_amount_right_answer_text = "В предыдущей попытке было правильных ответов "
const questionInLine = 3

const questionsDiv = document.getElementById("questions")
const answersMenuText = document.getElementById("answers_menu_text")
const nowAmountRightAnswer = document.getElementById("now_amount_right_answer")
const lastAmountRightAnswer = document.getElementById("last_amount_right_answer")

const firstQuestion = createQuestion("first")
setText(firstQuestion, "С какого цвета начинается радуга?")
addAnswerInQuestion(firstQuestion, createAnswer("Фиолетовый", "1"))
addAnswerInQuestion(firstQuestion, createAnswer("Красный", "2"))
addAnswerInQuestion(firstQuestion, createAnswer("Чёрный", "3"))
addAnswerInQuestion(firstQuestion, createAnswer("Зеленый", "4"))
setRightAnswer(firstQuestion, "2")
addQuestion(firstQuestion)

const secondQuestion = createQuestion("second")
setText(secondQuestion, "Из какого злака делается пшено?")
addAnswerInQuestion(secondQuestion, createAnswer("Овес", "1"))
addAnswerInQuestion(secondQuestion, createAnswer("Просо", "2"))
addAnswerInQuestion(secondQuestion, createAnswer("Ячмень", "3"))
addAnswerInQuestion(secondQuestion, createAnswer("Пшеница", "4"))
setRightAnswer(secondQuestion, "2")
addQuestion(secondQuestion)

const thirdQuestion = createQuestion("third")
setText(thirdQuestion, "Из какого злака делается пшено?")
addAnswerInQuestion(thirdQuestion, createAnswer("Овес", "1"))
addAnswerInQuestion(thirdQuestion, createAnswer("Просо", "2"))
addAnswerInQuestion(thirdQuestion, createAnswer("Ячмень", "3"))
setRightAnswer(thirdQuestion, "2")
addQuestion(thirdQuestion)

const fourthQuestion = createQuestion("fourth")
setText(fourthQuestion, "Из какого злака делается пшено?")
addAnswerInQuestion(fourthQuestion, createAnswer("Овес", "1"))
addAnswerInQuestion(fourthQuestion, createAnswer("Просо", "2"))
addAnswerInQuestion(fourthQuestion, createAnswer("Ячмень", "3"))
setRightAnswer(fourthQuestion, "2")
addQuestion(fourthQuestion)

const fifthQuestion = createQuestion("fifth")
setText(fifthQuestion, "Из какого злака делается пшено?")
addAnswerInQuestion(fifthQuestion, createAnswer("Овес", "1"))
addAnswerInQuestion(fifthQuestion, createAnswer("Просо", "2"))
addAnswerInQuestion(fifthQuestion, createAnswer("Ячмень", "3"))
setRightAnswer(fifthQuestion, "2")
addQuestion(fifthQuestion)

const sixthQuestion = createQuestion("sixth")
setText(sixthQuestion, "Из какого злака делается пшено?")
addAnswerInQuestion(sixthQuestion, createAnswer("Овес", "1"))
addAnswerInQuestion(sixthQuestion, createAnswer("Просо", "2"))
addAnswerInQuestion(sixthQuestion, createAnswer("Ячмень", "3"))
setRightAnswer(sixthQuestion, "2")
addQuestion(sixthQuestion)

function createLineDiv() {
    var div = document.createElement("div")
    div.id = line_div_id
    return div
}

function loadQuestions() {
    var lastDiv = createLineDiv()
    var divId = 0
    var id = 0
    questions.forEach( (value, key, map) => {
        var curDivId = Math.floor(id / questionInLine)
        if (curDivId != divId) {
            questionsDiv.appendChild(lastDiv)
            lastDiv = createLineDiv()
            divId = curDivId
        }
        lastDiv.appendChild(createUIQuestion(value))
        id++
    } ) 
    questionsDiv.appendChild(lastDiv)
}

function checkAnswers() {
    right = 0;
    questions.forEach( (value, key, map) => {
        if (checkAnswer(value)) {
            right += 1
        }
    } ) 
    answersMenuText.hidden = false
    if (localStorage.getItem(last_amount_right_answer_tag) != null) {
        lastAmountRightAnswer.innerHTML = last_amount_right_answer_text + localStorage.getItem(last_amount_right_answer_tag)
    }
    nowAmountRightAnswer.innerHTML = now_amount_right_answer_text + right
    localStorage.setItem(last_amount_right_answer_tag, right)
}

function checkAnswer(question) {
    answer = "";
    question.answers.forEach( (value, key, map) => {
        console.log(value.input)
        if (value.input.checked) {
            answer = value.input.value
            return question.rightAnswer == answer
        }
    } ) 
    return question.rightAnswer == answer
}

function createUIQuestion(question) {
    const questionUI = document.createElement("div")
    questionUI.id = question_id;
    const label = document.createElement("label")
    label.className = question_text_class
    label.htmlFor = question_id + '_' + question.name
    label.innerHTML = question.text
    questionUI.appendChild(label)
    question.answers.forEach( (value, key, map) => {
        const answerUI = createUIAnswer(question, value)
        questionUI.appendChild(answerUI)
    })
    return questionUI
}

function createUIAnswer(question, answer) {
    const answerUI = document.createElement("div")
    answerUI.className = question_answer_class
    const label = document.createElement("label")
    label.htmlFor = question_answer_class + '_' + answer.value
    label.innerHTML = answer.text
    const input = document.createElement("input")
    input.type = "radio"
    input.name = question_answer_class + '_' + question.name
    input.value = answer.value
    answer.input = input
    answerUI.appendChild(input)
    answerUI.appendChild(label)
    return answerUI
}