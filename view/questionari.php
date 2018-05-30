<?php
ob_start();
session_start();
function visualizza($variabile){
    ?>
    <?php require __DIR__ . '/parcials/header.php'; ?>
    <style>
    th, td {
        text-align: center;
    }
    body {
        background-color: rgb(220,220,220);
    }
</style>
<html>
<body>
    <h2 align="center">Lista Questionari</h2>

    <table border="1" align="center">
        <tr>
            <th>ID Questionario</th>
            <th>ID Amministratore</th> 
            <th>Nome</th>
            <th>Punti</th>
            <th>Tempo Minimo</th>
            <th>Tempo Max</th>
            <th>Metodo Invio</th>
            <th>Data Invio</th>
            <th>Pubblico o Privato</th>
        </tr>
        <tbody>
            <?php while($row = mysqli_fetch_array($variabile)) {
                ?>
                <tr>
                    <td><?php echo $row['id_questionario']?></td>
                    <td><?php echo $row['id_amministratore']?></td>
                    <td><?php echo $row['nome']?></td>
                    <td><?php echo $row['punti']?></td>
                    <td><?php echo $row['tempo_min']?></td>
                    <td><?php echo $row['tempo_max']?></td>
                    <td><?php echo $row['metodo_invio']?></td>
                    <td><?php echo $row['data']?></td>
                    <td><?php echo $row['pubblicato']?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    </html> 
    <?php  
}
?>