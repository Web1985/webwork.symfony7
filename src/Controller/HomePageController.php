<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController {
    #[Route(path:"/", name:"home")]
    public function index(): Response {

        $title = "Home page";

        return $this-> render('pages/home.html.twig', [
            'title'=> $title,
        ]);
    }
}