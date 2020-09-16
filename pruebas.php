<?php
$file = 'archivo.zip';
$code = 'archivo';
if (file_exists($file)) {
    $xml = @simplexml_load_file('zip://'. $file .'#'. $code .'.xml');
    if ($xml === false) {
        die('Error abriendo el archivo XML dentro del ZIP');
    }
    $name = $xml->{'cac:Party'}->{'cac:PartyIdentification'}->{'cbc:ID'};
    echo $name, PHP_EOL;
} else {
    die('Archivo no encontrado');
}