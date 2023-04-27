<?php

namespace App\Service;

use App\Repository\TodoCookieRepository;
use App\Repository\TodoFileRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

class TodoService
{
    private TodoFileRepository $Repository;
    public function __construct(){
        $this->Repository = new TodoFileRepository();
    }
    public function add_todo(string $sanitaseNameOfSkill)
    {
        $allTodos = $this->Repository->get_all_todos();
        foreach ($allTodos as $todo) {
            if ($sanitaseNameOfSkill === $todo) {
                return;
            }
        }
        $this->Repository->save_todo($sanitaseNameOfSkill);
    }

    public function delete_todo($nameOfSkills)
    {
        $this->Repository->delete_todo($nameOfSkills);
    }

    public function get_all_todos()
    {
        return $this->Repository->get_all_todos();
    }
}
