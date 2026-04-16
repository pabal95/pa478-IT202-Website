<?php
/* -- #Pabal Ahmed | IT202-004 | 4/16/2026 */
ob_start();
include("laptoptype.php");
include("laptop.php");

$typeCount = LaptopType::getTotalLaptopTypes();
$laptopCount = Laptop::getTotalLaptops();
$sellTotal = Laptop::getTotalSellPrice();
$buyTotal = Laptop::getTotalBuyPrice();

$doc = new DOMDocument("1.0");
$inventory = $doc->appendChild($doc->createElement("inventory"));

// Unified Naming: tags match requirements
$inventory->appendChild($doc->createElement("laptoptypecount", $typeCount));
$inventory->appendChild($doc->createElement("laptopcount", $laptopCount));
$inventory->appendChild($doc->createElement("selltotal", $sellTotal));
$inventory->appendChild($doc->createElement("buytotal", $buyTotal));

$output = $doc->saveXML();
header("Content-type: application/xml");
ob_end_clean();
echo $output;
?>