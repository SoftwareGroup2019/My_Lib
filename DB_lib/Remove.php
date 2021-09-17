<?php

class Remove
{

    public static function deleteByID($table,$id)
    {

        global $db;

        $Col_Names = TabInfo::get_col_names($table);

        $stmt = $db->prepare("DELETE FROM $table WHERE $Col_Names[0] = :zid");

        $stmt->bindParam('zid', $id);
     
        $stmt->execute();

        echo "Deleted";
        
    }

}