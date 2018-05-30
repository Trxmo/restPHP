<?php
//require della connessione

if (!function_exists('getListaEsercenti')){
	function getListaEsercenti(){
    //query
    $datab = require __DIR__ . '/../database/db.php';
	$sql = "SELECT * FROM amministratore";
	$result = mysqli_query($datab,$sql);

    //return del risultato
	return $result;
 }
}

if (!function_exists('getQuestionari')){
function getQuestionari(){
    //query
    $datab = require __DIR__ . '/../database/db.php';
	$sql = "SELECT * FROM questionario";
	$result = mysqli_query($datab,$sql);

    //return del risultato
	return $result;
 }
}

if (!function_exists('getUtenti')){
function getUtenti(){
    //query
    $datab = require __DIR__ . '/../database/db.php';
	$sql = "SELECT * FROM utente";
	$result = mysqli_query($datab,$sql);

    //return del risultato
	return $result;
 }
}

//function doLogin($par){

//}
?>