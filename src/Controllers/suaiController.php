<?php


namespace App\Controllers;



use App\Db\Table1Db;
use App\Kernel\Controller;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class suaiController extends Controller
{

    private $table1Db;

    public function __construct(){
        $this->table1Db = new Table1Db();

    }
    public function getTable1(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('table1.twig');
    }
    public function getTable1_by_ID(){
        $post = $_POST;
        $ID=$post['stud_ID'];
        $getTable1 = $this->table1Db->getTable1($ID);
        echo json_encode($getTable1) ;
    }
    public function getTable2(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('table2.twig');
    }
    public function getTable2_by_ID(){
        $post = $_POST;
        $ID=$post['task_ID'];
        $getTable2 = $this->table1Db->getTable2($ID);
        echo json_encode($getTable2) ;
    }
    public function getTable3(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('table3.twig');
    }
    public function getTable3_by_ID(){
        $post = $_POST;
        $ID=$post['task_ID'];
        $getTable3 = $this->table1Db->getTable3($ID);
        echo json_encode($getTable3) ;
    }
    public function getTable4(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('table4.twig');
    }
    public function getTable4_by_ID(){
        $post = $_POST;
        $ID=$post['task_ID'];
        $getTable4 = $this->table1Db->getTable4($ID);
        echo json_encode($getTable4) ;
    }
    public function getTable5(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('table5.twig');
    }
    public function getTable5_by_ID(){
        $post = $_POST;
        $ID=$post['inspector_ID'];
        $getTable5 = $this->table1Db->getTable5($ID);
        echo json_encode($getTable5) ;
    }

    public function getTable6(){
        $loader=new FilesystemLoader('templates');
        $twig= new Environment($loader);
        echo $twig->render('table6.twig');
    }
    public function getTable6_by_ID(){
        $getTable6 = $this->table1Db->getTable6();
        echo json_encode($getTable6) ;
    }

}