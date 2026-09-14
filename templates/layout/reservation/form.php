<?php
$old = $old ?? [];
$errors = $errors ?? [];
$globalError = $errors['global'] ?? null;
$salles = $salles ?? [];
?>
<div class="page-header">
    <div>
        <span class="page-label">RÉSERVATION</span>
        <h1>Nouvelle réservation</h1>
        <p>Remplissez les informations pour réserver une salle.</p>
    </div>
</div>

<section class="form-card">
    <?php if ($globalError): ?>
        <div class="error-message" role="alert">
            <?= htmlspecialchars((string) $globalError, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/reservations">
        <div class="form-grid">
            <div class="form-group">
                <label for="salle_id">Salle</label>
                <select id="salle_id" name="salle_id" required>
                    <option value="">Sélectionner une salle</option>
                    <?php foreach ($salles as $salle): ?>
                        <option value="<?= (int) $salle->id ?>" <?= ((string) ($old['salle_id'] ?? '') === (string) $salle->id) ? 'selected' : '' ?>>
                            <?= htmlspecialchars((string) $salle->nom, ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($errors['salle_id'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['salle_id']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" id="responsable" name="responsable" value="<?= htmlspecialchars((string) ($old['responsable'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="Nom et prénom" required>
                <?php if (!empty($errors['responsable'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['responsable']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Adresse électronique</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars((string) ($old['email'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="exemple@universite.sn" required>
                <?php if (!empty($errors['email'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['email']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group form-full">
                <label for="motif">Motif</label>
                <input type="text" id="motif" name="motif" value="<?= htmlspecialchars((string) ($old['motif'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" placeholder="Ex : Cours d'architecture logicielle" required>
                <?php if (!empty($errors['motif'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['motif']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="date_debut">Date et heure de début</label>
                <input type="datetime-local" id="date_debut" name="date_debut" value="<?= htmlspecialchars((string) ($old['date_debut'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                <?php if (!empty($errors['date_debut'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['date_debut']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="date_fin">Date et heure de fin</label>
                <input type="datetime-local" id="date_fin" name="date_fin" value="<?= htmlspecialchars((string) ($old['date_fin'] ?? ''), ENT_QUOTES, 'UTF-8') ?>" required>
                <?php if (!empty($errors['date_fin'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['date_fin']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>
        </div>

        <div class="info-message">
            <strong>Information :</strong> une réservation ne peut pas dépasser 4 heures et la salle doit être disponible.
        </div>

        <div class="form-actions">
            <a href="/reservations" class="secondary-button">Annuler</a>
            <button type="submit" class="primary-button">Confirmer la réservation</button>
        </div>
    </form>
</section>
