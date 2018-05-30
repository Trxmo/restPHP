<?php
function stampaSingola($titolo, $risposte, $index)
{
    echo '<br>s<div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">' . $titolo . '</h2>
      </div>
      <div class="mdl-card__supporting-text">
        <ul class="demo-list-control mdl-list">';
    $s = 0;
    foreach ($risposte as $opzione) {
        echo '<li class="mdl-list__item">
          <span class="mdl-list__item-secondary-action">
              <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="domanda' . $index . "opzione" . $s . '">
              <input type="checkbox" id="domanda' . $index . "opzione" . $s . '" class="mdl-checkbox__input" checked />
            </label>
          </span>
          <span class="mdl-list__item-primary-content">' . $opzione['testo_risposta'] . "</span></li>";
        $s++;
    }
    echo '</ul></div></div>';
}

function stampaMultipla($titolo, $risposte, $index)
{
    echo '<br><div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">' . $titolo . '</h2>
      </div>
      <div class="mdl-card__supporting-text">
        <ul class="demo-list-control mdl-list">';
    $s = 0;
    foreach ($risposte as $opzione) {
        echo '<li class="mdl-list__item">
          <span class="mdl-list__item-secondary-action">
              <label class="demo-list-radio mdl-radio mdl-js-radio mdl-js-ripple-effect" for="domanda' . $index . "opzione" . $s . '">
              <input type="radio" id="domanda' . $index . "opzione" . $s . '"class="mdl-radio__button" name="options" value="1" />
            </label>
          </span>
          <span class="mdl-list__item-primary-content">' . $opzione['testo_risposta'] . "</span></li>";
        $s++;
    }
    echo '</ul></div></div>';
}

function stampaAperta($titolo, $index)
{
    echo '<br><div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">' . $titolo . '</h2>
      </div>
      <div class="mdl-card__supporting-text">
      <div class="mdl-textfield mdl-js-textfield">
        <textarea class="mdl-textfield__input" type="text" rows= "3" id="domanda' . $index . '" ></textarea>
        <label class="mdl-textfield__label" for="domanda' . $index . '">Risposta ...</label>
      </div>
      </div></div>';
}

function stampaSlider($titolo, $index)
{
    echo '<br><div class="demo-card-wide mdl-card mdl-shadow--2dp">
      <div class="mdl-card__title">
          <h2 class="mdl-card__title-text">' . $titolo . '</h2>
      </div>
      <div class="mdl-card__supporting-text">
      <input class="mdl-slider mdl-js-slider" type="range" min="0" max="100" value="0" tabindex="0">
      </div></div>';
}

include("../auth.php");

if (!isset($_GET['id'])) {
    header('Location: dashboardApertamente.php');
    exit();
}

$nomesito = "Visualizza questionario N. " . $_GET['id'];

//leggiamo il valore del questionario
$_COOKIE['id_questionario'] = $_GET['id'];
ob_start();
require('../backEnd_json/ottieni_questionario_da_id.php');
$json = ob_get_clean();
$dati = json_decode($json, true);

include("header.php");
?>

<!--Inizio visualizzaQuestionario-->

<style>
    .demo-card-wide.mdl-card {
        margin-top: 30px;
        position: relative;
    }

    .demo-card-wide > .mdl-card__title {
        color: #fff;
        background-color: rgb(63, 81, 181);
    }

</style>
<center>
    <div class="demo-card-wide mdl-card mdl-shadow--2dp">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Informazioni generali</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <ul class="demo-list-icon mdl-list">
                <li class="mdl-list__item">
          <span class="mdl-list__item-primary-content">
            <i class="material-icons mdl-list__item-icon">title</i>
              <?php echo "Titolo : " . $dati['nome']; ?>
            </span>
                </li>
                <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">timer</i>
                <?php echo "Tempo minimo : " . $dati['tempo_minimo'] . " secondi"; ?>
            </span>
                </li>
                <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">timer_off</i>
                <?php echo "Tempo massimo : " . $dati['tempo_massimo'] . " secondi"; ?>
            </span>
                </li>
                <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">info</i>
                <?php echo "Punti : " . $dati['punti'] . " punti"; ?>
            </span>
                </li>
                <li class="mdl-list__item">
            <span class="mdl-list__item-primary-content">
              <i class="material-icons mdl-list__item-icon">account_circle</i>
                <?php echo "Esercente : " . $dati['nome_esercente']; ?>
            </span>
                </li>
            </ul>
        </div>
    </div>
    <div id="domande">
        <?php
        $i = 0;
        foreach ($dati['domande'] as $d) {
            switch ($d['tipo_domanda']) {
                case 'singola':
                    {
                        stampaSingola($d['testo_domanda'], $d['risposte'], $i);
                        break;
                    }
                case 'multipla':
                    {
                        stampaMultipla($d['testo_domanda'], $d['risposte'], $i);
                        break;
                    }
                case 'slider':
                    {
                        stampaSlider($d['testo_domanda'], $i);
                        break;
                    }
                case 'aperta':
                    {
                        stampaAperta($d['testo_domanda'], $i);
                        break;
                    }
            }
            $i++;
        }
        ?>
        <br><br>
    </div>
    </div>
</center>

<!--Fine visualizzaQuestionario-->

<?php
include("footer.php");
?>
