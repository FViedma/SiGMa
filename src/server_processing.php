<?php
// require_once "../conexion.php";
// try {
//     $conn = $conexion;
// } catch (PDOException $exception) {
//     die($exception->getMessage());
// }
// //Order By
// $orderBy = " ORDER BY ";
// foreach ($_GET['order'] as $order) {
//     $orderBy .= $order['column'] + 1 . " {$order['dir']}, ";
// }

// $orderBy = substr($orderBy, 0, -2);
// $where = '';

// //WHERE
// $columns = $_GET['columns'];
// $fields = ['codigo', 'descripcion', 'ubicacion', 'asignado'];
// $where = '';

// foreach ($columns as $k => $column) {
//     if ($search = $column['search']['value']) {
//         $where .= $fields[$k].' = '.$search.' AND ';
//     }
// }

// $where = substr($where, 0, -5);

// //Search
// $globalSearch = $_GET['search'];
// if ( $globalSearchValue = $globalSearch['value'] ) {
// 	$where .= ($where ? $where.' AND ' : '' )."name LIKE '%$globalSearchValue%'";
// }

// //length
// $length = $_GET['length'];
// $start = $_GET['start'];

// //count total recordsTotal
// $countSql = "SELECT count(id_activo_fijo) as Total FROM activos_fijos";
// $countSt = mysqli_query($conexion,$countSql);

// $total = mysqli_fetch_all($countSt);

// $sql = "SELECT id_activo_fijo, codigo, descripcion, ubicacion, asignado FROM activos_fijos".($where ? "WHERE $where " : '')."$orderBy LIMIT $length OFFSET $start";
// error_log($sql);
// $st = mysqli_query($conn, $sql);

// if ($st) {
//     $rs = mysqli_fetch_all($st);
//     echo json_encode([
//         'data' => $rs,
//         'recordsTotal' => $total,
//         'recordsFiltered' => count($rs),
//     ]);
// } else {
//     mysqli_error($conn);
//     die();
// }
 
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'activos_fijos';
 
// Table's primary key
$primaryKey = 'id_activo_fijo';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'id_activo_fijo', 'dt' => 0 ),
    array( 'db' => 'codigo',  'dt' => 1 ),
    array( 'db' => 'descripcion',     'dt' => 2 ),
    array( 'db' => 'ubicacion',     'dt' => 3 ),
    array( 'db' => 'asignado',     'dt' => 4 ),
);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'v_farmacia',
    'host' => 'localhost',
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);