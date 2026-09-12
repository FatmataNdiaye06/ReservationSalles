<?php
$title = $title ?? 'DalalSpace';
$currentPage = $currentPage ?? 'home';
$pageContent = $pageContent ?? '';
$navItems = [
    ['key' => 'home', 'label' => 'Accueil', 'href' => '/'],
    ['key' => 'salles', 'label' => 'Salles', 'href' => '/salles'],
    ['key' => 'reservations', 'label' => 'Réservations', 'href' => '/reservations'],
];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>

<div class="page">

    <header class="navbar">
        <a href="/" class="logo">
            <span class="logo-icon">D</span>
            <span>Dalal<span>Space</span></span>
        </a>

        <button class="menu-toggle" aria-label="Ouvrir le menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="nav-links" id="main-nav">
            <?php foreach ($navItems as $item): ?>
                <a href="<?= $item['href'] ?>"
                   class="<?= $currentPage === $item['key'] ? 'active' : '' ?>">
                    <?= $item['label'] ?>
                </a>
            <?php endforeach; ?>

            <a href="/reservations/create" class="nav-button">
                + Nouvelle réservation
            </a>
        </nav>
    </header>

    <main class="main-content">
        <?= $pageContent ?>
    </main>

    <footer class="footer">
        <p>© 2026 <strong>DalalSpace</strong> — Gestion des réservations de salles universitaires</p>
    </footer>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.nav-links');

        if (!toggle || !nav) {
            return;
        }

        toggle.addEventListener('click', function (event) {
            event.preventDefault();
            const isOpen = nav.classList.toggle('open');
            toggle.setAttribute('aria-expanded', String(isOpen));
        });

        nav.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                nav.classList.remove('open');
                toggle.setAttribute('aria-expanded', 'false');
            });
        });
    });
</script>

</body>
</html>