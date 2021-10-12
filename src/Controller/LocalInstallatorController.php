<?php

namespace App\Controller;

use http\Client\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LocalInstallatorController extends AbstractController
{
    private string $path;
    private string $variablePath;
    /**
     * @Route("/installation/step_1", name="local_installator")
     */
    public function index(): Response
    {

        return $this->render('local_installator/index.html.twig', [
            'controller_name' => 'LocalInstallatorController',
        ]);
    }

    /**
     * @Route("/installation/step_2", name="second_step")
     */
    public function installationStep2(\Symfony\Component\HttpFoundation\Request $request){

        $this->path = $request->get('path_to_folder') . "/";

        if ( is_dir($this->path) ) {
            $fileOrDir = scandir($this->path);
            $this->parseAnimes($fileOrDir);
        }

        return $this->render('local_installator/step_2.html.twig', [
            'yo' => 'lol',
        ]);
    }

    /**
     * @param array $animeList
     */
    private function parseAnimes(array $animeList) {

        foreach ($animeList as $item) {
            if ($item !== "." || $item !== "..") {
                if (is_dir($this->path . $this->subdirPath . $item)) {
                    $subdir = scandir($this->path . $item);
                    $this->parseAnimes($subdir);
                }
            }
        }
    }
}
