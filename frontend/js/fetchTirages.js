async function fetchTirages() {
    const response = await fetch('http://localhost:8000/api/tirages');
    if (!response.ok) {
        throw new Error('Erreur lors de la récupération des données des tirages : ' + response.status);
    }
    return response.json();
}

export default fetchTirages;
