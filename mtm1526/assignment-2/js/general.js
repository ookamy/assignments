var list = document.getElementById('list');
var todo = document.getElementById('todo');

document.getElementById('btn').addEventListener('click', function (ev) {
if (todo.value != '') { 
	var newli = document.createElement('li'); 
	newli.innerHTML = todo.value;
	list.appendChild(newli);
	todo.value = '';
	}
}, false);

list.addEventListener('click', function (ev) {
	if(ev.target.className == 'done') {
	ev.target.className = '';}
	else {ev.target.className = 'done';}
}, false);