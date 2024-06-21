<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        PHP Site -
        <?php
        echo $titulo;
        ?>
    </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<header>
    <div class="container">
        <h1>
            <a href="home.php">
                <img src="../asserts/logoPhp.png" alt="PHP site" class="logo">
            </a>
        </h1>
        <nav>
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon"></label>
            <ul class="principal">
                <li class="emLinha"><a href="../cadastro.html">Cadastro</a></li>
                <li class="emLinha"><a href="../index.html">Login</a></li>
            </ul>
        </nav>
    </div>
</header>
