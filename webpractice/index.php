<?php
    session_start();
?>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="css/style.css">
            <title> Аттестационное тестирование </title>
            
        </head>
        <body>     
            <h1>               
                Добро пожаловать в приложение для проведения аттестаций           
            </h1>
            <form class="box" action="registration/testreg.php" method="post">
                <h2>Вход в систему</h2>
                <input type="text" name="login"  placeholder="Логин">
                <input type="password" name="password"  placeholder="Пароль">
                <input type="submit" name="" value="Войти">
            </form>
            
            
            <div class="reg">
                <h2>Еще не зарегестрированы?</h2>
                <a href="registration/studentRegistration.html" class="submit">Регистрация студентов</a>
                <a href="registration/teacherRegistration.php" class="submit">Регистрация преподавателей</a>
                <a href="registration/adminRegistration.html" class="submit">Регистрация администраторов</a>
            </div>
            
        </body>
       
    </html>
