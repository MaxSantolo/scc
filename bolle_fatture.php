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

/*        tr {
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
        } */

        tbody:hover tr:hover td {
            background: #eee;
                
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
        <title>ELENCO BOLLE/FATTURE</title>
    </head>
    <?php include 'tech/menu.php' ?>
    
    <h1>BOLLE/FATTURE - <?php echo date('Y') ?></h1>
    <form method="post" name="cerca_glob_bollefatt">
    <table style="width: 40%;">
        <thead><th colspan="8" style="text-align: center; padding: 3px 3px" >RICERCA FATTURE</th></thead>
        <tr style="text-align: center; padding: 3px 3px">
            <td>dal:</td><td><input type="date" name="dal" value="<?php echo isset($_POST['dal']) ? $_POST['dal'] : '' ?>"></td>
            <TD>al:</td><td><input type="date" name="al" value="<?php echo isset($_POST['al']) ? $_POST['al'] : '' ?>"></td>
            <TD>fattura:</td><td><input type="text" name="fattura" value="<?php echo isset($_POST['fattura']) ? $_POST['fattura'] : '' ?>"></td><TD>fornitore:</td>
            <td><input type="text" name="fornitore" value="<?php echo isset($_POST['fornitore']) ? $_POST['fornitore'] : '' ?>"></td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center; padding: 2px 2px"><input type="submit" name="cerca_bollfatt" value="CERCA"/>
            <input type="submit" name="annulla_cerca" value="ANNULLA FILTRI"/></td>
        </tr>
    </table>
    </form>
</html>



<?php

include ('tech/connection.php');

if (isset($_POST['annulla_cerca'])) {
            
            $bolle_fatture_intero = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE id LIKE '".DATE('Y')."-%' ORDER BY convert(substr(id,5),decimal) DESC");
        }

if (isset($_POST['cerca_bollfatt'])) { 
    
    $dal = $_POST['dal'];
    $al = $_POST['al'];
    $fornitore = $_POST['fornitore'];
    $fattura = $_POST['fattura'];
    
    	$dal = $dal ?: '1900-01-01 00:00';
	$al = $al ?: '9999-12-31 23:59';
    
    
    $bolle_fatture_intero = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE (fattura_data BETWEEN '".$dal."' AND '".$al."') AND fornitore LIKE '%".$fornitore."%' AND nr_fattura LIKE '%".$fattura."%' AND id LIKE '".DATE('Y')."-%' ORDER BY convert(substr(id,5),decimal) DESC"); }
  
    else { $bolle_fatture_intero = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE id LIKE '".DATE('Y')."-%' ORDER BY convert(substr(id,5),decimal) DESC"); }

if ($bolle_fatture_intero->num_rows > 0) {
echo "<P><table><tr><thead><th>ID</th><th>#BOLLA</th><th>DATA BOLLA</th><th>DESCRIZIONE</th><!-- <th>SCANSIONE BOLLA</th> --><th>#FATTURA</th><th>DATA FATTURA</th><th>IMPORTO FATTURA</th><th>FORNITORE</th><!-- <th>SCANSIONE FATTURA</th> --><th>NOTE</th><th colspan='2' style='text-align: right'><a href='dettaglio_bolla_fattura.php'><img src='immagini/nuovo.png' width='30' title='NUOVA BOLLA/FATTURA'></a></th></thead></tr>";

    while($row = $bolle_fatture_intero->fetch_assoc()) {
                
        if ($row["fattura_data"] == '0000-00-00') { $fattura_data = '--/--/----'; } else { $fattura_data = date('d/m/Y', strtotime($row["fattura_data"])); }
        if ($row["data_bolla"] == '0000-00-00') { $data_bolla = '--/--/----'; } else { $data_bolla = date('d/m/Y', strtotime($row["data_bolla"])); }
                
                echo "<tr><td>".$row["id"]."</td><td>".$row["nr_bolla"]."</td><td>".$data_bolla."</td><td>".$row["descrizione"]."</td>"
//                        . "<td style='text-align: center'><A HREF='".$row["scansione_bolla"]."' target='_blank'><IMG SRC=\"immagini/visualizza.png\" width=\"25\" TITLE=\"MOSTRA BOLLA\"></a></td>"
                        . "<td>".$row["nr_fattura"]."</td><td>".$fattura_data."</td><td>&euro; ".$row["fattura_importo"]."</td><td>".$row["fornitore"]."</td>"
//                        . "<td style='text-align: center'><A HREF='".$row["scansione_fattura"]."' TARGET='_blank'><IMG SRC=\"immagini/visualizza.png\" width=\"25\" TITLE=\"MOSTRA FATTURA\"></A></td>
                        ."<td>".$row["note"]."</td>"
                        . "<td width='25'> <a href='dettaglio_bolla_fattura.php?id=".$row["id"]."'><img src='immagini/dettagli.png' width='25' TITLE='DETTAGLI'></a></td><td width='25'> <a href='tech/funzioni.php?fx=eliminabolfat&id_f=".$row["id"]."' onclick=\"return confirm('Vuoi veramente cancellare questa bolla? Tieni presente che se la bolla ha dei cespiti associati non potrà essere eliminata.')\"><img src='immagini/elimina.png' width='25' TITLE='ELIMINA'></a></td>";
		}
		echo "</table>";
		} else { echo "<p align=center>Nessun risultato</P>"; }

$conn_prod_cespiti;
?>