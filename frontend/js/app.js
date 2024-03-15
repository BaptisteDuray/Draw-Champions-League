// Import des fonctions de récupération des données
import fetchClubs from "./fetchClubs.js";
import fetchTirages from "./fetchTirages.js";
import fetchChapeaux from "./fetchChapeaux.js";
import fetchGroupes from "./fetchGroupes.js";

document.addEventListener("DOMContentLoaded", async function () {
    console.log("Le DOM est chargé.");

    // Appel de la fonction d'initialisation
    await init();

    // Fonction d'initialisation
    async function init() {
        console.log("Initialisation en cours...");

        try {
            // Charger les données
            console.log("Chargement des données des clubs...");
            const clubs = await fetchClubs();
            console.log("Données des clubs récupérées :", clubs);

            console.log("Chargement des données des tirages...");
            const tirages = await fetchTirages();
            console.log("Données des tirages récupérées :", tirages);

            console.log("Chargement des données des chapeaux...");
            const chapeaux = await fetchChapeaux();
            console.log("Données des chapeaux récupérées :", chapeaux);

            console.log("Chargement des données des groupes...");
            const groupes = await fetchGroupes();
            console.log("Données des groupes récupérées :", groupes);

            console.log("Création des chapeaux...");
            const chapeauxArray = createChapeauxArray(clubs, chapeaux);
            console.log("Chapeaux créés :", chapeauxArray);

            console.log("Tirage des équipes dans les groupes...");
            tirageEquipesDansGroupes(groupes, chapeauxArray);
            console.log("Tirage terminé.");

            console.log("Affichage des groupes et des chapeaux...");
            await displayGroupes(groupes, chapeauxArray); // Attendre l'affichage des groupes

            console.log("Initialisation terminée.");
        } catch (error) {
            console.error(
                "Une erreur est survenue lors de l'initialisation :",
                error
            );
        }
    }

    // Fonction pour créer les chapeaux
    function createChapeauxArray(clubs, chapeaux) {
        const chapeauxArray = [[], [], [], []]; // Chapeaux de 1 à 4
        clubs.forEach((club) => {
            // Vérifiez si le rang du club est valide
            if (club.rang >= 1 && club.rang <= 4) {
                chapeauxArray[club.rang - 1].push(club); // Placer le club dans le chapeau correspondant
            } else {
                console.log(
                    `Le club ${club.nom} a un rang non valide et n'a pas été ajouté à un chapeau.`
                );
            }
        });
        return chapeauxArray;
    }

    // Fonction pour tirer les équipes dans les groupes
    function tirageEquipesDansGroupes(groupes, chapeauxArray) {
        const paysDejaPresent = {}; // Pour suivre les pays déjà présents dans chaque groupe
        groupes.forEach((groupe) => {
            paysDejaPresent[groupe.id] = []; // Initialisation des pays déjà présents dans chaque groupe
            groupe.equipes = []; // Initialisation des équipes dans chaque groupe
        });

        // Tirage des équipes
        for (let i = 0; i < chapeauxArray.length; i++) {
            const equipesDisponibles = chapeauxArray[i].filter((equipe) => !equipe.tiree);
            for (let j = 0; j < groupes.length; j++) {
                const groupe = groupes[j];
                const equipeTiree = tirerEquipeAleatoire(equipesDisponibles, paysDejaPresent[groupe.id]);
                if (equipeTiree) {
                    groupe.equipes.push(equipeTiree); // Ajout de l'équipe au groupe
                    paysDejaPresent[groupe.id].push(equipeTiree.pays); // Enregistrement du pays
                    equipeTiree.tiree = true; // Marquage de l'équipe comme déjà tirée
                }
            }
        }
    }

    // Fonction pour tirer une équipe aléatoire d'un chapeau
    function tirerEquipeAleatoire(equipesDisponibles, paysGroupe) {
        if (equipesDisponibles.length === 0) {
            return null; // Aucune équipe disponible dans ce chapeau
        }

        const equipeIndex = Math.floor(Math.random() * equipesDisponibles.length);
        const equipeTiree = equipesDisponibles[equipeIndex];
        if (!paysGroupe.includes(equipeTiree.pays)) {
            return equipeTiree;
        } else {
            return tirerEquipeAleatoire(equipesDisponibles.filter(equipe => equipe !== equipeTiree), paysGroupe);
        }
    }

    async function displayGroupes(groupes, chapeauxArray) {
        await Promise.all(
            groupes.map(async (groupe, index) => {
                const equipeContainer = document.querySelector(`#groupe-${String.fromCharCode(65 + index)} .team-container`);
                if (equipeContainer) {
                    const equipeList = document.createElement("ul");
                    groupe.equipes.forEach((equipe) => {
                        const equipeItem = document.createElement("li");
                        equipeItem.textContent = equipe.nom;
                        equipeList.appendChild(equipeItem);
                    });
                    equipeContainer.appendChild(equipeList);
                } else {
                    console.error(`Conteneur d'équipes introuvable pour le groupe ${groupe.id}`);
                }
            })
        );

        
    }
});
