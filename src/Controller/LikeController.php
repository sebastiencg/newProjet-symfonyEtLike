<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like', name: 'app_like')]
    public function like(): Response
    {
        die("bien");
        return $this->render('like/index.html.twig', [
            'controller_name' => 'LikeController',
        ]);
    }
    #[Route('/dislike', name: 'app_dislike')]
    public function dislike(): Response
    {
        die("mal");
        return $this->render('like/index.html.twig', [
            'controller_name' => 'LikeController',
        ]);
    }
}
