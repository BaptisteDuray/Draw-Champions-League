<?php

// Informations de connexion à la base de données
$host = '127.0.0.1';
$port = '3306';
$dbname = 'DrawChampionsLeague';
$username = 'root';
$password = 'root';

try {
    // Connexion à la base de données MySQL en utilisant PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer la liste des clubs depuis la base de données
    $clubsQuery = $pdo->query("SELECT * FROM clubs");
    $clubs = $clubsQuery->fetchAll(PDO::FETCH_ASSOC);

    // Affichage des clubs
    echo json_encode($clubs);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
