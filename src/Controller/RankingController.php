<?php


namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("ranking/")
 * @param Request $request
 * @param EntityManagerInterface $entityManager
 * @return Response
 */
class RankingController extends AbstractController
{
    /**
     * @Route("general", name="general", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function getGeneralRanking(Request $request) :Response{


        return $this->render('Ranking/generalRanking.html.twig');
    }
}