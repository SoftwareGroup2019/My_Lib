<?php

class Update
{
    
    //$table, $args, $id
    public static function updateByID($table,$args,$id)
    {
        global $db;

        $Col_Names = TabInfo::get_col_names($table);
        for ($i = 1; $i < count($Col_Names); $i++) {
            $non_id_col[] = $Col_Names[$i]; 
        }
        $bind_col = "".implode("=?,",$non_id_col)."=?";

        array_push($args,$id);

        $stmt=$db->prepare("UPDATE $table SET $bind_col WHERE $Col_Names[0] = ?");
        $stmt->execute($args);

        echo "Updated Done";
                  
    }

}