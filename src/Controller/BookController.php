<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use App\Repository\CommentRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(BookRepository $bookRepository): Response
    {
        return $this -> render('pages/book/index.html.twig', [
            'title' => 'Book',
            'book' => $bookRepository->findAll(),
        ]);
    }

    #[Route(path: '/book/{id}', name: 'article')]
    public function article(Request $request, Book $book, CommentRepository $commentRepository): Response {

        $offset = max(0, $request -> query -> getInt('offset') );
        $paginator = $commentRepository -> getCommentsPaginator($book, $offset);

        return $this -> render( 'pages/book/article.html.twig', [
           'article' => $book,
           'comments' => $paginator,
           'previous' => $offset - CommentRepository::COMMENTS_PER_PAGE,
           'next' => $offset + CommentRepository::COMMENTS_PER_PAGE
        ] );
    }
}
