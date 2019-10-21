<?php

    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());

    if (isset($_GET['questionname'])) { $questionname = $_GET['questionname']; if ($questionname == '') { unset($questionname);} } 

    
    

    if (isset($_GET['question'])) { $question = $_GET['question']; if ($question == '') { unset($question);} } 
    
    if (isset($_GET['var1'])) { $var1 = $_GET['var1']; if ($var1 == '') { unset($var1);} } 
    if (isset($_GET['var2'])) { $var2 = $_GET['var2']; if ($var2 == '') { unset($var2);} } 
    if (isset($_GET['var3'])) { $var3 = $_GET['var3']; if ($var3 == '') { unset($var3);} } 
    if (isset($_GET['attnumber'])) { $attnumber = $_GET['attnumber']; if ($attnumber == '') { unset($attnumber);} } 
    if (isset($_GET['answer'])) { $answer = $_GET['answer']; if ($answer == '') { unset($answer);} } 

    $query = "UPDATE questions SET question='$question', var1='$var1', var2='$var2', 
        var3='$var3', answer='$answer', attnumber=$attnumber WHERE question='$questionname'";
    $result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));
    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/database/teacherutils/update_tests.php";
    header("Refresh:0; url=$page");



