<?php
    $id = $_GET['id'];
    include("conexion.php");

    $sql = "DELETE FROM usuarios WHERE id='".$id."'";
    $result = mysqli_query($conn, $sql);

    echo "<script language='JavaScript'>
            location.assign('index.php')
            </script>";

?>