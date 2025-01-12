<?php

namespace App\EventSubscriber;

use App\Repository\CategoryRepository;
use Twig\Environment;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $categoryRepository;

    public function __construct(Environment $twig, CategoryRepository $categoryRepository)
    {
        $this->twig = $twig;
        $this->categoryRepository = $categoryRepository;
    }

    public function onControllerEvent(ControllerEvent $event): void
    {
        // Установка глобальной переменной "categories_title"
        $this->twig->addGlobal('categories_title', 'TITLR');

        // Установка глобальной переменной "categories"
        $categories = $this->categoryRepository->findAll();
        $this->twig->addGlobal('categories', $categories);
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onControllerEvent',
        ];
    }
}