<?php
session_start();
require_once 'database.php';
require_once 'ui.php';
require_once 'guard.php';
?>
<!DOCTYPE html>
<html lang="es">

<?= renderHead(); ?>

<body>
    <div class="container">
        <?= renderSidebar(8) ?>

        <?= renderExercise(
            9,
            'Consumo de APIs con Guzzle',
            'Usar la librería <code>GuzzleHttp</code> para hacer peticiones a una API externa y mostrar los resultados en pantalla.',
            [
                'Crea un archivo llamado <code>ejercicio9.php</code>.',
                'Instala Guzzle (si no lo has hecho): <code>composer require guzzlehttp/guzzle</code>.',
                'Importa el cliente Guzzle con <code>use GuzzleHttp\Client;</code>.',
                'Haz una petición GET a <code>https://jsonplaceholder.typicode.com/users</code>.',
                'Convierte la respuesta JSON a un arreglo de PHP con <code>json_decode()</code>.',
                'Usa un <code>foreach</code> para mostrar el <code>name</code> y el <code>email</code> de cada usuario.',
            ],
            [
                '<a href="https://docs.guzzlephp.org/en/stable/" target="_blank">📘 Documentación oficial de Guzzle</a>',
                '<strong>Instalar Guzzle:</strong> <code>composer require guzzlehttp/guzzle</code>',
                '<strong>Crear cliente:</strong> <code>$client = new Client();</code>',
                '<strong>Hacer petición:</strong> <code>$response = $client->request("GET", "...");</code>',
                '<strong>Leer body:</strong> <code>$response->getBody()</code>',
            ],
            <<<PHP
            <?php
            require 'vendor/autoload.php';
            use GuzzleHttp\Client;

            // Crear cliente Guzzle
            \$client = new Client();

            // Hacer solicitud GET a la API
            \$response = \$client->request("GET", "__________");

            // Obtener el cuerpo de la respuesta
            \$body = \$response->getBody();

            // Convertir JSON a arreglo
            \$usuarios = json_decode(\$body, true);

            // Recorrer resultados y mostrar
            foreach (\$usuarios as \$usuario) {
                echo "<p>" . \$usuario["name"] . " - " . \$usuario["email"] . "</p>";
            }
            PHP
        );

        ?>
    </div>
</body>

</html>