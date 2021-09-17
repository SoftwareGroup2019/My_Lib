<?php

class Query
{

    public static function selectAll($table)
    {
        global $db;
        
        $stmt = $db->prepare("SELECT * FROM $table");
    
         $stmt->execute();
    
         $rows=$stmt->fetchAll();

        return $rows;
    }


    public static function selectByID($table,$id)
    {
        global $db;

        $Col_Names = TabInfo::get_col_names($table);
        
        $stmt = $db->prepare("SELECT * FROM $table WHERE $Col_Names[0]=$id");
    
         $stmt->execute();
    
         $rows=$stmt->fetchAll();

         

        return $rows;
    }

}