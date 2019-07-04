<?php
$writer = new XMLWriter;

$writer->openURI('php://output');

$writer->startDocument('1.0', 'UTF-8');

$writer->startElement('response');
    $writer->startElement('status');
        $writer->startAttribute('code');
            $writer->text('500');
        $writer->endAttribute();
    $writer->endElement();
$writer->endElement();

$writer->endDocument();
?>
