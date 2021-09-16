<?php


$route = isset($_GET['do'])? $_GET['do'] : 'def'; // Getting Route from Url with GET Moethod


echo $route;

// if (isset($_GET['do'])):
//     $route = $_GET['do'];
// else:
//     $route = "Def";
// endif;




