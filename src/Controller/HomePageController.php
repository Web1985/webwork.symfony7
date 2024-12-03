<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController {
    #[Route("/")]
    public function index(): Response {
        //$title = $this->getDoctrine()->getRepository("test")->findOneBy(array(
        $title = "Home page";
        return $this->render("home.html.twig", [
            "title"=> $title,

        ]);
    }
}