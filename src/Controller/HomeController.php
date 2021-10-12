<?php

namespace App\Controller;

use App\Service\MessageGenerator;
use App\Service\simklAPI;
use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(simklAPI $api): Response
    {

        $content = $api->searchDetailedById();
        return $this->render('home/index.html.twig', [
            "content" => $content,
        ]);
    }
}
