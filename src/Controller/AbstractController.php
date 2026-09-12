<?php
namespace App\Controller;

abstract class AbstractController
{
    protected function renderView(string $file, array $data = []): void
    {
        extract($data, EXTR_SKIP);

        $baseDir = dirname(__DIR__, 2);
        $candidatePaths = [
            $baseDir . '/templates/' . ltrim($file, '/'),
            $baseDir . '/templates/layout/' . ltrim($file, '/'),
        ];

        $templatePath = null;
        foreach ($candidatePaths as $candidate) {
            if (file_exists($candidate)) {
                $templatePath = $candidate;
                break;
            }
        }

        if ($templatePath === null) {
            throw new \Exception("Le fichier de vue {$file} est introuvable au chemin : " . implode(' ou ', $candidatePaths));
        }

        ob_start();
        require $templatePath;
        $pageContent = ob_get_clean();

        $layoutPath = $baseDir . '/templates/layout/base.php';
        if (!file_exists($layoutPath)) {
            throw new \Exception("Le layout {$layoutPath} est introuvable.");
        }

        $title = $title ?? 'DalalSpace';
        $currentPage = $currentPage ?? 'home';

        require $layoutPath;
    }

    abstract public function index();
    abstract public function show(array $args);
    abstract public function create();
    abstract public function store(array $formData);
}