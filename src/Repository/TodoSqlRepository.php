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
        $stmt = $this->pdo->query('SELECT nameOfTodo FROM allSKills');
        $results = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
        return $results;

    }

    public function save_todo(string $todo)
    {
        $this->pdo->query("INSERT INTO allSKills (nameOfTodo) VALUES ('$todo')");
    }

    public function delete_todo(string $todo)
    {
        $this->pdo->query("DELETE FROM allSKills WHERE nameOfTodo = '$todo'");
    }
}
