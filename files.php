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
        <?= renderSidebar(5) ?>

        <?= renderExercise(
            6,
            'Manejo de archivos',
            'Registrar los datos de un envío en un archivo de texto y mostrar un historial de envíos.',
            [
                'Crea un archivo llamado <code>ejercicio6.php</code>.',
                'Haz un formulario con los siguientes campos:',
                '<ul>
            <li><code>remitente</code></li>
            <li><code>destinatario</code></li>
            <li><code>peso</code> (en kg)</li>
        </ul>',
                'Cuando el formulario se envíe:',
                '<ul>
            <li>Guarda los datos del formulario como una línea de texto en un archivo llamado <code>envios.txt</code></li>
            <li>El formato puede ser: <code>Remitente - Destinatario - Peso</code></li>
        </ul>',
                'Debajo del formulario, muestra todas las líneas del archivo <code>envios.txt</code> como una lista de envíos previos.'
            ],
            [
                '<strong>Función para guardar:</strong> <code>file_put_contents()</code> con <code>FILE_APPEND</code>',
                '<strong>Función para leer:</strong> <code>file()</code> o <code>fopen()</code>',
                '<strong>Separador:</strong> Puedes usar guiones o tabulaciones para separar los datos',
                '<a href="https://www.php.net/manual/es/function.file-put-contents.php" target="_blank">file_put_contents()</a>',
                '<a href="https://www.php.net/manual/es/function.file.php" target="_blank">file()</a>'
            ],
            <<<PHP
            <?php
            if (\$_SERVER["REQUEST_METHOD"] === "POST") {
                \$linea = \$_POST["remitente"] . " - " . \$_POST["destinatario"] . " - " . \$_POST["peso"] . "kg\\n";
                file_put_contents("envios.txt", \$linea, FILE_APPEND);
            }

            \$envios = file_exists("envios.txt") ? file("envios.txt") : [];
            ?>
            PHP
        );



        ?>
    </div>
</body>

</html>