<?php

class View{
   protected function renderView(string $file, array $data = [])
   {
      extract($data);
      require_once dirname(__DIR__,2)."/templates/". $file;
   }
   
}