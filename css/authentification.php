

                <p class="text-center"> Se connecter </p>  <br>

                <form action="authentification.php" method="post" >

                    <p class="text-center"> Identifiant </p>

                    <input name="identifiant" type="text" size="30" required> <br>

                    <p class="text-center"> Mot de passe </p>

                    <input name="mdp" type="text"  size="30" required>  <br>

                    <input class="btn btn-primary" type="submit" value="Se connecter" name="bouton">

                </form>

                <?php
                if ( isset($_REQUEST['bouton']) ){

                    $mel = $_REQUEST['identifiant'];

                    $mdp = $_REQUEST['mdp'];

                    require_once('connexion.php');

                    $stmt = $connexion->prepare("SELECT * from utilisateur where mel = :mel ");

                    $stmt->bindValue(':mel', $mel);
                    
                    $stmt->setFetchMode(PDO::FETCH_OBJ);

                    $stmt->execute();
                    
                    $enregistrement = $stmt->fetch();

                    "function test(mel, mdp){   // test pour vérifier que le mdp rentrer et le mêm que dans la BDD"

                        require_once('connexion.php');

                        $stmt = $connexion->prepare("SELECT * from utilisateur where mel = :mel ");

                        $stmt->bindValue(':mel', $mel);
                        
                        $stmt->setFetchMode(PDO::FETCH_OBJ);

                        $stmt->execute();
                        
                        $enregistrement = $stmt->fetch()

                        if ($enregistrement->motdepasse == mdp ){
                            return true
                        }

                        return false
                    }

                    

                    if ( test($enregistrement->mel, $mdp) ){

                        echo '<p class="text-center">"'.$enregistrement->nom.'"."'.$enregistrement->prenom.'"</p>

                    }

                }
                ?>
                
