<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController {
    #[Route(path:"/", name:"home")]
    public function index(Request $request): Response {
        $get_name = [];
        if( $name = $request ->query->get("name") ) {
            $get_name = htmlspecialchars($name);
        };
        //$title = $this->getDoctrine()->getRepository("test")->findOneBy(array(
        $title = "Home page";
        return $this->render("home.html.twig", [
            "title"=> $title,
            "get_name"=> $get_name

        ]);
    }
}