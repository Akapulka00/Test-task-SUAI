<?php


namespace Cakes\Controllers;



use Cakes\Db\CakeDb;
use Cakes\Kernel\Controller;

class AddCakesController extends Controller
{
  private $cakesDB;

  public function __construct(){
    $this->cakesDB = new CakeDb();

  }

  public function showCake(){
    $data = ['cakes' => $this->cakesDB->getCakes()];
    echo $this->getTemplate('allcakes.php', $data);
  }
  public function formCake(){
    $data = ['cakes' => $this->cakesDB->getCakes()];
    echo $this->getTemplate('addCakes.php', $data);
  }
  public function addCake(){
    $post = $_POST;
    $title=$post['title'];
    $description=$post['description'];
    $price=$post['price'];
    if (!$this->cakesDB->addCake($title,$description,$price)) {
      echo 'Попробуйте позже';

    }
  }
  public function getCakeByID(){
   // $data = ['cakes' => $this->cakesDB->getCakes()];
    echo $this->getTemplate('getCake.php');

  }
  public function printcakeById(){
    $post = $_POST;
    $cakeId=$post['id'];
    $cake = $this->cakesDB->getCakeById($cakeId);
    if ($cake) {
      echo json_encode($cake);
    }else{
      echo json_encode('Тортика под таким номером нет');

    }


  }
  public function delCakeById(){
    $post = $_POST;
    $cakeId=$post['id'];

    $cake = $this->cakesDB->delCake($cakeId);

      echo "Данные успешно удалены";

  }



}
