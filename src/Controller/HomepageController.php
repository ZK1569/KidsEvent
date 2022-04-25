<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{

    public function __construct(private ProductRepository $productRepository)
    {
        $this->productRepository->findAll();
    }

    #[Route('/', name:'homepage.index')]
    public function index():Response{

        return $this->render('homepage/home.html.twig', [
            "contenu" => $this->productRepository->findAll(),
        ]);
    }
}
