<?php
echo "
<nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='#'>TEAM1</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link' href='parametre.php'>Parametre</a>
        </li>
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
            Dropdown
          </a>
          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
            <li><a class='dropdown-item' href='parametre.php'>Serie en cours</a></li>
            <li><a class='dropdown-item' href='index.php'>Serie Disponible</a></li>
            <li><a class='dropdown-item' href='#'>Something else here</a></li>
          </ul>
        </li>
        <li class='nav-item'>
          <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Disabled</a>
        </li>
      </ul>
      <form class='d-flex'>
        <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search'>
        <button class='btn btn-outline-success' type='submit'>Search</button>
        <button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>
          Deconnexion
        </button>
      </form>
    </div>
  </div>
</nav>
";
echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <div class='modal-header'>
                <h5 class='modal-title' id='exampleModalLabel'>Êtes vous sur de vouloir vous deconnecté ?</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                Voulez-vous vous deconnecté ?
            </div>
            <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                <button type='button' class='btn btn-danger'> <a href='logout.php'>Deconnexion</a></button>
            </div>
        </div>
    </div>
</div>
";?>
