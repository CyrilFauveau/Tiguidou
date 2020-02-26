<?php
namespace App\Controller;


use App\Entity\Answer;
use App\Entity\Questions;
use App\Entity\Themes;
use App\Form\ChoiceThemeType;
use App\Form\QuizzType;
use App\Form\TiguidouQuizzType;
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
 * @Route("play/{id}", name="play_game", methods={"GET","POST"})
 *
 * @param Request $request
 * @param EntityManagerInterface $entityManager
 * @return Response
 */
    public function game(Request $request, EntityManagerInterface $entityManager){
        $themeID = $request->get('id');
        function randomQuestion($max) {
            $random = random_int(0, $max-1);
            return $random;
        }


        $getAllQuestions = $entityManager->getRepository(Questions::class)->findBy(['theme'=>$themeID]);

        $random = randomQuestion(count($getAllQuestions));

        $getQuestion = $getAllQuestions[$random];

        $getAnswer = $entityManager->getRepository(Answer::class)->getAnswers($getQuestion->getId());

        $formOptions = array('answers'=>$getAnswer);
        $form = $this->createForm(QuizzType::class, $getAnswer, $formOptions);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

            if ($form->get('answer')->getData()->getAnswer() == $getQuestion->getCorrectAnswer()){
                $this->addFlash('success',"Bonne réponse!");

            }else{
                $this->addFlash('error',"Mauvaise réponse !");

            }

        }

        return $this->render('Play/game.html.twig',['questions'=>$getQuestion,'form'=>$form->createView()]);
    }


}