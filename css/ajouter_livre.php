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
                <img class="img-fluid acc float-right" src="images/livre-ouvert.jpg" alt="Petite icône">
            </div>

        </div> <br> <br> <br>

        <div class="row">

            <div class="col-md-8">
                
            <?php

            require_once('connexion.php');
            
            $stmt = $connexion->prepare("SELECT nom FROM auteur ");

            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();

            ?>

            <form action="ajouter_livre.php" method="post">

            Auteur: <select name = 'auteur'>

            <?php
            while($enregistrement = $stmt->fetch())

            {

            echo "<option value ='". $enregistrement->nom."'> ".$enregistrement->nom.'</option>';

            }
            ?> </select> <br>

            Titre:   <input type="text" name="titre" required><br>

            ISBN13:   <input type="text" name="ISBN" required><br>

            Année de parution:   <input type="text" name="annee" required><br>

            Résumé:   <input type="text" name="resume" required><br>

            Image:   <input type="text" name="image" required><br>

            <input type="submit" value="Ajouter un livre" name="bouton">

            </form>

            <?php

            if ( isset($_REQUEST['bouton']) ){

                $auteur = $_REQUEST['auteur'];

                $titre = $_REQUEST['titre'];

                $isbn13 = $_REQUEST['ISBN'];

                $annee = $_REQUEST['annee'];

                $resume = $_REQUEST['resume'];

                $dateajout = date('Y-m-d');

                $image = $_REQUEST['image'];

                require_once('connexion.php');

                $stmt1 = $connexion->prepare("SELECT noauteur FROM auteur WHERE nom = :nom");

                $stmt1->bindValue(':nom', $auteur);

                $stmt1->setFetchMode(PDO::FETCH_OBJ);

                $stmt1->execute();

                $enregistrement = $stmt1->fetch();
                
                $noauteur = $enregistrement->noauteur;

            try {

                $stmt = $connexion->prepare("INSERT INTO livre (noauteur, titre, isbn13, anneeparution, resume, dateajout, image) VALUES (:noauteur, :titre, :isbn13, :anneeparution, :resume, :dateajout, :image)");

                $stmt->bindValue(':noauteur', $noauteur);

                $stmt->bindValue(':titre', $titre);

                $stmt->bindValue(':isbn13', $isbn13);

                $stmt->bindValue(':anneeparution', $annee);

                $stmt->bindValue(':resume',$resume);

                $stmt->bindValue(':dateajout', $dateajout);

                $stmt->bindValue(':image',$image);

                $stmt->execute();

                echo "Le livre ". $titre . " de " . $auteur ." a bien été ajouté.";

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