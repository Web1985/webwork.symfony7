<?php
namespace App\Controller;

use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use App\Repository\KnowlageBaseRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController {
    #[Route(path:"/", name:"home")]
    public function index( KnowlageBaseRepository $knowlageBaseRepository): Response {

        $title = "Home page";

        return $this-> render('home.html.twig', [
            'title'=> $title,
            'knowlage_base' => $knowlageBaseRepository ->showTen(),
        ]);
    }
}