<?php

namespace App\Controller;

use App\Entity\KnowlageBase;
use App\Repository\KnowlageBaseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class KnowlageBaseController extends AbstractController
{
    #[Route('/knowlage-base', name: 'knowlage_base')]
    public function index(Request $request, KnowlageBaseRepository $knowlageBaseRepository): Response
    {
        $offset = $request -> query-> getInt('offset', 0);
        $paginator = $knowlageBaseRepository->getKnowlageBasePaginator($offset);
        $title = 'Knowlage Base';
        return $this->render('knowlage_base/index.html.twig', [
            'title' => $title,
            'knowlages' => $paginator,
            'prev' => $offset - KnowlageBaseRepository::KNOWLAGE_BASE_PER_PAGE,
            'next' => $offset + KnowlageBaseRepository::KNOWLAGE_BASE_PER_PAGE,

        ]);
    }

}
