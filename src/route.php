<?php

function getRoute():string
{
    if(isset($_REQUEST['url'])){
         $url = $_REQUEST['url'];
    }else{
        $url="home";
    }
    switch ($url){
        case 'login': 
            return 'login';
        case 'register': 
            return 'register';
        case 'regaction': 
            return "regaction";
        case 'loginconcookie': 
            return "loginconcookie";
        case 'loginsincookie': 
            return "loginsincookie";
        case 'logaction': 
            return "logaction";
        case 'logout': 
            return "logout";
        case 'listas':
            return "listas";
        case 'deleteTasks':
            return 'deleteTasks';
        case 'taskItems':
            return 'taskItems';
        default: 
            return 'home';
    }
}