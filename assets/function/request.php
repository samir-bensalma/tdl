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
    dbClose();
}

function addTask($id, $task){
    $pdo = connectdb();
    $query = $pdo->prepare("INSERT INTO running_tasks(`user_id`, `task`, `creation_date`)  VALUES (:id,:task,date('d-m-y'))");
    $query->execute(["id"=>$id, "task"=>$task]);
    dbClose();
}
