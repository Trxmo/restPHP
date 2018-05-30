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
    <h2 align="center">Lista Esercenti</h2>

    <table border="1" align="center" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
        <tr>
            <th class="mdl-data-table__cell--non-numeric">ID</th>
            <th>Email</th> 
            <th>Password</th>
            <th>Nome</th>
        </tr>
        <tbody>
            <?php while($row = mysqli_fetch_array($variabile)) {
                ?>
                <tr>
                    <td><?php echo $row['id_amministratore']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['password']?></td>
                    <td><?php echo $row['nome']?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <h3 align="center">Aggiungi Esercente</h3>
    <form method="post">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="number" name="id" class="mdl-textfield__input" id="id" required>
            <label class="mdl-textfield__label" for="id">ID Esercente</label>
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
            <input type="text" name="nome" class="mdl-textfield__input" id="nome" required>
            <label class="mdl-textfield__label" for="email">Nome</label>
        </div>
        <!-- <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text" name="percorso_logo" class="mdl-textfield__input" id="perc" required>
            <label class="mdl-textfield__label" for="perc">Percorso logo</label>
        </div>
        Permesso Lettura:<br>
        <input type="radio" name="permesso_lettura" value="0" required>0<br>
        <input type="radio" name="permesso_lettura" value="1" required>1<br>
        Permesso Scrittura:<br>
        <input type="radio" name="permesso_scrittura" value="0" required>0<br>
        <input type="radio" name="permesso_scrittura" value="1" required>1<br>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="number" name="token" class="mdl-textfield__input" id="token" required>
            <label class="mdl-textfield__label" for="token">Token</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="number" name="id_quest" class="mdl-textfield__input" id="quest" required>
            <label class="mdl-textfield__label" for="quest">ID Questionario</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input type="text" name="data" class="mdl-textfield__input" id="data" required>
            <label class="mdl-textfield__label" for="data">Data</label>
        </div> -->
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
    $names = false;
    if(isset($_POST['nome'])){
        $names = $_POST['nome'];
    } 
    // $percLogo = false;
    // if(isset($_POST['percorso_logo'])){
    //     $percLogo = $_POST['percorso_logo'];
    // } 
    // $lett = false;
    // if(isset($_POST['permesso_lettura'])){
    //     $lett = $_POST['permesso_lettura'];
    // } 
    // $scrit = false;
    // if(isset($_POST['permesso_scrittura'])){
    //     $scrit = $_POST['permesso_scrittura'];
    // } 
    // $tokenn = false;
    // if(isset($_POST['token'])){
    //     $tokenn = ($_POST['token'] != '') ? $_POST['token'] : NULL;;
    // } 
    // $idquestt = false;
    // if(isset($_POST['id_quest'])){
    //     $id_quest = ($_POST['id_quest'] != '') ? $_POST['id_quest'] : NULL;
    // } 
    // $dataQ = false;
    // if(isset($_POST['data'])){
    //     $dataQ = ($_POST['data'] != '') ? $_POST['data'] : NULL;;
    // } 


    // $id_amm = $_POST["id"];
    // $emails = $_POST["email"];
    // $pass = $_POST["password"];
    // $fname = $_POST["nome"];
    // $percLogo = $_POST["percorso_logo"];
    // $lett = $_POST["permesso_lettura"];
    // $scritt = $_POST["permesso_scrittura"];
    // $tokenn = ($_POST["token"] != '') ? $_POST["token"] : NULL;
    // $id_ques = ($_POST["id_quest"] != '') ? $_POST["id_quest"] : NULL;
    // $dataQ = ($_POST["data"] != '') ? $_POST["data"] : NULL;

    $sa = '';
    $ls = '1';
    $null = NULL;

    $stmt = $dtb->prepare("INSERT INTO amministratore (id_amministratore, email, password, nome, percorso_logo, lettura, scrittura, token, id_questionario_qrcode, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssiiiis", $idname, $emails, $pass, $names, $sa, $ls, $ls, $null, $null, $null);
    $stmt->execute();
    ?>
</body>
</html> 
<?php  }?>