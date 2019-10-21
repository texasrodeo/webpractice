<?php
    session_start();
    
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
                or die('Не удалось соединиться: ' . mysqli_error());
    
    
   
    if (isset($_POST['subject'])) { $subject = $_POST['subject']; if ($subject == '') { unset($subject);} } 
    if (isset($_POST['course'])) { $course = $_POST['course']; if ($course == '') { unset($course);} } 
     
   

    $query = "INSERT INTO subjects VALUES('$subject', $course, 0, 0, 0)";
    $result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));
    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/database/adminutils/subjectslist.php";
    header("Refresh:0; url=$page");

?>