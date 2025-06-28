<?php
header('Content-Type: application/json');

$archivo = 'ejercicio4.php';

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

// Revisión del formulario
if (stripos($contenido, '<form') !== false) $puntos++;
else $errores[] = 'Falta la etiqueta <code>&lt;form&gt;</code>';
if (preg_match('/method=[\'"]post[\'"]/i', $contenido)) $puntos++;
else $errores[] = 'El formulario debe usar <code>method="post"</code>';

// Campos esperados
$campos = ['nombre', 'correo', 'telefono', 'calle', 'numero_ext', 'colonia', 'codigo_postal', 'referencias'];
$faltantes = [];

foreach ($campos as $campo) {
    if (stripos($contenido, 'name="' . $campo . '"') === false && stripos($contenido, "name='" . $campo . "'") === false) {
        $faltantes[] = $campo;
    }
}

if (count($faltantes) === 0) {
    $puntos += 2;
} else {
    $errores[] = 'Faltan los campos: <code>' . implode(', ', $faltantes) . '</code>';
}

// Validaciones PHP
if (strpos($contenido, '$_POST') !== false) $puntos++;
else $errores[] = 'No estás utilizando <code>$_POST</code> para procesar los datos.';
if (strpos($contenido, 'empty') !== false) $puntos++;
else $errores[] = 'Falta la validación con <code>empty()</code>.';
if (strpos($contenido, 'is_numeric') !== false) $puntos++;
else $errores[] = 'Falta validar que el código postal sea numérico con <code>is_numeric()</code>.';
if (strpos($contenido, 'echo') !== false) $puntos++;
else $errores[] = 'Falta mostrar resultados con <code>echo</code>.';

// Resultado final
if ($puntos >= 7 && count($errores) == 0) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "✅ ¡Buen trabajo! Tu formulario fue validado correctamente. Puntos: $puntos/8"
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "❌ Revisa los siguientes puntos:<br>• " . implode('<br>• ', $errores) . "<br><br>Puntos obtenidos: $puntos/8"
    ]);
}
