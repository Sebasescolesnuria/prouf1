<?php
include APP.'/config.php';
require APP.'/schema.php';

$email = filter_input(INPUT_POST,"email");
$password = filter_input(INPUT_POST,"passw");
$user = filter_input(INPUT_POST,"uname");
$recordar = filter_input(INPUT_POST,"recordar");
$tiempo = date("d-M-Y H:i:s");
$db = connectMysql($dsn,$dbuser,$dbpass);

$login = auth($db,$email,$password); //Envia los datos a la sentencia SQL login para poder ver si el usuario insertado existe en la base de datos.

if ($login){ //Lee si la función ha devuelto true 
    if ($recordar){
        setcookie("email",$email);  //Creamos cookie para guardar el nombre
        setcookie("uname",$user);  
        setcookie("tiempovisita",$tiempo); 
        header('Location: ?url=loginconcookie');
    }
    else{
        header('Location: ?url=loginsincookie');
    } 
}
else{ //Lee si la función ha devuelto false para redirigir al login
    header('Location: ?url=login');
}


?>