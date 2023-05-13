<?php

namespace App\Controller;

use App\Entity\Gateau;
use App\Entity\Like;
use App\Repository\LikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LikeController extends AbstractController
{
    #[Route('/like/{id}', name: 'app_like')]
    public function like(Gateau $gateau, LikeRepository $likeRepository, EntityManagerInterface $entityManager): Response
    {

        $user = $this->getUser();

        if($gateau->isLikedBy($user)){
            $like= $likeRepository->findOneBy(['author'=>$this->getUser(),'gateau'=>$gateau]);

            $entityManager->remove($like);
            $isLiked = false;
        }
        else{
            $newLike= new Like();
            $newLike->setAuthor($this->getUser());
            $newLike->setGateau($gateau);
            $entityManager->persist($newLike);
            $isLiked = true;

        }

        $entityManager->flush($gateau);
        $data = [
            'liked'=>$isLiked,
            'count'=>$likeRepository->count(['gateau'=>$gateau])
        ];


        return $this->json($data, 200);
    }
}
