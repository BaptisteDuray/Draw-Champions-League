-- Table des chapeaux
CREATE TABLE chapeaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- Table des clubs
CREATE TABLE clubs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    pays VARCHAR(255) NOT NULL
);

-- Table des tirages
CREATE TABLE tirages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    chapeau_id INT,
    club_id INT,
    FOREIGN KEY (chapeau_id) REFERENCES chapeaux(id),
    FOREIGN KEY (club_id) REFERENCES clubs(id)
);

-- Table des groupes
CREATE TABLE groupes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

-- Table de liaison entre les clubs et les groupes (pour représenter les groupes de la Ligue des Champions)
CREATE TABLE clubs_groupes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    groupe_id INT,
    club_id INT,
    FOREIGN KEY (groupe_id) REFERENCES groupes(id),
    FOREIGN KEY (club_id) REFERENCES clubs(id)
);
