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
                
            <?php include "listes_livre.php"; ?>

            </div>


            <div class="col-md-4">
                <img class="img-fluid acc float-right" src="images/livre-ouvert.jpg" alt="Petite icône">
            </div>

        </div> <br> <br> <br>

        <div class="row">

            <div class="col-md-8">

                <div class="row">

                    <div class="col-md-8">

                    
            <?php
            
            $titre = $_GET['titre'] ;  // on récupère le titre par l'URL

            require_once('connexion.php');

            $stmt = $connexion->prepare("SELECT nom,prenom,isbn13,resume,image,anneeparution FROM livre JOIN auteur ON livre.noauteur = auteur.noauteur WHERE titre = :titre ");

            $stmt->bindValue(":titre", $titre); 
            
            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();


            if ($enregistrement = $stmt->fetch()) {// si $enregistrement n'est pas vide

                echo '<p> Auteur : '. $enregistrement->nom.' ' . $enregistrement->prenom.'<br> ISBN13 : '. $enregistrement->isbn13. '<br>  </p>';

                echo '<p>Résumé du livre <br> </p>';

                echo '<p>'. $enregistrement->resume .'</p>';

                echo '<p>Année de parution : ' . $enregistrement->anneeparution.' </p>';

                echo '</div> ';

                echo '<div class="col-md-4">';
                
                echo '<img class="img-fluid" src="'. $enregistrement->image .'" alt="Image livre">' ;

                echo'</div>  </div>';  //on ferme un div puis le row

            }
            else {// La requête n'a pas retournée de résultat

                echo "Aucun résultat";
            }

            ?>

            <?php

            $titre = $_GET['titre'] ;  // on récupère le titre par l'URL

            require_once('php/connexion.php');

            $stmt = $connexion->prepare("SELECT dateretour FROM emprunter JOIN livre ON livre.nolivre = emprunter.nolivre WHERE titre = :titre AND dateemprunt in (SELECT max(dateemprunt) FROM emprunter)");

            $stmt->bindValue(":titre", $titre); 

            $stmt->setFetchMode(PDO::FETCH_OBJ);

            $stmt->execute();

            $nbr_ligne = $stmt->rowCount() ;

            $enregistrement = $stmt->fetch();

            if ( $enregistrement->dateretour != null or $nbr_ligne == 0) {

                // prob avec resultat requete quand ya pas d'emprunt 

                echo '<h1 class="text-success">Disponible</h1>';

                
                
            }
            else {

                echo '<h1 class="text-danger">Indisponible</h1> ';

                echo '<p > Vous pourrez emprunter le livre quand il sera rendu. </p>';   

            }

            ?>
  

            </div>  <!-- On ferme la zone de contenu -->

            <div class="col-md-4 m-auto" >

                <?php include "authentification.php" ; ?>
                
            </div>

        </div>

    </div>



</body>

</html>