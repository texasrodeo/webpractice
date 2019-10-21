<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/updatetests.css">

        <title>
            Изменить вопрос
   
        </title>
        <style type="text/css">
	        .bigfont {
	        
	        font-size: 30px; 
	       
	}
    </style>
    </head>
</html>

<?php

    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
                or die('Не удалось соединиться: ' . mysqli_error());

    if (isset($_GET['question'])) { $question = $_GET['question']; if ($question == '') { unset($question);} } 
    if (isset($_GET['var1'])) { $var1 = $_GET['var1']; if ($var1 == '') { unset($var1);} } 
    if (isset($_GET['var2'])) { $var2 = $_GET['var2']; if ($var2 == '') { unset($var2);} } 
    if (isset($_GET['var3'])) { $var3 = $_GET['var3']; if ($var3 == '') { unset($var3);} } 
    if (isset($_GET['attnumber'])) { $attnumber = $_GET['attnumber']; if ($attnumber == '') { unset($attnumber);} } 
    if (isset($_GET['answer'])) { $answer = $_GET['answer']; if ($answer == '') { unset($answer);} } 

    

    echo "<div class='bigfont'>
    <h2>Обновить вопрос</h2>
    <form action='alter.php' method='GET'>
    <input type='hidden' name='questionname' value='$question'>
    <input type='text' class='center' name='question' placeholder='Вопрос' value='$question'>
    <br>
    <input type='text' ' name='var1' placeholder='Вариант 1' value=$var1>
    
    <input type='text' name='var2' placeholder='Вариант 2' value=$var2>
    
    <input type='text' name='var3' placeholder='Вариант 3' value=$var3>
    <br>
    <input type='text' name='answer' placeholder='Вариант правильного ответа' value=$answer>
    <br>
    <h3>Номер аттестации</h3>";
    if($attnumber == 1){
        echo"<label>1<input type ='radio'  name='attnumber' value='1' checked='true'></label>
        <label>2<input type ='radio'  name='attnumber' value='2'></label>
        <label>3<input type ='radio'  name='attnumber' value='3'></label>";
    }
    elseif ($attnumber == 2) {
        echo"<label>1<input type ='radio'  name='attnumber' value='1' ></label>
        <label>2<input type ='radio'  name='attnumber' value='2' checked='true'></label>
        <label>3<input type ='radio'  name='attnumber' value='3'></label>";
    }
    else{
        echo"<label>1<input type ='radio'  name='attnumber' value='1' ></label>
        <label>2<input type ='radio'  name='attnumber' value='2' ></label>
        <label>3<input type ='radio'  name='attnumber' value='3' checked='true'></label>";
    }
    
    echo "<br>
    <input type='submit' class='add'  name='OK' value='Обновить вопрос'>
    </form>
    </div>";
?>