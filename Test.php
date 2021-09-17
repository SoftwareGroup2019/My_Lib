<?php

include 'init.php';


// Insert TEst
// $param = array("joma","67","906767");
// DB::save("user",$param);

// $name = "hawar";
// $age = "32";
// $moblie = "6767";
// $id = "23";
// $param = array($name,$age,$moblie);
// DB::updateByID("user",$param,$id);


// DB::deleteByID("user","23");



$rows = DB::selectByID("user","22");
foreach ($rows as $key => $value) {
            
    echo $value['Age'] . "<br>";

 }


















