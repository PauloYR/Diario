<?php
$_POST["comentario"];
require_once("Conexao.php");
$conexao = new Conexao();
$sql = "INSERT INTO comentario (comentario) VALUES(:comentario);";
$comando = $conexao->getCon()->prepare($sql);
$comando->bindParam("comentario",$_POST["comentario"]);
$comando->execute();
?>