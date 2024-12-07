<?php
namespace App\Controller;

use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController {
    #[Route(path:"/", name:"home")]
    public function index( ConferenceRepository $conferenceRepository): Response {

        $title = "Home page";

        return $this-> render('conference/index.html.twig', [
            'title'=> $title,
            'conferences' => $conferenceRepository ->findAll(),
        ]);
    }

    #[Route('node/{id}', name:'node')]
    public function show( Conference $conference, CommentRepository $commentRepository): Response {
        return $this -> render('conference/show.html.twig', [
            'conference' => $conference,
            'comments' => $commentRepository ->findBy(['conference' => $conference], ['createdAt' => 'DESC']),
            ]);
    }
}