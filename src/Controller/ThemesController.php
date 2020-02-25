<?php
namespace App\Controller;


use App\Entity\Themes;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ThemesController extends AbstractController
{

    /**
     * @Route("theme/insert", name="theme_insert", methods={"GET"})
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function insert(Request $request, EntityManagerInterface $entityManager )
    {
        $theme = new Themes();

        $theme->setName('histoire');

        $entityManager->persist($theme);
        $entityManager->flush();

    }

}