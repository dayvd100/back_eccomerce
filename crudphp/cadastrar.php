<?php
require 'config.php';

// Configurar cabeçalhos CORS para permitir acesso de qualquer origem
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); // Adicione outros métodos se necessário
header("Access-Control-Allow-Headers: Content-Type"); // Adicione outros cabeçalhos se necessário

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // Lida com solicitações preflight (usadas pelo navegador para verificar permissões)
    header("HTTP/1.1 200 OK");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lida com a solicitação POST
    $idSneaker = filter_input(INPUT_POST, 'idSneaker');

    $sql = $pdo->prepare("INSERT INTO produtos (idSneaker) VALUES (:idSneaker)");
    $sql->bindValue(":idSneaker", $idSneaker);
    $sql->execute();
    // Verifica se 'idSneaker' não é nulo
    if ($idSneaker !== null) {
        // Você pode usar $idSneaker da forma que desejar
        echo "ID do Sneaker recebido: $idSneaker";
    } else {
        echo "nao esta recebendo nenhum valor aqui";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Lida com a solicitação GET
    // Você pode adicionar código para responder a solicitações GET aqui
    // Por exemplo, para buscar dados da tabela produtos e enviar como resposta
    $sql = $pdo->prepare("SELECT * FROM produtos");
    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}
?>
