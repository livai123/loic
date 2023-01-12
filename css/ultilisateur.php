<?php
// Connexion à la base de données
$db = mysqli_connect('localhost', 'username', 'password', 'project');

// Vérifier la connexion
if (!$db) {
    die("Erreur de connexion : " . mysqli_connect_error());
}
echo "Connexion réussie";

// Créer un nouvel utilisateur
function create_user($username, $password) {
  global $db;
  $password = password_hash($password, PASSWORD_DEFAULT); // Hash le mot de passe avant de l'enregistrer dans la base de données
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  mysqli_query($db, $sql);
}

// Ajouter un utilisateur existant à la base de données
function add_user($username, $password) {
  global $db;
  $password = password_hash($password, PASSWORD_DEFAULT); // Hash le mot de passe avant de l'enregistrer dans la base de données
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
  mysqli_query($db, $sql);
}

?>
