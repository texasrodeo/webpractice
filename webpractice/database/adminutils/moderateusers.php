<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $result = $mysqli->query("SELECT * FROM teachers"); 
    $result2 = $mysqli->query("SELECT * FROM students"); 
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/updatetests.css">
        <title>
            Список пользователей
        </title>
    </head>
    <body>
        <h1>Список пользователей</h1>
        <?php
        if($result->num_rows==0 and $result2->num_rows==0){
            echo"<h1>Пока нет ни одного пользователся</h1>";
        }
        else{
            if($result->num_rows!=0){
                echo"<h2>Список преподавателей</h2>";
                echo "<table border = 2>";
            echo "<tr>";
            echo "<td>Фамилия</td>";
            echo "<td>Имя</td>";
            echo "<td>Отчество</td>";
            echo "<td>Предмет</td>";
            echo "<td>Действия</td>";
            echo "</tr>";
                while ($row = $result->fetch_array()){
                    $name = $row['name'];
                    $second_name = $row['second_name'];
                    $surname = $row['surname'];
                    $subject = $row['subject'];
                    $id = $row['id'];
    
                    echo "<tr>
                    <td>".$surname."</td>
                    <td>".$name."</td>
                    <td>".$second_name."</td>
                    <td>".$subject."</td>
                    
                    
                    <td>
                    <form action='deleteuser.php' method='GET'>
                    <input type='hidden' name='id' value=$id>
                    <input type='hidden' name='position' value='teacher'>
                    <input type='submit' class='delete' value='Удалить пользователя'>
                    </form>
                     
                  
                    </td>
                    </tr>";
    
                    
                }
                echo"</table>";
            }
            else{
                echo"<h2>Список преподавателей пуст</h2>";
            }
            if($result2->num_rows!=0){
                echo"<h2>Список студентов</h2>
                <table border = 2>
                <tr>
                <td>Фамилия</td>
                <td>Имя</td>
                <td>Отчество</td>
                <td>Курс</td>
                <td>Действия</td>
                </tr>";
                while ($row = $result2->fetch_array()){
                    $name = $row['name'];
                    $second_name = $row['second_name'];
                    $surname = $row['surname'];
                    $course = $row['course'];
                    $id = $row['id'];
    
                    echo "<tr>
                    <td>".$surname."</td>
                    <td>".$name."</td>
                    <td>".$second_name."</td>
                    <td>".$course."</td>
                    
                    
                    <td>
                    <form action='deleteuser.php' method='GET'>
                    <input type='hidden' name='id' value=$id>
                    <input type='hidden' name='position' value='student'>
                    <input type='submit' class='delete' value='Удалить пользователя'>
                    </form>";
                     
                    
                    echo "</tr>";
    
                    
                }
                echo"</table>";
            }
            else{
                echo"<h2>Список студентов пуст</h2>";
            }
            
        }
    ?>
    <br>
    <a  href='../../personal_page.php' class='submit'>Назад</a>
    </body>
</html>