<?php

namespace App\Controller;

use \DateTime;
use App\Entity\Log;
use App\Repository\LogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints as Assert;


class PingPongController extends AbstractController
{

    /**
     * @return Response
     * @Route ("/", name="home",  methods={"GET","HEAD"})
     */
    public function indexAction(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @return JsonResponse
     * @Route ("/",  methods={"POST"})
     */
    public function pongAction(EntityManagerInterface $entityManager): JsonResponse
    {
        $log = new Log();
        $log->setDate(new DateTime());
        $entityManager->persist($log);
        $entityManager->flush();
        return $this->json('Pong');
    }



}