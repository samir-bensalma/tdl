<?php
if(!isset($_SESSION['user'])) {
    session_start();
}
?>

<div id="header_log">
    <p>Bonjour <?=$_SESSION['user']['login']?></p>
    <a href="assets/function/logout.php" onclick="logout()">Déconnexion</a>
</div>
