<?php
    include 'header.tpl.php';
    include APP.'/config.php';
    require APP.'/schema.php';

    $db = connectMysql($dsn,$dbuser,$dbpass);
    $user = $_COOKIE['uname'];
    $idlist = [];
    $descriptionlist = [];
    $due_datelist = [];
    $count2 = 0;
    $listas = tasks($db,$user,$idlist,$descriptionlist,$due_datelist,$count2);

    $insertar = filter_input(INPUT_POST,"insertar");
    $description = filter_input(INPUT_POST,"description");
    $date = filter_input(INPUT_POST,"date");

    if($listas){
        $idlist = implode (", ",$idlist);
        $descriptionlist = implode (", ",$descriptionlist);
        $due_datelist = implode (", ",$due_datelist);
        echo "<div id='divlistas'><p>Se han encontrado $count2 listas</p>
        <table id='listas'>
            <tr><td class='td'>ID: $idlist</td></tr>
            <tr><td class='td'>Description: $descriptionlist</td></tr>
            <tr><td class='td'>Date: $due_datelist</td></tr>
        </table></div>";
        echo "<p><a href='?url=taskItems'>Ver tus sublistas</a></p>";
    }
    else{
        echo "No se han encontrado listas";
    }

    if ($insertar){
        $insertlistas = insertTasks($db,$description,$date,$user);
        if ($insertlistas){
            echo "Lista creada";
        }
        else{
            echo "No se ha podido crear la lista";
        }
    }
?>
<hr>
<div class="container">
  <h2>Crear nueva lista</h2>
    <form class="form-inline" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST" id="form">
        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter name" name="description">
        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Date 2020/12/12 24:00:00" name="date"> 
        <div>      
            <input type="submit" value="Insertar" class="btn btn-info" name="insertar">
        </div>
    </form>
</div>
<a href="?url=deleteTasks">Borrar listas</a>
</body>
<?php

include 'footer.tpl.php';

?>