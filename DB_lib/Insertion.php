<?php

class Insertion
{
   // Insert on Record
    public static function save($table, $args)
    {
        global $conn;
        $data = "'".implode("','",$args)."'";
        $sql = "INSERT INTO $table (Name, Age)
        VALUES ($data)";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "New record created successfully" . '<br>';

        $conn = null;
    }

    // get the last inserted id to DB
    public static function get_last_id()
    {

    }

    // Insert Multi Record to DB
    public static function multi_save()
    {
        /*
         // begin the transaction
        $conn->beginTransaction();
        // our SQL statements
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')");
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('Mary', 'Moe', 'mary@example.com')");
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('Julie', 'Dooley', 'julie@example.com')");

        // commit the transaction
        $conn->commit();
        echo "New records created successfully";
        */
    }


}