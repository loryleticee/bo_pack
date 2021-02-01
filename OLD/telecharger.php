<?php

// Nous essayons de reconnaître l'extension afin que le téléchargement 
// corresponde au type de fichier. Cela évite les erreurs de corruptions.
$file = $_GET['file'];
$chemin = $_GET['chemin'];

header("Content-disposition: attachment; filename=$file");
header("Content-Type: application/force-download");
header("Content-Transfer-Encoding: application/pdf"); // Surtout ne pas enlever le \n
header("Content-Length: ".filesize($chemin . $file));
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
header("Expires: 0");
readfile($chemin . $file);
?>