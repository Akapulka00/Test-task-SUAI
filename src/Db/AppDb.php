<?php


namespace App\Db;
use App\Kernel\DBConnection;
use PDO;

class AppDb
{
  private $connection;
  public function __construct(){
    $this->connection = DBConnection::getInstance()->getConnection();
  }
  public function getCakes(){
    $sql = "SELECT  title,description,pic,price FROM cakes ";
    $statement = $this->connection->query($sql);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getCakeById($id){
    $sql = "SELECT  title,description,pic,price FROM cakes WHERE id = ? ";
    $statement = $this->connection->prepare($sql);
    $statement->execute([$id]);
    return $statement->fetch(PDO::FETCH_ASSOC);
  }
  public function addCake($title, $description,$price){
    $files = $_FILES;
    $tmp_name = $files['img']['tmp_name'];//переносим в папку
    $file_name = $files['img']['name'];//переносим в папку
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $sql = "INSERT INTO cakes(title, description,pic,price) VALUE (:title_param,
    :description_param,:pic_param,:price_param);";
    $params = [
      'title_param' => $title,
      'description_param' => $description,
      'pic_param'=> $file_name,
      'price_param'=> $price
    ];
    $statement = $this->connection->prepare($sql);
    if($statement->execute($params)) {
      if (move_uploaded_file($tmp_name, "../public/img/$file_name")){
        echo 'Файл успешно загружен';
      } else {
        echo 'Файл не был загружен';
      }
    }

    /*
    if (move_uploaded_file($tmp_name, "../img/$file_name")){
      echo 'Файл успешно загружен';
    } else {
      echo 'Файл не был загружен';
    }
*/
    echo $title,$description,$price;
      return 1;
    /*
    $sql = "INSERT INTO cakes(title, description,pic,price) VALUE (:title_param, :description_param,:pic_param,price_param);";
    $params = [
      'title_param' => $title,
      'description_param' => $description,
      'pic_param'=>$pic,
      'price_param'=>$price
    ];
    $statement = $this->connection->prepare($sql);
    $statement->execute($params);*/
  }
  public function delCake($id){
    $sql = "DELETE FROM cakes WHERE id=? ";
    $statement = $this->connection->prepare($sql);
    $statement->execute([$id]);
   return;
  }
}
