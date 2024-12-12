<?php

namespace App\EventSubscriber;

use Twig\Environment;
use App\Repository\ConferenceRepository;
use App\Repository\KnowlageBaseRepository;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TwigEventSubscriber implements EventSubscriberInterface
{
    private $twig;
    private $conferenceRepository;

    private $knowlageBaseRepository;
    public function __construct(
        Environment $twig,
        ConferenceRepository $conferenceRepository,
        KnowlageBaseRepository $knowlageBaseRepository
    ) {
        $this->twig = $twig;
        $this->conferenceRepository = $conferenceRepository;
        $this->knowlageBaseRepository = $knowlageBaseRepository;


    }
    public function onControllerEvent(ControllerEvent $event): void
    {
        $this -> twig->addGlobal("conferences", $this -> conferenceRepository -> findAll());
        $this -> twig->addGlobal("nodes", $this -> knowlageBaseRepository->showTen());
        // ...
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ControllerEvent::class => 'onControllerEvent',
        ];
    }
}
