<?php
session_start();
echo "<script>alert(\"{$_SESSION['id']}\") </script>";
$_POST["comentario"];
require_once("Conexao.php");
$conexao = new Conexao();
$sql = "INSERT INTO forum (mensagens,IdUser,data) VALUES (?,?,NOW());";
$comando = $conexao->getCon()->prepare($sql);
$comando->bindParam(1,$_POST["comentario"]);
$comando->bindParam(2,$_SESSION['id']);
$comando->execute();
?>
