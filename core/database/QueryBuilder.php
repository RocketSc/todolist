<?php

namespace Core\Database;

use App\Models\Task;

class QueryBuilder
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table, $intoClass)
    {
        $intoClass = 'App\\Models\\' . $intoClass;
        $sql = 'SELECT * FROM ' . $table;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }

    public function insertTask($table, Task $task)
    {

        $sql = 'INSERT INTO ' . $table . '(description, completed) '
             . 'VALUES (:description, :completed)';

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':description', $task->description, \PDO::PARAM_STR);
            $stmt->bindParam(':completed', $task->completed, \PDO::PARAM_BOOL);
            $stmt->execute();
        } catch (\Exception $e) {
            die('Whoops, smth went wrong' . $e->getMessage());
        }
    }

    public function updateTask($table, $taskId, $completed)
    {
        $sql = 'UPDATE ' . $table . ' SET completed = :completed '
            . 'WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindParam(':completed', $completed, \PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $taskId, \PDO::PARAM_INT);

        $stmt->execute();

        return true;
    }

    public function updateTasks($table, Array $completedTasks)
    {
        $in = join( ',', array_fill(0, count($completedTasks), '?') );

        $sql = 'UPDATE ' . $table . ' SET completed = 1 '
             . 'WHERE id IN (' . $in . ')';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($completedTasks);

        $sql = 'UPDATE ' . $table . ' SET completed = 0 '
            . 'WHERE id NOT IN (' . $in . ')';

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($completedTasks);
    }

    public function selectCompleted($table, $intoClass)
    {
        $intoClass = 'App\\Models\\' . $intoClass;
        $sql = 'SELECT * FROM ' . $table
             . ' WHERE completed = 1';


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }

    public function selectUnfinished($table, $intoClass)
    {
        $intoClass = 'App\\Models\\' . $intoClass;
        $sql = 'SELECT * FROM ' . $table
            . ' WHERE completed = 0';


        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, $intoClass);
    }
}