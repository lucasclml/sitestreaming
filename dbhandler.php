<?php
//Ici on retrouveras toutes les fonctionnalités liées a la base de données, insert delete,etc..
function connect(){
    $server = 'localhost';
    $username='root';
    $password='';
    //On etablit la connexion 
    try{
        $conn = new PDO("mysql:host=$server;dbname=application", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return($conn);
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
}
//Verifier si un utilisateur est dans la base de données grâce au mail et au mot de passe.
function userid($mail,$password){
    $link = connect();
    $requete = "SELECT email,password FROM utilisateurs WHERE email = '".$mail."'";
    $stmt = $link->prepare($requete);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result['password'] == $password){
            return(1);
        }
        else{
            return(0);//MDP INCORRECT
        }
    }
    else{
        return(0);//MAIL INCORRECT
    }
}
//Validation de son inscription creation un utilisateur dans la base de données.
//Verifier si l'email n'est pas deja enregistrer ou le pseudo.
function insertUser($user,$mail,$password,$sexe,$age){
    $link = connect();
    if(searchUser($mail) == 2){
        $requete = "INSERT INTO `utilisateurs`(`email`, `user`, `password`, `genre`, `date_naissance`) VALUES ('".$mail."','".$user."','".$password."','".$sexe."','".$age."')";
        $stmt = $link->prepare($requete);
        if($stmt->execute()){
            return(1);
        }else{
            return(0);
        }
    }
    else{
        return(2);
    }
}
//Recupere la ligne de l'utilisateur rechercher.
function searchUser($mail){
    $link = connect();
    $requete = "SELECT email FROM utilisateurs WHERE email = '".$mail."'";
    $stmt=$link->prepare($requete);
    $stmt->execute();
    if($stmt->rowCount()>0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result['email'] == $mail){
            return(1);//email deja utilisé
        }
    }
    else{
        return(2);
    }

}
//Recuperer toutes la table serie.
function getAllSerie(){
    $link = connect();
    $requete = "SELECT * FROM `serie`";
    $stmt=$link->prepare($requete);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        return(2);
    }
    return $result;
}
//Suppresion d'un utilisateurs
function deleteUser($mail){
    $link = connect();
    $requete = "DELETE FROM `utilisateurs` WHERE email='".$mail."'";
    $stmt = $link->prepare($requete);
    if($stmt->execute()){
        return(1);
    }else{
        return(0);
    }
}
//En construction
function updateUserEmail($mail,$newmail){
    $link = connect();
    if(searchUser($newmail) == 2){
        $requete = "UPDATE `utilisateurs` SET `email`='".$newmail."' WHERE email = '".$mail."'";
        $stmt = $link->prepare($requete);
        if($stmt->execute()){
            return(1);
        }else{
            return(0);
        }
    }
    else{
        return(3);//mail deja existante
    }
    
}
function addNewSerie($nom_serie,$episode,$saison,$etat_serie,$image,$annee_sortie){
    $link = connect();
    $requete= "INSERT INTO `serie`(`nom_serie`, `episode`, `saison`, `etat_serie`, `image`, `annee_sortie`) VALUES ('".$nom_serie."','".$episode."','".$saison."','".$etat_serie."','".$image."','".$annee_sortie."')";
    $stmt = $link->prepare($requete);
    if($stmt->execute()){
        return(1);//Ajout reussis
    }else{
        return(0);//Ajout non réussis.
    }
}
//Permet la deconnexion
function logout(){
    session_start();
    unset($_SESSION['login']);
    unset($_SESSION['verif']);
    session_destroy();
    header('Location: connection.php');
}

?>