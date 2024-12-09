<?php

namespace App\Controller;

use App\Entity\Conference;
use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ConferenceController extends AbstractController
{
    #[Route('/conference', name: 'app_conference')]
    public function index( ConferenceRepository $conferenceRepository): Response {

        $title = "Conferences page";

        return $this-> render('conference/index.html.twig', [
            'title'=> $title,
            'conferences' => $conferenceRepository ->findAll(),
        ]);
    }

    #[Route('conference/{slug}', name:'conference')]
    public function show(Request $request, Conference $conference, CommentRepository $commentRepository): Response {

        $offset = $request->query->getInt('offset',0);

        $paginator = $commentRepository -> getCommentPaginator($conference, $offset);

        return $this -> render('conference/node.html.twig', [
            'conference' => $conference,
            'comments' => $paginator,
            'previous' => $offset - CommentRepository::COMMENTS_PER_PAGE,
            'next' =>   $offset + CommentRepository::COMMENTS_PER_PAGE,

            ]);
    }

}
