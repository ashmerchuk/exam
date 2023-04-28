<?php

namespace App\Controller;

use App\Service\Bike;
use App\Service\TodoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use function PHPUnit\Framework\isEmpty;

class HelloController extends AbstractController
{

    public function list_items(Request $request): Response
    {
        $todoService = new TodoService();

        return $this->render(
            'hello/hello.html.twig',
            [
                'skills' =>  $todoService->get_all_todos(),
            ]
        );
    }
    public function add_items(Request $request)
    {
        $nameOfSkill = $request->get('nameOfSkill');
        $todoService = new TodoService();
        $todoService->add_todo($nameOfSkill);
        return new RedirectResponse('/list');
    }
    public function delete_items(Request $request)
    {
        $indexOfRemoving = $request->get('name');
        $todoService = new TodoService();
        $todoService->delete_todo($indexOfRemoving);
        return new RedirectResponse('/list');
    }
}
