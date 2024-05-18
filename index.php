<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma page web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="" method="post">
        <div class="all">
            <table cellpadding="5" cellspacing="5">
                <th colspan="2"><div class="connecter">Connexion</div></th>
                <div class="nom">
                  <tr> <td> <label for="nom">Nom</label></td>
                    <td><input type="text" name="nom" id="nom" placeholder="kakabi"></td></tr>
                </div>
                <div class="prenom">
                    <tr><td><label for="prenom">Prenom</label></td>
                    <td><input type="text" name="prenom" id="prenom" placeholder="christian"></td></tr>
                </div>
                <div class="quartier">
                     <tr><td><label for="quartier">Quartier</label></td>
                       <td> <select name="quartier" id="quartier">
                        <option value="yassa">choisisez votre quartier</option>
                        <option value="yassa">yassa</option>
                        <option value="ndokoti">ndokoti</option>
                        <option value="kotto">kotto</option>
                        <option value="makepet">makepet</option>
                        <option value="bonamoussadi">bonamoussadi</option>
                        <option value="brazzaville">brazzaville</option>
                        <option value="elfe">elfe</option>
                        <option value="saint michel">saint michel</option>
                        <option value="pk13">pk13</option>
                        <option value="pk12">pk12</option>
                        <option value="pk14">pk14</option>
                        <option value="pk10">pk10</option>
                        <option value="pk11">pk11</option>
                        <option value="sadi">sadi</option>
                        <option value="akwa">akwa</option>
                        <option value="bonaberie">bonaberie</option>
                        <option value="terminus">terminus</option>
                        <option value="oyac">oyac</option>
                        <option value="entre bille">entre bille</option>
                        <option value="nyalla">nyalla</option>
                        <option value="japoma">japoma</option>
                        <option value="deido">deido</option>
                        <option value="bonapriso">bonapriso</option>
                        <option value="bali">bali</option>
                        <option value="bonandjo">bonandjo</option>
                        <option value="bepanda">bepanda</option>
                    </select></td></tr>
                </div>
                <div class="quartier">
                        <tr> <td><label for="tel">tel</label></td>
                        <td><input type="number" name="tel" id="tel" placeholder="672257807"></td></tr>
                </div>
                <div class=""><tr><td colspan="2"><input type="submit" value="Enregistrer" class="envoie" name="envoie"></td></tr></div>
             </table>
        </div>
    </form>




    <?php

    $serveur = "localhost";
    $db = "tafprojet6";
    $login = "root";
    $pass = "";

    try 
    {
        try
        {
            //connexion
            $connexion = new PDO("mysql:host=".$serveur.";dbname=".$db.";",$login,$pass);
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(Exception $e)
        {
            echo "".$e->getMessage()."";
        }
        if (isset($_POST["envoie"])) 
        {
            //recuperation des donnees
            $name=$_POST["nom"];
            $prenom=$_POST["prenom"];
            $quartier=$_POST["quartier"];
            $tel=$_POST["tel"];
            try
            {
                //insertion des donnees
                $insertion ="INSERT INTO bdonnee(nom,prenom,quartier,telephone)
                VALUES ('$name','$prenom','$quartier','$tel')";
                 $connexion->exec($insertion);
                 header("location:base.php");
                // echo "insertion reussir";
            }
            catch(Exception $e)
            {
                echo "".$e->getMessage()."";
            }
        }
    }
    catch (PDOException $e)
    {
        echo "echec de la connection"  .$e->getMessage();
    }
    ?>
</body>
</html>