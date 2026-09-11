<?php
namespace App\Controller;

abstract class AbstractController{
    protected function renderView(string $file, array $data = [])
   {
      extract($data);
      require_once dirname(__DIR__,2)."/templates/". $file;
   }
   abstract public function index( );
   abstract public function show();
   abstract public function create();
   abstract public function store();
}