<?php

namespace App\Controller;

use App\Repository\SkillRepository;
use App\Repository\ProjectRepository;
use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;



class PageController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index", methods={"GET"})
     * @IsGranted("ROLE_DEV")
     */
    public function adminIndex()
    {
        return $this->render('baseAdmin.html.twig');
    }

    /**
     * @Route("/", name="home_index", methods={"GET"})
     */
    public function userIndex(
        EducationRepository $educationRepository,
        ExperienceRepository $experienceRepository,
        ProjectRepository $projectRepository,
        SkillRepository $skillRepository
    )
    {
        $education = $educationRepository->findAll();
        $experience = $experienceRepository->findAll();
        $project = $projectRepository->findAll();
        $skill = $skillRepository->findAll();

        return $this->render('UserInterface/homePage.html.twig',
            [
                'educations' => $education,
                'experiences' => $experience,
                'projects' => $project,
                'skills' => $skill
            ]);
    }

}
