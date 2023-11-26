<?php
    include "include/header.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proyecto</title>
</head>
<body>
<div class="contenedor2">
    <div class="titulo"><h1>Inscribete o</h1></div>
    <div class="contenedor-login">
        <div class="contenedor-mas">de ya tener cuenta </div> <br> 
        <div class="contenedor-mas"><a href="ingresa.php">Ingresa</a></div>
    </div>
</div>

    <form action="inscribete.php" method="post">

        <input type="text" name="nombre" placeholder="Ingresa tu nombre">

        <input required type="email" name="email" placeholder="Ingresa tu email" id="">

        <input required type="password" name="password" placeholder="Contraseña" id="">

        <input required type="password" name="confirm_password" placeholder="Confirma tu contraseña" id="">

        <input type="text" name="id_cargo" value="2" hidden="true">
        
        <input type="submit" value="Ingresar">

    </form>



<?php 

$nombre=$_POST["nombre"]?? null;
$email= $_POST["email"]?? null;
$password= $_POST["password"]?? null; 
$cargo=$_POST["id_cargo"]??null; 



if($email!=null && $password!=null){


    $sql1="INSERT INTO usuarios(nombre, email, password, id_cargo) VALUES ('$nombre','$email','$password', '$cargo')";

    $newUser = mysqli_query($conexion, $sql1);
    
    if($newUser){
        header("location:listar_cliente.php");
    }else{
        echo "No puede ser :( algo salio mal";
    }
}
?>
    <?php
    include "include/footer.php";
?>
</body>
</html>
