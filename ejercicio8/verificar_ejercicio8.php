<?php
header('Content-Type: application/json');

$archivo = 'ejercicio8.php';

if (!file_exists($archivo)) {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "No se encontró el archivo <code>$archivo</code>."
    ]);
    exit;
}

$contenido = file_get_contents($archivo);
$puntos = 0;
$errores = [];

// Verifica uso de formulario con campos esperados
if (stripos($contenido, 'name="usuario"') !== false && stripos($contenido, 'name="contrasena"') !== false) {
    $puntos++;
} else {
    $errores[] = 'El formulario debe tener los campos <code>usuario</code> y <code>contrasena</code>.';
}

// Verifica uso de $_POST para leer datos
if (strpos($contenido, '$_POST["usuario"]') !== false && strpos($contenido, '$_POST["contrasena"]') !== false) {
    $puntos++;
} else {
    $errores[] = 'Debes leer los datos usando <code>$_POST</code>.';
}

// Verifica comparación correcta
if (
    strpos($contenido, 'admin') !== false &&
    strpos($contenido, 'perros123') !== false &&
    preg_match('/if\s*\(.*\$_POST\[["\']usuario["\']\].*===.*["\']admin["\'].*\)/', $contenido)
) {
    $puntos++;
} else {
    $errores[] = 'Debe verificarse que el usuario sea <code>admin</code> y la contraseña <code>perros123</code>.';
}

// Verifica que use echo
if (strpos($contenido, 'echo') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta mostrar el mensaje con <code>echo</code>.';
}

// Resultado final
if ($puntos >= 4) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "✅ ¡Correcto! Autenticación básica completada. Puntos: $puntos/4"
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "❌ Revisa los siguientes puntos:<br>• " . implode('<br>• ', $errores) . "<br><br>Puntos obtenidos: $puntos/4"
    ]);
}
