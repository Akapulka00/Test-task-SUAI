<?php


namespace App;




use http\Exception\InvalidArgumentException;

class Database
{
    private \PDO $connection;
    public  function  __construct(string $dsn, string $usrname,string $password)
    {
        try{
            $this->connection=new  \PDO($dsn,$usrname,$password);
        }catch (\PDOException $exception){
            throw  new  InvalidArgumentException('Ошибка подключения к БД!'.$exception->getMessage());
        }
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);

    }
    public  function  getConnection():\PDO
    {
        return  $this->connection;
    }
}