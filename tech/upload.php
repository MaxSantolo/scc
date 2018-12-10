<?php

include ('connection.php');
$numero = $_GET['id'];

if (($_FILES['my_file']['name']!="")){

        
        $anno = date('Y');
        $mese = date('m');
        
        $target_dir = "../archivio_dati/bolle/".$anno."/".$mese."/";
        
        if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
        }
              
        
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
        
        $prename = "BOLLE".$numero."-".date('d').".";
        
	$path_filename_ext = $target_dir.$prename.$filename.".".$ext;
 
// Check if file already exists
if (file_exists($path_filename_ext)) {
 echo "Il file già esiste.";
 
 
 }
 
 else
     
     {
 
 move_uploaded_file($temp_name,$path_filename_ext);
 echo "File caricato.";
 
 $path = str_replace('..','http://192.168.1.40:90',$path_filename_ext);
 
 $conn_prod_cespiti->query("UPDATE bolle_fatture SET scansione_bolla ='".$path."' WHERE id = '".$numero."'");
 
 }
}

header("Location: " . $_SERVER["HTTP_REFERER"]);
$conn_prod_cespiti->close();

?>