<?php
    session_start();
    $subject = $_SESSION['subject'];
    
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $query = "SELECT course, att1, att2, att3 from subjects WHERE name='$subject'";
    $res = mysqli_query($mysqli, $query);
    $result = $res->fetch_array();
    $course = $result["course"];
    $att1 = $result["att1"];
    $att2 = $result["att2"];
    $att3 = $result["att3"];
    $avaliable = 'Доступна';
    $notavaliable = 'Недоступна';
   
    
?>


<html>


    <head>
   
    <link rel="stylesheet" type="text/css" href="../../css/altersubjectinfo.css">
    <title>
        Редактировать информацию о курсе
    </title>
    <head>
    <body>
        <h1>Редактировать информацию о курсе</h1>
        <form id="123" action='altersubject.php' method='GET'>
        <?php
        echo"<input type='hidden' name='subjectname'  value='$subject'>
        <label>Название предмета: $subject</label> 
        <br>
        <label>Курс: $course</label>
        <br>
        <label>Доступна 1-ая аттестация:";
            if($att1){
                echo"<label><input type ='radio'  name=first value='true' checked='true'>$avaliable</label>
                <label><input type ='radio'  name=first value='false'>$notavaliable</label>
                 </label>";
            }
            else{
               
                echo"<label><input type ='radio'  name=first value='true'>$avaliable</label>
                <label><input type ='radio'  name=first value='false' checked='true'>$notavaliable</label>
                 </label>";
            }
             
        echo"<br>";
        echo"<label>Доступна 2-ая аттестация:";
            if($att2){
                
                echo"<label><input type ='radio'  name=second value='true' checked='true'>$avaliable</label>
                <label><input type ='radio'  name=second value='false'>$notavaliable</label>
                 </label>";
         }
            else{
             echo"<label><input type ='radio'  name=second value='true'>$avaliable</label>
                <label><input type ='radio'  name=second value='false' checked='true'>$notavaliable</label>
                 </label>";
            }
        echo"<br>";
        echo"<label>Доступна 2-ая аттестация:";
         if($att3){
                
                echo"<label><input type ='radio'  name=third value='true' checked='true'>$avaliable</label>
                <label><input type ='radio'  name=third value='false'>$notavaliable</label>
                 </label>";
            }
            else{
             echo"<label><input type ='radio'  name=third value='true'>$avaliable</label>
                <label><input type ='radio'  name=third value='false' checked='true'>$notavaliable</label>
                 </label>";
            }
        echo"<br>";
        echo"<input type='submit' class='add'  name='OK' value='Обновить информацию'>";

        ?>
        <a  href='../../personal_page.php' class='submit'>Назад</a>
      

    </body>

</html>