<?php
function connectdb()
{
    try {
        $pdo = new pdo("mysql:dbname=todolist;host=localhost", "root","", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }
    catch (Exception $e)
    {
        echo $e . "<br>";
    }

    return $pdo;
}

function dbClose(){
    $pdo = null;
}


function checkUserEmail($email){
    $pdo = connectdb();
    $query = $pdo->prepare("SELECT id from users WHERE email=:email");
    $query->execute(["email"=>$email]);
    $allresult = $query->fetch(PDO::FETCH_ASSOC);
    dbClose();
    return $allresult;
}

function checkUserLogin($login){
    $pdo = connectdb();
    $query = $pdo->prepare("SELECT id from users WHERE login=:login");
    $query->execute(["login"=>$login]);
    $allresult = $query->fetch(PDO::FETCH_ASSOC);
    dbClose();
    return $allresult;
}

function checkPassword($login){
    $pdo = connectdb();
    $query = $pdo->prepare("SELECT password from users WHERE login=:login");
    $query->execute(["login"=>$login]);
    $allresult = $query->fetch(PDO::FETCH_ASSOC);
    dbClose();
    return $allresult;
}

function getuserInfo($login){
    $pdo = connectdb();
    $query = $pdo->prepare("SELECT * from users WHERE login=:login");
    $query->execute(["login"=>$login]);
    $allresult = $query->fetch(PDO::FETCH_ASSOC);
    dbClose();
    return $_SESSION['user'] = $allresult;
}

function registerUser($login, $password, $email){
    $pdo = connectdb();
    $query = $pdo->prepare("INSERT INTO users(`login`, `password`, `email`)  VALUES (:login,:password,:email)");
    $query->execute(["login"=>$login, "password"=>$password, "email"=>$email]);
    getuserInfo($login);
    dbClose();
}

function addTask($id, $task){
    $pdo = connectdb();
    $date = date('Y-m-d');
    $status = "En cours";
    $query = $pdo->prepare("INSERT INTO running_tasks(`user_id`, `task`, `creation_date`)  VALUES (:id,:task,'$date')");
    $query->execute(["id"=>$id, "task"=>$task]);
    dbClose();
    return $pdo->lastInsertId();
}

function getTask($id){
    $pdo = connectdb();
    $query = $pdo->prepare("SELECT * from running_tasks WHERE end_date IS NULL AND user_id=:user_id");
    $query->execute(["user_id"=>$id]);
    $allresult = $query->fetchAll();
    return $allresult;
}


function doneTaskList($id){
    $pdo = connectdb();
    $query = $pdo->prepare("SELECT * from running_tasks WHERE end_date IS NOT NULL AND user_id=:user_id");
    $query->execute(["user_id"=>$id]);
    $allresult = $query->fetchAll();
    return $allresult;
}

if (isset($_POST['done_task_id']))
{
    $date = date('Y-m-d');
    $pdo = connectdb();
    $query = $pdo->prepare("UPDATE `running_tasks` SET `status`='Terminé',`end_date`='$date' WHERE id=:id");
    $query->execute(["id"=>$_POST['done_task_id']]);
    $query1 = $pdo->prepare("SELECT * FROM `running_tasks` WHERE id=:id");
    $query1->execute(["id"=>$_POST['done_task_id']]);
    $allresult = $query1->fetchAll();
    echo "<tr>";
    echo "<td>" .$allresult[0]['task'] . "</td>";
    echo "<td>" .$allresult[0]['creation_date'] . "</td>";
    echo "<td>" .$allresult[0]['end_date'] . "</td>";
    echo "<tr>";

}

if (isset($_POST['cancel_task_id']))
{
    $pdo = connectdb();
    $query = $pdo->prepare("DELETE FROM `running_tasks` WHERE id=:id");
    $query->execute(["id"=>$_POST['cancel_task_id']]);
}


