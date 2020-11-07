<?php
    //render vista
    require APP.'/src/render.php';

    //si esta denifida la sesion
    $uname = $_SESSION['uname'] ?? ''; 
    echo render('taskItems',['title'=>'Sublistas de '.$uname]);


?>