<?php
    include "conectado.php";
    if($id=$_GET['id_inventario']?? null){
        $sql="DELETE FROM inventario where id_inventario=$id";
        $resul=mysqli_query($conexion, $sql);
        if($resul===true){
            header("location:listar.php");
        }
?>
<?php } else if ($id=$_GET['id_computador']){?>
<?php
        $sql1="DELETE FROM computador where id_computador=$id";
        $resul=mysqli_query($conexion, $sql1);
        if($resul===true){
            header("location:listar.php");
        }
}
?>