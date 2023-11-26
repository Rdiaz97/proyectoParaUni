<?php
    include "include/header.php";

  if($id=$_GET['id_inventario']?? null){
    $sql="SELECT * FROM inventario where id_inventario=$id";
    $resul=mysqli_query($conexion, $sql);
    $row=mysqli_fetch_assoc($resul); 
    $sql1= "SELECT * FROM computador where id_computador=".$row['id_computador'];
    $resul1=mysqli_query($conexion, $sql1);
    $row1=mysqli_fetch_assoc($resul1);
?>
<div class="contenido1">
    <form>
        <input type="hidden" name="id_inventario" value="<?php echo $row ["id_inventario"]?>">
            <label>Editar Inventario </label><br>

            <label> fecha de entrada </label><br>
        <input type = "date" name = "fecha_entrada" value="<?php echo $row ["fecha_entrada"]?>"><br>


            <label> ubicacion</label><br>
        <select name= "ubicacion">
            <option selected><?php echo $row ["ubicacion"]?></option>
            <option>almacen 1</option>
            <option>almacen 2</option>
        </select><br>

        <label> fecha de salida</label><br>
        <input type ="date" name= "fecha_salida" value="<?php echo $row ["fecha_salida"]?>"><br>

        <label for="">Computadora</label>
        <select name="id_computador" id="">
<?php
        echo "<option selected value='".$row1['id_computador']."'>".$row1['nombre']."</option>";

        $sql2="SELECT * FROM computador";
        $resul2= mysqli_query($conexion,$sql2);
        while($fila=mysqli_fetch_assoc($resul2)){
            echo "<option value='".$fila['id_computador']."'>".$fila['nombre']."</option>";
        }
?>
        </select><br>
        <label for="">Cantidad:</label><br>
        <input type="number" name="cantidad">

        <input type ="submit" name= "act" value= "Actualizar">
        <a class="aca" href="listar.php">Regresar </a>

    </form>
<div>

<?php
    $id2=$_GET["id_inventario"];
    $fechaE=$_GET["fecha_entrada"]?? null;
    $ubicacion=$_GET["ubicacion"]?? null;
    $fechaS=$_GET["fecha_salida"]?? null;
    $cantidad=$_GET["cantidad"]?? null;
    $idC=$_GET["id_computador"]?? null;

    if ($fechaE!=null || $ubicacion!=null || $fechaS!=null || $idC!=null){
        $sql2="UPDATE inventario SET fecha_entrada= '$fechaE', ubicacion='$ubicacion',cantidad='$cantidad', fecha_salida='$fechaS', id_computador='$idC' where id_inventario=$id2";
        mysqli_query($conexion, $sql2);
        if($fechaE=1){
            header("Location:listar.php");
        } 
    }
?>
<?php 
    } else if($id3=$_GET['id_computador']) {
?>
<?php
  $sql3="SELECT * FROM computador where id_computador=$id3";
  $resul3=mysqli_query($conexion, $sql3);
  $row3=mysqli_fetch_assoc($resul3); 
?>
<div class="contenido12">
    <form>
        <input required type="hidden" name="id_computador" value="<?php echo $row3 ["id_computador"]?>">
        <div class="centrar">
        <label>Editar Computador </label></div>

        <label for="">nombre: </label>
        <input required type="text" name="nombre" value="<?php echo $row3 ["nombre"]?>"><br>

        <label for="">decripcion: </label>
        <input required type="text" name="descripcion" value="<?php echo $row3 ["descripcion"]?>"><br>

        <label for="">procesador: </label>
        <input required type="text" name="procesador" value="<?php echo $row3 ["procesador"]?>"><br>


        <label for="">memoria: </label>
        <input required type="text" name="memoria" value="<?php echo $row3 ["memoria"]?>"><br>

        <label for="">precio: </label>
        <input required type="text" name="precio" value="<?php echo $row3 ["precio"]?>"><br>

        <input type ="submit" name= "act" value= "Actualizar">
        <a href="listar.php">Regresar</a>

    </form>
<div>
<?php
    $id2=$_GET["id_computador"];
    $name=$_GET["nombre"]?? null;
    $descripcion=$_GET["descripcion"]?? null;
    $procesador=$_GET["procesador"]?? null;
    $memoria=$_GET["memoria"]?? null;
    $precio=$_GET["precio"]?? null;

    if ($name!=null || $descripcion!=null || $procesador!=null){
        $sql2="UPDATE computador SET nombre= '$name', descripcion='$descripcion', procesador='$procesador', memoria='$memoria', precio='$precio' where id_computador=$id2";
        mysqli_query($conexion, $sql2);
        if($name=1){
            header("Location:listar.php");
        } 
    }
?>
<?php
    } 
?>
<?php
    include "include/footer.php";
?>