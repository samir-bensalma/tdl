<?php
require_once '../assets/function/request.php';
?>


    <div id="tasks">
        <div id="running">
            <div id="tasks_running_list">

            </div>
            <div id="task_form">
                <form>
                    <label for="task">Ajouter une tâche</label>
                    <input type="text" name="task" id="task">
                    <button type="button" name="add_task" id="add_task">Ajouter</button>
                </form>
                <div id="msg1">

                </div>
            </div>
        </div>
        <div id="done">

        </div>
    </div>

<?php
if (isset($_POST['task_detail']))
{
    addTask($_SESSION['id']);
}
?>

