<?php
$file = 'data/archivo.zip';
$code = 'archivo';
if (file_exists($file)) {
    $xml = simplexml_load_file('zip://'. $file .'#'. $code .'.xml');
    if ($xml === false) {
        die('Error opening ZIP');
    }
    $name = $xml->xpath(
        '//cac:AccountingCustomerParty/cac:Party/cac:PartyIdentification/cbc:ID'
    );
    $name2 = $xml->xpath(
        '//cac:LegalMonetaryTotal/cbc:PayableAmount'
    );
    if (count($name) > 0) {
        echo 'c:ID = ', $name[0], PHP_EOL;
    } else {
        echo 'No c:ID found', PHP_EOL;
    }
    if (count($name2) > 0) {
        echo 'cbc:PayableAmount = ', $name2[0], PHP_EOL;
    } else {
        echo 'No cbc:PayableAmount found', PHP_EOL;
    }
} else {
    die('File not found');
}
