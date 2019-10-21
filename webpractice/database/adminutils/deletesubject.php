<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $name = $_GET['name'];
    
    $result = $mysqli->query("DELETE FROM subjects WHERE subjects.name='$name'"); 
    
    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/database/adminutils/subjectslist.php";
                     
    header("Refresh:0; url=$page");
?>