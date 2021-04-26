<?php
require_once '../assets/function/request.php';
session_start();
if (isset($_POST['task_detail']))
{
    $task_id = addTask($_SESSION['user']['id'], $_POST['task_detail']);
    ?>
    <tr>
        <td><?=$_POST['task_detail']?> </td><td>En cours</td> <td><?=date('Y-m-d')?></td>
        <td><input type="button" onclick="done(<?=$task_id?>,this)" name="<?=$task_id?>" id="done_status" value="Terminé">
            <input type="button" onclick="cancel(<?=$task_id?>);removeLine(this)" name="<?=$task_id?>" id="cancel_status" value="Annulé"></td>
    </tr>
    <?php
}