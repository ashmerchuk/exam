<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use function PHPUnit\Framework\isEmpty;

class HelloController extends AbstractController
{
    private $skills = [];
//    private $skills = ['HTML', 'CSS', 'JS', 'PHP'];
    private $name = 'Andrii';
    private $job = 'Software Developer';

    public function list_items(Request $request): Response
    {

        if (isset($_COOKIE['skills'])) {
            $addedSkills = explode('~', $_COOKIE['skills']);
            foreach ($addedSkills as $value) {
                if ($value != '')
                    $this->skills[] = $value;
            }
        }

        return $this->render(
            'hello/hello.html.twig',
            [
                'name' => $this->name,
                'job' => $this->job,
                'skills' => $this->skills,
            ]
        );
    }
    public function add_items(Request $request)
    {
        if (isset($_COOKIE['skills'])) {
            $nameOfSkill = $_POST['nameOfSkill'];
            $nameOfSkill = str_replace('~','',$nameOfSkill);
            if ($nameOfSkill != '') {
                $_COOKIE['skills'] = $_COOKIE['skills'] . '~' . $nameOfSkill;
                setcookie('skills', $_COOKIE['skills']);
            }
        } else {
            setcookie('skills', $_POST['nameOfSkill']);
        }
        return new RedirectResponse('/list');
    }
    public function delete_items(Request $request)
    {
            $skillsArray = explode("~", $_COOKIE['skills']);
            array_splice($skillsArray, $_POST['index'], 1);
            setcookie('skills', implode("~", $skillsArray));
        return new RedirectResponse('/list');
    }
}
