<?php
    $serveur = "localhost";
    $db = "tafprojet6";
    $login = "root";
    $pass = "";

        try {
            $id=$_GET["id"];
            $connexion = new PDO("mysql:host=$serveur;dbname=" .$db . ";", $login, $pass);
            $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

           $mod = "SELECT * FROM bdonnee WHERE id=$id";
     
            
           $requete=$connexion->prepare($mod);
           $requete->execute();

         
           $elt = $requete->fetch(PDO::FETCH_ASSOC);
           
          ?>
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
                       <td><input type="text" name="nom" id="nom" placeholder="kakabi" value="<?php echo $elt["nom"] ?>" ></td></tr>
                   </div>
                   <div class="prenom">
                       <tr><td><label for="prenom">Prenom</label></td>
                       <td><input type="text" name="prenom" id="prenom" placeholder="christian" value="<?php echo $elt["prenom"] ?>" ></td></tr>
                   </div>
                   <div class="quartier">
                        <tr><td><label for="quartier">Quartier</label></td>
                          <td> <input type="text" name="quartier" id="quartier" value="<?php echo $elt["quartier"] ?>"></td></tr>
                   </div>
                   <div class="quartier">
                           <tr> <td><label for="tel">tel</label></td>
                           <td><input type="number" name="tel" id="tel" placeholder="" value="<?php echo $elt["telephone"]?>"></td></tr>
                   </div>
                   <div class=""><tr><td colspan="2"><input type="submit" value="Modifier" class="envoie" name="mod"></td></tr></div>
                </table>
                </body>
                </html>
           </div>
       </form>
   
          <?php

            if (isset($_POST['mod'])) {
                $id=$_GET["id"];
                $nom=$_POST["nom"];
                $prenom=$_POST["prenom"];
                $quartier=$_POST["quartier"];
                $tel=$_POST["tel"];
                try
                {
                   
                    $modification ="UPDATE bdonnee set nom='$nom',prenom='$prenom',quartier='$quartier',telephone='$tel' WHERE id='$id'";
                     $connexion->exec($modification);
                     header("location:base.php");
                    
                }
                catch(Exception $e)
                {
                    echo "".$e->getMessage()."";
                }
            } 

           
        } 
        catch (Exception $e) {
            echo "Echec" . $e->getMessage() . "";
        }
 ?>