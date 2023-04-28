<?php

namespace App\Service;

use App\Repository\TodoCookieRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TodoService
{
    public function add_todo(string $sanitaseNameOfSkill){
        $todoRepository = new TodoCookieRepository();
        $allTodos = $todoRepository->get_all_todos();
        foreach ($allTodos as $todo){
            if($sanitaseNameOfSkill === $todo){
                return ;
            }
        }
        $todoRepository->save_todo($sanitaseNameOfSkill);
    }
    public function delete_todo($nameOfSkills){
        $todoRepository = new TodoCookieRepository();
        $todoRepository->delete_todo($nameOfSkills);
    }
    public function get_all_todos(){
        $todoRepository = new TodoCookieRepository();
        return $todoRepository->get_all_todos();
    }
}
