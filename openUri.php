<?php 

$writer = new XMLWriter();
$writer->openURI('test.xml');
$writer->startDocument("1.0");
$writer->startElement("greeting");
$writer->text('Hello World');
$writer->endDocument();
$writer->flush();

 ?>