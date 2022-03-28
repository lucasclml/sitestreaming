<?php
include('dbhandler.php');
session_start();
echo $_POST['newemail'];
echo $_SESSION['login'];
if(!empty($_POST['newemail'])){
    if(updateUserEmail($_SESSION['login'],$_POST['newemail'])== 1){
        $_SESSION['login']=$_POST['newemail'];
        unset($_SESSION['emptymail']);
        unset($_SESSION['usemail']);
        $_SESSION['newemail'] = 'Le changement de mail a réussis avec succés';
        header('Location: parametre.php');
    }
    else{
        $_SESSION['usemail'] = "L'email est deja utilisé";
        unset($_SESSION['emptymail']);
        unset($_SESSION['newemail']);
        header("Location: parametre.php");
    }
}
else{
    $_SESSION['emptymail'] = "Vous n'avez pas rentrer d'adresse mail !";
    unset($_SESSION['newemail']);
    unset($_SESSION['usemail']);
    header('Location: parametre.php');
}
?>