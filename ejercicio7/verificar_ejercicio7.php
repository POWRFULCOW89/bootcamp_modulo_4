<?php
header('Content-Type: application/json');

$archivo = 'ejercicio7.php';

if (!file_exists($archivo)) {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "No se encontró el archivo <code>$archivo</code>. Asegúrate de crearlo en la misma carpeta."
    ]);
    exit;
}

$contenido = file_get_contents($archivo);
$puntos = 0;
$errores = [];

// 1. Verifica conexión con SQLite y base eventos.db
if (strpos($contenido, 'new PDO("sqlite:eventos.db")') !== false) {
    $puntos++;
} else {
    $errores[] = 'Debes conectarte usando <code>new PDO("sqlite:eventos.db")</code>.';
}

// 2. Verifica creación de tabla eventos
if (stripos($contenido, 'CREATE TABLE') !== false && stripos($contenido, 'eventos') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta la instrucción para crear la tabla <code>eventos</code>.';
}

// 3. Verifica los campos requeridos en la tabla
if (
    stripos($contenido, 'guia') !== false &&
    stripos($contenido, 'evento') !== false
) {
    $puntos++;
} else {
    $errores[] = 'La tabla debe tener los campos <code>guia</code> y <code>evento</code>.';
}

// 4. Verifica uso de prepare y execute
if (stripos($contenido, 'prepare') !== false && stripos($contenido, 'execute') !== false) {
    $puntos++;
} else {
    $errores[] = 'Debes usar <code>prepare()</code> y <code>execute()</code> para insertar datos.';
}

// 5. Verifica uso de query y fetchAll para leer eventos
if (stripos($contenido, 'query') !== false && stripos($contenido, 'fetchAll') !== false) {
    $puntos++;
} else {
    $errores[] = 'Debes usar <code>query()</code> y <code>fetchAll()</code> para leer los eventos.';
}

// 6. Verifica que se muestren los eventos con echo o sintaxis similar
if (preg_match('/<\?= *\$e\[[\'"]guia[\'"]\]/', $contenido) && preg_match('/<\?= *\$e\[[\'"]evento[\'"]\]/', $contenido)) {
    $puntos++;
} else {
    $errores[] = 'No se encontraron <code>echo</code> o <code><?= \$e["campo"] ?></code> para mostrar los eventos.';
}

if ($puntos >= 6) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "✅ ¡Excelente! Has implementado correctamente el registro y despliegue de eventos. Puntos: $puntos/6"
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "❌ Aún hay detalles por corregir:<br>• " . implode('<br>• ', $errores) . "<br><br>Puntos obtenidos: $puntos/6"
    ]);
}
