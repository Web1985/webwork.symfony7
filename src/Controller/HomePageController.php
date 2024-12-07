<?php
namespace App\Controller;

use Twig\Environment;
use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController {
    #[Route(path:"/", name:"home")]
    public function index(Request $request, Environment $twig, ConferenceRepository $conferenceRepository): Response {

        $title = "Home page";

        return new Response($twig-> render('conference/index.html.twig', [
            'title'=> $title,
            'conferences' => $conferenceRepository ->findAll(),
        ]));
    }

    #[Route('node/{id}', name:'node')]
    public function show(Environment $twig, Conference $conference, CommentRepository $commentRepository): Response {
        return new Response($twig -> render('conference/show.html.twig', [
            'conference' => $conference,
            'comments' => $commentRepository ->findBy(['conference' => $conference], ['createdAt' => 'DESC']),
            ]));
    }
}