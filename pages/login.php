<?php
session_start();
require_once '../assets/function/request.php';


if (isset($_POST['login']))
{
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    connectdb();
    if(!empty(checkuserLogin($login))){
        $bdd_pass = checkPassword($login);
        if (password_verify($password, $bdd_pass['password'])){
            return getuserInfo($login);
        }
        else{
            return false;
        }
    }
    return false;
}
dbClose();
