<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class PageController extends AbstractController
{
    /**
     * @Route("/admin", name="admin_index", methods={"GET"})
     */
    public function adminIndex()
    {
        return $this->render('baseAdmin.html.twig');
    }

    /**
     * @Route("/", name="home_index", methods={"GET"})
     */
    public function userIndex()
    {
        return $this->render('UserInterface/homePage.html.twig');
    }

}
