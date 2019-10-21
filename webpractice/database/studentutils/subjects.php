<html>

<head>
  <title>
    Список доступных предметов
  </title>
  <link rel="stylesheet" type="text/css" href="../../css/subjects.css">
</head>



<body>
  <?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
      or die('Не удалось соединиться: ' . mysqli_error());
    $course = $_SESSION['course'];
     
    $result = $mysqli->query("SELECT * FROM subjects WHERE course='$course'");
    echo "<h1>Предметы, доступные вам</h1>";    
    while ($row = $result->fetch_array()) {
        
        echo "<form action='../../testing/test.php' method='GET'>";
        echo "<div class='name'>";
        echo $row["name"];
        echo "</div>";
        $name = $row["name"];
        $att1 = $mysqli->query("SELECT att1 FROM subjects WHERE name='$name'")->fetch_array()['att1'];
        $att2 = $mysqli->query("SELECT att2 FROM subjects WHERE name='$name'")->fetch_array()['att2'];
        $att3 = $mysqli->query("SELECT att3 FROM subjects WHERE name='$name'")->fetch_array()['att3'];
        echo"<input type='hidden'  name='subj_name' value=$name>";
        
        if(!$att1 and !$att2 and !$att3){
          echo"<h2>Доступных аттестаций нет</h2>";
        }
        else{
          echo "<h3>Номер аттестации</h3>";
          if($att1){
            echo"<label>1<input type ='radio'  name='attnumber' value='1' checked='true'></label>";
          }
          if($att2){
            echo"<label>2<input type ='radio'  name='attnumber' value='2' checked='true'></label>";
          }
          if($att3){
            echo"<label>3<input type ='radio'  name='attnumber' value='3' checked='true'></label>";
          }      
          echo"<input type='submit'  name='OK' value='Пройти тест'>";
        }
       
        echo "</form>";
        echo"<br>";
    }
  ?>
  <a  href='../../personal_page.php' class='submit'>Назад</a>
</body>

</html>