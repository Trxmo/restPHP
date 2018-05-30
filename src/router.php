<?php
require __DIR__ . '/../model/object.php';
//-----------------------------------------Functions to define method behavior---------------------------------//
function get($uri){
    require __DIR__ . '/../model/object.php';
    $headers = apache_request_headers();
    switch ($uri) {
        case '/':
        index($headers);
        break;

        case '/qualcosa.php':
        getQualcosa($headers);
        break;

        case '/questionari.php':
        getQuestionariQ($headers);
        break;

        case '/esercenti.php':
        getEsercentiQ($headers);
        break;

        case '/utenti.php':
        getUtentiQ($headers);
        break;

        case '/dashboardApertamente.php':
        getDashboard($headers);
        break;

        case '/esercenti.php':
        getEsercentiQ($headers);
        break;
        
        default:
        notFound();
        break;
    }
}

function post($uri){
    $headers = apache_request_headers();
    switch ($uri) {
        case '/qualcosa.php':
        postQualcosa($headers);
        break;

        case '/esercenti.php':
        postEsercenti($headers);
        break;

        case '/utenti.php':
        postUtenti($headers);
        break;
        
        default:
        notFound();
        break;
    }
}

function notFound(){
    http_response_code(404);
    echo "404 Classico Not Found";
}

function badRequest(){
    http_response_code(400);
    echo "Method not implemented";
}

//-----------------------------------------Functions to get the work done---------------------------------//

function getQualcosa($headers){

    require __DIR__ . '/../model/object.php';

    $r = getQuestionari(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/qualcosa.php';
        visualizza($r);
    } else{
        echo "Errore 404: Pagina non trovata";
    }
}

function getQuestionariQ($headers){

    require __DIR__ . '/../model/object.php';

    $r = getQuestionari(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/questionari.php';
        visualizza($r);
    } else{
        echo "Errore 404: Pagina non trovata";
    }
}

    function getEsercentiQ($headers){

        require __DIR__ . '/../model/object.php';

    $r = getListaEsercenti(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/esercenti.php';
        visualizza($r);
    }else{
        echo "Errore 404: Pagina non trovata";
    }
}

function getUtentiQ($headers){

    require __DIR__ . '/../model/object.php';

    $r = getUtenti(); //Risultato della query
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/utenti.php';
        visualizza($r);
    } else{
        echo "Errore 404: Pagina non trovata";
    }
}

function getDashboard($headers){
    require __DIR__ . '/../model/object.php';

    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/dashboardApertamente.php';
    } else{
        echo "Errore 404: Pagina non trovata";
    }
}

function postQualcosa($headers){
    var_dump($_POST);
    //Qui faccio qualcosa con il coso del post
    return "Bella Fra";
}

function login(){
    require __DIR__ . '/../model/object.php';
    //controlli sulla post

  //  doLogin($POST);

}

function index($headers){
    require __DIR__ . '/../model/object.php';

    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/dashboardApertamente.php';
    } else{
        echo "Errore 404: Pagina non trovata";
    }
}

function postEsercenti($headers){
    require __DIR__ . '/../model/object.php';

    $r = getListaEsercenti();
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/esercenti.php';
        visualizza($r);
    } else{
        echo "Errore 404: Pagina non trovata";
    }
}

function postUtenti($headers){
    require __DIR__ . '/../model/object.php';

    $r = getUtenti();
    if(strpos($headers["Accept"], 'html') !== false){
        require __DIR__ . '/../view/utenti.php';
        visualizza($r);
    } else{
        echo "Errore 404: Pagina non trovata";
    } 
}
?>