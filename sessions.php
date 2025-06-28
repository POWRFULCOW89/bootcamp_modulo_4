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
        <?= renderSidebar(4) ?>

        <?= renderExercise(
            5,
            "Sesiones: Suscripción a boletín de marketing",
            "Practicar cómo usar sesiones en PHP para guardar información de un usuario suscrito, mantenerla entre recargas y permitir cerrar sesión.",
            [
                "Crea un archivo llamado <code>ejercicio5.php</code>.",
                "Antes de cualquier salida HTML, inicia la sesión con <code>session_start()</code>.",
                "Crea un formulario que permita al usuario registrarse a una lista de marketing ingresando su <strong>nombre</strong> y <strong>correo electrónico</strong>.",
                "Cuando se envíe el formulario, guarda ambos valores en <code>\$_SESSION[\"nombre\"]</code> y <code>\$_SESSION[\"correo\"]</code>.",
                "Si ya hay datos en la sesión, muestra un mensaje como: <code>¡Gracias, Ana! Te hemos registrado con el correo ana@example.com.</code> en lugar del formulario.",
                "Agrega un botón <strong>“Cancelar suscripción”</strong> que destruya la sesión con <code>session_destroy()</code> y permita volver a empezar.",
                "Usa <code>isset()</code> para verificar si los datos de sesión existen.",
                "Muestra todo con <code>echo</code>.",
            ],
            [
                '<a href="https://www.php.net/manual/es/book.session.php" target="_blank">📘 Documentación oficial sobre sesiones en PHP</a>',
                '<code>session_start()</code> debe ir antes de cualquier HTML',
                '<code>$_SESSION["nombre"] = ...</code> para guardar datos',
                '<code>isset($_SESSION["nombre"])</code> para revisar si ya están guardados',
                '<code>session_destroy()</code> para cancelar la sesión',
            ],
            <<<PHP
            <?php
            session_start();

            // Aquí va tu lógica para manejar el formulario y las sesiones

            ?>
            <form method="post">
                <!-- Mostrar este formulario solo si el usuario no está suscrito -->
                <input type="text" name="nombre" placeholder="Tu nombre"><br>
                <input type="email" name="correo" placeholder="Tu correo"><br>
                <button type="submit">Suscribirse</button>
            </form>

            <!-- Si el usuario ya está suscrito, mostrar el mensaje de agradecimiento y el botón de cancelar -->
            PHP
        );

        ?>
    </div>
</body>

</html>