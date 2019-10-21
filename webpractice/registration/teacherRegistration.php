<?php
    $mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
        or die('Не удалось соединиться: ' . mysqli_error());
    $subjects = $mysqli->query("SELECT name FROM subjects"); 
?>

<html>
    <head>
        <title>
            Регистрация
        </title>
        <link rel="stylesheet" type="text/css" href="../css/registration.css">
    </head>
    <body>
            <h1>Регистрация</h1>
                    <form method="post" action="reg.php" class="box">
                        
                            <label for="login" class="col-one-half">Логин<input id="login" type="text"  name="login"  placeholder="Логин"></label>
                           <label for="password" class="col-one-half">Пароль, не менее 6 знаков<input id="password" type="password" name="password" placeholder="Пароль" pattern="[\x1F-\xBF]*{6,}"></label>
                           <label for="password" class="col-one-half">Имя<input id="name" type="text" name="name" placeholder="Имя"></label>
                            <label for="course" class="col-one-half">Фамилия<input id="surname" type="text" name="surname" placeholder="Фамилия"></label>
                            <label for="secondname" class="col-one-half">Отчество<input id="secondname" type="text" name="secondname" placeholder="Отчество"></label>
                            

                            <?php
                                 echo"
                                 <label for='subject'>Предмет</label>
                                 <p>
                                 <select name='subject' required>";
                                 while($row=$subjects->fetch_array()){
                                         $s = $row['name'];
                                         echo"<option>$s</option>";
                                     }
                                 
                                 echo"</select>";
                            ?>
                         
                            <label>Ключ<input id="keyteacher" type="password" name="keyteacher" placeholder="Ключ"></label>
                            <tr>
                                <td colspan="2" style="text-align: center"><input type="submit" class="submit" value="Зарегестрироваться"></td>
                            </tr>
                        </table>
                    </form>
            
    </body>

</html>