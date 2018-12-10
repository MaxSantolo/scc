

<?php

include ('tech/connection.php');





$id = $_GET['id'] ;

$bfdet_cur = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture_current WHERE id = '".$id."'");
$bfdet_old = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE id = '".$id."'");

if ($bfdet_cur->num_rows == '0') { $bfdet = $bfdet_old ->fetch_assoc();} else {$bfdet = $bfdet_cur -> fetch_assoc(); }




$somma_valore_totale = $conn_prod_cespiti->query("SELECT sum(valore) as somma_fattura FROM cespiti WHERE id_fattura = '".$id."'")->fetch_assoc();
$somma_valore_annullati = $conn_prod_cespiti->query("SELECT sum(valore) as somma_annullati FROM cespiti WHERE id_fattura = '".$id."' AND attivo = 'N'")->fetch_assoc();
$somma_fattura = $somma_valore_totale['somma_fattura'];

?>

<html>
    <head>
        
        <style>
h1 {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 24px;
  padding: 5px 5px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
  
    color: #2c2c2c;
    /* background-color: #d5d5d5; */
    letter-spacing: .05em;
    text-shadow: 
      2px 2px 0px #d5d5d5, 
      3px 3px 0px rgba(0, 0, 0, 0.2);
  
}        
      
        table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 14px;
	line-height: 18px;
	margin: 30px auto;
	text-align: left;
	width: 90%;
}	

th {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#777, #444);
	border-left: 1px solid #555;
	border-right: 1px solid #777;
	border-top: 1px solid #555;
	border-bottom: 1px solid #333;
	box-shadow: inset 0 1px 0 #999;
	color: #fff;
        font-weight: bold;
	padding: 5px 5px;
	position: relative;
	text-shadow: 0 1px 0 #000;	
}

th:after {
	background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
	content: '';
	display: block;
	height: 25%;
	left: 0;
	margin: 1px 0 0 0;
	position: absolute;
	top: 25%;
	width: 100%;
}

th:first-child {
	border-left: 1px solid #777;	
	box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
	box-shadow: inset -1px 1px 0 #999;
}

td {
	border-right: 1px solid #fff;
	border-left: 1px solid #e8e8e8;
	border-top: 1px solid #fff;
	border-bottom: 1px solid #e8e8e8;
	padding: 5px 5px;
	position: relative;
	transition: all 300ms;
}

td:first-child {
	box-shadow: inset 1px 0 0 #fff;
}	

td:last-child {
	border-right: 1px solid #e8e8e8;
	box-shadow: inset -1px 0 0 #fff;
}	

/*tr {
	background: url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:nth-child(odd) td {
	background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png);	
}

tr:last-of-type td {
	box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
	box-shadow: inset 1px -1px 0 #fff;
}	

tr:last-of-type td:last-child {
	box-shadow: inset -1px -1px 0 #fff;
}	

tbody:hover td {
/*	color: transparent;
	text-shadow: 0 0 3px #aaa;
}*/

/*tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
}*/
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}

.button3:hover {
    background-color: #f44336;
    color: white;
}

.button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
    background-color: black;
    color: white;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #cccccc;
    color: black;
}

