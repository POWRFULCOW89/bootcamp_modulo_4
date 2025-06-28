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
        <?= renderSidebar(0) ?>

        <?=
        renderExercise(
            1,
            'Registro de Envío Exprés',
            'Crear un script en PHP que simule el registro de un envío exprés para la plataforma EnvíosPerros, utilizando diferentes tipos de variables.',
            [
                'Crea un archivo llamado <strong>ejercicio1.php</strong> en la misma carpeta que este sitio.',
                'Declara las siguientes variables, exactamente con estos nombres: <ul>
                    <li><code>$remitente</code>: nombre de quien envía (string)</li>
                    <li><code>$destinatario</code>: nombre de quien recibe (string)</li>
                    <li><code>$peso</code>: peso del paquete en kilogramos (float)</li>
                    <li><code>$cp_origen</code>: código postal de origen (int)</li>
                    <li><code>$cp_destino</code>: código postal de destino (int)</li>
                    <li><code>$es_urgente</code>: si el envío es urgente (boolean)</li>
                    <li><code>$costo_base</code>: costo base del envío (float)</li>
                </ul>',
                'Calcula la tarifa de urgencia con la variable <code>$tarifa_urgencia</code>, usando:
                    <ul>
                      <li><code>1.5</code> si <code>$es_urgente</code> es true</li>
                      <li><code>1</code> si es false</li>
                    </ul>',
                'Calcula el costo total con la variable <code>$costo_final</code> como:
                  <br><code>$costo_base * $tarifa_urgencia</code>',
                'Muestra todos los valores usando <code>echo</code>, uno por línea, con etiquetas descriptivas. Ejemplo: <code>echo "Remitente: " . $remitente;</code>',
                'Formatea <code>$costo_final</code> con dos decimales usando <code>number_format()</code>',
                'Muestra "Sí" o "No" dependiendo del valor de <code>$es_urgente</code> usando el operador ternario'
            ],
            [
                '<strong>Variables en PHP:</strong> <code>$nombre = "Valor";</code>',
                '<strong>Concatenación:</strong> Usa <code>.</code> para unir texto y variables',
                '<strong>Tipos de datos:</strong> <a href="https://www.php.net/manual/es/language.types.php" target="_blank">php.net/language.types</a>',
                '<strong>Formateo de números:</strong> <code>number_format()</code>',
                '<strong>Operador ternario:</strong> <code>($es_urgente ? "Sí" : "No")</code>'
            ],
            <<<PHP
            <?php
            // Variables básicas
            \$remitente = "Nombre del remitente";
            \$destinatario = "Nombre del destinatario";
            \$peso = 2.5;

            // Mostrar parte de los datos
            echo "Remitente: " . \$remitente . "<br>";
            echo "Peso del paquete: " . \$peso . " kg<br>";
            ?>
            PHP
        );
        ?>
    </div>
</body>

</html>