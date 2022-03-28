<?php
session_start();
include("dbhandler.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </head>
  <body>
    <?php
      include("menu.php");
      if(!empty($_SESSION['newemail'])){
        echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
        <div>
          <span class='fw-bold'>Modification de l'adresse mail réussi avec succés </span>
        </div>
      </div>";
      }
      if(!empty($_SESSION['emptymail'])){
        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div>
                  Vous n'avez rentrer aucune adresse mail.
                </div>
              </div>";
      }
      if(!empty($_SESSION['usemail'])){
        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
                <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                <div>
                  L'adresse est deja associé a un compte.
                </div>
              </div>";
      }
    ?>
    
    <div class="container-fluid">
      <div class="card">
        <div class="card-header border-0">
          <div class="d-flex justify-content-between">
            <h5 class="card-title"><i class="fa fa-cog"></i> Paramètres généraux</h5>
          </div>
        </div>
        <div class="card-body">
          <form action="updateEmail.php" method='post'>
            <h5>Informations de connexion</h5>
            <hr>
            <div class="form-group row">
              <div class="col-md-12">
                <label for="email">Adresse e-mail</label>
                <?php echo "<input class='form-control' id='email' type='email' name ='newemail' placeholder='".$_SESSION['login']."'>" ?>
                <small id="helpfrequenceInter" class="form-text text-muted">Votre e-mail pour la connexion au compte</small>
              </div>
            </div>
            <br> 
            <button type="submit" class="btn btn-success btn-block">Valider</button>
            <hr>
          </form>
          <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-warning btn block " data-bs-toggle="modal" data-bs-target=#exampleModal1>Suppresion du compte</button> 
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL VALIDATION SECONDAIRE POUR SUPPRIMER LE COMPTE -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Etes vous sur de supprimer votre compte ?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Cette action seras definitive, il n'y auras pas de retour en arriere
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger"><a href="supprcompte.php">Supprimer</a></button>
          </div>
        </div>
      </div>
    </div>
    <!-- MODAL VALIDATION SECONDAIRE POUR SUPPRIMER LE COMPTE -->
  </body>
  <!-- SCRIPT EXECUTANT AU CLIQUE LA SUPPRESION DU COMPTE -->
  <script>
    const suppr = document.getElementById('suppr');
    var variableRecuperee = <?php echo json_encode($_SESSION['login']); ?>;
    function clicked(){
      
      console.log(variableRecuperee);   
      console.log('Jai clique');
    }
  </script>
</html>