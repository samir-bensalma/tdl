<?php
include 'assets/include/head.php';

if (!isset($_SESSION['user']['login']))
{
?>
        <div id="form">
            <h2>Connectez vous ou inscrivez pour accéder à votre liste de tâches</h2>
            <div id="btn-index">
                <button type="button" name="btn-login" id="btn-login">Connexion</button>
                <button type="button" name="btn-register" id="btn-register">Inscription</button>
            </div>
        </div>
        <div id="msg_login">

        </div>
    <?php
}
else
    {
        include 'pages/header_log.php';
        include 'pages/tasks.php';
    }
?>
    <div id="content">

    </div>
<?php
include 'assets/include/footer.php'
?>