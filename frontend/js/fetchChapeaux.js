async function fetchChapeaux() {
    const response = await fetch('http://localhost:8000/api/chapeaux');
    if (!response.ok) {
        throw new Error('Erreur lors de la récupération des données des chapeaux : ' + response.status);
    }
    return response.json();
}

export default fetchChapeaux;

