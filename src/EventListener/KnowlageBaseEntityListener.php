<?php

namespace App\EntityListener;

use Doctrine\ORM\Events;
use App\Entity\KnowlageBase;
use Doctrine\ORM\Event\PostPersistEventArgs;
use Symfony\Component\String\Slugger\SluggerInterface;
use Doctrine\Bundle\DoctrineBundle\Attribute\AsEntityListener;

#[AsEntityListener(event: Events::prePersist, method: 'prePersist', entity: KnowlageBase::class)]
#[AsEntityListener(event: Events::preUpdate, method: 'preUpdate', entity: KnowlageBase::class)]
final class KnowlageBaseEntityListener
{
    private SluggerInterface $slugger;
    public function __construct(SluggerInterface $slugger) {
        $this->slugger = $slugger;
    }

    public function prePersist(KnowlageBase $knowlageBase, PostPersistEventArgs $events)
    {
        $knowlageBase->computeSlug($this->slugger);
    }

    public function preUpdate(KnowlageBase $knowlageBase, PostPersistEventArgs $evenareventsgs)
    {
        $knowlageBase->computeSlug($this->slugger);
    }
}