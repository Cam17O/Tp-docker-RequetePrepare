<?php
//connexion à la base de donnée
require("connexion.php");

global $dbh;
try{

    $sql = "SELECT * FROM Clients";

    $sth = $dbh -> query($sql);

    $tout = $sth->fetchAll();


    echo "<table>";
    echo "<tr>";
        echo "<th>info</th>";
        echo "<th>Modifier</th>";
        echo "<th>delete</th>";
    echo "</tr>";

    foreach ($tout as $ligne) {
    echo "<tr>";
        echo "<td>";

        $keys = array_keys($ligne);

        foreach ($keys as $key) {
            echo $ligne[$key] . "  ";
        }

        echo "</td>";

        echo "<td>";
            $clientLine = sprintf("<a href='EditUser.php?id=%s'>Modifier</a>",
                $ligne['Id']
            );
            echo $clientLine;
        echo "</td>";

        echo "<td>";
            $clientLine = sprintf("<a href='DeleteUser.php?id=%s'>Delete</a>",
                $ligne['Id']
            );
            echo $clientLine;
        echo "</td>";

    echo "</tr>";
    }
}
catch(PDOException $e){
    //$dbh->rollBack();
    echo "Requête exécutée: " . $sql;
    echo "Erreur : " . $e->getMessage();
}

?>