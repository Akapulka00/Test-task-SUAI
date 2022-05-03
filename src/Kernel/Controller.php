<?php


namespace App\Kernel;
use  \Twig\Loader\FilesystemLoader;
use \Twig\Environment;


abstract class Controller
{
    protected function getTemplate($file, array $data = []){
        extract($data);
        ob_start(); // буферизированный вывод
        require_once 'templates/' . $file;
        $page = ob_get_contents();
        ob_clean();
        return $page;
    }
}
