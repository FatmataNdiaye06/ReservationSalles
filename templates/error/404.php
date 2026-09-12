<?php
$title = 'Page introuvable';
$currentPage = 'home';
$pageContent = <<<'HTML'
<div class="error-page">
    <div class="error-card">
        <span class="error-number">404</span>
        <h1>Page introuvable</h1>
        <p>
            Désolé, la page que vous recherchez
            n'existe pas ou a été déplacée.
        </p>
        <a href="/" class="primary-button">← Retour à l'accueil</a>
    </div>
</div>
HTML;
require dirname(__DIR__) . '/layout/base.php';
