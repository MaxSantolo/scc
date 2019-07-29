<?php

include ('connection.php');
require ('fpdf/fpdf.php');


//archivia il cespite e torna a casa
if ($_GET['fx'] == 'archivia') {
    
    $id_c = $_GET['id_c'];
    $id_f = $_GET['id_f'];
    
    $conn_prod_cespiti->query("DELETE FROM cespiti WHERE id_cespite = '".$id_c."'");
    
    header("Location: http://192.168.1.51:90/dettaglio_bolla_fattura.php?id=".$id_f);
    
}

//prepara pdf per stampa e torna a casa

if ($_GET['fx'] == 'stampa_1c') {
    
    $id_c = $_GET['id_c'];
    $id_f = $_GET['id_f'];
    $ancora = $_GET['ancora'];
    $seriale = $_GET['seriale'];
    
    $pdf = new FPDF('P','mm',array(29,35));
    $pdf->SetMargins(3,3);
    $pdf->AddPage();
    $pdf->Image("../QRCODES/".$ancora.".png",3,3);
    $pdf->SetFont('Arial','B',8);
    $pdf->Text(5,28,$seriale);
    $pdf->Output();
    
}

if ($_GET['fx'] == 'stampa_tuttic') {
    
    $id_f = $_GET['id_f'];
    $elencoc = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE id_fattura = '".$id_f."' ORDER BY seriale ASC");
    
    
    
    $pdf = new FPDF('P','mm',array(29,35));
    $pdf->SetMargins(3,3);
    $pdf->SetFont('Arial','B',8);
    
    while ($riga = $elencoc->fetch_assoc()) {
    

    $pdf->AddPage();
    $pdf->Image("../QRCODES/".$riga['ancora'].".png",3,3);
    $pdf->Text(5,28,$riga['seriale']);
    
    
    
    }
    $pdf->Output();
    
}

if ($_GET['fx'] == 'eliminabolfat_old') {

    $id_f = $_GET['id_f'];

    $conta_cespiti = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE id_fattura = '".$id_f."'")->num_rows;

//    echo $id_f."<BR>".$conta_cespiti;

    if ($conta_cespiti == 0) { $conn_prod_cespiti->query("DELETE FROM bolle_fatture WHERE id = '".$id_f."'")   ;  }

    header("Location: http://192.168.1.51:90/bolle_fatture_precedenti.php");
}


if ($_GET['fx'] == 'eliminabolfat') {
    
    $id_f = $_GET['id_f'];
    
    $conta_cespiti = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE id_fattura = '".$id_f."'")->num_rows;
    
//    echo $id_f."<BR>".$conta_cespiti;
    
    if ($conta_cespiti == 0) { $conn_prod_cespiti->query("DELETE FROM bolle_fatture WHERE id = '".$id_f."'")   ;  }
    
    header("Location: http://192.168.1.51:90/bolle_fatture.php");
}

if ($_GET['fx'] == 'salva') {

    $id_c_salvare = $_GET['id_c'];
    $cod_c_assegnare = $_GET['codice_c'];

    $conn_prod_cespiti->query("UPDATE cespiti SET codice = '".$cod_c_assegnare."' WHERE id_cespite ='".$id_c_salvare."'");

    header("Location: http://192.168.1.51:90/libro_cespiti.php");

}

//aggiorna date cespiti e torna a casa
if ($_GET['fx'] == 'aggiorna_date') {

    $id_f = $_GET['id_f'];
    $data = $_GET['data'];

    $conn_prod_cespiti->query("UPDATE cespiti SET data_cespite = '".$data."' WHERE id_fattura = '".$id_f."'");

    header("Location: http://192.168.1.51:90/dettaglio_bolla_fattura.php?id=".$id_f);

}

$conn_prod_cespiti->close();

?>

