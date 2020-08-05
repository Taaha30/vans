<?php
include 'getroutes.php';

$route = new Route();

$route -> add('/events');
$route -> add('/series');
$route -> add('/tags');
$route -> add('/guests');
$route -> add('/blog');
$route -> add('/media');
$route -> add('/casestudy');

$route -> add('/media-library');
$route -> add('/404');
$route -> add('/tiws-reg');

$route -> add('/login');
$route -> add('/logout');
$route -> add('/appcms');



$route -> submit();
exit;
?>
