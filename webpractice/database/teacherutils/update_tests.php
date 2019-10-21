 <?php
    session_start();
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $subject = $_SESSION['subject'];
    if(isset($_GET['attestation'])){
        if($_GET['attestation']=='Любая'){
            $result = $mysqli->query("SELECT * FROM questions WHERE subject='$subject'"); 
        }
        else{
            $att=$_GET['attestation'];
            $att=(int)$att;
            
            $result = $mysqli->query("SELECT * FROM questions WHERE subject='$subject' and attnumber=$att"); 
        }
    }
    else{ 
        $result = $mysqli->query("SELECT * FROM questions WHERE subject='$subject'"); 
    }

       
    
?>  
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/updatetests.css">
        <title>
            Вопросы по вашему предмету
        </title>
    </head>
    <body>
        <h1>Вопросы по Вашему предмету</h1>
        <?php
        if($result->num_rows==0){
            echo"<h1>Вопросов не найдено</h1>";
        }
            
            
        else{
            echo "<table border = 2>
            <tr>
            <td>Вопрос</td>
            <td>Номер аттестации</td>
            <td>Вариант 1</td>
            <td>Вариант 2</td>
            <td>Вариант 3</td>
            <td>Ответ</td>
            <td>Действия</td>
            </tr>";
                while ($row = $result->fetch_array()){
                    $question = $row['question'];
                    $attnumber = $row['attnumber'];
                    $var1 = $row['var1'];
                    $var2 = $row['var2'];
                    $var3 = $row['var3'];
                    $answer = $row['answer'];
    
                    echo "<tr>
                    <td>".$question."</td>
                    <td>".$attnumber."</td>
                    <td>".$var1."</td>
                    <td>".$var2."</td>
                    <td>".$var3."</td>
                    <td>".$answer."</td>
                    
                    
                    <td>
                    <form action='deletequestion.php' method='GET'>
                    <input type='hidden' name='question' value='$question'>
                    <input type='submit' class='delete' value='Удалить вопрос'>
                    </form>
                     
                    <form action='alterquestion.php' method='GET'>
                    <input type='hidden' name='question' value='$question'>
                    <input type='hidden' name='attnumber' value='$attnumber'>
                    <input type='hidden' name='var1' value='$var1'>
                    <input type='hidden' name='var2' value='$var2'>
                    <input type='hidden' name='var3' value='$var3'>
                    <input type='hidden' name='answer' value='$answer'>
                    <input type='submit' class='delete' value='Редактировать вопрос'>
                    </form>
                    </td>
                    </tr>";
    
                    
                }
            }
          
            ?>
            </table>
            <h2>Сортировка</h2>
            <form action='update_tests.php' method='GET'>
            
                    <select name='attestation'>
                        <option>Любая</option>
                        <option value='1'>Аттестация 1</option>
                        <option value='2'>Аттестация 2</option>
                        <option value='3'>Аттестация 3 </option>
                    </select>
            <input type='submit' class='delete' value='Показать'>
            </form>
            <h2>Добавить вопрос</h2>
            <form action='addquestion.php' method='POST'>
            <input type='text' class='center' name='question' placeholder='Вопрос'>
            <br>
            <input type='text' name='var1' placeholder='Вариант 1'>
        
            <input type='text' name='var2' placeholder='Вариант 2'>
           
            <input type='text' name='var3' placeholder='Вариант 3'>
            <br>
            <input type='text' name='answer' placeholder='Вариант правильного ответа'>
            <br>
            <h3>Номер аттестации</h3>
            <label>1<input type ='radio'  name='attnumber' value='1' checked='true'></label>
            <label>2<input type ='radio'  name='attnumber' value='2'></label>
            <label>3<input type ='radio'  name='attnumber' value='3'></label>
            <br> 
            <input type='submit' class='add'  name='OK' value='Добавить вопрос'>
            </form>
        
        <a  href='../../personal_page.php' class='submit'>Назад</a>
    </body>
</html>

