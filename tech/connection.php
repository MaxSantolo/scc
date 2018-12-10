<?php

date_default_timezone_set('Europe/Rome');

$servername_prod = '192.168.1.10';
$username_prod = 'root';
$password_prod = 'fm105pick';
$db_prod1 = 'cespiti';

// creo connessione
$conn_prod_cespiti = new mysqli($servername_prod,$username_prod,$password_prod,$db_prod1); //produzione.cespiti

// controllo connessioni
if ($conn_prod_cespiti->connect_error) { die("Errore connessione Produzione, Cespiti: " . $conn->connect_error); } 




?>