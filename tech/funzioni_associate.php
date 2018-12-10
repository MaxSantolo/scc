<?php

function genera_lista_codici($valore) {
    
    include 'tech\connection.php';
    
    $elencocategorie = $conn_prod_cespiti->query("SELECT * FROM categorie_cespiti ORDER BY descrizione");




        while ($riga = $elencocategorie->fetch_assoc()) {

                unset($codice, $descrizione);
                $codice = $riga['codice'];
                $descrizione = $riga['descrizione'];


            if ($valore == $riga['codice']) {
                $stringa = $stringa . "<option value='" . $codice . "' selected>" . $descrizione . "</option>";
            } else { $stringa = $stringa . "<option value='" . $codice . "'>" . $descrizione . "</option>"; }

        }

    return $stringa;
    $conn_prod_cespiti->close();

}



?>

