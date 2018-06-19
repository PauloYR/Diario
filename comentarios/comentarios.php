<?php
session_start();
require_once('Conexao.php');
$conexao = new Conexao;
$sql = "SELECT * FROM forum ORDER BY id DESC;";
$comentarios = $conexao->getCon()->query($sql, PDO::FETCH_OBJ);
foreach($comentarios as $infor){
    $sql = "SELECT * FROM login WHERE id=?;";
    $consultar = $conexao->getCon()->prepare($sql);
    $consultar->bindParam(1, $infor->IdUser);
    $consultar->execute();
    
    $dados = $consultar->fetch(PDO::FETCH_OBJ);
    echo "<p>$dados->usuario</p>";
    echo "<p>$infor->mensagens</p>
    <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" xmlns=\"http://www.w3.org/2000/svg\"> <path fill=\"none\" stroke=\"white\" stroke-width=\"1.03\" d=\"M10,4 C10,4 8.1,2 5.74,2 C3.38,2 1,3.55 1,6.73 C1,8.84 2.67,10.44 2.67,10.44 L10,18 L17.33,10.44 C17.33,10.44 19,8.84 19,6.73 C19,3.55 16.62,2 14.26,2 C11.9,2 10,4 10,4 L10,4 Z\"></path></svg>
    <svg width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" xmlns=\"http://www.w3.org/2000/svg\"> <path fill=\"red\" stroke=\"white\" stroke-width=\"1.03\" d=\"M10,4 C10,4 8.1,2 5.74,2 C3.38,2 1,3.55 1,6.73 C1,8.84 2.67,10.44 2.67,10.44 L10,18 L17.33,10.44 C17.33,10.44 19,8.84 19,6.73 C19,3.55 16.62,2 14.26,2 C11.9,2 10,4 10,4 L10,4 Z\"></path></svg>

    ";
    echo "<p>$infor->data</p>";
    echo "<p>$infor->IdUser</p>";
}
?>