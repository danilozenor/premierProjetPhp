


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylebs.css">
</head>
<body class="body2">

   <div class="ajo"><a href="index.php">Ajouter</a></div> 
    <table border="1" class="table2" cellpadding="10" cellspacing="10">
        <th>Nom</th>
        <th>Prenom</th>
        <th>quartier</th>
        <th>telephone</th>
        <th>Actions</th>
 
        <?php
            $serveur = "localhost";
            $db = "tafprojet6";
            $login = "root";
            $pass = "";

            try 
            {
                $connexion = new PDO("mysql:host=$serveur;dbname=" .$db . ";", $login, $pass);
                $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $requete = $connexion-> prepare("SELECT * FROM bdonnee");
                $requete -> execute();
                
                $resultat = $requete->fetchAll();

                foreach ($resultat as $row) {
                    ?>
                        <tr>
                            <td><?php echo $row["nom"] ?></td>
                            <td><?php echo $row["prenom"]?></td>
                            <td><?php echo $row["quartier"]?></td>
                            <td><?php echo $row["telephone"]?></td>
                            <td>
                                <div class="pre">
                                    <div class="sup"><a href="supprimer.php?id=<?php echo $row["id"]?>"> supprimer</a></div>
                                    <div class="mod"><a href="modiff.php?id=<?php echo $row["id"]?>"> Modifier</a></div>
                                </div>
                            </td>
                        </tr>
                    <?php
                }
            } 
            catch (Exception $e)
            {
                echo "Echec" . $e->getMessage() . "";
            }
        ?>
    </table>
</body>
</html>
