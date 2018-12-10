<!DOCTYPE html>
<html>
<head>
<style>
.element { 
    top:0;
    width: 100%;
    font-family: Verdana;
    font-size: 14px;
    font-variant: small-caps;

}    
    
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #d5d5d5;
    opacity: .85;
}

li {
    float: left;
    border-right: 1px solid #bbb;
}

li a {
    display: block;
    color: black;
    text-align: center;
    padding: 10px 12px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #f5f5f5;
}

.active {
    background-color: #f5f5f5;
}
</style>
</head>
<body>
    <div class="element">
<ul>
    <li><a href="../index.php"><IMG SRC="immagini/menu.png" width="30" TITLE="MENU"></a></li>
    <li><a href="../dettaglio_bolla_fattura.php"><IMG SRC="immagini/new_menu.png" width="30" TITLE="NUOVA BOLLA/FATTURA"></a></li>
    <li><a href="../bolle_fatture.php"><IMG SRC="immagini/menu_elenco.png" width="30" TITLE="ELENCO BOLLE/FATTURE"></a></li>
    <li><A HREF="../bolle_fatture_precedenti.php"><IMG SRC="immagini/menu_vecchidoc.png" width="30" title="ANNI PRECEDENTI"></A></li>
    <li><a href="../ricerca_generale.php"><IMG SRC="immagini/search.png" width="30" TITLE="RICERCA GENERALE"></a></li>
    
  
    <li style="float:right"><a class="active" href="mailto:max@swhub.io?subject=Segnalazione SCC" target="_blank"><img src="../immagini/mail.png" title = "Segnala problemi o richiedi modifiche" width="30"></a></li>
  
</ul>
</div>
</body>
</html>
