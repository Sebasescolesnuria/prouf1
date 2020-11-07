<?php
    //render vista
    require APP.'/src/render.php';

    //si esta denifida la sesion
    $user = $_SESSION['uname'] ?? ''; 
    echo render('register',['title'=>'Register '.$user]);

?>