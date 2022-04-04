<?php

namespace App\Controller\Purchase;

use App\Cart\CartItem;
use App\Cart\CartService;
use App\Entity\PurchaseItem;
use App\Entity\User;
use App\Form\CartConfirmationType;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class PurchasesConfirmationController extends AbstractController{

    protected $router;
    protected $cartService;
    protected $em;

    public function __construct(CartService $cartService, EntityManagerInterface $em)
    { 
        $this->cartService = $cartService;
        $this->em = $em;
    }

    #[Route('/purchase/confirm', name:"purchase_confirm")]
    #[IsGranted("ROLE_USER", message:"Vous devez etre connecté")]
    public function confirm(Request $request, SessionInterface $session){

        $form = $this->createForm(CartConfirmationType::class);

        $form->handleRequest($request);

        // If the form is not submited
        if(!$form->isSubmitted()){
            $this->addFlash('warning', 'Vous devez emplire le formulaire de confirmation');
            return $this->redirectToRoute('cart_show');
        }

        $user = $this->getUser();

        $cartItems = $this->cartService->getDetailCartitems($session);

        if(count($cartItems) === 0){
            return $this->redirectToRoute('cart_show'); 
        }
        
        // Create a purchase
        /** @var Purchase */
        $purchase = $form->getData();

        // Link the purchase and the user 
        $purchase->setUser($user)
        ->setPurchasedAt(new DateTime())
        ->setTotal($this->cartService->getTotal($session));

        $this->em->persist($purchase);

        // Link the purchase and the cart
        foreach($this->cartService->getDetailCartitems($session) as $cartItems){
            $purchaseItem = new PurchaseItem;
            $purchaseItem->setPurchase($purchase)
            ->setProduct($cartItems->product)
            ->setProductName($cartItems->product->getName())
            ->setQuantity($cartItems->qty)
            ->setTotal($cartItems->getTotal())
            ->setProductPrice($cartItems->product->getPrice());

            $this->em->persist($purchaseItem);
        }


        $this->em->flush();

        $this->cartService->emplty($session);

        $this->addFlash('success', 'Le commande a été enregistée');
        return $this->redirectToRoute('purchase_index');


    }

}