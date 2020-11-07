<?php
    include 'header.tpl.php';
    include APP.'/config.php';
    require APP.'/schema.php';

    $db = connectMysql($dsn,$dbuser,$dbpass);
    $id_ti = filter_input(INPUT_POST,"idtask");
    $enviar = filter_input(INPUT_POST,"enviar");
    $user = $_COOKIE['uname'];
    $descriptionti = [];
    $completedti = [];
    $count2 = 0;


    if($enviar){
        $taskItems = tasks_items($db,$user,$descriptionti,$completedti,$id_ti,$count2);
        if ($taskItems){
            $descriptionti = implode (", ",$descriptionti);
            $completedti = implode (", ",$completedti);
            echo "<div id='divlistas'><p>Se han encontrado $count2 listas</p>
            <table id='listas'>
                <tr><td class='td'>ID: $id_ti</td></tr>
                <tr><td class='td'>Description: $descriptionti</td></tr>
                <tr><td class='td'>Completed: $completedti</td></tr>
            </table></div>";
        }
        else{
            echo "No se han encontrado sublistas";
        }
    }

?>
<div class="container">
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <input type="number" class="form-control mb-2 mr-sm-2" placeholder="Enter id" name="idtask">
        <br><input type="submit" name="enviar" class="btn btn-info" value="Enviar">
    </form>
    <a href="?url=listas">Volver atras</a>
</div>
<?php

include 'footer.tpl.php';

?>