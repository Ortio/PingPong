<?php

namespace App\Controller;

use \DateTime;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Exception\BadMethodCallException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PingPongController extends AbstractController
{
    /**
     * @return Response
     */
    public function indexAction(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @return JsonResponse
     */
    public function pingAction(EntityManagerInterface $entityManager): JsonResponse
    {
        $log = new Log();
        $log->setDate(new DateTime());
        $entityManager->persist($log);
        $entityManager->flush();
        return $this->json('Pong');
    }

    /**
     * @return JsonResponse
     */
    public function notFoundAction(EntityManagerInterface $entityManager): JsonResponse
    {
        return $this->json(throw new BadMethodCallException('Ресурс отсутствует'));
    }

}
