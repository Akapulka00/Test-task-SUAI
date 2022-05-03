<?php
namespace App\Controllers;



use App\Kernel\Controller;
use App\Db\Table1Db;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class IndexController extends Controller
{
    private $tble1Db;


    public function __construct(){
        $this->tble1Db = new Table1Db();

    }

    public function index(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('index.twig');

    }
}
