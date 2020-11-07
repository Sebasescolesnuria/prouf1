<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>App</title>
</head>
<body>
   <div id="titulo">
        <i class="fas fa-bars"></i>
        <h1><a href="?url=home">Home</a></h1>
        <nav class="nav">
            <ul>
                <li id="lilogin"><?php
                echo '<a href="?url=login">login</a></li>';
            ?>
            <li id="liregister"><a href="?url=register">register</a></li>
            </ul>
        </nav>
    </div>
    <hr>