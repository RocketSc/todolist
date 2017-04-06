function postState(e) {
  var taskId = e.target.dataset.task;
  var completed = +e.target.checked;

  console.log(taskId);
  var body = 'taskId=' + taskId + '&' + 'completed=' + completed;

  var xhr = new XMLHttpRequest();

  xhr.open('POST', '/tasks/update', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onloadend = function() {
    if (xhr.responseText == 1) {
      updateTaskState(taskId, completed);
    }
  };

  xhr.send(body);


}

function updateTaskState(taskId, completed) {
  var labelId = 'task-' + taskId;

  var label = document.querySelector('label[for=' + labelId);
  if (completed) {
    label.parentNode.classList.add('completed');
  } else {
    label.parentNode.classList.remove('completed');
  }
}

var tables = document.getElementsByClassName('task-table');

for (var i = 0; i < tables.length; i++) {
  tables[i].addEventListener('change', postState);
}
