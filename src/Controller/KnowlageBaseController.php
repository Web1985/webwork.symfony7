<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class KnowlageBaseController extends AbstractController
{
    #[Route('/knowlage/base', name: 'app_knowlage_base')]
    public function index(): Response
    {
        return $this->render('knowlage_base/index.html.twig', [
            'controller_name' => 'KnowlageBaseController',
        ]);
    }
}
