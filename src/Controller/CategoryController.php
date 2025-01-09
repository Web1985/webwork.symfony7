<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this -> render('category/index.html.twig', [
            'title' => 'Categories',
            'categories' => $categoryRepository->findAll(),
        ]);
    }


    #[Route(path: '/category/{id}', name: 'category_term')]
    public function categoryTerm(Request $request, Category $category, BookRepository $bookRepository): Response
    {
        $offset =  max(0, $request -> query -> getInt('offset'));
        $pagginator = $bookRepository -> getBookPaginator($category, $offset);

        return $this->render('category/category-term.html.twig', [
            'category' => $category,
            'articles' => $pagginator,
            'previous' => $offset - BookRepository::ARTICLES_PER_PAGE,
            'next' => $offset + BookRepository::ARTICLES_PER_PAGE
        ]);
    }
}
