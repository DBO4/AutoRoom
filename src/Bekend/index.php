<?php
header('Access-Control-Allow-Origin: *');

 $filename = "Mejlovi.txt";
echo file_get_contents($filename)."fffff";
$fajlMejl = fopen($filename, "r") or die("Mejl fajl nije dostupan!");
echo fgets($fajlMejl);
echo"AAA";
?>