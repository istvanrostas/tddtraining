<?php
require_once 'vendor/autoload.php';
require_once 'app/mdparser/Parser.php';

$parser = new Parser();

$parser->parse('**text**')

?>