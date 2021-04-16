$('#btn-login').click(function (){
    $.ajax({
        url: 'pages/login_form.php',
        datatype: 'html'
    })
        .done(function(data){
            $('#form').empty();
            $('#form').append(data);
            $('#submit_login').click(function (){
                $.ajax({
                    type: 'POST',
                    url: 'pages/login.php',
                    data: {
                        'login' : $('#login').val(),
                        'password' : $('#password').val(),
                    },
                })
                    .done(function(data){
                        if (data === "Login inconnu" || data === "Mot de passe incorrect")
                        {
                            $('#msg_login').empty();
                            $('#msg_login').append(data);
                        }
                        else
                        {
                            $('#msg_login').empty();
                            $('#form').empty()
                            $('#content').load("pages/tasks.php");
                            $('#header').load("pages/header_log.php");
                        }


                    })
            })
        })

})

$('#btn-register').click(function (){
    $.ajax({
        url: 'pages/register_form.php',
        datatype: 'html'
    })
        .done(function(data){
            $('#form').empty();
            $('#form').append(data);
            $('#submit_register').click(function (){
                $.ajax({
                    type: 'POST',
                    url: 'pages/register.php',
                    data: {
                        'login_register' : $('#login').val(),
                        'password_register' : $('#password').val(),
                        'email_register' : $('#email').val()
                    },
                })
                    .done(function(data){
                        if (data==="Email existant" || data==="Login existant")
                        {
                            console.log(data);
                            console.log("pas ok");
                            $('#msg_login').empty();
                            $('#msg_login').append(data);
                        }
                        else{
                            console.log(data);
                            console.log("ok");
                            $('#msg_login').empty();
                            $('#msg_login').append(data);
                            $('#content').load("pages/tasks.php");
                            $('#header').load("pages/header_log.php");
                        }

                    })
            })
        })
})

function taskForm (){
        $.ajax({
            type: 'POST',
            url: 'pages/task_add.php',
            data: {
                'task_detail': $('#task').val()
            },
        })
                .done(function(data){
                    console.log(data)
                    $('#task_table').append(data);
                })
}

function removeLine(r){
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("task_table").deleteRow(i);
}

function done(id,r){
    var row = r.parentNode.parentNode.rowIndex;
    $.ajax({
        type: 'POST',
        url: 'assets/function/request.php',
        data: {
            'done_task_id': id
        },
    })
        .done(function(data){
            document.getElementById("task_table").deleteRow(row);
            $('#done_task_table').append(data)
        })
}


function cancel(id){
    $.ajax({
        type: 'POST',
        url: 'assets/function/request.php',
        data: {
            'cancel_task_id': id
        },
    })
}





