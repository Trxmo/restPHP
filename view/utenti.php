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

    <table border="1" align="center">
        <tr>
            <th>ID</th>
            <th>Email</th> 
            <th>Password</th>
            <th>Data di Nascita</th>
            <th>Genere</th>
            <th>Comune</th>
            <th>Stato Sentimentale</th>
            <th>Nucleo Familiare</th>
            <th>Last Update</th>
            <th>Punti Accumulati</th>
            <th>Admin</th>
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
                    <td><?php echo $row['last_update']?></td>
                    <td><?php echo $row['punti_accumulati']?></td>
                    <td><?php echo $row['admin']?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <h3 align="center">Aggiungi Utente</h3>
    <form method="post">
        ID:<br>
        <input type="number" name="id" required><br>
        Email:<br>
        <input type="email" name="email" required><br>
        Password:<br>
        <input type="password" name="password" required><br>
        Data di Nascita (yyyy-mm-dd):<br>
        <input type="text" name="dateB" required><br>
        Genere:<br>
        <input type="radio" name="gender" value="M" required>M<br>
        <input type="radio" name="gender" value="F" required>F<br>
        Comune:<br>
        <input type="text" name="comune" required><br>
        Stato sentimentale:<br>
        <input type="radio" name="statoS" value="Single" required>Single<br>
        <input type="radio" name="statoS" value="Coniugato" required>Coniugato<br>
        <input type="radio" name="statoS" value="Convivente" required>Convivente<br>
        <input type="radio" name="statoS" value="Separato" required>Separato<br>
        <input type="radio" name="statoS" value="Vedovo" required>Vedovo<br>
        Nucleo familiare:<br>
        <input type="number" name="nFam" required><br>
        Last Update:<br>
        <input type="number" name="lastU"><br>
        Punti accumulati:<br>
        <input type="number" name="points"><br>
        Admin:<br>
        <input type="radio" name="admin" value="0" required>0<br>
        <input type="radio" name="admin" value="1" required>1<br><br>
        <input type="submit" name="Submit">
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
    $lastU = false;
    if(isset($_POST['lastU'])){
        $lastU = ($_POST['lastU'] != '') ? $_POST['lastU'] : NULL;
    } 
    $points = false;
    if(isset($_POST['points'])){
        $points = $_POST['points'];
    } 
    $adminN = false;
    if(isset($_POST['admin'])){
        $adminN = $_POST['admin'];
    } 

    $stmt = $dtb->prepare("INSERT INTO utente (id_utente, email, password, data_di_nascita, genere, comune, stato_sentimentale, nucleo_familiare, last_update, punti_accumulati, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssiiii", $idname, $emails, $pass, $dataNa, $genders, $comunes, $statoS, $nFam, $lastU, $points, $adminN);
    $stmt->execute();
    if($stmt)
    {
        echo "The record has been successfully inserted in the database!";
    }
    else
    {
        echo "Something went wrong: your record wasn't added in the database";
    }
    ?>
</body>
</html> 
<?php  }?>