<?php

    include 'header.tpl.php';
    
    $logout = filter_input(INPUT_POST,"logout");
    if ($logout == TRUE){
        unset($_SESSION['uname']);
        unset($_SESSION['email']);
        unset($_SESSION['passwd']);
        setcookie("tiempovisita","");
        setcookie("uname","");
        setcookie("email","");
        header('Location: ?url=login');
        echo "Se han borrado sus datos correctamente <br>"; 
    }
?>
    <p>Te has logeado correctamente, bienvenido <?php echo $_SESSION["uname"];?>.</p>
    <p><a href="?url=listas">Ver tus listas</a></p>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        <br><input type="submit" name="logout" class="btn btn-info" value="Logout">
    </form>
<?php

include 'footer.tpl.php';

?>