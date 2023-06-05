<?php
namespace to-do-list;
class TasksList {
//Путь к файлу, где будет храниться список задач
const SAVE_FILE_NAME = 'tasks-list.json';

//Список задач
private $tasks = [];

public function __constructor()
{
//При создании объекта списка - загружаем задачи из файла
if(file_exists(self::SAVE_FILE_NAME)){
if($jsonContent = json_decode(file_get_contents(self::SAVE_FILE_NAME), JSON_OBJECT_AS_ARRAY)){
$this->tasks = $jsonContent;
}
}

}

//Сохранить список задач в файл
protected function saveList()
{
$jsonContent = json_encode($this->tasks);
file_put_contents(self::SAVE_FILE_NAME, $jsonContent);
}

//Изменить статус задачи
public function changeTaskStatus($id)
{
if(isset($this->tasks[$id])){
$this->tasks[$id]['done'] =  ! $this->tasks[$id]['done'];
}
$this->saveList();
}
//Удалить задачу
public function removeTask($id)
{
if(isset($this->tasks[$id])){
unset($this->tasks[$id]);
}

$this->saveList();
}

//Добавить задачу
public function addNewTasks($title)
{
$this->tasks[] = ['title' => $title, 'done' => false ];

$this->saveList();
}

//Вернуть список задач
public function getTasks()
{
return $this->tasks;
}
}

$tasksList = new TasksList();
if(isset($_GET['change_status']) && isset($_GET['id'])){
    $tasksList->changeTaskStatus($_GET['id']);
} elseif (isset($_GET['remove_task']) && isset($_GET['id'])) {
    $tasksList->removeTask($_GET['id']);
} elseif (isset($_POST['task_name'])){
    $tasksList->addNewTask($_POST['task_name']);
}
?>

<html>
<head>
    <title>TODO List</title>
    <style>
        .tasks-table{
            padding: 10px;
            background-color: rgba(250, 255, 177, 0.64);
            margin-bottom: 50px;
        }
        .tasks-table td {
            padding: 8px;
            border-bottom: 1px dotted black;
        }
        .task-name {
            min-width: 270px;
        }
    </style>
</head>
<body>
<h1>Список моих задач: </h1>
<table class="tasks-table" >
    <tbody>
    <tr><td><input type="checkbox" checked></td><td class="task-name">Пример задачи</td>
        <td><a href="#"><input type="button" value="X"></a></td></tr>
    </tbody>
</table>

<form>
    <label>Добавить задачу: </label><input type="text" size="20"> <input type="submit" value="Добавить">
</form>
</body>
</html>
