<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - DalalSpace</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>

<div class="page">

    <header class="navbar">
        <a href="index.html" class="logo">
            <span class="logo-icon">D</span>
            <span>Dalal<span>Space</span></span>
        </a>

        <nav class="nav-links">
            <a href="index.html" class="active">Accueil</a>
            <a href="salle/index.html">Salles</a>
            <a href="reservation/index.html">Réservations</a>
            <a href="reservation/form.html" class="nav-button">
                + Nouvelle réservation
            </a>
        </nav>
    </header>


    <main class="main-content">

        <section class="welcome-section">
            <div>
                <span class="welcome-label">PLATEFORME UNIVERSITAIRE</span>

                <h1>
                    Bienvenue sur <span>DalalSpace</span> 👋
                </h1>

                <p>
                    Gérez simplement les salles et les réservations
                    de votre université.
                </p>
            </div>

            <a href="reservation/form.html" class="primary-button">
                + Nouvelle réservation
            </a>
        </section>


        <section class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon blue">▣</div>
                <div>
                    <span>Salles disponibles</span>
                    <strong>04</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon navy">▦</div>
                <div>
                    <span>Salles au total</span>
                    <strong>05</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">✓</div>
                <div>
                    <span>Réservations confirmées</span>
                    <strong>12</strong>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon red">!</div>
                <div>
                    <span>Réservations annulées</span>
                    <strong>03</strong>
                </div>
            </div>

        </section>


        <section class="quick-section">

            <div class="section-title">
                <span>ACCÈS RAPIDE</span>
                <h2>Que souhaitez-vous faire ?</h2>
            </div>

            <div class="quick-grid">

                <a href="salle/index.html" class="quick-card">
                    <div class="quick-icon blue-bg">▣</div>

                    <div class="quick-content">
                        <h3>Gestion des salles</h3>
                        <p>
                            Consulter et gérer les salles disponibles.
                        </p>
                    </div>

                    <span class="arrow">→</span>
                </a>


                <a href="reservation/index.html" class="quick-card">
                    <div class="quick-icon green-bg">◷</div>

                    <div class="quick-content">
                        <h3>Réservations</h3>
                        <p>
                            Consulter toutes les réservations.
                        </p>
                    </div>

                    <span class="arrow">→</span>
                </a>


                <a href="reservation/form.html" class="quick-card">
                    <div class="quick-icon navy-bg">+</div>

                    <div class="quick-content">
                        <h3>Nouvelle réservation</h3>
                        <p>
                            Réserver rapidement une salle.
                        </p>
                    </div>

                    <span class="arrow">→</span>
                </a>

            </div>

        </section>

    </main>


    <footer class="footer">
        <p>
            © 2026 <strong>DalalSpace</strong> —
            Gestion des réservations de salles universitaires
        </p>
    </footer>

</div>

</body>
</html>
