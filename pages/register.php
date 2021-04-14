<?php
require_once '../assets/function/request.php';
?>



<?php
if (isset($_POST['login'])){
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $email = htmlspecialchars($_POST['email']);
    connectdb();
    var_dump(checkUserLogin($login));
    if (empty(checkUserLogin($login))){
        var_dump(checkUserEmail($email));
        if (empty(checkUserEmail($email))){
            $password = password_hash($password, PASSWORD_BCRYPT);
            registerUser($login,$password,$email);
            echo "Votre inscription à bien été prise en compte, vous allez être redirigé vers l'accueil";
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>