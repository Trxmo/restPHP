<?php
include("../auth.php");

if (!isset($_GET['id'])) {
    header('Location: dashboardApertamente.php');
    exit();
}
$_COOKIE['id_amministratore'] = $_GET['id'];
ob_start();
require '../backEnd_json/ottieni_esercente_da_id.php';
$output = ob_get_clean();
$esercente = json_decode($output, true);
function ottieniImmagine($percorso)
{
    $array = explode("/", $percorso);
    return "proxyImage.php?pic=" . $array[3];
}

$nomesito = "Modifica " . $esercente['nome'];
include("header.php");
?>

<!--Inizio modificaEsercente-->

<style>

    .demo-card-wide.mdl-card {
        width: 650px;
    }

    .mdl-button {
        color: white;
        font-size: 18px;
        text-align: center;
        line-height: 36px;
    }

    #topcard {
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    #nomees {
        padding: 20px 0 0 0;
    }

    #labnome.mdl-textfield__label{
        font-size: 24px;
    }

    #nomees.mdl-textfield--floating-label.is-focused .mdl-textfield__label, #nomees.mdl-textfield--floating-label.is-dirty .mdl-textfield__label, #nomees.mdl-textfield--floating-label.has-placeholder .mdl-textfield__label {
        font-size: 14px;
    }

    #nome {
        font-size: 24px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
    }

    #labnome {
        color: white;
    }

    #labnome::after {
        bottom: 0;
        background-color: white;
    }

</style>

<!--da fixare per modEsScript-->
<script>
<?php
  echo "var esercenteNonModificatoJSON = '".$output."';";
?>
//non spostare la funzione nell'altro file (per ora)
function modificaEsercente()
{
    alert(getFileName()+getEmail()+getNome());
    if (esercenteNonModificato.email != getEmail()) {
        esercenteNonModificato.email = getEmail();
    }
    if (esercenteNonModificato.nome != getNome()) {
        esercenteNonModificato.nome = getNome();
    }
    if (getFileName() != "/var/uploads") //ho cambiato il file, devo ricaricare l'immagine
    {
        uploadFile();
    }
    esercenteNonModificato.esercizi = getPuntiVendita(); //modifico sempre la lista esercenti per comodità
    var json = JSON.stringify(esercenteNonModificato);
    alert(json);
    $.ajax({
        //imposto il tipo di invio dati (GET O POST)
        type: "POST",
        //Dove devo inviare i dati recuperati dal form?
        url: "../backEnd_json/modifica_esercente.php",
        //Quali dati devo inviare?
        data: "esercente=" + json + "&id_amministratore=<?php echo $_GET['id']?>",
        dataType: "html",
        success: function (msg) {
            if (msg != "errore") {
                messaggio("Modifiche apportate correttamente" + msg);
            }
            else {
                messaggio("Errore, le modifiche non possono essere salvate" + msg);
            }

            // messaggio di avvenuta aggiunta valori al db (preso dal file risultato_aggiunta.php) potete impostare anche un alert("Aggiunto, grazie!");
        },
        error: function () {
            messaggio("Errore, impossibile interrogare la pagina"); //sempre meglio impostare una callback in caso di fallimento
        }
    });
}
</script>
<script type="text/javascript" src="../js/modEsScript.js"></script>

<div class="demo-card-wide mdl-card mdl-shadow--2dp">


    <div id="topcard" class="mdl-card__title" style="height: 200px">
        <h2 class="mdl-card__title-text" style="width: 100%;">
            <div id="nomees" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <?php echo '<input id="nome" class="mdl-textfield__input" value="' . $esercente['nome'] . '"> '; ?>
                <label id="labnome" class="mdl-textfield__label" for="nome">Nome Azienda</label>
            </div>
        </h2>
    </div>

    <div class="mdl-card__supporting-text">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <?php echo '<input id="email" class="mdl-textfield__input" type="email" value="' . $esercente['email'] . '"> '; ?>
            <label class="mdl-textfield__label" for="email">Email</label>
        </div>
        <input type="file" id="file" onchange="uploadImg()" accept=".jpg, .jpeg, .png" style="display: none;">
        <label for="file" id="uploadfile"
               class="pr mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
            <i class="material-icons">file_upload</i>
        </label>
        <div class="mdl-tooltip" for="uploadfile">
            Seleziona un'immagine da assegnare
        </div>
    </div>

    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Punti vendita</h2>
    </div>

    <div class="mdl-card__supporting-text">
        <ul id="unli" class="demo-list-control mdl-list ftm">
            <?php
            $indice = 0;
            foreach ($esercente['esercizi'] as $puntoVendita) {
                echo '<li class="mdl-list__item ftm">
                                  <span class="mdl-list__item-primary-content spc">
                                  <div class="mdl-textfield mdl-js-textfield">
                                  <input class="mdl-textfield__input puntoVendita" value="' . $puntoVendita . '" type="text" id="puntovendita' . $indice . '">
                                  <label class="mdl-textfield__label" for="puntovendita' . $indice . '">d</label>
                                  </div>
                                  </span>';
                if ($indice != 0) {
                    echo '<a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                   onclick="cancellaOpzione(this)">
                    <i class="material-icons gr">delete</i>
                        </a>';
                } else {
                    echo '<a class="mdl-list__item-secondary-action mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                   onclick="cancellaOpzione(this)">
                    <i class="material-icons gr">delete</i>
                        </a>';
                }
                echo '</li>';

                $indice++;
            } ?>
        </ul>

        <button id="addopt"
                class="pr mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
                onclick="aggiungiOpzione(this)">
            <i class="material-icons">add</i>
        </button>
        <div class="mdl-tooltip" for="addopt">
            Aggiungi punto vendita
        </div>

    </div>

    <!--    Bottone salva modifiche esercente-->

    <div class="mdl-card__title">
        <button id="demo-show-toast" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="margin: auto;"
                onclick="modificaEsercente()">
            Salva Modifiche
        </button>
    </div>
</div>
<div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button class="mdl-snackbar__action" type="button"></button>
</div>
<!--Fine modificaEsercente-->

<?php
include("footer.php");
?>
