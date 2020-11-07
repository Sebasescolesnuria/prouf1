<?php

    include 'header.tpl.php';
    
?>

<div class="container">
  <h2>Formulario Register</h2>
  <p>Introduce tus datos</p>
    <form class="form-inline" action="?url=regaction" method="POST">
        <input type="email" class="form-control mb-2 mr-sm-2" placeholder="Enter email" name="email">
        <input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter name" name="uname">
        <input type="password" class="form-control mb-2 mr-sm-2" placeholder="Enter password" name="passw">
        <!--<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Enter role" name="role">-->
        <div>
            <input type="checkbox" value="Recordar" class="btn btn-info" name="recordar"> Recordar       
            <input type="submit" value="Registrar" class="btn btn-info">
        </div>
    </form>
</div>
<?php

    include 'footer.tpl.php';

?>