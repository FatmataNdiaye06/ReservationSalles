<div class="page-header">
    <div>
        <span class="page-label">GESTION DES SALLES</span>
        <h1>Ajouter une salle</h1>
        <p>Renseignez les informations de la nouvelle salle.</p>
    </div>
</div>

<section class="form-card">
    <form>
        <div class="form-grid">
            <div class="form-group">
                <label for="nom">Nom de la salle</label>
                <input type="text" id="nom" placeholder="Ex : Salle B12">
            </div>

            <div class="form-group">
                <label for="batiment">Bâtiment</label>
                <input type="text" id="batiment" placeholder="Ex : Bâtiment B">
            </div>

            <div class="form-group">
                <label for="capacite">Capacité</label>
                <input type="number" id="capacite" placeholder="Ex : 40">
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select id="type">
                    <option value="">Sélectionner un type</option>
                    <option>Cours</option>
                    <option>Informatique</option>
                    <option>Laboratoire</option>
                    <option>Amphithéâtre</option>
                    <option>Réunion</option>
                </select>
            </div>

            <div class="form-group checkbox-group">
                <label>
                    <input type="checkbox" checked>
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
