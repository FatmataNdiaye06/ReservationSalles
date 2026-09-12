<?php
namespace App\Controller;

abstract class AbstractController
{
    protected function renderView(string $file, array $data = []): void
    {
        extract($data);
        $templatePath = dirname(__DIR__, 2) . "/templates/layout/" . $file;

        if (!file_exists($templatePath)) {
            throw new \Exception("Le fichier de vue {$file} est introuvable au chemin : {$templatePath}");
        }

        require_once $templatePath;
    }


    abstract public function index();
    abstract public function show(array $args);
    abstract public function create();
    abstract public function store(array $formData);
}