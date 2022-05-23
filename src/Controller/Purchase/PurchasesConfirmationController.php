<?php

namespace App\Controller\Purchase;

use App\Cart\CartService;
use App\Form\CartConfirmationType;
use App\Purchase\PurchasePersister;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PurchasesConfirmationController extends AbstractController{

    protected $router;
    protected $cartService;
    protected $em;
    protected $persister;

    public function __construct(CartService $cartService, EntityManagerInterface $em, PurchasePersister $purchasePersister)
    { 
        $this->cartService = $cartService;
        $this->em = $em;
        $this->persister = $purchasePersister;
    }

    #[Route('/purchase/confirm', name:"purchase_confirm")]
    #[IsGranted("ROLE_USER", message:"Vous devez être connecté")]
    public function confirm(Request $request, SessionInterface $session){

        $form = $this->createForm(CartConfirmationType::class);

        $form->handleRequest($request);

        // If the form is not submited
        if(!$form->isSubmitted()){
            $this->addFlash('warning', 'Vous devez emplire le formulaire de confirmation');
            return $this->redirectToRoute('cart_show');
        }

        $cartItems = $this->cartService->getDetailCartitems($session);

        if(count($cartItems) === 0){
            return $this->redirectToRoute('cart_show'); 
        }
        
        // Create a purchase
        /** @var Purchase */
        $purchase = $form->getData();

        $this->persister->storePurchase($purchase, $session);

        $this->cartService->emplty($session);

        $this->addFlash('success', 'Le commande a été enregistée');
        return $this->redirectToRoute('purchase_index');

    }

}