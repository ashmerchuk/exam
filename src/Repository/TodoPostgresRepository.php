<?php

namespace App\Repository;


class TodoPostgresRepository
{



//    public function __construct(){
//        $this->pdo = new PDO('sqlite:./sk.db');
//        $this->pdo->exec("CREATE TABLE IF NOT EXISTS allSKills (id  INTEGER PRIMARY KEY AUTOINCREMENT, nameOfTodo TEXT)");
//    }

    private $entityManager;

//    public function __construct(EntityManagerInterface $entityManager)
//    {
//        $this->entityManager = $entityManager;
//    }
    public function get_all_todos() : array
    {
//        $repository = $this->entityManager->getRepository(Skills::class);
//        dd($repository->findAll());
        return [];
//         $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

    }

    public function save_todo(string $todo)
    {
        $stmt = $this->pdo->prepare('INSERT INTO sKills (name) VALUES (:todo)');
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


