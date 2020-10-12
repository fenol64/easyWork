var listElement, inputElement, buttonElement, todos;

listElement = document.querySelector('.todos-body');
inputElement = document.querySelector('.todo-name');
buttonElement = document.querySelector('#button');

todos = [];

function rendertodos() {
	listElement.innerHTML = '';

	for (todo of todos){
		let todoElement = document.createElement('li');
		let todoText = document.createTextNode(todo);

		let linkElement =  document.createElement('a');
		linkElement.setAttribute('href', '#');
		let linkText = document.createTextNode('Excluir');
		linkElement.appendChild(linkText);

		let pos = todos.indexOf(todo);
		linkElement.setAttribute('onclick', 'deletetodo('+ pos +')');

		todoElement.appendChild(todoText);
		todoElement.appendChild(linkElement);
		listElement.appendChild(todoElement);

	}
}


function addtodo() {
	let todoText = inputElement.value;

	todos.push(todoText);
	inputElement.value = '';
	rendertodos();
}

$('#button').click(addtodo)


function deletetodo (pos){
	todos.splice(pos, 1);
	rendertodos();
}
