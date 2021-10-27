const productPattern = document.getElementById("product")
const content = document.getElementById("content")
const productForm = document.forms.product_form
const totalOrder = document.getElementById("total_order")

const money_format = ' руб.'
const name_id = 1;
const amount_add_id = 3;
const amount_id = 5;
const amount_remove_id = 7;
const order_by_one_id = 9;
const order_id = 11;
const remove_button_image_id = 13;

content.removeChild(productPattern)

function bodyLoad() {
    products.forEach( (it) => {
        addProductUIToScreen(createUIProduct(it))
    } )
    updateTotalOrder()
}

function submitForm(name, order_by_one) {
    const product = createProduct(name, 1, order_by_one)
    addProduct(product)
    addProductUIToScreen(createUIProduct(product))
    writeProducts()
    updateTotalOrder()
    return false
}

function addProductUIToScreen(productUI) {
    content.appendChild(productUI)
}

function removeProductUIToScreen(productUI) {
    content.removeChild(productUI)
}

function createUIProduct(product) {
    const productUI = productPattern.cloneNode(true)
    setName(productUI, product.name)
    setAmount(productUI, product.amount)
    getAmountAddButton(productUI).onclick = () => {
        product.amount += 1
        setAmount(productUI, product.amount)
        writeProducts()
        updateOrderByProduct(productUI, product)
        updateTotalOrder()
    }
    getAmountRemoveButton(productUI).onclick = () => {
        product.amount -= 1
        setAmount(productUI, Math.max(1, product.amount))
        writeProducts()
        updateOrderByProduct(productUI, product)
        updateTotalOrder()
    }
    getRemoveButtonImage(productUI).onclick = () => {
        removeProduct(product)
        removeProductUIToScreen(productUI)
        writeProducts()
    }
    setOrderByOne(productUI, product.orderByOne)
    updateOrderByProduct(productUI, product)
    return productUI
}

function updateTotalOrder() {
    totalOrder.innerHTML = createNormalizeOrder(calculateTotalOrder())
}

function createNormalizeOrder(order) { return order + money_format }

function getTextContent(src, id) {return src.childNodes[id].textContent}
function setTextContent(src, id, value) {src.childNodes[id].textContent = value}

function getName(productUI) {return getTextContent(productUI, name_id)}
function setName(productUI, name) {setTextContent(productUI, name_id, name)}

function getOrderByOne(productUI) {return getTextContent(productUI, order_by_one_id)}
function setOrderByOne(productUI, orderByOne) {
    setTextContent(productUI, order_by_one_id, orderByOne)
}

function getAmountAddButton(productUI) { return productUI.childNodes[amount_add_id]}
function getAmountRemoveButton(productUI) { return productUI.childNodes[amount_remove_id]}
function getRemoveButtonImage(productUI) { return productUI.childNodes[remove_button_image_id]}

function getAmount(productUI) {return getTextContent(productUI, amount_id)}
function setAmount(productUI, amount) {setTextContent(productUI, amount_id, amount)}

function getOrder(productUI) {return getTextContent(productUI, order_id)}
function setOrder(productUI, order) {setTextContent(productUI, order_id, order)}
function updateOrderByProduct(productUI, product) {
    return updateOrder(productUI, product.amount, product.orderByOne)
}
function updateOrder(productUI, amount, orderByOne) {
    setOrder(productUI, createNormalizeOrder(amount * orderByOne))
}