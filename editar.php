<?php
    include("conexion.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar usuario o contraseña</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];

            $sql = "UPDATE usuarios SET nombre='".$nombre."', email='".$correo."' WHERE id='".$id."'";

            $result = mysqli_query($conn, $sql);

            if($result){
                echo "<script language='JavaScript'>
                        alert('Los cambios se registraron correctamente')
                        location.assign('index.php');
                        </script>";
            }else{
                echo "<script language='JavaScript'>
                        alert('Los cambios no se pudieron registrar')
                        location.assign('index.php');
                        </script>";
            }
            mysqli_close($conn);
        }else{
            $id = $_GET['id'];
            $sql = "SELECT * FROM usuarios WHERE id='".$id."'";
            $result = mysqli_query($conn, $sql);

            $fila = mysqli_fetch_assoc($result);
            $nombre = $fila["nombre"];
            $correo = $fila["email"];

            mysqli_close($conn);
        
    ?>
        <div class="container">
            <h2>Editar Datos de Usuarios</h2>
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" required>
                <input type="email" name="correo" placeholder="Correo electrónico" value="<?php echo $correo; ?>" required>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" id="button1" name="enviar" value="Guardar cambios">
                
            </form>
        </div>
    <?php
        }
    ?>
    
</body>
</html>