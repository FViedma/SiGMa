<?php
require("../conexion.php");
$id_user = $_GET['id_session'];
$permiso = 'activos_fijos';
$sql = mysqli_query($conexion, "SELECT p.*, d.* FROM permisos p INNER JOIN detalle_permisos d ON p.id = d.id_permiso WHERE d.id_usuario = $id_user AND p.nombre = '$permiso'");
$existe = mysqli_fetch_all($sql);
if (empty($existe) && $id_user != 1) {
    // header("Location: permisos.php");
    return $id_user;
}
if (!empty($_GET['id_activo'])) {
    $id = $_GET['id_activo'];
    $query_delete = mysqli_query($conexion, "DELETE FROM activos_fijos WHERE id_activo_fijo = $id");
    mysqli_close($conexion);
    return true;
    // header("Location: activos_fijos.php");
}
