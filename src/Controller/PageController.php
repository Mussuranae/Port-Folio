<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\SkillRepository;
use App\Repository\ProjectRepository;
use App\Repository\EducationRepository;
use App\Repository\ExperienceRepository;

use App\Repository\UserRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $user = new User();
        $userId = $user->getEmail('mandonnetdev@outlook.com');

        $education = $educationRepository->allOrderByDate();
        $experience = $experienceRepository->allOrderByDate();
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

    /**
$     * @Route("/contact", name="contact_form")
     */
    public function contactForm(Request $request, \Swift_Mailer $mailer, UserRepository $userRepository)
    {
        $user = $userRepository->findOneBy(['email' => 'mandonnetdev@outlook.com']);

        if ($request->getMethod() == 'POST') {
            $nom = $request->request->get('lastname');
            $prenom = $request->request->get('firstname');
            $from = $request->request->get('email');
            $title = $request->request->get('title');
            $contactMessage = $request->request->get('message');

            $message = (new \Swift_Message($title))
                ->setFrom('mandonnetdev@outlook.com')
                ->setTo('mandonnetdev@outlook.com')
                ->setReplyTo($from)
                ->setBody("Mail de $nom  $prenom ($from)
                Message : 
                $contactMessage");

            $mailer->send($message);
            $this->addFlash('notice', "Votre message a bien été envoyé.");

            return $this->redirectToRoute('contact_form');
        }

        return $this->render('UserInterface/contact.html.twig', ['user' => $user]);
    }

}
