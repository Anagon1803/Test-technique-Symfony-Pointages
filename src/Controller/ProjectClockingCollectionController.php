<?php

declare(strict_types = 1);

namespace App\Controller;

use App\Repository\ProjectClockingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\Mapping\Entity;

#[Route('/project_clockings')]
class ProjectClockingCollectionController extends
    AbstractController
{

    /**
     * @param \App\Repository\ProjectClockingRepository $projectClockingRepository
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    #[Route('/', name: 'app_ProjectClocking_list', methods: ['GET'])]
    public function listProjectClockings(ProjectClockingRepository $projectClockingRepository) : Response
    {
        $project_clockings = $projectClockingRepository->findAll();

        return $this->render('app/ProjectClocking/list.html.twig', [
            'project_clockings' => $project_clockings,
        ]);
    }
}
