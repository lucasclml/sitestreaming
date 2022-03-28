<?php
include("dbhandler.php");
session_start();
if(empty($_SESSION['login'])){
    header('Location: connection.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="index.css" rel="stylesheet" type="text/css" media="all" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include("menu.php");?>
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalserie">
                Ajout de serie
            </button>
        </div>
        <!-- TESSSSSSSSSSSSSSSSSSST -->
        <?php 
        $result=getAllSerie();
        if($result == 2){
            echo 'Sa na pas marche';
        }
        //var_dump($result)."<br>";
        //echo count($result)
        echo "
            <section class='wrapper'>
                <div class='container'>
                    <div class='row'>";
                        foreach ($result as $key => $value) {
                            echo "
                                <div class='col-md-4'>
                                    <div class='card text-white card-has-bg click-col' style="."background-image:url('".$value['image']."');".">
                                        <img class='card-img d-none' src='".$value['image']."' alt='Stranger Things'>
                                        <div class='card-img-overlay d-flex flex-column'>
                                            <div class='card-body'>
                                                <small class='card-meta mb-2'>NEW SAISON</small>
                                                <h4 class='card-title mt-0 '><a class='text-white' herf='#'>".$value['nom_serie']."</a></h4>
                                                <small><i class='far fa-clock'></i> Annee de sortie : ".$value['annee_sortie']."</small><br>
                                                <small><i class='far fa-clock'></i> ".$value['saison']." saisons disponibles</small><br>
                                                <small><i class='far fa-clock'></i> ".$value['episode']." épisodes</small>
                                            </div>
                                            <!-- <div class='card-footer'></div> -->
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    echo "</div>
                </div>
            </section>"
        ?>
        <!-- TESSSSSSSSSSSSSSSSSSST -->
        <!-- Boutton pour ajouter une nouvelle serie -->

        <!-- MODAL POUR AJOUT DUNE SERIE -->
        <div class="modal fade" id="Modalserie" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajoutez votre serie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <h1>Description</h1>
                            <form enctype="multipart/form-data" action="upload.php" method='post'>
                                <fieldset>
                                    <legend>Informations sur la serie</legend>
                                    <hr>
                                    <div class="form-group">
                                        <label for="nom">Entrez le nom de la serie :</label>
                                        <input type="text" class="form-control" name='nom_serie' id="nom" placeholder="Nom de la serie">
                                    </div>
                                    <hr>
                                    <label for="episode">Nombre d'episode(s) :</label>
                                    <input type="number" id="episode" name="nbepisode" min="1" max="100">
                                    <hr>
                                    <label for="saison">Nombre de saison(s) :</label>
                                    <input type="number" id="saison" name="nbsaison" min="1" max="100">
                                    <hr>
                                    <div class="input-group mb-3">
                                        <input type="file" name="maphoto" id="maphoto" class="form-control" id="inputGroupFile02">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="nom">Date de sortie :</label>
                                        <input type="text" class="form-control" name='date_sortie' id="nom" placeholder="Date de sortie">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="nom">Etat de la serie :</label>
                                        <input type="text" class="form-control" name='etat_serie' id="nom" placeholder="Nom de la serie">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="bio">Biographie :</label>
                                        <textarea class="form-control" id="bio" rows="3"></textarea>
                                    </div> -->
                                </fieldset>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
