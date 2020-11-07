<?php
include APP.'/config.php';
require APP.'/schema.php';

$user = filter_input(INPUT_POST,"uname");
$password = filter_input(INPUT_POST,"passw");
$email = filter_input(INPUT_POST,"email");
$role = 1; // El rol 1 significa que es tipo usuario, todos los nuevos usuarios comienzan con este rol
$recordar = filter_input(INPUT_POST,"recordar");
$tiempo = date("d-M-Y H:i:s");
$db = connectMysql($dsn,$dbuser,$dbpass);

$register = insertItems($db,$email,$user,$password,$role); //Guardamos y enviamos los valores a InsertItems para que haga la funcion SQL de insertar nuevos valores en la BD
if ($register){ //Lee si la función ha devuelto true
    if ($recordar){ //Comprueba si el checkbox esta seleccionado para poder crear las cookies
        $_SESSION["uname"] = $user; 
        $_SESSION["email"] = $email; 
        setcookie("email",$email);  
        setcookie("uname",$user); 
        setcookie("tiempovisita",$tiempo);
        header('Location: ?url=loginconcookie'); //Redirige a la página principal con cookies
    }
    else{
        header('Location: ?url=loginsincookie'); //Redirige a la página principal sin cookies
    }
}
else{ //Si la función devuelve false significa que el usuario ya existe en la base de datos
    header('Location: ?url=register'); //Redirigimos al usuario a register
}

?>