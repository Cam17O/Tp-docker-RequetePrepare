<?php

require("connexion.php");


try{
    // Récupération du paramètre passé en GET
    $idClient = $_GET['id'];
    // ATTENTION, il FAUT filtrer cette valeur!!!!!!!!!!!!!

    // Création de la requête en utilisant la valeur issue du paramètre
    $sth = $dbh -> prepare("DELETE FROM Clients WHERE id=:idClient LIMIT 1");

    $sth->bindValue(':idClient', $idClient, PDO::PARAM_INT);

    // Exécution réelle de la requête créée ci-dessus
    $sth->execute();
    //$sth = $dbh->query($sql);

    header('Location: AllUser.php');
}
catch(PDOException $e){
    //$dbh->rollBack();
    echo "Requête exécutée: " . $sth;
    echo "Erreur : " . $e->getMessage();
}

?>