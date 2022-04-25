<?php

use App\Table1Db;
use \Psr\Http\Message\ServerRequestCreatorInterface;
use \Psr\Http\Message\ResponseInterface;
use  Slim\Factory\AppFactory;
use  \Twig\Loader\FilesystemLoader;
use \Twig\Environment;
use \App\Database;

require  __DIR__.'/vendor/autoload.php';

$loader=new FilesystemLoader('tamplates');
$twig= new Environment($loader);

$config=include_once 'settings/Database.php';
$dsn=$config['dsn'];
$usrname=$config['username'];
$password=$config['password'];

$app=AppFactory::create();
$app->addBodyParsingMiddleware();
$database=new Database($dsn,$usrname,$password);
$Table1=new  Table1Db($database);
$app->get('/',function ( $recuest, $response)use($twig){

    $body=$twig->render('index.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->get('/home',function ( $recuest, $response) use($twig){
    $body=$twig->render('home.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->get('/table1',function ( $recuest, $response) use($twig){
    $body=$twig->render('table1.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->post('/table1',function ( $recuest, $response) use($twig){
    $params=(array) $recuest->getParsedBody();
    $body=$twig->render('table1.twig');
    $response->getBody()->write($body);
    return $response;
});

$app->post('/table1-post',function ( $recuest, $response) use($Table1,$app){
   $post = $_POST;
    $ID=$post['stud_ID'];
    $getTable1 = $Table1->getTable1($ID);
    $response->getBody()->write(json_encode($getTable1));
    return $response->withHeader('content-type', 'application/json')
        ->withStatus(200);

});
$app->get('/table2',function ( $recuest, $response) use($twig){
    $body=$twig->render('table2.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->post('/table2-post',function ( $recuest, $response) use($Table1,$app){
    $post = $_POST;
    $ID=$post['task_ID'];
    $getTable2 = $Table1->getTable2($ID);
    $response->getBody()->write(json_encode($getTable2));
    return $response->withHeader('content-type', 'application/json')
        ->withStatus(200);

});
$app->get('/table3',function ( $recuest, $response) use($twig){
    $body=$twig->render('table3.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->post('/table3-post',function ( $recuest, $response) use($Table1,$app){
    $post = $_POST;
    $ID=$post['task_ID'];
    $getTable3 = $Table1->getTable3($ID);
    $response->getBody()->write(json_encode($getTable3));
    return $response->withHeader('content-type', 'application/json')
        ->withStatus(200);

});
$app->get('/table4',function ( $recuest, $response) use($twig){
    $body=$twig->render('table4.twig');
    $response->getBody()->write($body);
    return $response;
});
$app->post('/table4-post',function ( $recuest, $response) use($Table1,$app){
    $post = $_POST;
    $ID=$post['task_ID'];
    $getTable4 = $Table1->getTable4($ID);
    $response->getBody()->write(json_encode($getTable4));
    return $response->withHeader('content-type', 'application/json')
        ->withStatus(200);

});
$app->get('/table5',function ( $recuest, $response) use($twig){
    $body=$twig->render('table5.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->post('/table5-post',function ( $recuest, $response) use($Table1,$app){
    $post = $_POST;
    $ID=$post['inspector_ID'];
    $getTable4 = $Table1->getTable5($ID);
    $response->getBody()->write(json_encode($getTable4));
    return $response->withHeader('content-type', 'application/json')
        ->withStatus(200);

});
$app->get('/table6',function ( $recuest, $response) use($twig){
    $body=$twig->render('table6.twig');

    $response->getBody()->write($body);
    return $response;
});
$app->post('/table6-post',function ( $recuest, $response) use($Table1,$app){
    $getTable6 = $Table1->getTable6();
    $response->getBody()->write(json_encode($getTable6));
    return $response->withHeader('content-type', 'application/json')
        ->withStatus(200);

});


$app->run();

 ?>

