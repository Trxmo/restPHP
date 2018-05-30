<?php
function redirect()
{
  header('Location: dashboardApertamente.php');
  exit();
}

?>

<!--Inizio header-->

<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../../res/ico.png">

  <!-- Material Design Lite -->
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Material Design icon font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Chart.js references -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>

  <!-- Link al file CSS -->
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-blue.min.css"/>
  <link rel="stylesheet" type="text/css" href="../styleClass.css">

  <!-- Link al file JS -->
  <script src="../js/classi.js"></script>
  <script src="../js/funzioni.js"></script>


  <title><?php echo "Dashboard Apertamente" ?></title>

</head>
<body>
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
      <div class="mdl-layout__header-row header-style">
        <!-- Assegnazione titolo dinamica -->
        <span class="mdl-layout-title"><?php echo "Dashboard Apertamente" ?></span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" onclick="location.href='dashboardApertamente.php'">
            <button id="bt1" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">dashboard</i>
            </button>
            <div class="mdl-tooltip" data-mdl-for="bt1">
              Dashboard
            </div>
          </a>
          <!--creo un campo hidden per comunicare al js il percorso relativo-->
          <input type="hidden" id="url" value="<?php echo BASE_URL ?>">

          <a class="mdl-navigation__link" onclick="logOut()">
            <button id="bt2" class="mdl-button mdl-js-button mdl-button--icon">
              <i class="material-icons">exit_to_app</i>
            </button>
            <div class="mdl-tooltip" data-mdl-for="bt2">
              Logout
            </div>
          </a>
        </nav>
      </div>
    </header>
    <div class="mdl-layout__drawer">
      <div class="nav-md">
        <span class="mdl-layout-title"><!--Apertamente--></span>
      </div>
      <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="esercenti.php"><i class="material-icons md-ip">list</i> Lista
          esercenti</a>
          <a class="mdl-navigation__link" href="utenti.php"><i class="material-icons md-ip">person_add</i>
            Lista Utenti</a>
            <a class="mdl-navigation__link" href="questionari.php"><i
              class="material-icons md-ip">library_add</i>
              Lista Questionari</a>
            </nav>
          </div>
          <main class="mdl-layout__content">
            <div class="page-content">

              <!--Fine header-->
