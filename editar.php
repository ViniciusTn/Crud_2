<?php
include("conexao.php");


$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

$sql = "SELECT * FROM usuarios WHERE id = $id";
$res = mysqli_query($conn, $sql);
$dado = mysqli_fetch_assoc($res);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id=$id";
    mysqli_query($conn, $sql);
    header("Location: index.php");
    exit;
}
?>

<form method="POST">
    Nome: <input type="text" name="nome" value="<?= htmlspecialchars($dado['nome']) ?>"><br>
    Email: <input type="email" name="email" value="<?= htmlspecialchars($dado['email']) ?>"><br>
    <input type="submit" value="Salvar">
</form>