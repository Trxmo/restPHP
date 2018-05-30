<?php
ob_start();
session_start();
function visualizza($variabile){
    ?>  
    <?php require __DIR__ . '/parcials/header.php'; 
    $dtb = require __DIR__ . '/../database/db.php';?>
    <style>
    th, td {
        text-align: center;
        //creare un questionario plzs
    }
    body {
        background-color: rgb(220,220,220);
    }
    form {
        margin: 0 auto; 
        width:250px;
    }
</style>
<html>
<body>
    <h2 align="center">Lista Utenti</h2>

    <table border="1" align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <tr>
            <th class="mdl-data-table__cell--non-numeric">ID</th>
            <th>Email</th> 
            <th>Password</th>
            <th>Data di Nascita</th>
            <th>Genere</th>
            <th>Comune</th>
            <th>Stato Sentimentale</th>
            <th>Nucleo Familiare</th>
            <th>Punti Accumulati</th>
        </tr>
        <tbody>
            <?php while($row = mysqli_fetch_array($variabile)) {
                ?>
                <tr>
                    <td><?php echo $row['id_utente']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['password']?></td>
                    <td><?php echo $row['data_di_nascita']?></td>
                    <td><?php echo $row['genere']?></td>
                    <td><?php echo $row['comune']?></td>
                    <td><?php echo $row['stato_sentimentale']?></td>
                    <td><?php echo $row['nucleo_familiare']?></td>
                    <td><?php echo $row['punti_accumulati']?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <h3 align="center">Aggiungi Utente</h3>
    <form method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="number" name="id" class="mdl-textfield__input" id="id" required>
            <label class="mdl-textfield__label" for="id">ID Utente</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="email" name="email" class="mdl-textfield__input" id="email" required>
            <label class="mdl-textfield__label" for="email">Email</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="password" name="password" class="mdl-textfield__input" id="password" required>
            <label class="mdl-textfield__label" for="password">Password</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text" name="dateB" class="mdl-textfield__input" id="dateB" required>
            <label class="mdl-textfield__label" for="dateB">Data di Nascita (yyyy-mm-dd)</label>
        </div>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
            <input type="radio" id="option-1" class="mdl-radio__button" name="gender" value="M">
            <span class="mdl-radio__label">Uomo</span>
        </label>
        <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
          <input type="radio" id="option-2" class="mdl-radio__button" name="gender" value="F">
          <span class="mdl-radio__label">Donna</span>
      </label>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input type="text" name="comune" class="mdl-textfield__input" id="comune" required>
        <label class="mdl-textfield__label" for="comune">Comune</label>
    </div>
    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
      <input type="radio" id="option-3" class="mdl-radio__button" name="statoS" value="Single">
      <span class="mdl-radio__label">Single</span>
  </label>
  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
      <input type="radio" id="option-4" class="mdl-radio__button" name="statoS" value="Coniugato">
      <span class="mdl-radio__label">Coniugato</span>
  </label>
  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-5">
      <input type="radio" id="option-5" class="mdl-radio__button" name="statoS" value="Convivente">
      <span class="mdl-radio__label">Convivente</span>
  </label>
  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-6">
      <input type="radio" id="option-6" class="mdl-radio__button" name="statoS" value="Separato">
      <span class="mdl-radio__label">Separato</span>
  </label>
  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-7">
      <input type="radio" id="option-7" class="mdl-radio__button" name="statoS" value="Vedovo">
      <span class="mdl-radio__label">Vedovo</span>
  </label>
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input type="number" name="nFam" class="mdl-textfield__input" id="nFam" required>
    <label class="mdl-textfield__label" for="nFam">Nucleo Familiare</label>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    <input type="number" name="points" class="mdl-textfield__input" id="points" required>
    <label class="mdl-textfield__label" for="points">Punti Accumulati</label>
</div>
<input type="submit" name="Submit" class="mdl-button mdl-button--raised mdl-button--colored">
</form>

<?php

$idname = false;
if(isset($_POST['id'])){
    $idname = $_POST['id'];
} 
$emails = false;
if(isset($_POST['email'])){
    $emails = $_POST['email'];
} 
$pass = false;
if(isset($_POST['password'])){
    $pass = $_POST['password'];
} 
$dataNa = false;
if(isset($_POST['dateB'])){
    $dataNa = $_POST['dateB'];
} 
$genders = false;
if(isset($_POST['gender'])){
    $genders = $_POST['gender'];
} 
$comunes = false;
if(isset($_POST['comune'])){
    $comunes = $_POST['comune'];
} 
$statoS = false;
if(isset($_POST['statoS'])){
    $statoS = $_POST['statoS'];
} 
$nFam = false;
if(isset($_POST['nFam'])){
    $nFam = $_POST['nFam'];
} 
$lastU = NULL;
$points = false;
if(isset($_POST['points'])){
    $points = $_POST['points'];
} 
$adminN = '1';

$stmt = $dtb->prepare("INSERT INTO utente (id_utente, email, password, data_di_nascita, genere, comune, stato_sentimentale, nucleo_familiare, last_update, punti_accumulati, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssssiiii", $idname, $emails, $pass, $dataNa, $genders, $comunes, $statoS, $nFam, $lastU, $points, $adminN);
$stmt->execute();
?>
</body>
</html> 
<?php  }?>