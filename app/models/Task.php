<?php

namespace App\Models;

class Task
{
    //properties
    public $description;
    public $id;
    public $completed = false;

    //constructor
    /* public function __construct($description)
     {
         $this->description = $description;
     }*/

    //methods
    public function isComplete()
    {
        return $this->completed;
    }

    public function complete()
    {
        $this->completed = true;
    }

}