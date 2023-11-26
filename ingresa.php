<?php
include "include/header.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto</title>
</head>
<body>
    <div class="contenedor2">
        <div class="titulo-login">
            <h1>Ingresa o</h1>
        </div>
        <div class="contenedor-login">
            <div>de aun no tener cuenta </div> <br> 
            <div><a href="inscribete.php">Inscribete</a></div>
        </div>
    </div>
    <form action="ingresa.php" method="post">

        <input type="text" name="email" placeholder="Ingresa tu email" id="">
        <input type="password" name="password" placeholder="Contraseña" id="">
        <input type="submit" value="Ingresar">

    </form>
<?php

$email = $_POST["email"]?? NULL;
$password= $_POST["password"]??NULL;    
session_start();
$_SESSION['email']=$email;


if($email!=null && $password!=null){

    $sql="SELECT * FROM usuarios where email = '$email'";
    $users= mysqli_query($conexion, $sql);
    $user= mysqli_fetch_assoc($users); 

if($user==null){
    echo"no coincide";
}else if($password=== $user["password"]){
    if($user["id_cargo"]== 1){
        header("location:listar.php");
    }else{
        header("location:listar_cliente.php");
    }
}else {
    echo"No coincide";
}
 
}

//password_verify sirve para el password_hash 

// if (count($user) > 0 && $password=== $user["contraseña"]) {
//     $_SESSION["user_id"]=$user["id"];
//     header("location:listar.php");

// } else {
//     echo "no coincide";
// }

?>
   <?php
    include "include/footer.php";
?> 
</body>
</html>
