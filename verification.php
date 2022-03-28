<?php
include('dbhandler.php');
//On va tester si le mots de passe et l'identifiant sont dans la base de données.
//Grâce a la fonction userid.
$response = userid($_POST['email'],$_POST['password']);
switch ($response) {
    case '1':
        //On ouvre la session
        session_start();
        //On enregistre le login en session
        $_SESSION['login'] = $_POST['email'];
        //Connexion redirection sur la page d'accueil.
        header('Location: index.php');//Connexion reussie.
        break;
    case '0':
        session_start();
        $_SESSION['error'] = 'Email ou mot de passe incorrect';
        echo "Email incorrect";
        header('Location: connection.php');
}
?>