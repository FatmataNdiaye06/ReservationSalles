<div class="page-header">
    <div>
        <span class="page-label">GESTION</span>
        <h1>Réservations</h1>
        <p>Consultez et gérez les réservations des salles.</p>
    </div>

    <a href="/reservations/create" class="primary-button">
        + Nouvelle réservation
    </a>
</div>

<section class="filter-card">
    <div class="filter-group">
        <label for="salle">Filtrer par salle</label>
        <select id="salle">
            <option>Toutes les salles</option>
            <?php foreach ($reservations ?? [] as $reservation): ?>
                <?php $salleName = $reservation->salle ? $reservation->salle->nom : 'Salle inconnue'; ?>
                <option><?= $salleName ?></option>
            <?php endforeach; ?>
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

    <button class="secondary-button">Filtrer</button>
</section>

<section class="table-card">
    <div class="table-top">
        <div>
            <h2>Liste des réservations</h2>
            <span><?= count($reservations ?? []) ?> réservation(s)</span>
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
                <?php foreach ($reservations ?? [] as $reservation): ?>
                    <?php $salleName = $reservation->salle ? $reservation->salle->nom : 'Salle inconnue'; ?>
                    <tr>
                        <td>
                            <strong><?= $reservation->responsable ?></strong>
                            <small><?= $reservation->email ?></small>
                        </td>
                        <td><?= $salleName ?></td>
                        <td><?= $reservation->motif ?></td>
                        <td><?= $reservation->date_debut ? $reservation->date_debut->format('d/m/Y') : '' ?></td>
                        <td><?= $reservation->date_debut ? $reservation->date_debut->format('H:i') . ' - ' . $reservation->date_fin->format('H:i') : '' ?></td>
                        <td><span class="badge <?= $reservation->statut === 'confirmée' ? 'success' : 'danger' ?>"><?= ucfirst($reservation->statut) ?></span></td>
                        <td><a href="/reservations/<?= (int) $reservation->id ?>" class="table-link">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
