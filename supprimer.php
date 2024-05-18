<?php
    $serveur = "localhost";
    $db = "tafprojet6";
    $login = "root";
    $pass = "";

        try {
            $id=$_GET["id"];
            $connexion = new PDO("mysql:host=$serveur;dbname=" .$db . ";", $login, $pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $sup = "DELETE FROM bdonnee WHERE id=$id";
            
           $requete=$connexion->prepare($sup);
           $requete->execute();
           header("location:base.php") ;
            echo "Informations Updated";

        } 
        catch (Exception $e) {
            echo "Echec" . $e->getMessage() . "";
        }
 ?>