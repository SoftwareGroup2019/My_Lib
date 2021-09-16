<?php

///////////////////////////////////////////////
///                                         ///
///      Mohammed K. Haider @version1.0     ///
///                                         ///         
///////////////////////////////////////////////

class Insertion
{

   // Insert on Record
    public static function save($table, $args)
    {
        global $db;

        $Col_Names = TabInfo::get_col_names("user");
        for ($i = 1; $i < count($Col_Names); $i++) {
            $non_id_col[] = $Col_Names[$i];
            
        }
        $col = implode(",",$non_id_col);

        foreach ($args as $key => $value) {
            $col_bind[] = $key;
        }

        $data = ":".implode(",:",$col_bind)."";
        
        $sql = $db->prepare("INSERT INTO $table ($col)
        VALUES ($data)");
        // use exec() because no results are returned
      
        $sql->execute($args);
            echo "New record created successfully" . "<br>";
        

          $db = null;
    }

    // get the last inserted id in DB
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