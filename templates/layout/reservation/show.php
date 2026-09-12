<div class="breadcrumb">
    <a href="/reservations">Réservations</a>
    <span>›</span>
    <span>Réservation #<?= (int) $reservation->id ?></span>
</div>

<section class="detail-card">
    <div class="detail-header">
        <div>
            <span class="page-label">DÉTAIL DE LA RÉSERVATION</span>
            <h1><?= $reservation->motif ?></h1>
            <p>Réservation #<?= (int) $reservation->id ?></p>
        </div>

        <span class="badge <?= $reservation->statut === 'confirmée' ? 'success' : 'danger' ?> large"><?= ucfirst($reservation->statut) ?></span>
    </div>

    <div class="detail-grid">
        <div class="detail-item">
            <span>Responsable</span>
            <strong><?= $reservation->responsable ?></strong>
        </div>

        <div class="detail-item">
            <span>Email</span>
            <strong><?= $reservation->email ?></strong>
        </div>

        <div class="detail-item">
            <span>Salle</span>
            <strong><?= $reservation->salle ? $reservation->salle->nom : 'Salle inconnue' ?></strong>
        </div>

        <div class="detail-item">
            <span>Date</span>
            <strong><?= $reservation->date_debut ? $reservation->date_debut->format('d/m/Y') : '—' ?></strong>
        </div>

        <div class="detail-item">
            <span>Début</span>
            <strong><?= $reservation->date_debut ? $reservation->date_debut->format('H:i') : '—' ?></strong>
        </div>

        <div class="detail-item">
            <span>Fin</span>
            <strong><?= $reservation->date_fin ? $reservation->date_fin->format('H:i') : '—' ?></strong>
        </div>
    </div>

    <div class="detail-actions">
        <a href="/reservations" class="secondary-button">← Retour</a>
        <button class="danger-button">Annuler la réservation</button>
    </div>
</section>
