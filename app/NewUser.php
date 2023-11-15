<!DOCTYPE html>
<html>

<h1>Bases de données MySQL</h1>

<?php
//connexion à la base de donnée
require("connexion.php");

/* Les variables prennent les valeurs des inputs du formulaire lorsque submit est appuyer */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupération des valeurs envoyé par le formulaire
    $trimmer = " \n\r\t\v\x00";

    $nom = $_POST['nom'];
    $nom = trim($nom, $trimmer);

    $prenom = $_POST['prenom'];
    $prenom = trim($prenom, $trimmer);

    $adresse = $_POST['adresse'];
    $adresse = trim($adresse, $trimmer);

    $ville = $_POST['ville'];
    $ville = trim($ville, $trimmer);

    $cp = $_POST['cp'];
    $cp = trim($cp, $trimmer);

    $pays = $_POST['pays'];
    $pays = trim($pays, $trimmer);

    $mail = $_POST['mail'];
    $mail = trim($mail, $trimmer);
    
    global $dbh;
    try{
        // Création de la requête en utilisant les valeurs récupérées à partir du formulaire
        $sth = $dbh -> prepare("INSERT INTO Clients(Nom,Prenom,Adresse,Ville,Codepostal,Pays,Mail)
                VALUES (:nom, :prenom, :adresse, :ville, :cp, :pays, :mail)");

        // Insertion des valeurs dans la requête sql
        $sth->bindValue(':nom', $nom);
        $sth->bindValue(':prenom', $prenom);
        $sth->bindValue(':adresse', $adresse);
        $sth->bindValue(':ville', $ville);
        $sth->bindValue(':cp', $cp, PDO::PARAM_INT);
        $sth->bindValue(':pays', $pays);
        $sth->bindValue(':mail', $mail);

        // Exécution de la requête créée ci-dessus
        $sth->execute();

        echo "<a href='AllUser.php'>Tous les clients</a>";
        echo "<br>";
        echo "<a href='index.html'>Ajouter un client</a>";

    }
    catch(PDOException $e){
        //$dbh->rollBack();
        echo "Requête exécutée: " . $sql;
        echo "Erreur : " . $e->getMessage();
    }
}

?>

</html>