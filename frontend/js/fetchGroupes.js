async function fetchGroupes() {
    const response = await fetch('http://localhost:8000/api/groupes');
    if (!response.ok) {
        throw new Error('Erreur lors de la récupération des données des groupes : ' + response.status);
    }
    return response.json();
}

export default fetchGroupes;
