<?php
    include "include/header.php";
?>


<div class="conteiner-flex">
    <div class="contenido">
        <form method="get">
        <!-- <label for="">id_inventario: </label><br>
        <input type="text" name="id_inventario"><br> -->

        <label for="">Fecha entrada: </label><br>
        <input type="date" name="date_entrada"><br>

        <label for="">Ubicacion: </label><br>
        <select name= "ubicacion">
            <option>almacen 1</option>
            <option>almacen 2</option>
        </select><br>

        <label for="">Fecha salida: </label><br>
        <input type="date" name="date_salida"><br>

        <label for="">Computador</label><br>
        <select name="id_computador" id="">
            
<?php
    $sql2="SELECT * FROM computador";
    $resul2= mysqli_query($conexion,$sql2);
    while($fila=mysqli_fetch_assoc($resul2)){
        echo "<option value='".$fila['id_computador']."'>".$fila['nombre']."</option>";
    }
?>
        </select><br>

        <label for="">Cuantos llegaron?</label><br>
        <input type="number" name="cantidad"><br>

        <label for="">Usuario</label><br>
        <select name="usuario" id="">
<?php
    $sql3="SELECT * FROM usuarios";
    $resul3= mysqli_query($conexion,$sql3);
    while($fila=mysqli_fetch_assoc($resul3)){
        echo "<option value='".$fila['id']."'>".$fila['nombre']."</option>";
    }
?>
        </select><br>
        
        <input type="submit" name="" value="agregar">
        <a class="aca" href="listar.php">regresar</a>
        </form>
    </div>

<?php

    $id_inventario = $_GET["id_inventario"]?? null;
    $date_entrada= $_GET["date_entrada"]?? null;
    $ubicacion= $_GET["ubicacion"]?? null;
    $cantidad=$_GET["cantidad"]?? null;
    $date_salida = $_GET["date_salida"]?? null;
    $id_computador= $_GET["id_computador"]?? null;
    $id_usuarios=$_GET["usuario"]?? null;

    if($id_inventario!=null || $date_entrada!=null||$ubicacion!=null || $date_salida!=null || $id_computador!=null){


        $sql="INSERT INTO inventario(id_inventario,fecha_entrada, ubicacion, cantidad, fecha_salida, id_computador, id_usuarios)VALUES ('$id_inventario','$date_entrada','$ubicacion','$cantidad','$date_salida','$id_computador','$id_usuarios')";

        mysqli_query($conexion, $sql);

        if($id_inventario=1){
            header("location:listar.php");
        }
    }
?>

    <div class="contenido">
        <form method="get">
        <!-- <label for="">id_computador: </label><br>
        <input type="text" name="id_computador"><br> -->

        <label for="">nombre: </label><br>
        <input type="text" name="nombre"><br>

        <label for="">decripcion: </label><br>
        <input type="text" name="descripcion"><br>

        <label for="">procesador: </label><br>
        <input type="text" name="procesador"><br>

        <label for="">memoria: </label><br>
        <input type="text" name="memoria"><br>

        <label for="">precio: </label><br>
        <input type="text" name="precio"><br>

        <label for="">Usuario</label><br>
        <select name="idusuario" id="">
<?php
    $sql4="SELECT * FROM usuarios";
    $resul4= mysqli_query($conexion,$sql4);
    while($filas=mysqli_fetch_assoc($resul4)){
        echo "<option value='".$filas['id']."'>".$filas['nombre']."</option>";
    }
?>
        </select><br>

        <input type="submit" value="agregar">
        
        
        <a class="aca" href="listar.php">regresar</a>
        </form>
    </div>
</div>
<?php
    $nombre= $_GET["nombre"]?? null;    
    $descripcion= $_GET["descripcion"]?? null;
    $procesador= $_GET["procesador"]?? null;
    $memoria= $_GET["memoria"]?? null;
    $precio = $_GET["precio"]?? null;
    $usuarios=$_GET["idusuario"]?? null;




    if($nombre!=null||$descripcion!=null || $procesador!=null || $memoria!=null || $precio!=null){

        $sql1="INSERT INTO computador(nombre, descripcion, procesador, memoria, precio, id_usuarios)VALUES ('$nombre','$descripcion','$procesador','$memoria', '$precio','$usuarios')";

        mysqli_query($conexion, $sql1);

        if($id_computador=1){
            header("location:listar.php");
        }
    }
?>

<?php
    include "include/footer.php";
?>