<?php
namespace App\Controller;


use App\Entity\Answer;
use App\Entity\Classement;
use App\Entity\Log;
use App\Entity\Questions;
use App\Entity\Themes;
use App\Form\ChoiceThemeType;
use App\Form\QuizzType;
use App\Form\TiguidouQuizzType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
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
     * @throws Exception
     */
    public function game(Request $request, EntityManagerInterface $entityManager){
        $themeID = $request->get('id');
        function randomQuestion($max) {
            $random = random_int(0, $max-1);
            return $random;
        }

        $getLog = $entityManager->getRepository(Log::class)->findOneBy(['theme'=>$themeID,'user'=>$this->getUser()]);

        if ($getLog == null){
            $log = new Log();
            $log->setTheme($themeID);
            $log->setUser($this->getUser());
            $log->setDate(new datetime);
            $log->setScore(0);
            $entityManager->persist($log);
            $entityManager->flush();
        }

        $getAllQuestions = $entityManager->getRepository(Questions::class)->findBy(['theme'=>$themeID]);
        $user = $this->getUser();
        $random = randomQuestion(count($getAllQuestions));

        $getQuestion = $getAllQuestions[$random];

        $getAnswer = $entityManager->getRepository(Answer::class)->getAnswers($getQuestion->getId());

        $formOptions = array('answers'=>$getAnswer);
        $form = $this->createForm(QuizzType::class, $getAnswer, $formOptions);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()){

            if ($form->get('answer')->getData()->getAnswer() == $getQuestion->getCorrectAnswer()){
                
                $this->addFlash('success',"Bonne réponse!");
                $user->setScore($user->getScore()+ 5);

            }else{
                $this->addFlash('error',"Mauvaise réponse !");
                $user->setScore($user->getScore()+ 0);

            }
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('Play/game.html.twig',['questions'=>$getQuestion,'form'=>$form->createView()]);
    }


    /**
     * @Route("game/result", name="result_page", methods={"GET","POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function getResult(Request $request, EntityManagerInterface $entityManager){

        //Enregistrement du résultat  dans le log dans la base de donnée.
        $getLog = $entityManager->getRepository(Log::class)->findOneBy(['user'=>$this->getUser()],['date'=>'DESC']);

        $getLog->setScore($this->getUser()->getScore());
        $this->getUser()->setSolde($this->getUser()->getSolde + $this->getUser()->getScore());
        $this->getUser()->setScore(0);

        //Créer le classement
        $getClassement = $entityManager->getRepository(Classement::class)->findOneBy(['user'=>$this->getUser(),'theme'=>$getLog->getTheme()]);
        if ($getClassement){
            if ($getClassement->getScore() > $getLog->getScore()){
                $getClassement->setScore($getLog->getScore());
                $this->addFlash('sucess','Nouveau record');
            }
        }else{
            $classement = new Classement();
            $classement->setUser($this->getUser());
            $classement->setScore($getLog->getScore());
            $classement->setTheme($getLog->getTheme());
            $entityManager->persist($classement);
        }

        $entityManager->flush();

        return $this->render('Play/resultat.html.twig',['classement'=>$classement]);

    }


    /**
     * @Route("game/recap", name="recap", methods={"GET","POST"})
     *
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response
     */

    public function getRecap(Request $request, EntityManagerInterface $entityManager){

        $getLog = $entityManager->getRepository(Log::class)->findOneBy(['user'=>$this->getUser()],['date'=>'DESC']);
        $getClassementTheme = $entityManager->getRepository(Classement::class)->findBy(['theme'=>$getLog->getTheme()],['score'=>'DESC']);

        return $this->render('Play/recap.html.twig',['classement'=>$getClassementTheme]);

    }

}