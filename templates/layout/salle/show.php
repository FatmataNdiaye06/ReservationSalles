<div class="breadcrumb">
    <a href="/salles">Salles</a>
    <span>›</span>
    <span><?= $salle->nom ?></span>
</div>

<section class="detail-card">
    <div class="detail-header">
        <div>
            <span class="page-label">DÉTAIL DE LA SALLE</span>
            <h1><?= $salle->nom ?></h1>
            <p><?= $salle->batiment ?> · Salle #<?= (int) $salle->id ?></p>
        </div>
        <span class="badge <?= $salle->active ? 'success' : 'danger' ?> large"><?= $salle->active ? 'Active' : 'Inactive' ?></span>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <span>Capacité</span>
            <strong><?= (int) $salle->capacite ?> places</strong>
        </div>

        <div class="detail-item">
            <span>Type</span>
            <strong><?= ucfirst($salle->type) ?></strong>
        </div>

        <div class="detail-item">
            <span>Bâtiment</span>
            <strong><?= $salle->batiment ?></strong>
        </div>

        <div class="detail-item">
            <span>Créée le</span>
            <strong><?= $salle->created_at ? $salle->created_at->format('d/m/Y') : '—' ?></strong>
        </div>
    </div>

    <div class="detail-actions">
        <a href="/salles" class="secondary-button">← Retour</a>
        <a href="/salles/create" class="secondary-button">Modifier</a>
        <button class="danger-button">Désactiver</button>
    </div>
</section>

<section class="table-card">
    <div class="table-top">
        <div>
            <h2>Réservations de la salle</h2>
            <span><?= count($salle->reservations ?? []) ?> réservation(s)</span>
        </div>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>Responsable</th>
                    <th>Motif</th>
                    <th>Date</th>
                    <th>Horaire</th>
                    <th>Statut</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($salle->reservations ?? [] as $reservation): ?>
                    <tr>
                        <td><strong><?= $reservation->responsable ?></strong></td>
                        <td><?= $reservation->motif ?></td>
                        <td><?= $reservation->date_debut ? $reservation->date_debut->format('d/m/Y') : '—' ?></td>
                        <td><?= $reservation->date_debut ? $reservation->date_debut->format('H:i') . ' - ' . $reservation->date_fin->format('H:i') : '—' ?></td>
                        <td><span class="badge <?= $reservation->statut === 'confirmée' ? 'success' : 'danger' ?>"><?= ucfirst($reservation->statut) ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
