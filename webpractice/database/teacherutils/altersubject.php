<?php

    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());

    if (isset($_GET['subjectname'])) { $subjectname = $_GET['subjectname']; if ($subjectname == '') { unset($subjectname);} } 
    
    
    if (isset($_GET['first'])) { $first = $_GET['first']; if ($first == '') { unset($first);} } 
    if (isset($_GET['second'])) { $second = $_GET['second']; if ($second == '') { unset($second);} } 
    if (isset($_GET['third'])) { $third = $_GET['third']; if ($third == '') { unset($third);} } 

  

    if($first == 'true'){
        $first = 1;
    }
    else{
        $first = 0;
    }

    if($second == 'true'){
        $second = 1;
    }
    else{
        $second = 0;
    }

    if($third == 'true'){
        $third = 1;
    }
    else{
        $third = 0;
    }


    $query = "UPDATE subjects SET att1=$first,
        att2=$second, att3=$third WHERE name='$subjectname'";
$result = mysqli_query($mysqli, $query) or die('Запрос не удался: ' . mysqli_error($mysqli));
$page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/personal_page.php";
header("Refresh:0; url=$page");


?>