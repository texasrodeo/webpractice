<html>

<body>
<?php

    $is_student = TRUE;
    $is_teacher = TRUE;
    $is_admin = TRUE;

    if(isset($_POST['keyteacher']) or isset($_POST['keyadmin'])){
        $is_student= FALSE;
        if(isset($_POST['keyteacher'])){
            $is_admin = FALSE;
        }
        if(isset($_POST['keyadmin'])){
            $is_teacher=FALSE;
        }
      
    }
    else{
        $is_teacher = FALSE;
        $is_admin = FALSE;
    }

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
    if (isset($_POST['secondname'])) { $second_name=$_POST['secondname']; if ($second_name =='') { unset($second_name);} }
    if (isset($_POST['surname'])) { $surname=$_POST['surname']; if ($surname =='') { unset($surname);} }
    if (isset($_POST['course'])) { $course=$_POST['course']; if ($course =='') { unset($course);} }
    if (isset($_POST['subject'])) {$subject=$_POST['subject']; if ($subject =='') { unset($subject);} } 
    if (isset($_POST['keyteacher'])) {$keyteacher=$_POST['keyteacher']; if ($keyteacher =='') { unset($keyteacher);} } 
    if (isset($_POST['keyadmin'])) {$keyadmin=$_POST['keyadmin']; if ($keyadmin =='') { unset($keyadmin);} } 
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $name = stripslashes($name);
    $name = htmlspecialchars($name);
    $surname = stripslashes($surname);
    $surname = htmlspecialchars($surname);
    $second_name = stripslashes($second_name);
    $second_name = htmlspecialchars($second_name);
    $login = trim($login);
    $password = trim($password);
  
    if(empty($login) or empty($password) or empty($name) or empty($surname) or empty($second_name)){
        exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }

    

    if($is_student){
        if (empty($course) ) 
        {
            $message = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
             echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
            
             $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/registration/studentRegistration.html";
             header("Refresh:0; url=$page");
            
        }      
        $course = stripslashes($course);
        $course = htmlspecialchars($course);   
    }
    else{
        if($is_admin){
            if(empty($keyadmin)){
                $message = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
                echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
            
                $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/registration/adminRegistration.html";
                header("Refresh:0; url=$page");
            }
        }
        else{
            if (empty($subject) and empty($keyteacher)) 
            {
                $message = "Вы ввели не всю информацию, вернитесь назад и заполните все поля!";
                echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
            
                $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/registration/teacherRegistration.html";
                header("Refresh:0; url=$page");
            }
        }
       
        

    }
   
    
   
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
                or die('Не удалось соединиться: ' . mysqli_error());
    
    if($is_student){
        $result = $mysqli->query("SELECT id FROM students WHERE login='$login'");
        $myrow = mysqli_fetch_array($result);
        if (!empty($myrow['id'])) {
            exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
        }
        $result2 = $mysqli->query("INSERT INTO students (login,password,name,second_name,surname,course) VALUES('$login','$password','$name','$second_name','$surname',$course)");
    }
    else{
        if(!empty($keyteacher)){
            $result = $mysqli->query("SELECT id FROM teachers WHERE login='$login'");
            $myrow = $result->fetch_array();
            if (!empty($myrow['id'])) {
                exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
            }
            $secret_key = $mysqli->query("SELECT secretkeyteacher FROM code");
            $res = $secret_key->fetch_array();
            if($res["secretkeyteacher"]!=$keyteacher){
                exit ("Извините, введённый вами ключ неверный. Введите другой.");
            }
    
           
            $result2 = $mysqli->query("INSERT INTO teachers (login,password,name,second_name,surname,subject) VALUES('$login','$password','$name','$second_name','$surname','$subject')");
    
        }
        elseif(!empty($keyadmin)){
            $result = $mysqli->query("SELECT id FROM admins WHERE login='$login'");
            $myrow = $result->fetch_array();
            if (!empty($myrow['id'])) {
                exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
            }
            $secret_key = $mysqli->query("SELECT secretkeyadmin FROM code");
            $res = $secret_key->fetch_array();
            if($res["secretkeyadmin"]!=$keyadmin){
                exit ("Извините, введённый вами ключ неверный. Введите другой.");
            }
            
            
            $result2 = $mysqli->query("INSERT INTO admins (login,password,name,surname,second_name) VALUES('$login','$password','$name','$surname','$second_name')");
    
        }
    }
   
    
    if ($result2=='TRUE')
    {
        $message = "Вы успешно зарегестрированы!";
                echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
            
                $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/";
                header("Refresh:0; url=$page");
    }
    else {
        $message = "Ошибка, вы не зарегестрированы!";
                echo"<script type=\"text/javascript\">alert( \"$message\");</script> \n";
                if($is_student){
                    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/registration/studentRegistration.html";
                }
                elseif($is_teacher){
                    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/registration/teacherRegistration.html";
                }
                else{
                    $page = "http://www2.cs.vsu.ru/~kublenko_p_v/webpractice/registration/adminRegistration.html";
                }
            
               
                header("Refresh:0; url=$page");
    }
    ?>
</body>
</html>