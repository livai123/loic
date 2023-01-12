<?php
session_start();
?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="css/mise en page.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

</head>

<br>


<body>

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-8">
                
            <?php include "site.php"; ?>

            </div>


            <div class="col-md-4">
                <img class="img-fluid acc float-right" src="images/livre ouvert.jpg" alt="Petite icône">
            </div>

        </div> <br> <br> <br>

        <div class="row">

            <div class="col-md-8">

            <!-- Controle de saisie : adresse avec @ obligatoire  pattern en HTML-->

            <form action="creer_membre.php" method="post">

            Mel:   <input type="text" name="mel" required><br>

            Mot de passe:   <input type="text" name="mdp" required><br>

            Nom:   <input type="text" name="nom" required><br>

            Prenom:   <input type="text" name="prenom" required><br>

            Adresse:   <input type="text" name="adresse" required><br>

            Ville:   <input type="text" name="ville" required><br>

            Code Postal:   <input type="text" name="postal" required><br>

            <input type="submit" value="Créer un membre" name="bouton" >

            </form>

            <?php

            if ( isset($_REQUEST['bouton']) ){

            $mel = $_REQUEST['mel'];

            $mot_de_passe = $_REQUEST['mdp'];

            $nom = $_REQUEST['nom'];

            $prenom = $_REQUEST['prenom'];

            $adresse = $_REQUEST['adresse'];

            $ville = $_REQUEST['ville'];

            $codepostal = $_REQUEST['postal'];

            require_once('connexion.php');

            try {

            $stmt = $connexion->prepare("INSERT INTO utilisateur (mel, motdepasse, nom, prenom, adresse, ville, codepostal, profil ) VALUES (:mel, :motdepasse, :nom, :prenom, :adresse, :ville, :codepostal, 'Membre' )");

            // insertion d'une ligne

            $stmt->bindValue(':mel', $mel);

            $stmt->bindValue(':motdepasse', $mot_de_passe);

            $stmt->bindValue(':nom', $nom);

            $stmt->bindValue(':prenom', $prenom);

            $stmt->bindValue(':adresse',$adresse);

            $stmt->bindValue(':ville', $ville);

            $stmt->bindValue(':codepostal',$codepostal);

            $stmt->execute();

            echo "Le membre ". $nom . " " . $prenom ." a bien été créé.";

            } 
            
            catch (Exception $e) {

            echo "Une erreur est survenue lors de l'insertion.";

            }
            }

            ?>

            </div>

            <div class="col-md-4 m-auto" >

                <?php include "authentification.php" ; ?>
                
            </div>

        </div>

    </div>



</body>

</html>