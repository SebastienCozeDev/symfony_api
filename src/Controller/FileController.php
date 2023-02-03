<?php

namespace App\Controller;

use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/file')]
class FileController extends AbstractController
{
    /**
     * Cette méthode est associée à la route /file/{mode}. Elle permet de recevoir un fichier depuis un client pour lui
     * renvoyer le fichier corrigé.
     *
     * @throws Exception
     */
    #[Route("/{mode}", name: "file_process", methods: "POST")]
    public function addFile(Request $request, string $mode): Response
    {
        $file = $request->files->get('file');

        // Obtenir le contenu du fichier qui a été upload.
        $content = file_get_contents($file->getPathname());

        // Application la correction souhaitée.
        if ($mode === 'upper') {
            $content = strtoupper($content);
        } elseif ($mode === 'lower') {
            $content = strtolower($content);
        } else {
            throw new Exception('Mode de correction invalide');
        }

        // Construire la réponse.
        $response = new Response();
        $response->setContent($content);
        $response->headers->set('Content-Type', 'text/plain');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $file->getClientOriginalName() . '"');

        return $response;
    }
}
