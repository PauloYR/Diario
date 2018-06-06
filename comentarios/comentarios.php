<?php
require_once('Conexao.php');
$conexao = new Conexao;
$sql = "SELECT * FROM comentario ORDER BY id DESC";
$comentarios = $conexao->getCon()->query($sql, PDO::FETCH_OBJ);
foreach($comentarios as $infor){
    echo "<p>$infor->comentario</p>";
    
}
?>