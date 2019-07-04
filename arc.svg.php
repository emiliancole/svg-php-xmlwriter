<?php

$xw = new XMLWriter();
$xw->openURI('arc.svg');
//$xw->openMemory();
$xw->startDocument('1.0');

$xw->startElement('svg');
$xw->writeAttribute('viewBox', '0 0 500 500');
//$xw->writeAttribute("style", "fill:none;stroke:black;stroke-width:2;");
//$xw->endElement();

$xw->startElement('path');
$xw->writeAttribute('d', 'M 200 100 A100 100, 0, 0, 0, 300 200');
$xw->writeAttribute('style', 'fill:none;stroke:black;stroke-width:2;');
$xw->endElement();

$xw->endElement();
$xw->endDocument();
$xw->flush();
readfile("arc.svg");

//echo $xw->outputMemory();
/*
echo "<svg viewBox='0 0 500 500'>";
$x1=200; $y1=100;
echo  '<path d="M 200 100 A100 100, 0, 0, 0, 200 200" 
fill="none" stroke="black" stroke-width="2" />';

//A $rx $ry $xrot $lflag $sweep $x $y

echo "</svg>";
*/

?>

