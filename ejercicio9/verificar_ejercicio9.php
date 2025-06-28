<?php
header('Content-Type: application/json');

$archivo = 'ejercicio9.php';

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

// Verifica uso de Guzzle y uso de Client
if (strpos($contenido, 'use GuzzleHttp\Client') !== false || strpos($contenido, 'new Client') !== false) {
    $puntos++;
} else {
    $errores[] = 'Debes usar <code>GuzzleHttp\Client</code> para la conexión.';
}

// Verifica que se llame al endpoint correcto
if (strpos($contenido, 'jsonplaceholder.typicode.com/users') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta la URL de la API: <code>jsonplaceholder.typicode.com/users</code>.';
}

// Verifica uso de getBody() y json_decode()
if (strpos($contenido, 'getBody') !== false && strpos($contenido, 'json_decode') !== false) {
    $puntos++;
} else {
    $errores[] = 'Falta procesar la respuesta con <code>getBody()</code> y <code>json_decode()</code>.';
}

// Verifica uso de foreach y echo
if (strpos($contenido, 'foreach') !== false && strpos($contenido, 'echo') !== false) {
    $puntos++;
} else {
    $errores[] = 'Debes recorrer los resultados con <code>foreach</code> y mostrarlos usando <code>echo</code>.';
}

// Resultado final
if ($puntos === 4) {
    echo json_encode([
        'correcto' => true,
        'mensaje' => "✅ ¡Perfecto! Has consumido la API con Guzzle correctamente. Puntos: $puntos/4"
    ]);
} else {
    echo json_encode([
        'correcto' => false,
        'mensaje' => "❌ Revisa tu implementación:<br>• " . implode("<br>• ", $errores) . "<br><br>Puntos obtenidos: $puntos/4"
    ]);
}
