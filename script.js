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
                        $('#form').empty();
                        $('#form').append(data);
                        $('#content').load("pages/tasks.php");
                        $('#header').load("pages/header_log.php");
                        $('#add_task').click(function (){
                            $.ajax({
                                type: 'POST',
                                url: 'pages/tasks.php',
                                data: {
                                    'task_detail': $('#task').val()
                                },
                            })
                                .done(function(data){
                                    $('#msg1').empty();
                                    $('#msg1').append(data);
                                })
                        })
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
                        'login' : $('#login').val(),
                        'password' : $('#password').val(),
                        'email' : $('#email').val()
                    },
                })
                    .done(function(data){
                        $('#form').empty();
                        $('#form').append(data);
                    })
            })
        })
})


