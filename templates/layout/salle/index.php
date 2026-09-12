<div class="page-header">
    <div>
        <span class="page-label">GESTION</span>
        <h1>Les salles</h1>
        <p>Consultez les salles de l'université.</p>
    </div>

    <a href="/salles/create" class="primary-button">
        + Ajouter une salle
    </a>
</div>

<section class="table-card">
    <div class="table-top">
        <div>
            <h2>Liste des salles</h2>
            <span><?= count($salles ?? []) ?> salle(s) enregistrée(s)</span>
        </div>

        <div class="search-box">
            🔍
            <input type="text" placeholder="Rechercher une salle...">
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Salle</th>
                    <th>Bâtiment</th>
                    <th>Capacité</th>
                    <th>Type</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($salles ?? [] as $salle): ?>
                    <tr>
                        <td>
                            <strong><?= $salle->nom ?></strong>
                            <small>#<?= (string) $salle->id ?></small>
                        </td>
                        <td><?= $salle->batiment ?></td>
                        <td><?= (int) $salle->capacite ?> places</td>
                        <td><?= ucfirst($salle->type) ?></td>
                        <td>
                            <span class="badge <?= $salle->active ? 'success' : 'danger' ?>">
                                <?= $salle->active ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                        <td><a href="/salles/<?= (int) $salle->id ?>" class="table-link">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
