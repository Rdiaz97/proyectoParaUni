<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Mi proyecto</title>
</head>
<body>

    <header>
        <div><img src="include/logo.png" alt="asdasd"></div>

        <div><p>IUTIRLA <br>Alumno: Rafael Diaz, Billy Chavez <br>Asignatura: Lenguaje de programacion <br>Profesor: Luis Piña</p></div>

        <div><h1>MI PROYECTO</h1></div>

        <div><a href="salir.php">Cerrar sesion</a></div>
    </header>

<?php

$conexion = mysqli_connect("localhost", "root", "", "proyecto");

?> 
</body>
</html>