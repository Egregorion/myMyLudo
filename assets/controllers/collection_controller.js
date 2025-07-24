import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["button", "icon", "text"]
    static values = { 
        boardgameId: Number,
        isInCollection: Boolean,
        addUrl: String,
        removeUrl: String
    }

    connect() {
        this.updateButton();
    }

    async toggle() {
        this.setLoading(true);
        
        try {
            const url = this.isInCollectionValue ? this.removeUrlValue : this.addUrlValue;
            
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (response.ok) {
                // Inverser l'état
                this.isInCollectionValue = !this.isInCollectionValue;
                this.showFeedback();
            } else {
                throw new Error('Erreur lors de la requête');
            }
        } catch (error) {
            console.error('Erreur:', error);
            this.showError();
        } finally {
            this.setLoading(false);
        }
    }

    updateButton() {

        if (this.hasButtonTarget) {
            // Déterminer les classes et le contenu selon l'état
            const isInCollection = this.isInCollectionValue;
            const btnClass = isInCollection ? 'btn-danger' : 'btn-success';
            const iconClass = isInCollection ? 'fa-minus' : 'fa-plus';
            const text = isInCollection ? 'Retirer de ma collection' : 'Ajouter à ma collection';
            
            // Réinitialiser les classes du bouton
            this.buttonTarget.classList.remove('btn-success', 'btn-danger', 'btn-warning');
            this.buttonTarget.classList.add(btnClass);
            this.buttonTarget.disabled = false;
            
            // Si on a les targets séparés pour icône et texte
            if (this.hasIconTarget && this.hasTextTarget) {
                this.iconTarget.classList.remove('fa-plus', 'fa-minus');
                this.iconTarget.classList.add(iconClass);
                this.textTarget.textContent = text;
            } else {
                // Sinon, reconstruire tout le HTML du bouton
                // Pour les boutons compacts (comme sur la page d'accueil), pas de texte
                this.buttonTarget.innerHTML = `<i class="fas ${iconClass}"></i>`;
            }
        }
    }

    setLoading(isLoading) {
        if (this.hasButtonTarget) {
            this.buttonTarget.disabled = isLoading;
            
            if (isLoading) {
                // Sauvegarder le contenu original avant de le remplacer
                if (this.hasIconTarget && this.hasTextTarget) {
                    // Pour les boutons avec targets séparés, on ne change que le texte
                    this.textTarget.textContent = 'Chargement...';
                    this.iconTarget.classList.remove('fa-plus', 'fa-minus');
                    this.iconTarget.classList.add('fa-spinner', 'fa-spin');
                } else {
                    // Pour les boutons compacts, on remplace tout le HTML
                    this.buttonTarget.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Chargement...';
                }
            } else {
                // Restaurer le contenu original du bouton
                if (this.hasIconTarget && this.hasTextTarget) {
                    this.textTarget.textContent = '';
                    this.iconTarget.classList.remove('fa-spinner', 'fa-spin');
                    this.iconTarget.classList.add(this.isInCollectionValue ? 'fa-minus' : 'fa-plus');
                } else {
                    this.buttonTarget.innerHTML = `<i class="fas ${this.isInCollectionValue ? 'fa-minus' : 'fa-plus'}"></i>`;
                }
                this.iconTarget.classList.remove('fa-spinner', 'fa-spin');
                this.iconTarget.classList.add('fa-plus', 'fa-minus');
                this.updateButton();
            }
        }
    }

    showFeedback() {
        // Mettre à jour le bouton d'abord
        this.updateButton();
        
        // Animation de feedback visuel
        if (this.hasButtonTarget) {
            this.buttonTarget.classList.add('animate__animated', 'animate__pulse');
            setTimeout(() => {
                this.buttonTarget.classList.remove('animate__animated', 'animate__pulse');
            }, 1000);
        }
    }

    showError() {
        if (this.hasButtonTarget) {
            this.buttonTarget.classList.remove('btn-success', 'btn-danger');
            this.buttonTarget.classList.add('btn-warning');
            this.buttonTarget.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Erreur';
            
            setTimeout(() => {
                this.updateButton();
            }, 2000);
        }
    }
}
