<?php
include("conexao.php");

$id = $_GET["id"];
$id = intval($id); 

$sql = "DELETE FROM usuarios WHERE id = $id";
mysqli_query($conn, $sql);

header("Location: index.php");
exit;
?>