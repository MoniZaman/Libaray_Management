<?php

$q = intval($_GET['q']); 
$book_name = \DB::table('book')->where('isbn_number', '=',$q)->get();
var_dump($book_name);


?>