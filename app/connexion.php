<?php
// page de connexion à la base de donnée

// Informations de connexion au serveur de base de données
$servname = 'mysql-vulnerable';
$dbname = 'pdodb';
$user = 'pdodb';
$pass = 'pdodb';

// Connexion à la base avec PDO
$dbh = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);

?>