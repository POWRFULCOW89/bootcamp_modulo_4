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
        <?= renderSidebar(3) ?>

        <?= renderExercise(
            4,
            "Validación de Formulario de Dirección",
            "Aprender a recibir y validar los datos de un formulario HTML usando PHP, simulando el registro de una dirección de envío en EnvíosPerros.",
            [
                "Utiliza el formulario HTML que ya está incluido en el archivo <code><a href='ejercicio4/ejercicio4.html'>ejercicio4.html</a></code>.",
                "Recibe los datos del formulario en el mismo archivo usando <code>\$_POST</code>.",
                "Valida que todos los campos estén presentes y no vacíos usando <code>empty()</code>.",
                "Valida que el código postal sea un número usando <code>is_numeric()</code>.",
                "Si todo es correcto, muestra un mensaje como: <code>¡Gracias, [nombre]! Tu dirección ha sido registrada.</code>",
                "Si hay errores, muestra mensajes claros usando <code>echo</code>.",
            ],
            [
                "<a href='https://www.php.net/manual/es/reserved.variables.post.php' target='_blank'>Documentación de \$_POST</a>",
                "<a href='https://www.php.net/manual/es/function.empty.php' target='_blank'>empty()</a>",
                "<a href='https://www.php.net/manual/es/function.is-numeric.php' target='_blank'>is_numeric()</a>",
                "<a href='https://developer.mozilla.org/es/docs/Learn/Forms' target='_blank'>Guía de formularios HTML</a>",
            ],
            <<<PHP
            <form action="ejercicio4.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre completo"><br>
                <input type="email" name="correo" placeholder="Correo electrónico"><br>
                <input type="text" name="telefono" placeholder="Teléfono"><br>
                <input type="text" name="calle" placeholder="Calle"><br>
                <input type="text" name="numero_ext" placeholder="Número exterior"><br>
                <input type="text" name="colonia" placeholder="Colonia"><br>
                <input type="text" name="codigo_postal" placeholder="Código postal"><br>
                <input type="text" name="referencias" placeholder="Referencias adicionales"><br>
                <input type="submit" value="Enviar dirección">
            </form>

            <?php
            // Recibir y validar los datos con \$_POST
            \$data = \$_POST;
            \$nombre = \$data['nombre'];

            // Ver rápidamente los datos recibidos
            print(json_encode(\$data));

            ?>
            PHP
        );

        ?>
    </div>
</body>

</html>