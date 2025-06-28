<?php
// database.php - Conexión simple a SQLite

$pdo = new PDO('sqlite:database.db');

// Crear tabla de usuarios si no existe
$pdo->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY,
    nombre TEXT,
    email TEXT UNIQUE,
    password TEXT
)");

// Crear usuario de prueba
$stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = 'estudiante@test.com'");
$stmt->execute();
if ($stmt->fetchColumn() == 0) {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
    $stmt->execute(['Estudiante', 'estudiante@test.com', '123456']);
}
