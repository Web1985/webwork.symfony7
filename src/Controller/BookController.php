<?php

namespace App\Controller;

use App\Entity\Book;
use Twig\Environment;
use App\Repository\BookRepository;
use App\Repository\CommentRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\TwigBundle\DependencyInjection\Compiler\TwigEnvironmentPass;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(Environment $twig, BookRepository $bookRepository): Response
    {
        return new Response($twig -> render('book/index.html.twig', [
            'title' => 'Book',
            'book' => $bookRepository->findAll(),
        ]));
    }

    #[Route(path: '/book/{id}', name: 'article')]
    public function article(Environment $twig, Book $book, CommentRepository $commentRepository): Response {
        return new Response($twig -> render( 'book/article.html.twig', [
           'article' => $book,
           'comments' => $commentRepository -> findBy(['book' => $book])
        ] ));
    }
}
