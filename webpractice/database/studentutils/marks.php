 <?php
    session_start();
    $id = $_SESSION['id'];
    $course = $_SESSION['course'];

    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
     or die('Не удалось соединиться: ' . mysqli_error());


    $subjects = mysqli_query($mysqli, "SELECT name from subjects where course=$course");

    if(isset($_GET['subject'])){
        $subject = $_GET['subject'];
    }
    else{
        $subject='Любой';
    }
    if($subject == 'Любой'){
        $result = mysqli_query($mysqli, "SELECT name from subjects where course=$course");
    }
    else{
        $result = mysqli_query($mysqli, "SELECT name from subjects where course=$course and name='$subject'");
    }

   
    
    
    
 ?>

 <html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/marks.css">
        <title>
            Ваши оценки
        </title>
    </head>
    <body>
        <h1>Ваши оценки</h1>
        <table border=2>
        <tr>
        <td>Предмет</td>
        <td>Аттестация 1</td>
        <td>Аттестация 2</td>
        <td>Аттестация 3</td>
        
        </tr>
        <?php
           
            
            while($row = $result->fetch_array()){
                echo"<tr>";
                $sname=$row['name'];
              
                echo"<td>".$sname."</td>";
                $mark1 = $mysqli->query("SELECT mark from marks WHERE studentID=$id and subject='$sname' and attnumber=1");

                if($mark1->num_rows == 0){
                   
                    echo"<td>"."нет"."</td>";                   
                }
                else{
                    echo"<td>".$mark1->fetch_array()['mark']."</td>";
                }
                $mark2 = mysqli_query($mysqli, "SELECT mark from marks WHERE studentID=$id and subject='$sname' and attnumber=2");
                if($mark2->num_rows == 0){
                    echo"<td>"."нет"."</td>";
                }
                else{
                    
                    echo"<td>".$mark2->fetch_array()['mark']."</td>";
                }
                $mark3 = mysqli_query($mysqli, "SELECT mark from marks WHERE studentID=$id and subject='$sname' and attnumber=3");
                if($mark3->num_rows == 0){
                   
                    echo"<td>"."нет"."</td>";
                }
                else{
                    echo"<td>".$mark3->fetch_array()['mark']."</td>";
                }
                echo"</tr>";
                
                
                
            }
            mysqli_close($mysqli);
        ?>
    </table>
    <br>
    <h2>Сортировка</h2>
            <form action='marks.php' method='GET'>
                    <label>Предмет
                    <select name='subject'>
                        <option value='Любой'>Любой</option>
                        <?php
                            while($row = $subjects->fetch_array()){
                                $name = $row['name'];
                               echo"<option value='$name'>$name</option>";
                            }
                        ?>
                    </select>
                    <br>
                    </label>
            <input type='submit' value='Показать'>
            </form>
    <a  href='../../personal_page.php' class='submit'>Назад</a>
    </body>
 </html>