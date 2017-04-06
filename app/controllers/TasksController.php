<?php

namespace App\Controllers;

use Core\Settings;
use App\Models\Task;

class TasksController
{
    public function index()
    {
        $tasks = Settings::get('database')->selectAll('todos', 'Task');
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store()
    {
        if (isset($_POST['description'])) {
            $referrer = $_SERVER['HTTP_REFERER'];
            $task = new Task();
            $task->description = $_POST['description'];
        } else {
            header('Location: ' . '/');
        }


        Settings::get('database')->insertTask('todos', $task);

        header('Location: ' . $referrer);
    }

    public function showCompleted()
    {
        $tasks = Settings::get('database')->selectCompleted('todos', 'Task');

        return view('completed', ['tasks' => $tasks, 'completedTaskCount' => count($tasks)]);
    }

    public function showUnfinished()
    {
        $tasks = Settings::get('database')->selectUnfinished('todos', 'Task');
        return view('unfinished', ['tasks' => $tasks, 'taskCount' => count($tasks)]);
    }

    public function update()
    {
        $result = true;

        //Проверяем полученные данные
        if ( isset($_POST['taskId']) ) {
            $taskId = intval($_POST['taskId']);
        } else {
            $result = false;
        }

        if ( isset($_POST['completed']) ) {
            $completed = intval($_POST['completed']);
        } else {
            $result = false;
        }

        if (! $result) {
            die('false');
        }

        $result = Settings::get('database')->updateTask('todos', $taskId, $completed);

        echo $result;
    }
}