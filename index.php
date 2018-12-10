


<html>
    <head>
        <style>
            
             h1 {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 24px;
  padding: 20px 20px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
  
    color: #2c2c2c;
    background-color: #d5d5d5;
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
        <title>SISTEMA DI CONTROLLO DEI CESPITI</title>
    </head>
    
    
    <H1>SISTEMA CONTROLLO E STAMPA DEI CESPITI - PICK CENTER ROMA s.r.l.u.</h1>
    
    <table style="width: 50%;text-align: center">
        <tr><th colspan="4">MENU PRINCIPALE</th></tr>
        <tr>
            <td style="width: 25%"><A HREF="dettaglio_bolla_fattura.php"><IMG SRC="immagini/new_menu.png" width="75"><BR /><BR />NUOVA BOLLA</a></td>
            <TD style="width: 25%"><A HREF="bolle_fatture.php"><IMG SRC="immagini/menu_elenco.png" width="75"><BR /><BR />ELENCO BOLLE/FATTURE</A></td>
            <td style="width: 25%"><A HREF="bolle_fatture_precedenti.php"><IMG SRC="immagini/menu_vecchidoc.png" width="75"><BR /><BR />ANNI PRECEDENTI</A></td>
            <td style="width: 25%"><A HREF="ricerca_generale.php"><IMG SRC="immagini/search.png" width="75"><BR /><BR />RICERCA GENERALE</A></td>
        </tr>
    </table>
    <hr>
    <table style='width: 40%; text-align: center'><TR><thead><th>ACQUISTI DA GESTIRE</th></thead></TR></table>
    <?php
/*    include ('tech/connection.php');
    include ('tech/phpqrcode/qrlib.php');
    include ('tech/funzioni_associate.php');

    $cespiti = $conn_prod_cespiti->query("select * from cespiti where data_cespite = '0000-00-00' or valore = '0' group by seriale");


    if ($cespiti->num_rows > 0) {
        echo "<table style='width: 40%'><TR><thead><th>SERIALE</th><th>DESCRIZIONE</th><th>VALORE</th><th>DATA</th><th style='text-align: center'>AMM.</th><th colspan='3' style='text-align: right'></th></thead></tr>";


        while ($row = $cespiti->fetch_assoc()) {

//                $categoria = $conn_prod_cespiti->query("SELECT * FROM categorie_cespiti WHERE codice = '".$row['codice']."'")->fetch_assoc();
//                $dati_fattura = $conn_prod_cespiti->query("SELECT * FROM bolle_fatture WHERE id ='".$row['id_fattura']."'")->fetch_assoc();


            echo "<tr><td><A NAME='".$row['ancora']."'>".$row["seriale"]."</a></td><td>".$row["descrizione"]."</td><td>&euro; ".$row["valore"]."</td><td>".date('d/m/Y',strtotime($row["data_cespite"]))."</td><td style='text-align: center'><input type='checkbox' ".$row['ammortato']." disabled></td>"
                . "<td width='30'><a href='dettaglio_bolla_fattura.php?id=".$row['id_fattura']."'><img src='immagini/vai_scheda.png' width='30' title='VAL ALLA SCHEDA BOLLA/FATTURA'></a></td>";		} //

    } else { echo "<p align=center>Non ci sono acquisti da gestire.</P>"; }

    echo "</form></table>";


    */

 

?>
       
        

    


</html>

