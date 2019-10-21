<?php
    session_start();
    $subject = $_SESSION['subject'];
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $subject = $_SESSION['subject'];
    $result = $mysqli->query("SELECT * FROM questions WHERE subject='$subject'");
    //if (isset($_POST['subject'])) { $subject = $_POST['subject']; if ($subject == '') { unset($subject);} } 
    if (isset($_POST['question'])) { $question = $_POST['question']; if ($question == '') { unset($question);} } 
    if (isset($_POST['var1'])) { $var1 = $_POST['var1']; if ($var1 == '') { unset($var1);} } 
    if (isset($_POST['var2'])) { $var2 = $_POST['var2']; if ($var2 == '') { unset($var2);} } 
    if (isset($_POST['var3'])) { $var3 = $_POST['var3']; if ($var3 == '') { unset($var3);} } 
    if (isset($_POST['answer'])) { $answer = $_POST['answer']; if ($answer == '') { unset($answer);} } 
    if (isset($_POST['attnumber'])) { $attnumber = $_POST['attnumber']; if ($attnumber == '') { unset($attnumber);} } 

    $query = "INSERT INTO questions VALUES('$subject', '$question', '$var1', '$var2', '$var3', '$answer',$attnumber)";
    $result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));
    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/database/teacherutils/update_tests.php";
    header("Refresh:0; url=$page");

?>