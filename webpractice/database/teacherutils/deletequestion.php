<?php

    
    
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    if(!empty($_GET["question"])){
        $question = $_GET['question'];
        print($question);
        print('asdaaf');
        $result = $mysqli->query("DELETE FROM questions WHERE question='$question'");
        if(!$result){
            print("не сработало");
        }
        else{
            $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/database/teacherutils/update_tests.php";
            header("Refresh:0; url=$page");
        }
       
    }
   
   
?>