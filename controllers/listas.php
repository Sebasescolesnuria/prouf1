<?php
    //render vista
    require APP.'/src/render.php';

    //si esta denifida la sesion
    $uname = $_SESSION['uname'] ?? ''; 
    echo render('listas',['title'=>'Listas de '.$uname]);


?>