<?php
header('Content-Type: application/json');

$archivo = 'ejercicio3.php';

if (!file_exists($archivo)) {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "No se encontró el archivo $archivo. Asegúrate de crearlo en la misma carpeta."
    ]);
    exit;
}

$contenido = file_get_contents($archivo);

$tiene_php_tag = strpos($contenido, '<?php') !== false;
$tiene_echo = strpos($contenido, 'echo') !== false;
$tiene_return = strpos($contenido, 'return') !== false;

$errores = [];
$puntos = 0;

if ($tiene_php_tag) $puntos += 1;
else $errores[] = 'Falta la etiqueta de apertura <?php';
if ($tiene_echo) $puntos += 1;
else $errores[] = 'Falta usar echo para mostrar información';
if ($tiene_return) $puntos += 1;
else $errores[] = 'Falta return en alguna función';

$funciones_requeridas = ['calcularTarifaUrgencia', 'calcularCostoTotal'];
$funciones_encontradas = 0;
foreach ($funciones_requeridas as $fn) {
    if (preg_match('/function\s+' . preg_quote($fn) . '\s*\(/', $contenido)) {
        $funciones_encontradas++;
    }
}
if ($funciones_encontradas >= 2) $puntos += 3;
else $errores[] = 'Faltan definir una o más funciones requeridas';

if (preg_match('/\$total\b/', $contenido)) {
    $puntos += 2;
} else {
    $errores[] = 'Falta la variable $total con el resultado';
}

if ($puntos >= 6 && count($errores) == 0) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "¡Excelente! Has completado correctamente el ejercicio. Puntos: $puntos/8."
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "Revisa tu código:<br>\n• " . implode("<br>• ", $errores) . "<br><br>Puntos obtenidos: $puntos/8"
    ]);
}
