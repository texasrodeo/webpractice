<html>
    <head>
        <title>
            Тестирование
        </title>
        <link rel="stylesheet" type="text/css" href="../css/test.css">
    </head>
    <body>
        <h1>Тестирование</h1>
        <?php
            $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
                or die('Не удалось соединиться: ' . mysqli_error());
            $subj_name = '';
            if(isset($_GET['subj_name'])){
                $subj_name = $_GET['subj_name'];
            }
            if(isset($_GET['attnumber'])){
                $attnumber = $_GET['attnumber'];
            }
            $stmt = $mysqli->stmt_init();
            if(
            ($stmt->prepare("SELECT * from questions where subject=? and attnumber=?") === FALSE)
            or ($stmt->bind_param('ss', $subj_name, $attnumber) === FALSE)
            or ($stmt->execute() === FALSE)
            or (($result = $stmt->get_result()) === FALSE)
            or ($stmt->close() === FALSE)
            ) {
                die('Select Error (' . $stmt->errno . ') ' . $stmt->error);
                }
            $counter = 0;
            echo "<form class='test-form' action='check.php' method='GET'>";
            echo"<input type='hidden'  name='attnumber' value=$attnumber>";
            echo"<input type='hidden'  name='subject' value=$subj_name>";
            echo"<ol>";
            while ($row = $result->fetch_array()){
                $vname = "vopros".strval($counter);
                echo"<div>";
                echo"<br>";
                echo"<li>".$row["question"]."</li>";
                
                
                echo"<label><input type ='radio'  name=$vname value='1' checked='true'>".$row["var1"]."</label>";
                echo"<label><input type ='radio'  name=$vname value='2'>".$row["var2"]."</label>";
                echo"<label><input type ='radio'  name=$vname value='3'>".$row["var3"]."</label>";
                echo"</div>";
                $counter++;
            }
            echo"</ol>";
            echo"<br>";
            echo"<button class='submit' type='submit' name='submit'>Отправить</button>";
            echo"</form>";
        ?>   
    </body>
</html>