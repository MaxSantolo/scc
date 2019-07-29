

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
            
            
            
            body {
	background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
	color: #444;
	font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
	text-shadow: 0 1px 0 #fff;
}

strong {
	font-weight: bold; 
}

em {
	font-style: italic; 
}

table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 12px;
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
	padding: 5px 7px;
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

tr {
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
	color: transparent;
	text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
	color: #444;
	text-shadow: 0 1px 0 #fff;
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
        <title>RICERCA GENERALE</title>
    </head>

    <?php include 'tech/menu.php' ?>
    <h1>RICERCA GENERALE</h1>
    <form method="post" name="cerca_cespite">
    <table style="width: 60%;">
        <thead><th colspan="6" style="text-align: center; padding: 3px 3px">RICERCA</th></thead>
    <tr style="text-align: center; padding: 3px 3px">
        <td>dal:</td><td><input type="date" name="dal" value="<?php echo isset($_POST['dal']) ? $_POST['dal'] : '' ?>"></td>
        <TD>al:</td><td><input type="date" name="al" value="<?php echo isset($_POST['al']) ? $_POST['al'] : '' ?>"></td>
        <TD>seriale:</td><td><input type="text" name="seriale" value="<?php echo isset($_POST['seriale']) ? $_POST['seriale'] : '' ?>"></td>
    </tr>
    <tr style="text-align: center; padding: 3px 3px">
        <td>categoria:</td><td><input type="text" name="categoria" value="<?php echo isset($_POST['categoria']) ? $_POST['categoria'] : '' ?>"></td>
        <td>note:</td><td><input type="text" name="note" value="<?php echo isset($_POST['note']) ? $_POST['note'] : '' ?>"></td>
        <td>importo fattura:</td><td><input type="text" name="importo_fattura" value="<?php echo isset($_POST['importo_fattura']) ? $_POST['importo_fattura'] : '' ?>"></td>
    </tr>
        <tr style="text-align: center; padding: 3px 3px">
            <td>fornitore:</td><td><input type="text" name="fornitore" value="<?php echo isset($_POST['fornitore']) ? $_POST['fornitore'] : '' ?>"></td>
            <td>ammortizzato:</td><td><input type="checkbox" name="ammort" <?php echo isset($_POST['ammort']) ? $_POST['ammort'] : '' ?>></td>
            <td>descrizione cespite:</td><td><input type="text" name="descr_cespite" value="<?php echo isset($_POST['descr_cespite']) ? $_POST['descr_cespite'] : $ammort_ric ?>"></td>
        </tr>
    <tr>
        <td colspan="6" style="text-align: center; padding: 2px 2px"><input type="submit" name="cerca_cespiti" value="CERCA"/>
        <input type="submit" name="annulla_cerca" value="ANNULLA FILTRI"/></td>
    </tr>
    </table>
    </form>
</html>

<?php

        include ('tech/connection.php');
        include ('tech/phpqrcode/qrlib.php');
        include ('tech/funzioni_associate.php');

        if (isset($_POST['annulla_cerca'])) {

            $cespiti = $conn_prod_cespiti->query("SELECT * FROM cespiti ORDER BY seriale DESC ");
        }

        if (isset($_POST['cerca_cespiti'])) {

            $dal = $_POST['dal'];
            $al = $_POST['al'];
            $seriale = $_POST['seriale'];
            $categoria_ric = $_POST['categoria'];
            $note_ric = $_POST['note'];
            $impfatt_ric = $_POST['importo_fattura'];
            $fornitore_ric = $_POST['fornitore'];
            if ($_POST['ammort'] == 'on') { $ammort_ric = 'checked'; };
            $descrcesp_ric = $_POST['descr_cespite'];

            $dal = $dal ?: '1900-01-01';
            $al = $al ?: '9999-12-31';

            $cespiti = $conn_prod_cespiti->query("SELECT *, cespiti.descrizione as cespitidescr, categorie_cespiti.descrizione as catdescr FROM cespiti, bolle_fatture, categorie_cespiti WHERE id = id_fattura AND cespiti.codice = categorie_cespiti.codice AND 
            (data_cespite BETWEEN '".$dal."' AND '".$al."') AND seriale LIKE '%".$seriale."%' AND categorie_cespiti.descrizione LIKE '%".$categoria_ric."%' AND note LIKE '%".$note_ric."%' AND fattura_importo LIKE '%".$impfatt_ric."%' 
            AND fornitore LIKE '%".$fornitore_ric."%' AND ammortato LIKE '%".$ammort_ric."%' AND cespiti.descrizione LIKE '%".$descrcesp_ric."%'
            ORDER BY seriale DESC");
            }

            else { $cespiti = $conn_prod_cespiti->query("SELECT *, cespiti.descrizione as cespitidescr, categorie_cespiti.descrizione as catdescr FROM cespiti, bolle_fatture, categorie_cespiti WHERE id = id_fattura AND cespiti.codice = categorie_cespiti.codice ORDER BY seriale DESC"); }


        if ($cespiti->num_rows > 0) {
                        echo "<P><form></form><table style='width: 85%'><tr><thead><th>SERIALE</th><th>DESCRIZIONE</th><th>VALORE</th><th>DATA</th><th style='text-align: center'>AMM.</th><th>CATEGORIA</th><th>FORNITORE</th><th>NOTE FATTURA</th><th>DATA FATTURA</th><th>IMPORTO FATTURA</th><th colspan='3' style='text-align: right'></th>";


            while ($row = $cespiti->fetch_assoc()) {

//                $categoria = $conn_prod_cespiti->query("SELECT * FROM categorie_cespiti WHERE codice = '".$row['codice']."'")->fetch_assoc();
//                $dati_fattura = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE id ='".$row['id_fattura']."'")->fetch_assoc();


                echo "<tr></form><td><A NAME='".$row['ancora']."'>".$row["seriale"]."</a></td><td>".$row["cespitidescr"]."</td><td>&euro; ".$row["valore"]."</td><td>".date('d/m/Y',strtotime($row["data_cespite"]))."</td><td style='text-align: center'><input type='checkbox' ".$row['ammortato']." disabled></td><td>".$row['catdescr']."</td><td>".$row['fornitore']."</td><td>".$row['note']."</td><td>".date('d/m/Y', strtotime($row['fattura_data']))."</td><td>&euro; ".$row['fattura_importo']."</td>"
                       . "<td width='30'><a href='dettaglio_bolla_fattura.php?id=".$row['id_fattura']."'><img src='immagini/vai_scheda.png' width='30' title='VAL ALLA SCHEDA BOLLA/FATTURA'></a></td>";		} //

            } else { echo "<p align=center>Non ci sono cespiti.</P>"; }

            echo "</form></table>";

$conn_prod_cespiti->close();
?>