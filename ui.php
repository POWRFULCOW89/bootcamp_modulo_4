<?php

function renderHead()
{
    return '<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Módulo PHPerro</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="/assets/styles.css">
        <link rel="icon" type="image/png" href="https://app.enviosperros.com/images/logo/fav-2.png" sizes="16x16">
        <script src="assets/index.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
        <script>hljs.highlightAll();</script>
    </head>';
}

function renderSidebar(int $index)
{
    $progress = "$index/9";

    $tabs = [
        ['href' => 'index.php',       'label' => '📋 Inicio - Variables'],
        ['href' => 'arrays.php',      'label' => '📋 Arreglos y ciclos'],
        ['href' => 'functions.php',   'label' => '💳 Funciones'],
        ['href' => 'forms.php',       'label' => '📦 Formularios'],
        ['href' => 'sessions.php',    'label' => '📍 Sesiones'],
        ['href' => 'files.php',       'label' => '⚖️ Archivos'],
        ['href' => 'persistence.php', 'label' => '🔗 Base de Datos'],
        ['href' => 'auth.php', 'label' => '🔒 Autenticación'],
        ['href' => 'apis.php',        'label' => '🔍 APIs'],
    ];

    $navItems = '';
    foreach ($tabs as $i => $tab) {
        $activeClass = ($i === $index) ? 'active' : '';
        $navItems .= "<a href=\"{$tab['href']}\" class=\"nav-item $activeClass\">{$tab['label']}</a>\n";
    }

    return <<<HTML
    <aside class="sidebar">
    <div class="logo">
        <div style="width:40px;height:40px;background:white;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#2563eb;font-weight:bold;">🐕</div>
        <div>
            <div style="font-weight:bold;">Bootcamp Perro</div>
            <div style="font-size:12px;opacity:0.8;">v1.0</div>
        </div>
    </div>

    <div class="balance">
        <h3>Progreso</h3>
        <div class="amount">$progress</div>
    </div>

    <nav>
        $navItems
    </nav>

    <div style="margin-top: auto; padding-top: 20px; border-top: 1px solid rgba(255,255,255,0.2);">
        <a href="logout.php" style="color: #fca5a5; text-decoration: none;">🚪 Cerrar Sesión</a>
    </div>
    </aside>
HTML;
}


function renderExercise(
    int $numero,
    string $titulo,
    string $objetivo,
    array $tareas,
    array $recursos,
    string $codigoEjemplo
) {
    $tareasHTML = '';
    foreach ($tareas as $tarea) {
        $tareasHTML .= "<li>$tarea</li>";
    }

    $recursosHTML = '';
    foreach ($recursos as $recurso) {
        $recursosHTML .= "<li>$recurso</li>";
    }

    $codigo = htmlspecialchars($codigoEjemplo);

    return <<<HTML
<main class="main-content">
    <div class="header">
        <h1>🚀 Ejercicio $numero: $titulo</h1>
    </div>

    <div class="exercise-content">
        <div class='exercise-row'>
            <div class="instructions">
                <h3>🎯 Objetivo:</h3>
                <p>$objetivo</p>
                <br />
                <h3>✅ Tareas a realizar:</h3>
                <ol>
                    $tareasHTML
                </ol>
            </div>

            <div class="resources">
                <h3>📚 Recursos útiles:</h3>
                <ul>
                    $recursosHTML
                </ul>
            </div>
        </div>

        <h3>💻 Código de ejemplo:</h3>
        <pre class="code-block"><code class="language-php">$codigo</code></pre>

        <br />

        <button class="btn-check" onclick="verificarEjercicio($numero)">✅ Verificar mi solución</button>
        <div id="resultado" style="margin-top: 20px;"></div>
    </div>
</main>
HTML;
}
