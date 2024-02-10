let taskList = [];

function addTask() {
  const taskInput = document.getElementById('taskInput');
  const taskText = taskInput.value.trim();

  if (taskText !== '') {
    taskList.push({ text: taskText, completed: false });
    renderTasks();
    taskInput.value = '';
  }
}

function toggleTask(index) {
  taskList[index].completed = !taskList[index].completed;
  renderTasks();
}

function deleteTask(index) {
  taskList.splice(index, 1);
  renderTasks();
}

function renderTasks() {
  const taskListContainer = document.getElementById('taskList');
  taskListContainer.innerHTML = '';

  taskList.forEach((task, index) => {
    const li = document.createElement('li');
    li.className = task.completed ? 'completed' : '';

    const toggleBtn = document.createElement('button');
    toggleBtn.textContent = task.completed ? 'Undo' : 'Complete';
    toggleBtn.addEventListener('click', () => toggleTask(index));

    const deleteBtn = document.createElement('button');
    deleteBtn.className = 'delete-btn';
    deleteBtn.textContent = 'Delete';
    deleteBtn.addEventListener('click', () => deleteTask(index));

    li.textContent = task.text;
    li.appendChild(toggleBtn);
    li.appendChild(deleteBtn);
    taskListContainer.appendChild(li);
  });
}
