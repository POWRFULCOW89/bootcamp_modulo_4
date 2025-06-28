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
        <?= renderSidebar(1) ?>

        <?= renderExercise(
            2,
            'Listado de Envíos con Arreglos y Ciclos',
            'Crear un script que almacene múltiples envíos y los muestre recorriendo un arreglo con un ciclo.',
            [
                'Crea un archivo llamado <strong>ejercicio3.php</strong> en la misma carpeta que este sitio.',
                'Declara un arreglo llamado <code>$envios</code> que contenga al menos 3 envíos. Cada envío debe ser un arreglo asociativo con las siguientes claves:',
                '<ul>
                    <li><code>remitente</code>: nombre del remitente</li>
                    <li><code>destinatario</code>: nombre del destinatario</li>
                    <li><code>peso</code>: peso del paquete en kilogramos</li>
                    <li><code>urgente</code>: booleano indicando si es urgente</li>
                </ul>',
                'Usa un ciclo <code>foreach</code> para recorrer el arreglo <code>$envios</code>',
                'Dentro del ciclo, muestra los datos de cada envío usando <code>echo</code>',
                'Agrega un número de envío comenzando en 1 (Ej. Envío #1, Envío #2...)',
                'Para cada envío, muestra "Sí" o "No" si es urgente usando un operador ternario',
                'Se recomienda formatear con <code>&lt;br&gt;</code> y agrupar por bloques visuales'
            ],
            [
                '<strong>Arreglos indexados:</strong> <code>$envios = [];</code>',
                '<strong>Arreglos asociativos:</strong> <code>[ "remitente" => "Juan" ]</code>',
                '<strong>foreach:</strong> <a href="https://www.php.net/manual/es/control-structures.foreach.php" target="_blank">php.net/foreach</a>',
                '<strong>Acceso a claves:</strong> <code>$envio["remitente"]</code>',
                '<strong>Operador ternario:</strong> <code>(\$urgente ? "Sí" : "No")</code>'
            ],
            <<<PHP
        <?php
        \$envios = [
            [
                "remitente" => "Ana Torres",
                "destinatario" => "Luis Mendoza",
                "peso" => 2.5,
                "urgente" => true
            ],
            // agrega más envíos aquí...
        ];
        
        foreach (\$envios as \$indice => \$envio) {
            echo "Envío #" . (\$indice + 1) . "<br>";
            echo "Remitente: " . \$envio["remitente"] . "<br>";
            // muestra el resto de los campos...
            echo "<br>;";
        }
        ?>
        PHP
        );

        ?>
    </div>
</body>

</html>