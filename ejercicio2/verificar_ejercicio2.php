<?php
header('Content-Type: application/json');

$archivo = 'ejercicio2.php';

if (!file_exists($archivo)) {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "No se encontró el archivo $archivo. Asegúrate de crearlo en la misma carpeta."
    ]);
    exit;
}

$contenido = file_get_contents($archivo);

$tiene_php_tag = strpos($contenido, '<?php') !== false;
$tiene_foreach = stripos($contenido, 'foreach') !== false;
$tiene_echo = strpos($contenido, 'echo') !== false;
$tiene_array = preg_match('/\$envios\s*=\s*\[/', $contenido);

$errores = [];
$puntos = 0;

if ($tiene_php_tag) $puntos += 1;
else $errores[] = 'Falta la etiqueta de apertura <?php';
if ($tiene_array) $puntos += 2;
else $errores[] = 'No se encontró el arreglo $envios';
if ($tiene_foreach) $puntos += 2;
else $errores[] = 'Falta usar un ciclo foreach';
if ($tiene_echo) $puntos += 1;
else $errores[] = 'Falta usar echo para mostrar información';

$busca_claves = ['remitente', 'destinatario', 'peso', 'urgente'];
$claves_encontradas = 0;
foreach ($busca_claves as $clave) {
    if (stripos($contenido, '["' . $clave . '"]') !== false || stripos($contenido, '[\'' . $clave . '\']') !== false) {
        $claves_encontradas++;
    }
}
if ($claves_encontradas >= 3) $puntos += 2;

if ($puntos >= 6 && count($errores) == 0) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "¡Muy bien! Has completado correctamente el ejercicio. Puntos: $puntos/8."
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "Revisa tu código:<br>\n• " . implode("<br>• ", $errores) . "<br><br>Puntos obtenidos: $puntos/8"
    ]);
}
