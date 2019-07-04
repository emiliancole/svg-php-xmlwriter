<?php 

$xw = xmlwriter_open_memory();
xmlwriter_set_indent($xw, 1);
$res = xmlwriter_set_indent_string($xw, ' ');

xmlwriter_start_document($xw, '1.0', 'UTF-8');
// A first element
xmlwriter_start_element_ns($xw,'prefix', 'books', 'uri');
xmlwriter_start_attribute($xw, 'isbn');

xmlwriter_start_attribute_ns($xw, 'prefix', 'isbn', 'uri');
xmlwriter_end_attribute($xw);

xmlwriter_end_attribute($xw);

xmlwriter_text($xw, 'book1');
xmlwriter_end_element($xw);

xmlwriter_end_document($xw);

echo xmlwriter_output_memory($xw);

 ?>