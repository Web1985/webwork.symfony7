<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\BookRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Twig\Environment;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'category')]
    public function index(Environment $twig, CategoryRepository $categoryRepository): Response
    {
        return new Response($twig->render('category/index.html.twig', [
            'title' => 'Categories',
            'categories' => $categoryRepository->findAll(),
        ]));
    }

    #[Route(path: '/category/{id}', name: 'category_term')]
    public function categoryTerm(Environment $twig, Category $category, BookRepository $bookRepository): Response
    {
        return new Response($twig->render('category/category-term.html.twig', [
            'category' => $category,
            'articles' => $bookRepository -> findBy(['category' => $category])
        ]));
    }
}
