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
        <?= renderSidebar(7) ?>

        <?= renderExercise(
            8,
            'Autenticación básica',
            'Verificar usuario y contraseña comparando los valores del formulario contra credenciales fijas.',
            [
                'Crea un archivo llamado <code>ejercicio8.php</code>.',
                'Haz un formulario con dos campos: <code>usuario</code> y <code>contrasena</code>.',
                'Cuando se complete el formulario, compara el <code>usuario</code> con <code>admin</code> y la <code>contrasena</code> con <code>perros123</code>.',
                'Si ambos son correctos, muestra el mensaje: <code>¡Bienvenido, admin!</code>.',
                'Si alguno es incorrecto, muestra el mensaje: <code>Usuario o contraseña incorrectos</code>.',
                'Usa <code>echo</code> para mostrar el resultado.',
            ],
            [
                '<strong>Leer datos:</strong> <code>$_POST["usuario"]</code> y <code>$_POST["contrasena"]</code>',
                '<strong>Comparar valores:</strong> <code>if ($_POST["usuario"] === "admin")</code>',
            ],
            <<<PHP
            <?php
            // Guardar los datos directamente desde el formulario
            \$usuario = \$_POST["usuario"];
            \$contrasena = \$_POST["contrasena"];

            // Verificar si coinciden con los valores esperados
            if (__________) {
                echo "¡Bienvenido, admin!";
            } else {
                echo "Usuario o contraseña incorrectos";
            }
            ?>

            <form method="post">
                <input type="text" name="usuario" placeholder="Usuario"><br>
                <input type="password" name="contrasena" placeholder="Contraseña"><br>
                <button type="submit">Iniciar sesión</button>
            </form>
            PHP
        );
        ?>
    </div>
</body>

</html>