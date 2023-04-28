<?php

namespace App\Repository;

use PDO;

class TodoSqlRepository
{

    public function __construct(){
        $this->pdo = new PDO('sqlite:./sk.db');
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS allSKills (id  INTEGER PRIMARY KEY AUTOINCREMENT, nameOfTodo TEXT)");
    }
    public function get_all_todos()
    {

        $stmt = $this->pdo->prepare('SELECT nameOfTodo FROM allSKills');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    }

    public function save_todo(string $todo)
    {
        $stmt = $this->pdo->prepare('INSERT INTO allSKills (nameOfTodo) VALUES (:todo)');
        $stmt->bindParam(':todo', $todo);
        $stmt->execute();
    }

    public function delete_todo(string $todo)
    {
        $stmt = $this->pdo->prepare('DELETE FROM allSKills WHERE nameOfTodo = :todo');
        $stmt->bindParam(':todo', $todo);
        $stmt->execute();
    }
}

