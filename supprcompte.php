<?php 
include('dbhandler.php');
session_start();
echo $_SESSION['login'];
if(deleteUser($_SESSION['login'])==1){
    logout();
}
else{
    echo 'La Suppression mal passé';
}
?>
<!--  dsfsdqfqsfdqsdf -->