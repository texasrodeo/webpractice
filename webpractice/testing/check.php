<html>
<head>
    <title>
        Результаты теста
    </title>
    <link rel="stylesheet" type="text/css" href="../css/results.css">
</head>
<body>
<h1>Результаты теста</h1>
<?php
        session_start();
        $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
            or die('Не удалось соединиться: ' . mysqli_error());
         
        
    
     
        $correct = 0;
        $not_correct = 0;
        $counter = 0;

       
        if (isset($_GET['subject'])) { $subject = $_GET['subject']; if ($subject == '') { unset($subject);} } 
    
        if (isset($_GET['attnumber'])) { $attnumber = $_GET['attnumber']; if ($attnumber == '') { unset($attnumber );} } 

       

        $stmt = $mysqli->stmt_init();
        if(
        ($stmt->prepare("SELECT answer from questions where subject=? and attnumber=?") === FALSE)
        or ($stmt->bind_param('ss', $subject, $attnumber) === FALSE)
        
        or ($stmt->execute() === FALSE)
         or (($result = $stmt->get_result()) === FALSE)
        or ($stmt->close() === FALSE)
        ) {
            die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
        }
        

      
        while ($row = $result->fetch_array()){
                // print($_GET['vopros'.strval($counter)]);
                // print($row[0]);
                if($_GET['vopros'.strval($counter)]==$row[0])
                    $correct++;
                else
                    $not_correct++;

            $counter++;
            
        }
        echo"Правильных ответов: ".$correct;
        echo"<br>";
        echo"Неправильных ответов: ".$not_correct;
        
        if($not_correct!=0){
            $percent = $correct/$not_correct;
        }
        else{
            $percent = 1;
        }
        
        $mark = $percent * 50;
        $studentID = $_SESSION['id'];
        $result = mysqli_query($mysqli, "INSERT INTO marks VALUES($mark, '$subject', $studentID, $attnumber)") 
            or die('Запрос не удался: ' . mysqli_error($mysqli));
        echo"<br>";
        if($result){
            print("Результат успешно сохранен");
        }
        
    
?>
<br>
<a  href='../personal_page.php' class="submit">На главную</a>
</body>
</html>