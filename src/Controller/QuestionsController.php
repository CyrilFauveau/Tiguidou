<?php
namespace App\Controller;


use App\Entity\Questions;
use App\Entity\Themes;
use App\Form\ChoiceThemeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionsController extends AbstractController
{
    /**
     * @Route("play/theme", name="play_theme", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function theme(Request $request, EntityManagerInterface $entityManager)
    {

        $themes = $entityManager->getRepository('App:Themes')->findAll();



        return $this->render('Play/theme.html.twig', [
            "theme" => $themes,
        ]);
    }


    /**
     * @Route("play/theme/{id}", name="play_start", methods={"GET", "POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function start(Request $request, EntityManagerInterface $entityManager): Response
    {
        $themes= $request->get('id');

        return $this->render('Play/start.html.twig', [
            "themes" => $themes
        ]);
    }

/**
 * @Route("play/{id}", name="play_game", methods={"GET"})
 *
 * @param Request $request
 * @param EntityManagerInterface $entityManager
 * @return Response
 */
public function game(){

    return $this->render('Play/game.html.twig');
}

//$theme = $request->getSession()->get('id');
//$questions = $entityManager->getRepository('App:Questions')->findByTheme($theme->get('theme')->getData());
//
//
//return $this->render('Play/start.html.twig', [
//"questions" => $questions
//]);

}