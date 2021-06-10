<?php


$clientID = $_POST['clientID'];

$date = explode('-', $_POST['dater']);
$new_date = $date[2].'-'.$date[1].'-'.$date[0];


$text1 = $_POST['text1'];


$text2 = $_POST['text2'];


$text3 = $_POST['text3'];
$text3 = preg_replace("/[^A-Za-z0-9,.-@$ ]/", '', $text

$tpl = $_POST['tpl'];
$doc_name = $_POST['doc_name'];

$body = $_POST['body'];
$body = preg_replace("/[^A-Za-z0-9,.-@$ ]/", '', $body);

$duration = $_POST['duration'];

$fee = $_POST['fee'];
$word_count = $_POST['word_count'];


$word_count = str_word_count($body);


?>