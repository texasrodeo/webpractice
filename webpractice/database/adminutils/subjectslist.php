<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
     or die('Не удалось соединиться: ' . mysqli_error());
    $result = $mysqli->query("SELECT name, course FROM subjects"); 
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/updatetests.css">
        <title>
            Вопросы по вашему предмету
        </title>
        
    </head>    
    <body>
    <?php
    if($result->num_rows==0){
        echo"<h1>Список предметов пуст</h1>";
    }
    else{
        
        echo"<h1>Список предметов</h1>";
        echo "<table border = 2>";
        echo "<tr>";
        echo "<td>Название</td>";
        echo "<td>Курс</td>";
        echo "<td>Действия</td>";
        echo "</tr>";
            while ($row = $result->fetch_array()){
                $name = $row['name'];
                $course = $row['course'];

                echo "<tr>";
                
                echo "<td>".$name."</td>";
                echo "<td>".$course."</td>";
                
                
                echo "<td>";
                echo "<form action='deletesubject.php' method='GET'>";
                echo "<input type='hidden' name='name' value='$name'>";
                
                echo "<input type='submit' class='delete' value='Удалить предмет'>";
                echo "</form>";
                 
               
                echo "</td>";
                echo "</tr>";

                
            }
            echo"</table>";
        }
    
?>
        <h2>Добавить предмет</h2>
            <form action='addsubject.php' method='POST'>
            <input type='text' class='center' name='subject' placeholder='Название'>
            <br>
            <input type='text' class='center' name='course' placeholder='Курс'>
            <input type='submit' class='add'  name='OK' value='Добавить предмет'>
            </form>
        
        <a  href='../../personal_page.php' class='submit'>Назад</a>
</body>
</html>