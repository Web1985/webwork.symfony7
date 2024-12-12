<?php

namespace App\EventListener;

use App\Entity\Conference;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsEntityListener(event: Events::prePersist, entity: Conference::class)]
#[AsEntityListener(event: Events::preUpdate, entity: Conference::class)]
final class ConferenceEntityListener
{
    public function __construct(
        private SluggerInterface $slugger
        ) {

    }

    public function prePersist (Conference $conference, LifecycleEventArgs $events): void {
        $conference -> computeSlug($this->slugger);
    }
    public function preUpdate (Conference $conference, LifecycleEventArgs $areventsgs): void {
        $conference -> computeSlug($this->slugger);
    }
}
