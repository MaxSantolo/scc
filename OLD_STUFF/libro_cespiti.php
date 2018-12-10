

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
        <title>LIBRO CESPITI</title>
    </head>

    <?php include 'tech/menu.php' ?>
    <h1>LIBRO CESPITI CON AMMORTAMENTI</h1>
    <form method="post" name="cerca_cespite">
    <table style="width: 40%;">
        <thead><th colspan="6" style="text-align: center; padding: 3px 3px">RICERCA</th></thead>
    <tr style="text-align: center; padding: 3px 3px">
        <td>dal:</td><td><input type="date" name="dal" value="<?php echo isset($_POST['dal']) ? $_POST['dal'] : '' ?>"></td>
        <TD>al:</td><td><input type="date" name="al" value="<?php echo isset($_POST['al']) ? $_POST['al'] : '' ?>"></td>
        <TD>seriale:</td><td><input type="text" name="seriale" value="<?php echo isset($_POST['seriale']) ? $_POST['seriale'] : '' ?>"></td>
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

            $dal = $dal ?: '1900-01-01';
            $al = $al ?: '9999-12-31';

            $cespiti = $conn_prod_cespiti->query("SELECT * FROM cespiti WHERE (data_cespite BETWEEN '".$dal."' AND '".$al."') AND seriale LIKE '%".$seriale."%' ORDER BY seriale DESC"); }

            else { $cespiti = $conn_prod_cespiti->query("SELECT * FROM cespiti ORDER BY seriale DESC"); }

        if (isset($_POST['aggiorna_libro_cespiti'])) {

            $quanti = $conn_prod_cespiti->query("SELECT * FROM cespiti ORDER BY seriale DESC ")->num_rows;
            $dati_array = mysqli_query($conn_prod_cespiti, "SELECT * FROM cespiti ORDER BY seriale DESC ");

            if (!$dati_array) { die("Errore generico."); }

            $rows = [];
            while($row = mysqli_fetch_array($dati_array))
            { $rows[] = $row;  }

            while ($quanti > 0) {
                $codice_campo = "c_codice_".$rows[$quanti-1]['ancora'];
                $codice_cespite = $_POST[$codice_campo];
                $id_cespite = $rows[$quanti-1]['id_cespite'];
                $conn_prod_cespiti->query("UPDATE cespiti SET codice = '".$codice_cespite."' WHERE id_cespite = '".$id_cespite."'");
                $quanti = $quanti -1;
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }

        if ($cespiti->num_rows > 0) {
                        echo "<P><form method='post' name='aggiorna_cespiti'><table style='width: 75%'><tr><thead><th>SERIALE</th><th>DESCRIZIONE</th><th>VALORE</th><th>DATA</th><th>CATEGORIA</th><th colspan='3' style='text-align: right'></th>";
                        echo "<tr><td colspan = '8' style='text-align: center'><input type=\"submit\" name=\"aggiorna_libro_cespiti\" value=\"AGGIORNA\"/></td></tr>";

            while ($row = $cespiti->fetch_assoc()) {

                echo "<tr><td><A NAME='".$row['ancora']."'>".$row["seriale"]."</a></td><td>".$row["descrizione"]."</td><td>&euro; ".$row["valore"]."</td><td>".date('d/m/Y',strtotime($row["data_cespite"]))."</td><td><select name='c_codice_".$row['ancora']."'>".genera_lista_codici($row['codice'])."</select></td>"
                        . "<td width='30'><a href='tech/funzioni.php?fx=archivia&id_c=".$row['id_cespite']."&id_f=".$id."'><img src='immagini/archivia.png' width='30' title='ARCHIVIA'></a></td>"
                        . "<td width='30'><a href='tech/funzioni.php?fx=stampa_1c&id_c=".$row['id_cespite']."&id_f=".$id."&ancora=".$row['ancora']."&seriale=".$row['seriale']."' target='_blank'><img src='immagini/stampa.png' width='30' title='STAMPA'></a></td>"
                        . "<td width='30'><a href='dettaglio_bolla_fattura.php?id=".$row['id_fattura']."'><img src='immagini/vai_scheda.png' width='30' title='VAL ALLA SCHEDA BOLLA/FATTURA'></a></td>";		} //

            } else { echo "<p align=center>Non ci sono cespiti.</P>"; }

            echo "<tr><td colspan = '8' style='text-align: center'><input type=\"submit\" name=\"aggiorna_libro_cespiti\" value=\"AGGIORNA\"/></td></tr></form></table>";

$conn_prod_cespiti->close();
?>