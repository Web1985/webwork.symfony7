<?php

namespace App\Controller;

use Twig\Environment;
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
    public function index( Environment $twig, ConferenceRepository $conferenceRepository): Response {

        $title = "Conferences page";

        return new Response($twig-> render('conference/index.html.twig', [
            'title'=> $title,
            'conferences' => $conferenceRepository ->findAll(),
        ]));
    }

    #[Route('conference/{id}', name:'conference')]
    public function show(Request $request,Environment $twig, Conference $conference, CommentRepository $commentRepository): Response {

        $offset = $request->query->getInt('offset',0);

        $paginator = $commentRepository -> getCommentPaginator($conference, $offset);

        return new Response($twig -> render('conference/node.html.twig', [
            'conference' => $conference,
            'comments' => $paginator,
            'previous' => $offset - CommentRepository::COMMENTS_PER_PAGE,
            'next' =>   $offset + CommentRepository::COMMENTS_PER_PAGE,

            ]));
    }

}
