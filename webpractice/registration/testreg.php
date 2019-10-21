<?php
   
    session_start();
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
    if (empty($login) or empty($password))
    {
        $message = "Вы заполнили не все поля, повторите попытку.";
             echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
            
             $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/index.php";
             header("Refresh:0; url=$page");
    }
    else{
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
    
        $login = trim($login);
        $password = trim($password);
    
        $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
            or die('Не удалось соединиться: ' . mysqli_error());
     
        $result = $mysqli->query("SELECT * FROM students WHERE login='$login'"); 
        $result2 = $mysqli->query("SELECT * FROM teachers WHERE login='$login'"); 
        $result3 = $mysqli->query("SELECT * FROM admins WHERE login='$login'"); 
        if($result->num_rows != 0){
            $row = $result->fetch_array();
            if ($row['password']!=$password)
            {
                 $message = "Извините, введённый вами пароль неверный.";
                 echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
                
                 $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/index.php";
                 header("Refresh:0; url=$page");
            }
            else {
                if ($row['password']==$password) {
                 $_SESSION['is_student'] = TRUE;
                 $_SESSION['login']=$row['login']; 
                 $_SESSION['id']=$row['id'];
                 $_SESSION['course']=$row['course'];
                 $_SESSION['name']=$row['name'];
                 $_SESSION['second_name']=$row['second_name'];
                 $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/personal_page.php";
                 header("Refresh:0; url=$page");
                
            }
         }
        }
        else{
            if($result2->num_rows != 0){
                $row = $result2->fetch_array();
                if ($row['password']!=$password)
                {
                    
                     $message = "Извините, введённый вами пароль неверный.";
                     echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
                     $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/index.php";
                     header("Refresh:0; url=$page");
                }
                else {
                    if ($row['password']==$password) {
                     $_SESSION['is_student'] = FALSE;
                     $_SESSION['is_teacher'] = TRUE;
                     $_SESSION['login']=$row['login']; 
                     $_SESSION['id']=$row['id'];
                     $_SESSION['subject']=$row['subject'];
                     $_SESSION['name']=$row['name'];
                     $_SESSION['second_name']=$row['second_name'];
                     $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/personal_page.php";
                     header("Refresh:0; url=$page");
                    }
                }
            }
            elseif($result3->num_rows != 0){
                $row = $result3->fetch_array();
                if ($row['password']!=$password)
                {
                    
                     $message = "Извините, введённый вами пароль неверный.";
                     echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
                     $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/index.php";
                     header("Refresh:0; url=$page");
                }
                else {
                    if ($row['password']==$password) {
                        $_SESSION['is_student'] = FALSE;
                     $_SESSION['is_teacher'] = FALSE;
                     $_SESSION['login']=$row['login']; 
                     $_SESSION['id']=$row['id'];
                     $_SESSION['name']=$row['name'];
                     $_SESSION['second_name']=$row['second_name'];
                     $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/personal_page.php";
                     
                     header("Refresh:0; url=$page");
                    }
                }
            }
            else{
                $message = "Извините, такой login не зарегестрирован";
                 echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
                $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/index.php";
                header("Refresh:0; url=$page");
            }       
         
        }
    }
   
    ?>