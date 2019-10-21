<?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $id = $_SESSION['id'];
    $name = $_GET['name'];
    $_SESSION['name'] = $name;
    
    $surname = $_GET['surname'];
    $second_name = $_GET['second_name'];
    $_SESSION['second_name'] = $second_name;
    $login = $_GET['login'];
    $password = $_GET['password'];
    
    $pos = '';
    
    if($_GET['position']=='teacher'){
        $subject = $_GET['subject'];
        $result = $mysqli->query("SELECT * FROM teachers WHERE teachers.id=$id"); 
        $query = "UPDATE teachers SET 
            login='$login', password='$password', name='$name', second_name='$second_name', surname='$surname', subject='$subject'  WHERE teachers.id=$id";
        $result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));

    }
    if($_GET['position']=='student'){
        $course = $_GET['course'];
        $query = "UPDATE students SET 
            login='$login', password='$password', name='$name', second_name='$second_name', surname='$surname', course=$course 
             WHERE students.id=$id";
        $result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));
       
    } 
    if($_GET['position']=='admin'){
        $query = "UPDATE admins SET 
            login='$login', password='$password', name='$name', second_name='$second_name', surname='$surname'
             WHERE admins.id=$id";
        $result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));
        
    } 
    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/personal_page.php";
    header("Refresh:0; url=$page");
   
?>