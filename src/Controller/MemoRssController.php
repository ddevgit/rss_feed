<?php

namespace App\Controller;

use App\Services\MemoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MemoRssController extends AbstractController
{
    #[Route('/memo', name: 'app_memo_rss')]
    public function index(MemoService $memoService): Response
    {

        $memoService->createMemo();
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MemoRssController.php',
        ]);
    }
}
