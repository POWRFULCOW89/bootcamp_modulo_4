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
        <?= renderSidebar(6) ?>

        <?= renderExercise(
            7,
            'Registra eventos de rastreo',
            'Guardar y mostrar eventos de rastreo de paquetes usando una base de datos SQLite desde PHP.',
            [
                'Crea un archivo llamado <code>ejercicio7.php</code>.',
                'Conéctate a una base de datos llamada <code>eventos.db</code> usando <code>PDO</code>.',
                'Crea una tabla llamada <code>eventos</code> (si no existe) con los siguientes campos:',
                '<ul>
            <li><code>id</code> (entero, auto_increment)</li>
            <li><code>guia</code> (texto)</li>
            <li><code>evento</code> (texto)</li>
        </ul>',
                'Haz un formulario con los campos: número de guía y tipo de evento.',
                'Cuando se envíe, guarda los datos en la base.',
                'Después del formulario, muestra los eventos registrados con <code>echo</code>.',
            ],
            [
                '<strong>Conexión SQLite:</strong> <code>new PDO("sqlite:eventos.db")</code>',
                '<strong>Insertar:</strong> <code>prepare()</code> + <code>execute()</code>',
                '<strong>Leer:</strong> <code>query()</code> + <code>fetchAll()</code>',
                '<a href="https://www.php.net/manual/es/book.pdo.php" target="_blank">📘 Manual de PDO</a>'
            ],
            <<<PHP
            <?php
            // 1. Conectar a la base de datos
            \$db = new PDO("sqlite:database.db");

            // 2. Crear la tabla si no existe
            \$db->exec("CREATE TABLE IF NOT EXISTS eventos (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                guia TEXT,
                evento TEXT
            )");

            // 3. Si el formulario se envió, guardar los datos
            if (\$_SERVER["REQUEST_METHOD"] === "POST") {
                \$stmt = \$db->prepare("INSERT INTO eventos (guia, evento) VALUES (?, ?)");
                \$stmt->execute([ \$_POST["guia"], \$_POST["evento"] ]);
            }

            // 4. Leer todos los eventos registrados
            \$eventos = \$db->query("SELECT * FROM eventos")->fetchAll();
            ?>

            // 5. Formulario para ingresar eventos -->
            <form method="post">
                <input type="text" name="guia" placeholder="Número de guía"><br>
                <input type="text" name="evento" placeholder="Evento (Ej: Entregado)"><br>
                <button type="submit">Guardar evento</button>
            </form>

            // 6. Mostrar los eventos -->
            <ul>
            <?php foreach (\$eventos as \$e): ?>
                <li><?= \$e["guia"] ?> - <?= \$e["evento"] ?></li>
            <?php endforeach; ?>
            </ul>
            PHP
        );
        ?>
    </div>
</body>

</html>