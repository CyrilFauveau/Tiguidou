<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    /**
     * @Route("", name="home_index", methods={"GET", "POST"})
     * @return Response
     */
    public function index()
    {
        return $this->render('Home/index.html.twig', [

        ]);
    }
}