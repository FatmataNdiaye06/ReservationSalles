<div class="page-header">
    <div>
        <span class="page-label">RÉSERVATION</span>
        <h1>Nouvelle réservation</h1>
        <p>Remplissez les informations pour réserver une salle.</p>
    </div>
</div>

<section class="form-card">
    <form>
        <div class="form-grid">
            <div class="form-group">
                <label for="salle">Salle</label>
                <select id="salle">
                    <option value="">Sélectionner une salle</option>
                    <option>Amphithéâtre A</option>
                    <option selected>Salle B12</option>
                    <option>Laboratoire Chimie</option>
                    <option>Salle Informatique 1</option>
                </select>
            </div>

            <div class="form-group">
                <label for="responsable">Responsable</label>
                <input type="text" id="responsable" placeholder="Nom et prénom">
            </div>

            <div class="form-group">
                <label for="email">Adresse électronique</label>
                <input type="email" id="email" placeholder="exemple@universite.sn">
            </div>

            <div class="form-group form-full">
                <label for="motif">Motif</label>
                <input type="text" id="motif" placeholder="Ex : Cours d'architecture logicielle">
            </div>

            <div class="form-group">
                <label for="date-debut">Date et heure de début</label>
                <input type="datetime-local" id="date-debut">
            </div>

            <div class="form-group">
                <label for="date-fin">Date et heure de fin</label>
                <input type="datetime-local" id="date-fin">
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
