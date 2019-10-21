<?php
$mysqli = mysqli_connect('localhost', 'kublenko_p_v', 'NewPass19', 'kublenko_p_v')
or die('Не удалось соединиться: ' . mysqli_error());
// $result = mysqli_query ($mysqli,"Insert into subjects VALUES('История',3,0,0,0)") ;
// $result = mysqli_query ($mysqli,"Insert into subjects VALUES('Матанализ',1,0,0,0)") ;
// $result = mysqli_query ($mysqli,"Insert into subjects VALUES('Дискретная математика',2,0,0,0)") ;
// $result = mysqli_query ($mysqli,"Insert into subjects VALUES('Физика',3,0,0,0)") ;
// //$result = mysqli_query ($mysqli,"INSERT into subjects VALUES('Информатика',3)") ;
// $result2 = $mysqli->query("TRUNCATE TABLE code");
// $result2 = $mysqli->query("INSERT INTO code  VALUES(50000, 40000)");
$result2 = $mysqli->query("INSERT into code Values(50000, 40000)");
if($result2){
print('успешно');
}
else{
    print("ошибка");
}

?>