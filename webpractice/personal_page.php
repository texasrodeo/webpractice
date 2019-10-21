<?php
    session_start();
?>
<html>

  <head>
    <link rel="stylesheet" type="text/css" href="css/personalpage.css">
        <title>
             Добро пожаловать
         </title>
     
  </head>

  <body>
    
    <?php
        $hello = "Добро пожаловать, ".$_SESSION['name']." ".$_SESSION['second_name'];
        
        echo "<h1>";
        echo"$hello";
        echo"</h1>";
        
        $position = '';
        if ($_SESSION['is_student']){
          $position = 'student';
          
          echo "<h2>Пройти тесты</h2>
          <form action='database/studentutils/subjects.php' method='GET'>
          <input type='submit' name='OK' value='Пройти'>
          </form>
          <br>

          <h2>Просмотр оценок</h2>
          <form action='database/studentutils/marks.php' method='GET'>
          <input type='submit'  name='OK' value='Просмотреть'>
          </form>
          <br>";
        }
        elseif($_SESSION['is_teacher']){
          $position = 'teacher';

          echo "<h2>Управление тестами</h2> 
          <form action='database/teacherutils/update_tests.php' method='GET'>
          <input type='submit' name='OK' value='Просмотр '>
          </form>
          <br>

          <h2>Управление курсом</h2>   
          <form action='database/teacherutils/altersubjectinfo.php' method='GET'>
          <input type='submit' name='OK' value='Просмотр '>
          </form>
          <br>";
         
        }
        else{
          $position = 'admin';

          echo"<h2>Модерация пользователей</h2> 
          <form action='database/adminutils/moderateusers.php' method='GET'>
          <input type='submit' name='OK' value='Просмотр '>
          </form>
          <br>

          <h2>Управление базой данных предметов</h2>  
          <form action='database/adminutils/subjectslist.php' method='GET'>
          <input type='submit' name='OK' value='Просмотр '>
          </form>
          <br>";
        }
        
        echo "<h2>Редактировать профиль</h2>   
              <form action='database/userinfo.php' method='GET'>
              <input type='hidden' name='position' value=$position>     
             <input type='submit' name='OK' value='Просмотр '>
              </form>
              <br>";

        echo"<a  href='index.php' class='submit'>Выйти</a>";
        
        
    ?>  




  </body>
</html>