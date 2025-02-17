$(document).ready(function()
    {
        $('#login').blur(function()
        {
            login1 = document.getElementById('login').value;
            $.ajax({
                type: 'POST', // метод
                url: "login_check.php", // URL - куда отправить (ссылка) 
                data:({login: login1}),
                dataType: 'html',
                //в случае успешного выполнения
                success: function(user) {
                // занести то, что вернул нам php скрипт в элемент с id= result
                $("#result").html(user);
                } 
            })
        })
    })