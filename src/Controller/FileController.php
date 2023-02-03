<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/file')]
class FileController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route("/{mode}", name: "file_process", methods: "POST")]
    public function addFile(Request $request, string $mode): JsonResponse
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
            throw new \Exception('Mode de correction invalide');
        }
        return new JsonResponse(['content' => $content]);
    }
}
