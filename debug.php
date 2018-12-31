<?php
/**
 * Created by PhpStorm.
 * User: null
 * Date: 1/1/2019
 * Time: 12:43 AM
 */

include __DIR__ . "/lib/sport.php";

$sport = new Sport();
//$country = $sport->getCountry();
//var_dump($Country);
//$leagues = $sport->getLeagues(267);
//var_dump($leagues);

//$event = $sport->getEvent();
//var_dump($event);
$odd = $sport->getOdds();
var_dump($odd);