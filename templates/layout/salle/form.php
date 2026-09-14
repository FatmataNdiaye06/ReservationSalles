<?php
$old = $old ?? [];
$errors = $errors ?? [];
$globalError = $errors['global'] ?? null;
$nomValue = htmlspecialchars((string) ($old['nom'] ?? ''), ENT_QUOTES, 'UTF-8');
$batimentValue = htmlspecialchars((string) ($old['batiment'] ?? ''), ENT_QUOTES, 'UTF-8');
$capaciteValue = htmlspecialchars((string) ($old['capacite'] ?? ''), ENT_QUOTES, 'UTF-8');
$typeValue = (string) ($old['type'] ?? '');
$activeChecked = !empty($old['active']) || !array_key_exists('active', $old);
?>
<div class="page-header">
    <div>
        <span class="page-label">GESTION DES SALLES</span>
        <h1>Ajouter une salle</h1>
        <p>Renseignez les informations de la nouvelle salle.</p>
    </div>
</div>

<section class="form-card">
    <?php if ($globalError): ?>
        <div class="error-message" role="alert">
            <?= htmlspecialchars((string) $globalError, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="/salles">
        <div class="form-grid">
            <div class="form-group">
                <label for="nom">Nom de la salle</label>
                <input type="text" id="nom" name="nom" value="<?= $nomValue ?>" placeholder="Ex : Salle B12" required>
                <?php if (!empty($errors['nom'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['nom']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="batiment">Bâtiment</label>
                <input type="text" id="batiment" name="batiment" value="<?= $batimentValue ?>" placeholder="Ex : Bâtiment B" required>
                <?php if (!empty($errors['batiment'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['batiment']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="capacite">Capacité</label>
                <input type="number" id="capacite" name="capacite" value="<?= $capaciteValue ?>" placeholder="Ex : 40" min="1" required>
                <?php if (!empty($errors['capacite'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['capacite']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select id="type" name="type" required>
                    <option value="">Sélectionner un type</option>
                    <?php foreach (['cours', 'informatique', 'laboratoire', 'amphitheatre', 'reunion'] as $option): ?>
                        <option value="<?= $option ?>" <?= $typeValue === $option ? 'selected' : '' ?>><?= ucfirst($option) ?></option>
                    <?php endforeach; ?>
                </select>
                <?php if (!empty($errors['type'])): ?>
                    <small class="field-error"><?= htmlspecialchars((string) reset($errors['type']), ENT_QUOTES, 'UTF-8') ?></small>
                <?php endif; ?>
            </div>

            <div class="form-group checkbox-group">
                <label>
                    <input type="checkbox" name="active" value="1" <?= $activeChecked ? 'checked' : '' ?>>
                    Salle active
                </label>
            </div>
        </div>

        <div class="form-actions">
            <a href="/salles" class="secondary-button">Annuler</a>
            <button type="submit" class="primary-button">Enregistrer la salle</button>
        </div>
    </form>
</section>
