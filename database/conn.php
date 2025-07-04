<?php
// Configurações de conexão
$host = '127.0.0.1';
$port = '3307'; // Porta personalizada que você configurou no MySQL
$dbname = 'focus_hub';
$user = 'root';
$pass = ''; // Sem senha por padrão no XAMPP

try {
    // DSN (Data Source Name) com porta personalizada
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

    // Criar conexão PDO
    $pdo = new PDO($dsn, $user, $pass);

    // Configurar modo de erro para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}
?>
