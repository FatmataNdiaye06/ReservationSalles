<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations - DalalSpace</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>

<div class="page">

    <header class="navbar">

        <a href="../index.html" class="logo">
            <span class="logo-icon">D</span>
            <span>Dalal<span>Space</span></span>
        </a>

        <nav class="nav-links">
            <a href="../index.html">Accueil</a>
            <a href="../salle/index.html">Salles</a>
            <a href="index.html" class="active">Réservations</a>
            <a href="form.html" class="nav-button">
                + Nouvelle réservation
            </a>
        </nav>

    </header>


    <main class="main-content">

        <div class="page-header">

            <div>
                <span class="page-label">GESTION</span>

                <h1>Réservations</h1>

                <p>
                    Consultez et gérez les réservations des salles.
                </p>
            </div>

            <a href="form.html" class="primary-button">
                + Nouvelle réservation
            </a>

        </div>


        <section class="filter-card">

            <div class="filter-group">
                <label for="salle">Filtrer par salle</label>

                <select id="salle">

                    <option>Toutes les salles</option>
                    <option>Amphithéâtre A</option>
                    <option>Salle B12</option>
                    <option>Laboratoire Chimie</option>
                    <option>Salle Informatique 1</option>
                    <option>Salle de réunion</option>

                </select>
            </div>


            <div class="filter-group">
                <label for="statut">Statut</label>

                <select id="statut">
                    <option>Tous les statuts</option>
                    <option>Confirmée</option>
                    <option>Annulée</option>
                </select>
            </div>


            <button class="secondary-button">
                Filtrer
            </button>

        </section>


        <section class="table-card">

            <div class="table-top">

                <div>
                    <h2>Liste des réservations</h2>
                    <span>05 réservations</span>
                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>Responsable</th>
                            <th>Salle</th>
                            <th>Motif</th>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>
                                <strong>Awa Ndiaye</strong>
                                <small>awa.ndiaye@universite.sn</small>
                            </td>

                            <td>Salle B12</td>

                            <td>Cours d'architecture logicielle</td>

                            <td>11/09/2026</td>

                            <td>10:00 - 12:00</td>

                            <td>
                                <span class="badge success">
                                    Confirmée
                                </span>
                            </td>

                            <td>
                                <a href="show.html" class="table-link">
                                    Voir
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <strong>Fatou Diop</strong>
                                <small>fatou.diop@universite.sn</small>
                            </td>

                            <td>Amphithéâtre A</td>

                            <td>Soutenance de projet</td>

                            <td>11/09/2026</td>

                            <td>14:00 - 16:00</td>

                            <td>
                                <span class="badge success">
                                    Confirmée
                                </span>
                            </td>

                            <td>
                                <a href="show.html" class="table-link">
                                    Voir
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <strong>Moussa Fall</strong>
                                <small>moussa.fall@universite.sn</small>
                            </td>

                            <td>Laboratoire Chimie</td>

                            <td>Travaux pratiques</td>

                            <td>12/09/2026</td>

                            <td>09:00 - 11:00</td>

                            <td>
                                <span class="badge success">
                                    Confirmée
                                </span>
                            </td>

                            <td>
                                <a href="show.html" class="table-link">
                                    Voir
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <strong>Ousmane Ba</strong>
                                <small>ousmane.ba@universite.sn</small>
                            </td>

                            <td>Salle Informatique 1</td>

                            <td>Atelier développement web</td>

                            <td>13/09/2026</td>

                            <td>13:00 - 15:00</td>

                            <td>
                                <span class="badge success">
                                    Confirmée
                                </span>
                            </td>

                            <td>
                                <a href="show.html" class="table-link">
                                    Voir
                                </a>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <strong>Marie Ndiaye</strong>
                                <small>marie.ndiaye@universite.sn</small>
                            </td>

                            <td>Salle de réunion</td>

                            <td>Réunion pédagogique</td>

                            <td>14/09/2026</td>

                            <td>09:00 - 10:30</td>

                            <td>
                                <span class="badge danger">
                                    Annulée
                                </span>
                            </td>

                            <td>
                                <a href="show.html" class="table-link">
                                    Voir
                                </a>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </section>

    </main>


    <footer class="footer">
        <p>
            © 2026 <strong>DalalSpace</strong> — Gestion des réservations
        </p>
    </footer>

</div>

</body>
</html>
