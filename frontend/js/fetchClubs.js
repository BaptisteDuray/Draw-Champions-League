// Fonction pour récupérer la liste des clubs
export default async function fetchClubs() {
    const API_BASE_URL = 'http://localhost:8000';

    try {
        // Récupérer la liste des clubs avec la méthode GET
        const response = await fetch(`${API_BASE_URL}/api/clubs`);
        if (!response.ok) {
            throw new Error('Erreur lors de la récupération des données des clubs : ' + response.status);
        }
        return response.json();
    } catch (error) {
        throw error;
    }
}
