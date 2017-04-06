<?php

namespace App\Controllers;

use Core\Settings;

class PagesController
{
    public function home()
    {
        $tasks = Settings::get('database')->selectAll('todos', 'Task');
        return view('index', ['tasks' => $tasks]);
    }
}