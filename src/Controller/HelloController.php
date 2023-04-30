<?php
namespace App\Controller;

use App\Entity\Skills;
use App\Repository\SkillsRepository;
use App\Service\TodoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    public function list_items(SkillsRepository $skillsRepository): Response
    {
        $skillsRepository = $this->entityManager->getRepository(Skills::class);
        $skills = $skillsRepository->selectAll();
        return $this->render(
            'hello/hello.html.twig',
            [
                'skills' =>  $skills,
            ]
        );
    }
    public function add_items(Request $request)
    {
        $todoService = new Skills();
        $todoService->setName($request->get('nameOfSkill'));
        $todoService->setText($request->get('text'));
        $this->entityManager->persist($todoService);
        $this->entityManager->flush();

        return new RedirectResponse('/list');
    }
    public function delete_items(Request $request)
    {
        $skillsRepository = $this->entityManager->getRepository(Skills::class);
        $skillsRepository->delete($request->get('index'));
        return new RedirectResponse('/list');
    }
}
