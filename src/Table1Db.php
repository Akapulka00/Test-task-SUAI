<?php


namespace App;


use PDO;

class Table1Db
{
    private  Database $database;
    public function __construct(Database $database)
    {
        $this->database=$database;

    }
    public function  getTable1( $data){
        $statement = $this->database->getConnection()->prepare('SELECT task.title
        FROM stud_task
        join students
         on students.ID = stud_task.ID_stud and  students.ID=:ID_USER
        join task
         on task.ID = stud_task.ID_task');
        $statement->execute([
    'ID_USER'=>$data
        ]);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }
    public function  getTable2( $data){
        $statement = $this->database->getConnection()->prepare('SELECT   gruppa.group_number, COUNT(students_group.ID_group) AS grup_num
        FROM  stud_task
         JOIN students_group
        ON students_group.ID_students=stud_task.ID_stud and stud_task.ID_task=:ID_task
        JOIN gruppa
        on students_group.ID_group=gruppa.ID
        GROUP BY  gruppa.group_number;');
        $statement->execute([
            'ID_task'=>$data
        ]);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }
    public function  getTable3( $data){
        $statement = $this->database->getConnection()->prepare('SELECT  gruppa.group_number, students.surname,students.name,students.patronymic
FROM stud_task
         JOIN students
              ON stud_task.ID_task=:ID_task and stud_task.ID_stud=students.ID
         JOIN students_group
              ON stud_task.ID_stud=students_group.ID_students
         JOIN gruppa
              ON gruppa.ID=students_group.ID_group');
        $statement->execute([
            'ID_task'=>$data
        ]);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }
    public function  getTable4( $data){
        $statement = $this->database->getConnection()->prepare('SELECT  DISTINCT students.name, students.surname, students.patronymic,stud_task.stat, g.group_number
FROM stud_task
         JOIN students
              ON stud_task.ID_task=:ID_task AND stud_task.ID_stud=students.ID
JOIN students_group
on students.ID = students_group.ID_students
join gruppa g on g.ID = students_group.ID_group');
        $statement->execute([
            'ID_task'=>$data
        ]);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }
    public function  getTable5( $data){
        $statement = $this->database->getConnection()->prepare('SELECT task.title,  SUM(stud_task.stat=0) AS stat,COUNT(stud_task.stat=0)AS summ
FROM task_inspector
JOIN stud_task
on task_inspector.ID_task=stud_task.ID_task and task_inspector.ID_inspector=:ID_insp
JOIN task
ON task.ID=task_inspector.ID_task
GROUP BY task_inspector.ID_task');
        $statement->execute([
            'ID_insp'=>$data
        ]);
        return $statement->fetchALL(PDO::FETCH_ASSOC);
    }
    public function  getTable6( ){
        $statement = $this->database->getConnection()->query('SELECT table_1.name, table_1.ID,table_1.kt/table_1.sd as nagr
FROM(SELECT  task.title as name, task.ID as ID, COUNT( DISTINCT  task_inspector.ID_inspector) AS sd, COUNT(stud_task.ID_stud) AS kt
     FROM task_inspector
              JOIN task
                   on task_inspector.ID_task=task.ID
              JOIN  stud_task
                    ON stud_task.ID_task=task_inspector.ID_task
     GROUP BY  task.ID) as table_1
');
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}