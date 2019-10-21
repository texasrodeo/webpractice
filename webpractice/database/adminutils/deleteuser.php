<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
        $id = $_GET['id'];
    if($_GET['position']=='teacher'){
        $result = $mysqli->query("DELETE FROM teachers WHERE teachers.id=$id"); 
    }
    elseif($_GET['position']=='student'){
        $result = $mysqli->query("DELETE FROM students WHERE students.id=$id"); 
    } 
    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/database/adminutils/moderateusers.php";
                     
    header("Refresh:0; url=$page");
?>