<?php
if (!isset($_SESSION['user'])){
    session_start();
}
if (file_exists('../assets/function/request.php')==1)
{
    require_once '../assets/function/request.php';
}
else require_once './assets/function/request.php';

$task = getTask($_SESSION['user']['id']);
$done = doneTaskList($_SESSION['user']['id'])

?>
<div id="tasks">
    <div id="running">
        <div id="task_form">
            <form id="task_form_div">
                <label for="task">Ajouter une tâche</label>
                <textarea name="task" id="task" rows="5" cols="33"></textarea>
                <div>
                    <button type="button" name="add_task" id="add_task" onclick="taskForm()">Ajouter</button>
                </div>
            </form>
            <div id="msg1">

            </div>
        </div>
    </div>
    <div id="task_table_container">
        <h2>Tâches en cours</h2>
        <table id="task_table">
            <thead>
                <td>Tâche</td>
                <td>Statut</td>
                <td>Date de création</td>
                <td>Modifier le statut</td>
            </thead>
            <?php
                for ($i = 0; isset($task[$i]); $i++) {
                    ?>
            <tr>
                <td id="task_description">
                    <?=$task[$i]['task']?>
                </td>
                <td>
                    <?=$task[$i]['status']?>
                </td>
                <td>
                    <?=$task[$i]['creation_date']?>
                </td>
                <td><input type="button" onclick="done(<?=$task[$i]['id']?>,this)" name="<?=$task[$i]['id']?>"
                        id="done_status" value="Terminé">
                    <input type="button" onclick="cancel(<?=$task[$i]['id']?>);removeLine(this)"
                        name="<?=$task[$i]['id']?>" id="cancel_status" value="Annulé">
                </td>
            </tr>
            <?php
                }
                ?>
        </table>
    </div>
    <div id="done">
        <h2>Tâche terminées</h2>
        <table id="done_task_table">
            <thead>
                <td>Tâche</td>
                <td>Date de création</td>
                <td>Date de fin</td>
            </thead>
            <?php
                for ($i = 0; isset($done[$i]); $i++)
                {
                    ?>
            <tr>
                <td id="task_description">
                    <?=$done[$i]['task']?>
                </td>
                <td>
                    <?=$done[$i]['creation_date']?>
                </td>
                <td>
                    <?=$done[$i]['end_date']?>
                </td>
            </tr>
            <?php
                }
                ?>

    </div>
</div>