<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'Parser.php';
$pathFileSrc = __DIR__ . "/src.txt";


$text = '...'
        . '<span>1</span>'
        . '...'
        . '<a href="./buy">'
        . 'Пойти на курс PHP'
        . '<span>31000</span>'
        . '</a>...';

//$htmlPage = file_get_contents('http://chatbotcollection.ru.host1588785.serv66.hostland.pro/category/6/');

$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, 'https://www.eldorado.ru/cat/detail/71377556/'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$htmlPage = curl_exec($ch); 
curl_close($ch);

file_put_contents($pathFileSrc, $htmlPage);

$parser = new Parser($text);
echo $parser->moveTo('<a href="./buy">')->moveTo('<span>')->readTo('<');

//$parserDns = new Parser($htmlPage);
//echo $parserDns->moveTo('<title>')->readTo('<');
//echo '<pre>'. $htmlPage . '</pre>';

$parserGeek = new Parser($htmlPage);
//echo $parserGeek->moveTo('<div class="entry-meta">')->moveTo('title=')->readTo('rel');
