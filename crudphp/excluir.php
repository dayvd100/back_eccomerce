<?php 
require 'config.php';
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization"); 

$id = filter_input(INPUT_GET, 'id');

if($id) { 
    $sql = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $sql -> bindValue(':id', $id);
    $sql -> execute();
}

echo 'Produto excluido !! ';
header ('location: listarFront.php');

?>