body {
        background-image: url(/immagini/sfondo.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        background-color: #dddddd;
     }   
        </style>
        <title>Gestione CESPITI</title>
</head>
    <?php include 'tech/menu.php' ?>

    <div>
<form method="post">
    
    <h1>GESTIONE CESPITI PER BOLLA/FATTURA</h1>
            <table style="width: 95%;">
            
                <!-- <TR><TD colspan="10" style="text-align:center;font-weight: bold"><h1>ID BOLLA/FATTURA: <?php echo $bfdet["id"] ?> </h1></td></TD></tr> -->
            <tr><tH colspan="10">BOLLA (ID <?php echo $bfdet["id"] ?>)</th></tr>
                
            <tr>
                <td style="text-align: center">
                   <?php
                           if ($bfdet["scansione_bolla"] == '') { echo '<IMG SRC="immagini/unavailable.png" width="25" TITLE="BOLLA NON DISPONIBILE">'; } 
                           else { echo '<A HREF="'.$bfdet["scansione_bolla"].'" target=\'_blank\'><IMG SRC="immagini/visualizza.png" width="25" TITLE="MOSTRA BOLLA"></a>'; }
                   ?>
                </td>
                <td>Numero: </td><td><input type="text" name="b_numero" value="<?php echo $bfdet["nr_bolla"] ?>"></td>
                <td>Data*: </td><td><input type="date" name="b_data" value="<?php echo $bfdet["data_bolla"] ?>"></td>
                <td>Descrizione*: </td><td><input type="text" name="b_descr" value="<?php echo $bfdet["descrizione"] ?>"></td>
            </tr>
            
<!--            <tr>
                <td>Scansione: </td>
            </tr>-->
            
            <tr><th colspan="10">FATTURA (ID <?php echo $bfdet["id"] ?>)</th></tr>
                       
            <tr>
               <td style="text-align: center">
                   <?php
                           if ($bfdet["scansione_fattura"] == '') { echo '<IMG SRC="immagini/unavailable.png" width="25" TITLE="FATTURA NON DISPONIBILE">'; } 
                           else { echo '<A HREF="'.$bfdet["scansione_fattura"].'" target=\'_blank\'><IMG SRC="immagini/visualizza.png" width="25" TITLE="MOSTRA FATTURA"></a>'; }
                   ?>
               </td>
               <td>Numero: </td><td><input type="text" name="f_numero" value="<?php echo $bfdet["nr_fattura"] ?>"></td>
               <td>Data: </td><td><input type="date" name="f_data" value="<?php echo $bfdet["fattura_data"] ?>"></td>
               <td>Importo (&euro;): </td><td><input type="text" name="f_importo" value="<?php echo $bfdet["fattura_importo"] ?>"><IMG SRC="<?php if ($bfdet['fattura_importo'] == $somma_fattura) { echo 'immagini/ok.png'; } else { echo 'immagini/not-ok.png'; } ?>" width="20" hspace="10"></td>
               <td>Fornitore*: </td><td><input type="text" name="f_fornitore" value="<?php echo $bfdet["fornitore"] ?>" required></td>
            </tr>
            
<!--            <tr>
                <td>Scansione: </td>
                
            </tr>-->
            
            <TR>
                <td>Note: </td><td colspan='10'><textarea name="note" style="color:black;font-size: medium;" cols="80" rows="4" ><?php echo $bfdet["note"] ?></textarea></td>
            </TR>
            
            <TR><TD colspan="10" align='center'><input type="submit" name="aggiorna_fatt_bolla" value="SALVA"> - * campi obbligatori</td>
                
            </TR>
        </table>
        
        
        </form>

</div>

<div style="width: 85%;text-align: center;margin: 0 auto;visibility: <?php if ($id == NULL) { echo 'hidden'; } else { echo 'visible'; } ?>;"> <!-- nascondo tutto questo se non è salvata la fattura/bolla -->
    
    <table>
        <tr>
            <th>BOLLA</th><td><form name="invia_bolla" method="post" action="tech/upload.php?id=<?php echo $bfdet["id"] ?>" enctype="multipart/form-data" ><input type="file" name="my_file" /><input type="submit" name="submit" value="Upload"/></form></td>
            <th>FATTURA</th><td><form name="invia_fattura" method="post" action="tech/upload_f.php?id=<?php echo $bfdet["id"] ?>" enctype="multipart/form-data" ><input type="file" name="my_file" /><input type="submit" name="submit" value="Upload"/></form></td>
        </tr>   
    </table>
    
    <form name="form_cespiti" method="post" enctype="multipart/form-data" >
        <table>
            <tr><th style="width: 400px;">CREA/AGGIUNGI CESPITI</th><TD><input type="number" min="1" max="25" name="num_cespiti" /><input type="submit" name="crea_cespiti" value="Crea"/>   
        </table>
    </form>
    
    <?php
    
        include ('tech/connection.php');
        include ('tech/phpqrcode/qrlib.php');
        
        $cespiti = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE id_fattura = '".$id."' AND attivo='Y' ORDER BY seriale ASC");
        $link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        
        $somma_valore_totale = $conn_prod_cespiti->query("SELECT sum(valore) as somma_fattura FROM cespiti WHERE id_fattura = '".$id."'")->fetch_assoc();
        $somma_valore_annullati = $conn_prod_cespiti->query("SELECT sum(valore) as somma_annullati FROM cespiti WHERE id_fattura = '".$id."' AND attivo = 'N'")->fetch_assoc();
        $somma_fattura = $somma_valore_totale['somma_fattura'];

        if ($bfdet['fattura_importo'] == $somma_fattura) { $img_check = 'immagini/ok.png'; } else { $img_check = 'immagini/not-ok.png'; };
        
        if ($cespiti->num_rows > 0) {
            echo "<form method='POST' name='cespiti_form'>";
            echo "<P><table><tr><thead><th>SERIALE</th><th>DESCRIZIONE</th><th>VALORE</th><th>AMM.</TH><th>DATA</th><th>QR CODE</th><th colspan='2' style='text-align: right'><a href='tech/funzioni.php?fx=stampa_tuttic&id_f=".$id."' target='_blank'><img src='immagini/stampa_tutto.png' width='30' title='STAMPA TUTTI'></a><a href='tech/funzioni.php?fx=aggiorna_date&id_f=".$id."&data=".$bfdet['fattura_data']."' target='_blank'><img src='immagini/date_change.png' width='30' title='AGGIORNA DATE'  hspace='4'></a></th>";
        
            
            
            while ($row = $cespiti->fetch_assoc()) {
                
                               
                echo "<tr><td><A NAME='".$row['ancora']."'>".$row["seriale"]."</a></td><td><INPUT TYPE='text' value=\"". htmlspecialchars($row["descrizione"])."\" name='c_descr_".$row['ancora']."' /></td><td>&euro; <INPUT TYPE='text' value='".$row["valore"]."' name='c_valore_".$row['ancora']."' /></td>"
                        . "<td style='text-align: center'><input type='checkbox'  name='c_amm_".$row['ancora']."' value='".$row['ammortato']."' ".$row['ammortato']."></td>"
                        . "<td><input type='date' name='c_data_".$row['ancora']."' value='".$row["data_cespite"]."'></td><td style='text-align:center;'><A HREF='QRCODES/".$row['ancora'].".png' TARGET='_blank'><IMG SRC='QRCODES/".$row['ancora'].".png' width='35'></a></td>"
                        . "<td width='35'><a href='tech/funzioni.php?fx=archivia&id_c=".$row['id_cespite']."&id_f=".$id."'><img src='immagini/archivia.png' width='35' title='ARCHIVIA'></a></td>"
                        . "<td width='35'><a href='tech/funzioni.php?fx=stampa_1c&id_c=".$row['id_cespite']."&id_f=".$id."&ancora=".$row['ancora']."&seriale=".$row['seriale']."' target='_blank'><img src='immagini/stampa.png' width='35' title='STAMPA'></a></td>";		} //
	    
            } else { echo "<p align=center>Non ci sono cespiti associati a questa fattura.</P>"; }
            
            echo "<TR><TD colspan='7' style='text-align: right'><strong>Totale valore cespiti: </strong>&euro; ".$somma_fattura." (Annullati: ".$somma_valore_annullati['somma_annullati'].")<IMG SRC=".$img_check." width=\"20\" hspace=\"10\"></td></tr>";
            echo "<TR><TD colspan='7' style='text-align: center'><input type=\"submit\" name=\"aggiorna_cespiti\" value=\"SALVA\"/> </Td></tr></form></table>";
           
                
    ?>
    <?php
    
    include ('tech/fpdf/fpdf.php');
    
      if (isset($_POST["crea_cespiti"])) {
          
          $numero = $_POST['num_cespiti'];
          
          $ab = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
          $quanti = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE id_fattura = '".$id."' ORDER BY seriale ASC")->num_rows;
          
          while ($numero > 0) {
                    
                    $data_bf = $conn_prod_cespiti->query("SELECT data_bolla, fattura_data FROM bolle_fatture WHERE id = '".$id."'")->fetch_assoc();
                    
                    if (date('Y',strtotime($data_bf['fattura_data'])) != '2017' or $data_bf['fattura_data'] == '') {
                    
                    $conn_prod_cespiti->query("INSERT INTO cespiti (id_fattura, seriale, qr_code, ancora) VALUES ('".$id."','".substr($id,5)."/".date('Y')." ".$ab[$quanti+($numero-1)]."','".$link."#".$id.date('Y').$ab[$quanti+($numero-1)]."','".$id.date('Y').$ab[$quanti+($numero-1)]."')");
                    
                    } else {
                    
                    $conn_prod_cespiti->query("INSERT INTO cespiti (id_fattura, seriale, qr_code, ancora) VALUES ('".$id."','".$id."/2017 ".$ab[$quanti+($numero-1)]."','".$link."#".$id.date('Y').$ab[$quanti+($numero-1)]."','".$id.date('Y').$ab[$quanti+($numero-1)]."')");
                        
                    }
                    
                    //creo le immagini dei qrcode
                    
                    //$file = fopen("QRCODES/".$id.date('Y').$ab[$quanti+($numero-1)].".php", "w");
                    $code = "<?php include ('../tech/phpqrcode/qrlib.php'); QRcode::png('".$link."#".$id.date('Y').$ab[$quanti+($numero-1)]."') ?>";
                    //fwrite($file, $code);
                    //fclose($file);
                    
                    $codeContents = $link."#".$id.date('Y').$ab[$quanti+($numero-1)]; 
                    $fileName = $id.date('Y').$ab[$quanti+($numero-1)].'.png'; 
                    $pngAbsoluteFilePath = "QRCODES/".$fileName; 
                    QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 2); 
                    $numero = $numero -1;
           }
           echo "<meta http-equiv='refresh' content='0'>";
      }
      
      if (isset($_POST["aggiorna_cespiti"])) {
          
                   
          $quanti = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE id_fattura = '".$id."' ORDER BY seriale ASC")->num_rows;

          
          $dati_array = mysqli_query($conn_prod_cespiti, "SELECT * FROM cespiti WHERE id_fattura = '".$id."' ORDER BY seriale ASC");
            if (!$dati_array) { die("Errore generico."); }
            
            $rows = [];
            while($row = mysqli_fetch_array($dati_array))
            { $rows[] = $row;  }
            
          while ($quanti > 0) {
              
                    $descrizione_campo = "c_descr_".$rows[$quanti-1]['ancora'];
                    $valore_campo = "c_valore_".$rows[$quanti-1]['ancora'];
                    $checked = "c_amm_".$rows[$quanti-1]['ancora'];
                    $data_ces = "c_data_".$rows[$quanti-1]['ancora'];
                    
                    
                    if (isset($_POST[$checked])) { $stato_amm = 'checked'; } else { $stato_amm = NULL;} //assegna lo stato ammortamento a seconda del campo checked o vuoto
                    
                    
                    $descrizione = $_POST[$descrizione_campo];
                    $descrizione = mysqli_real_escape_string($conn_prod_cespiti, $descrizione );
                    
                    $valore = $_POST[$valore_campo];
                    $data_cespite = $_POST[$data_ces];
                    
                     if (strpos($valore, ',') !== false) {
                    $valore = str_replace(',','.', $valore);
                    }                    
                    
                    $id_cespite = $rows[$quanti-1]['id_cespite'];
                    $conn_prod_cespiti->query("UPDATE cespiti SET descrizione = '".$descrizione."', valore ='".$valore."', ammortato ='".$stato_amm."', data_cespite = '".$data_cespite."'  WHERE id_cespite = '".$id_cespite."'");
                    
                    $quanti = $quanti -1;
           }
           echo "<meta http-equiv='refresh' content='0'>";
      }
      
      if (isset($_POST["aggiorna_fatt_bolla"])) {
            
          $b_numero = $_POST['b_numero'];
          $b_data = $_POST['b_data'];
          $b_descr = mysqli_real_escape_string($conn_prod_cespiti, $_POST['b_descr']);
          $f_numero = $_POST['f_numero'];
          $f_data = $_POST['f_data'];
          $f_importo = $_POST['f_importo'];
          $f_fornitore = $_POST['f_fornitore'];
          $note = mysqli_real_escape_string($conn_prod_cespiti, $_POST['note']);
          
          if (strpos($f_importo, ',') !== false) {
                 $f_importo = str_replace(',','.', $f_importo);
                }
          
 /*         if ($_POST['b_data'] == '0000-00-00') { $b_data = '--/--/----'; } else { $b_data = $_POST['b_data'];}
          if ($_POST['f_data'] == '0000-00-00') { $f_data = '--/--/----'; } else { $f_data = $_POST['f_data'];}*/

                
          if ($id != NULL) {
          $conn_prod_cespiti->query("UPDATE bolle_fatture SET nr_bolla ='".$b_numero."', data_bolla ='".$b_data."', descrizione = '".$b_descr."', nr_fattura = '".$f_numero."', fattura_data = '".$f_data."', fattura_importo = '".$f_importo."', fornitore ='".$f_fornitore."', note = '".$note."'"
                  . "WHERE id = '".$id."'");
          
          
          
          } else {

              $anno = date('Y'); //date('Y',strtotime($f_data))>=DATE('Y') OR

             if ( date('Y',strtotime($f_data)) != '2017' or $f_data == ''){
                 $ultima = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE ID LIKE '".DATE('Y')."-%' ORDER BY convert(substr(id,5),decimal) ASC LIMIT 1")->fetch_assoc();
                 $ultimoid = substr($ultima[id],5);
                 $b_id = date('Y') . '-' . ($ultimoid +1);
             }

             else {
                 $ultima = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE ID NOT LIKE '".DATE('Y')."-%' ORDER BY CONVERT(id, DECIMAL) DESC LIMIT 1")->fetch_assoc();
                 $b_id = $ultima[id]+1;
             }

             $conn_prod_cespiti->query("INSERT INTO bolle_fatture (id, nr_bolla, data_bolla, descrizione, nr_fattura, fattura_data, fattura_importo, fornitore, note) VALUES ('".$b_id."','".$b_numero."', '".$b_data."', '".$b_descr."', '".$f_numero."', '".$f_data."', '".$f_importo."', '".$f_fornitore."', '".$note."')");

              if ( date('Y',strtotime($f_data)) != '2017' or $f_data == ''){ $ultima_spost = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE ID  LIKE '".DATE('Y')."-%' ORDER BY convert(substr(id,5),decimal) ASC LIMIT 1")->fetch_assoc();}
              else { $ultima_spost = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE ID NOT LIKE '".DATE('Y')."-%' ORDER BY CONVERT(id, DECIMAL) DESC LIMIT 1")->fetch_assoc();}

             $lastitem = $ultima_spost['id'];
             
            echo "<meta http-equiv='refresh' content='0;url=dettaglio_bolla_fattura.php?id=".$lastitem."'>";
            die();
            
             
          }
          
          echo "<meta http-equiv='refresh' content='0'>";
      }
      
      
    ?>
    
    
</div>



</html>

