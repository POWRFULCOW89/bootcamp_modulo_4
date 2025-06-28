<?php
header('Content-Type: application/json');

$archivo = 'ejercicio1.php';

if (!file_exists($archivo)) {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "No se encontró el archivo $archivo. Asegúrate de crearlo en la misma carpeta."
    ]);
    exit;
}

$contenido = file_get_contents($archivo);

// Verificaciones básicas
$tiene_php_tag = strpos($contenido, '<?php') !== false;
$tiene_variables = preg_match('/\$\w+/', $contenido);
$tiene_echo = strpos($contenido, 'echo') !== false;

$errores = [];
$puntos = 0;

if ($tiene_php_tag) $puntos += 1;
else $errores[] = 'Falta la etiqueta de apertura <?php';
if ($tiene_variables) $puntos += 2;
else $errores[] = 'No se encontraron variables';
if ($tiene_echo) $puntos += 2;
else $errores[] = 'Falta usar echo para mostrar la información';

// Verifica algunas variables clave esperadas
$variables_esperadas = ['remitente', 'destinatario', 'peso', 'es_urgente', 'costo_base', 'tarifa_urgencia', 'costo_final'];
$encontradas = 0;
foreach ($variables_esperadas as $var) {
    if (preg_match('/\$' . preg_quote($var) . '\b/i', $contenido)) {
        $encontradas++;
    }
}
if ($encontradas >= 5) $puntos += 3;

if ($puntos >= 6 && count($errores) == 0) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "¡Buen trabajo! Has completado correctamente el ejercicio. Puntos: $puntos/8."
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "Debes revisar tu código:<br/>\n• " . implode("<br/>• ", $errores) . "<br/><br/>Puntos obtenidos: $puntos/8"
    ]);
}
