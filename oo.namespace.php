<?php 
$xw = new XMLWriter();

$xw->openMemory();
$xw->setIndent( 1);
$xw->setIndentString(' ');

$xw->startDocument('1.0', 'UTF-8');
// A first element
$xw->startElementNs('prefix', 'books', 'uri');
$xw->startAttribute('isbn');

$xw->startAttributeNs('prefix', 'isbn', 'uri');
$xw->endAttribute();

$xw->endAttribute();

$xw->text('book1');
$xw->endElement();

$xw->endDocument();

echo $xw->outputMemory();

 ?>