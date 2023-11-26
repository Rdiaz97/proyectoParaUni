
<body>
    <?php 
        include "include/header.php";
        session_start();
        error_reporting (0);
        $varsession= $_SESSION['email'];
        if($varsession== null || $varsession= ''){
            header('location:index.php');
            die();
        }
    ?>
    <?php
        $sql="SELECT * FROM inventario";
        $res= mysqli_query($conexion,$sql);

        $sql1="SELECT * FROM computador";
        $res1=mysqli_query($conexion,$sql1);
        
    ?>

    <div class="container">
    <a  href="agregar.php"><div class="new">Nuevo registro</div></a>
        <div>                

            <table>
            <thead>
                    <tr class="centrar"><th colspan="5" >INVENTARIO</th></tr>
                    
                    <tr>
                    <!-- <th>Id</th> -->
                    <th>Fecha Entrada</th>
                    <th>Ubicacion</th>
                    <th>Fecha Salida</th>
                    <th>Cantidad</th>
                    <th>Computador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <?php
while ($filas = mysqli_fetch_assoc($res)) {?>
            <tbody>
<?php
$id=$filas['id_computador'];
$sql_id = "SELECT * FROM `computador` WHERE `id_computador` = $id";
$filas_id=mysqli_query($conexion,$sql_id);
while($row=mysqli_fetch_assoc($filas_id)){
            
?>
                <tr>
                    <!-- <td><?php echo $filas["id_inventario"]?></td> -->
                    <td><?php echo $filas["fecha_entrada"]?></td>
                    <td><?php echo $filas["ubicacion"]?></td>
                    <td><?php echo $filas["fecha_salida"]?></td>
                    <td><?php echo $filas["cantidad"]?></td>
                    <td><?php echo $row["nombre"]?></td>
                    <td><?php echo "<a class='aca' href='editar.php?id_inventario=".$filas['id_inventario']."'>Editar</a>";?> <?php echo "<a class='aca' href='eliminar.php?id_inventario=".$filas['id_inventario']."'>Eliminar</a>";?> </td>
                </tr>
<?php } ?>
                </tbody>
                <?php
}
?>
            </table>

        </div>
    </div>

    <div class="container">
    <a href="agregar.php"><div class="new">Nuevo registro</div></a>
        <table>
            <thead>
                <tr class="centrar"><th colspan="7" >COMPUTADORA</th></tr>
                <tr>
                    <!-- <th>Id</th> -->
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Procesador</th>
                    <th>Memoria</th>
                    <th>Precio</th>
                    <th>Creado el</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($filas1 = mysqli_fetch_assoc($res1) ) {?>
                <tr>
                    <!-- <td><?php echo $filas1["id_computador"]?></td> -->
                    <td><?php echo $filas1["nombre"]?></td>
                    <td><?php echo $filas1["descripcion"]?></td>
                    <td><?php echo $filas1["procesador"]?></td>
                    <td><?php echo $filas1["memoria"]?></td>
                    <td><?php echo $filas1["precio"]?></td>
                    <td><?php echo $filas1["creado_el"]?></td>
                    <td><?php echo "<a class='aca' href='editar.php?id_computador=".$filas1['id_computador']."'>Editar</a>";?> <?php echo "<a class='aca' href='eliminar.php?id_computador=".$filas1['id_computador']."'> Eliminar</a>";?> </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php
    include "include/footer.php";
?>