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
        <?= renderSidebar(2) ?>

        <?= renderExercise(
            3,
            'Cálculo de Envíos con Funciones',
            'Crear funciones reutilizables que calculen el costo total de un envío, considerando peso, urgencia y costo base.',
            [
                'Crea un archivo llamado <strong>ejercicio3.php</strong> en la misma carpeta que este sitio.',
                'Declara una función llamada <code>calcularTarifaUrgencia</code> que reciba un parámetro booleano (<code>$es_urgente</code>) y retorne <code>1.5</code> si es true y <code>1</code> si es false.',
                'Declara otra función llamada <code>calcularCostoTotal</code> que reciba tres parámetros: <code>$peso</code>, <code>$costo_base</code> y <code>$tarifa_urgencia</code>, y retorne el costo total multiplicando los tres.',
                'Llama a ambas funciones con valores de prueba y guarda el resultado en una variable <code>$total</code>.',
                'Muestra todos los resultados (valores de entrada y resultado) usando <code>echo</code>, línea por línea.',
                'Formatea <code>$total</code> con dos decimales usando <code>number_format()</code>',
                'Usa nombres de variables semánticos como <code>$peso</code>, <code>$costo_base</code>, etc.'
            ],
            [
                '<strong>Funciones en PHP:</strong> <a href="https://www.php.net/manual/es/functions.user-defined.php" target="_blank">php.net/functions.user-defined</a>',
                '<strong>return:</strong> Las funciones pueden devolver valores con <code>return</code>',
                '<strong>Parámetros:</strong> <code>function sumar($a, $b)</code>',
                '<strong>Formateo:</strong> <code>number_format()</code> para mostrar decimales',
                '<strong>Concatenación:</strong> <code>echo "Total: $" . $total;</code>'
            ],
            <<<PHP
            <?php
            function calcularTarifaUrgencia(\$es_urgente) {
                return \$es_urgente ? 1.5 : 1;
            }

            // Tu otra función y las llamadas van aquí
            ?>
            PHP
        );
        ?>
    </div>
</body>

</html>