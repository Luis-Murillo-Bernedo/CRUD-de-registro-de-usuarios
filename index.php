<?php
    include("conexion.php");
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuarios</title>
    <link rel="stylesheet" href="estilos.css">
    <script type="text/javascript">
        function preguntar(){
            return confirm('¿Está seguro de que quiere borrar a este usuario?');
        }
    </script>
</head>
<body>

<?php
    if(isset($_POST['registrar'])){
        $nombre=$_POST['name'];
        $correo=$_POST['email'];

        include("conexion.php");

        $sql = "INSERT INTO usuarios(nombre,email) VALUES('".$nombre."', '".$correo."')";

        $result2 = mysqli_query($conn, $sql);

        if($result2){
            echo "<script language='JavaScript'>
                    alert('Los datos fueron registrados correctamente');
                    location.assign('index.php');
                    </script>";
        }else{
            echo "<script language='JavaScript'>
                    alert('ERROR: Los datos no se pudieron registrar correctamente');
                    location.assign('index.php');
                    </script>";
        }

        mysqli_close($conn);
    }else{

    
?>
    <div class="container">
        <h2>Registro de Usuarios</h2>
        <form id="userForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="submit" id="button2" name="registrar" value="Registrar Usuario">
        </form>
    </div>
        <?php
            }
        ?>
<?php
    $sql = "SELECT * FROM usuarios";
    $result1 = mysqli_query($conn, $sql);
?>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($filas=mysqli_fetch_assoc($result1)){
            ?>  
                <tr>
                    <td> <?php echo $filas['id'] ?> </td>
                    <td> <?php echo $filas['nombre'] ?></td>
                    <td> <?php echo $filas['email'] ?></td>
                    <td>
                        <?php echo "<a id='link1' href='editar.php?id=".$filas['id']."'>EDITAR</a>"; ?>
                        -
                        <?php echo "<a id='link2' href='borrar.php?id=".$filas['id']."' onclick='return preguntar()'>BORRAR</a>"; ?>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    
</body>
</html>