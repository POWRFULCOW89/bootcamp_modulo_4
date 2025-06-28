<?php
header('Content-Type: application/json');

$archivo = 'ejercicio5.php';

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

// Verifica session_start antes de HTML
if (preg_match('/^\s*<\?php\s+session_start\(\);/i', $contenido)) {
    $puntos++;
} else {
    $errores[] = 'Falta <code>session_start()</code> al inicio del archivo.';
}

// Verifica los campos del formulario
if (stripos($contenido, 'name="nombre"') !== false && stripos($contenido, 'name="correo"') !== false) {
    $puntos++;
} else {
    $errores[] = 'Faltan los campos <code>nombre</code> y/o <code>correo</code> en el formulario.';
}

// Verifica uso de $_SESSION
if (strpos($contenido, '$_SESSION["nombre"]') !== false && strpos($contenido, '$_SESSION["correo"]') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta guardar los datos en <code>$_SESSION</code>.';
}

// Verifica isset
if (strpos($contenido, 'isset') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta el uso de <code>isset()</code> para verificar si el usuario ya está suscrito.';
}

// Verifica echo
if (strpos($contenido, 'echo') !== false) {
    $puntos++;
} else {
    $errores[] = 'No estás mostrando mensajes al usuario con <code>echo</code>.';
}

// Verifica session_destroy
if (strpos($contenido, 'session_destroy') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta el botón o lógica de <code>session_destroy()</code> para cancelar la suscripción.';
}

if ($puntos >= 5 && count($errores) === 0) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "✅ ¡Excelente! Tu script de suscripción funciona correctamente. Puntos: $puntos/6"
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "❌ Revisa lo siguiente:<br>• " . implode('<br>• ', $errores) . "<br><br>Puntos obtenidos: $puntos/6"
    ]);
}
