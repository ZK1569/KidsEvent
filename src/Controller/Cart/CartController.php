<?php

namespace App\Controller\Cart;


use App\Cart\CartService;
use App\Form\CartConfirmationType;
use App\Repository\SupplementRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CartController extends AbstractController
{

    protected $supplementRepository;
    protected $cartService;

    public function __construct(SupplementRepository $supplementRepository, CartService $cartService)
    {
        $this->supplementRepository = $supplementRepository;
        $this->cartService = $cartService;
        
    }



    #[Route('cart/add/supplement{id}', name:"cart_add_supplement")]
    public function add(int $id, Request $request, SessionInterface $session)
    {
        // Si le supplement est dans la base de donnée 
        $supplement = $this->supplementRepository->find($id);
        if (!$supplement){
            throw $this->createNotFoundException('Le supplement $id n\'existe pas !');
        }
        
        $this->cartService->add($id, $session);

        $this->addFlash('success', "Le supplement a bien été ajouté au panier");

        return $this->redirectToRoute('cart_show');
    }

    #[Route('cart/delete/supplement/{id}', name:"cart_delete_supplement")]
    public function delete(int $id, SessionInterface $session){

        $supplement = $this->supplementRepository->find($id);

        if(!$supplement){
            throw $this->createNotFoundException("Le theme $id n\'existe pas et ne peut pas être supprimé !");
        }

        $this->cartService->remove($id, $session);

        $this->addFlash("success", "Le supplement a bien été supprimé du panier");

        return $this->redirectToRoute("cart_show");

    }

    #[Route('/cart', name:'cart_show')]
    public function show(SessionInterface $session, CartService $cartService){

        $form = $this->createForm(CartConfirmationType::class);
        
        $detailCart = $cartService->getDetailCartitems($session);

        $total = $cartService->getTotal($session);

        return $this->render('cart/index.html.twig', [
            'items' => $detailCart,
            'total' => $total,
            'confirmationForm' => $form->createView(),   
        ]);
    }



    #[Route('/cart/decrement/supplement/{id}', name:"cart_decrement_supplement")]
    public function decrement(int $id, SessionInterface $session) {

        $supplement = $this->supplementRepository->find($id);

        if(!$supplement){
            throw $this->createNotFoundException(" Le supplement $id n'eciste pas et ne peut pas être modifier");
        }

        $this->cartService->decrement($id, $session);

        $this->addFlash('success', 'Le supplement a bien ete modifier');

        return $this->redirectToRoute('cart_show');

    }

}
