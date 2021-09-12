<?php

include 'DB_lib/Connection.php';

// Collect all Class in one Place
spl_autoload_register(function ($class_name) {
    include 'DB_lib/' . $class_name . '.php';
});