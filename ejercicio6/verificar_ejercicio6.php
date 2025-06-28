<?php
header('Content-Type: application/json');

$archivo = 'ejercicio6.php';

if (!file_exists($archivo)) {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "No se encontró el archivo $archivo. Asegúrate de crearlo en la misma carpeta."
    ]);
    exit;
}

$contenido = file_get_contents($archivo);
$puntos = 0;
$errores = [];

// 1. Verifica uso de $_POST
if (strpos($contenido, '$_POST') !== false) {
    $puntos++;
} else {
    $errores[] = 'No estás accediendo a los datos del formulario con <code>$_POST</code>.';
}

// 2. Verifica los campos del formulario
$campos = ['remitente', 'destinatario', 'peso'];
$camposFaltantes = [];

foreach ($campos as $campo) {
    if (stripos($contenido, 'name="' . $campo . '"') === false && stripos($contenido, "name='" . $campo . "'") === false) {
        $camposFaltantes[] = $campo;
    }
}
if (count($camposFaltantes) === 0) {
    $puntos++;
} else {
    $errores[] = 'Faltan los campos: <code>' . implode(', ', $camposFaltantes) . '</code> en el formulario.';
}

// 3. Verifica uso de file_put_contents() con FILE_APPEND
if (strpos($contenido, 'file_put_contents') !== false && strpos($contenido, 'FILE_APPEND') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta guardar los datos con <code>file_put_contents(..., ..., FILE_APPEND)</code>.';
}

// 4. Verifica lectura del archivo con file() o fopen()
if (strpos($contenido, 'file(') !== false || strpos($contenido, 'fopen(') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta lectura del archivo con <code>file()</code> o <code>fopen()</code>.';
}

// 5. Verifica uso de echo (para mostrar resultados)
if (strpos($contenido, 'echo') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta mostrar los envíos anteriores con <code>echo</code>.';
}

// Resultado final
if ($puntos >= 4 && count($errores) === 0) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "✅ ¡Excelente! Tu ejercicio de manejo de archivos cumple con los requisitos. Puntos: $puntos/5"
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "❌ Revisa los siguientes puntos:<br>• " . implode('<br>• ', $errores) . "<br><br>Puntos obtenidos: $puntos/5"
    ]);
}
