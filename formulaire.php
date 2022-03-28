<?php include('dbhandler.php'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inscription</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="formulaire.css" rel="stylesheet" type="text/css" media="all" />
        <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    </head>
    <body>
        <div class="main-w3layouts wrapper">
            <h1>Inscription</h1>
            <div class="main-agileinfo">
                <div class="agileits-top">
                    <form action="#" method="post">
                        <input class="text" type="text" name="Username" placeholder="Username" required="">
					    <input class="text email" type="email" name="email" placeholder="Email" required="">
					    <input class="text" type="password" name="password" placeholder="Password" required="">
                        <!-- <input class="text genre" type="femme/homme" name="sexe" placeholder="M/F" required=""> -->
                        <select class="form-select" type="text" name="sexe2" aria-label="Default select example">
                            <option class="optcolor" value="M">Homme</option>
                            <option class="optcolor" value="F">Femme</option>
                        </select>
                        <input class="text" type="date_de_naissance" name="date_de_naissance" placeholder="Date de naissance" required="">
                        <div class="wthree-text">
                            <label class="anim">
                                <input type="checkbox" class="checkbox" required="">
							    <span>J'accepte les condition générales d'utilisations</span>
                            </label>
                            <div class="clear"> </div>
                        </div>
                        <input type="submit" value="S'INSCRIRE">
                    </form>
                    <p>Vous avez un compte ? <a href="connection.php"> Retour</a></p>
                </div>
            </div>
		    <ul class="colorlib-bubbles">
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
			    <li></li>
		    </ul>
	    </div>
        <?php 
        session_start();
        if(!empty($_SESSION['double']) && empty($error)){
            echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                    <div>
                      L'adresse mail ou le pseudo est deja utilisé par un compte.
                    </div>
                  </div>";
            unset($_SESSION['double']);
          }
        if(empty($_POST['Username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['sexe2']) || empty($_POST['date_de_naissance'])){

        }
        else{
            //CONFIGURE L'INSCRIPTION AVEC LES NOUVELLES DONNEES.
            $user = $_POST['Username'];
            $mail = $_POST['email'];
            $password = $_POST['password'];
            $sexe = $_POST['sexe2'];
            $age = $_POST['date_de_naissance']; 
            if (preg_match("/([0-9]{2})\/([0-9]{2})\/([0-9]{4})/", $age, $matches)) {
                if (!checkdate($matches[2], $matches[1], $matches[3])) {
                    $error = true;
                    //unset($_SESSION['double']);
                    echo"<div class='alert alert-danger d-flex align-items-center' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            <div>
                                La date de naissance ne respect pas la conformité.
                            </div>
                        </div>";
                   
                }
                else{
                    $verif=insertUser($user,$mail,$password,$sexe,$age);
                    if($verif == 1){
                        unset($_SESSION['error']);
                        unset($_SESSION['double']);
                        $_SESSION['verif'] = "La creation de compte a était reussis !";
                        header('Location: connection.php');
                    }
                    elseif($verif==2){
                       
                        $_SESSION['double'] = "Email ou User deja existant dans la base de données";
                        header('Location: formulaire.php');
                    }
                }
            }
            else{
                $error = true;
                echo"<div class='alert alert-danger d-flex align-items-center' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                            <div>
                                La date de naissance ne respect pas la conformité.
                            </div>
                        </div>";
                
            }
        }
        ?>
    </body>
</html>