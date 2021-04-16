<?php
require_once '../assets/function/request.php';
session_start();
if (isset($_POST['login_register'])){
    $login = htmlspecialchars($_POST['login_register']);
    $password = htmlspecialchars($_POST['password_register']);
    $email = htmlspecialchars($_POST['email_register']);
    connectdb();
    if (empty(checkUserLogin($login))){
        if (empty(checkUserEmail($email))){
            $password = password_hash($password, PASSWORD_BCRYPT);
            registerUser($login,$password,$email);
        }
        else
        {
            echo "Email existant";
        }
    }
    else
    {
        echo "Login existant";
    }
}
?>
