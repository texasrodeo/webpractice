<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $id = $_SESSION['id'];
    $pos = '';
    
    if($_GET['position']=='teacher'){
        $result = $mysqli->query("SELECT * FROM teachers WHERE teachers.id=$id"); 
        $pos = 'teacher';
    }
    if($_GET['position']=='student'){
        
        $result = $mysqli->query("SELECT * FROM students WHERE students.id=$id"); 
        $pos = 'student';
    } 
    if($_GET['position']=='admin'){
        $result = $mysqli->query("SELECT * FROM admins WHERE admins.id=$id"); 
        $pos = 'admin';
    } 
    $info = $result->fetch_array();
   
    $subjects = $mysqli->query("SELECT name FROM subjects"); 
   
   
?>
<head>
   
   <link rel="stylesheet" type="text/css" href="../css/altersubjectinfo.css">
   <title>
       Редактировать информацию о себе
   </title>
   <head>
   <body>
       <h1>Редактировать информацию о себе</h1>
       <form action='alteruser.php' method='GET'>
       <?php
       $login = $info['login'];
       $password = $info['password'];
       $name = $info['name'];
       $surname = $info['surname'];
       $second_name = $info['second_name'];
       
       $name = $info['name'];
       
       echo"<input type='hidden' name='position'  value='$pos'>
            
            <label>Имя: <input type ='text'  name='name' value=$name></label>
            <br>
            <label>Отчество: <input type ='text'  name='second_name' value=$second_name></label> 
            <br>
            <label>Фамилия: <input type ='text'  name='surname' value=$surname></label>
            <br>
            <label>Логин: <input type ='text'  name='login' value=$login></label>
            <br>
            <label>Пароль: <input type ='text'  name='password' pattern='{6,}' value=$password ></label>
            <br>";
       if($pos=='student'){
        $course = $info['course'];
        echo"<label>Курс: <input type ='text'  name='course' value=$course></label>
            <br>";
       }
       if($pos=='teacher'){
        $subject = $info['subject'];

        echo"
        <label>Предмет: $subject</label>
        <br>
        <label>Выбрать: <select name='subject' value='$subject' required>";
        while($row=$subjects->fetch_array()){
            if($row['name']==$subject){
                echo"<option selected>$subject</option>";
            }
            else{
                $s = $row['name'];
                echo"<option>$s</option>";
            }
        }
       }
       
      
       echo"<br>
        <input type='submit' class='add'  name='OK' value='Обновить информацию'>";

       ?>
       <a  href='../personal_page.php' class='submit'>Назад</a>
     

   </body>

</html>