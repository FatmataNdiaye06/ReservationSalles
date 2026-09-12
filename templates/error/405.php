<?php
$title = 'Méthode non autorisée';
$currentPage = 'home';
$pageContent = <<<'HTML'
<div class="error-page">
    <div class="error-card">
        <span class="error-number">405</span>
        <h1>Méthode non autorisée</h1>
        <p>
            La méthode HTTP utilisée n'est pas autorisée
            pour cette adresse.
        </p>

        <div class="allowed-methods">
            <span>Méthodes autorisées</span>
            <strong>GET · POST</strong>
        </div>

        <a href="/" class="primary-button">← Retour à l'accueil</a>
    </div>
</div>
HTML;
require dirname(__DIR__) . '/layout/base.php';
