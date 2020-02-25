<?php


namespace App\Controller;


use App\Entity\Bonus;
use App\Entity\Quantity;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("game/")
 * @param Request $request
 * @param EntityManagerInterface $entityManager
 * @return Response
 */

class ShopController extends AbstractController

{

    /**
     * @Route("shop", name="shop", methods={"GET","POST"}, path="/shop")
     * @Route("shop/{id}", name="buy_bonus", methods={"GET"})
     * @param Request $request
     * @return Response
     */

    public function getShopItem(Request $request, EntityManagerInterface $entityManager) :Response {

        //Récupérer tout les bonus
        $getAllBonus = $entityManager->getRepository(Bonus::class)->getBonus();

        if ($request->get('bonusID')){
            //Récupérer le bonus cliqué
            $bonus = $request->get('bonusID', null);
            $getBonus = $entityManager->getRepository(Bonus::class)->findOneBy(['id'=> $bonus]);

            //Ajouter le bonus à l'user tout en le débitant s'il a assez de tune
            $user = $this->getUser();

            /** @var User $user */
            /** @var Bonus $bonus */

            //On vérifie que le solde de l'user est supérieur au prix de l'objet de la boutique
            if ($user->getSolde() >= $getBonus->getPrice()){

                $user->setSolde($user->getSolde() - $getBonus->getPrice());

                if ($user->getBonus()->contains($getBonus)){

                    $getQuantity = $entityManager->getRepository(Quantity::class)->findOneBy(['bonus'=>$getBonus->getId()]);
                    $getQuantity->setQuantity($getQuantity->getQuantity()+ 1);
                    $entityManager->persist($getQuantity);
                }else{

                    $user->addBonus($getBonus);
                    $quantity = new Quantity();
                    $quantity->setUser($user);
                    $quantity->setBonus($getBonus);
                    $quantity->setQuantity(1);
                    $entityManager->persist($quantity);
                }

                $entityManager->persist($user);
                $entityManager->flush();
                $this->addFlash('success',"Votre objet a bien été acheté !");

            }else{
                $this->addFlash('error',"Vous n'avez pas assez d'argent!");
            }
        }

        return $this->render('Shop/shop.html.twig',['ShopBonus'=>$getAllBonus]);
    }


}