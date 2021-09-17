<?php

///////////////////////////////////////////////
///                                         ///
///      Author => Mohammed K. Haider       ///
///      Lib_Type => CRUD Model             ///
///      Time_Stamp => 17/9/2021            ///
///                                         ///         
///////////////////////////////////////////////

class DB
{ // start of DB Class

    // Create Model ////////////////////////////////////////////////
    public static function save($table, $args)
    { // Start of save func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        for ($i = 1; $i < count($Col_Names); $i++) {
            $non_id_col[] = $Col_Names[$i]; 
        }
        $col = implode(",",$non_id_col);
        $var_bind = ":z".implode(",:z",$non_id_col)."";
        $bind_param = array();
        for ($i = 0; $i < count($non_id_col); $i++) {
           $z_bind = "z" . $non_id_col[$i];
           $bind_param[$z_bind] = $args[$i];
        }
        $sql = $db->prepare("INSERT INTO $table ($col)
        VALUES ($var_bind)");
        $sql->execute($bind_param);
        echo "New record created successfully" . "<br>";
          $db = null;
    } // end of save func
    //////////////////////////////////////////////////////////////////

    // Read Model////////////////////////////////////////////////////
    public static function selectAll($table)
    { // start of SelectAll func
        global $db;
        $stmt = $db->prepare("SELECT * FROM $table");
         $stmt->execute();
         $rows=$stmt->fetchAll();
        return $rows;
    } // end of SelectAll func


    public static function selectByID($table,$id)
    { // start of selectByID func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        $stmt = $db->prepare("SELECT * FROM $table WHERE $Col_Names[0]=$id");
         $stmt->execute();
         $rows=$stmt->fetchAll();
        return $rows;
    } // start of selectByID func
    ///////////////////////////////////////////////////////////////////////////////////

    // Delete Model ///////////////////////////////////////////////////////////////////
    public static function deleteByID($table,$id)
    { // start of deleByID func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        $stmt = $db->prepare("DELETE FROM $table WHERE $Col_Names[0] = :zid");
        $stmt->bindParam('zid', $id);
        $stmt->execute();   
    } // end of deleByID func
    //////////////////////////////////////////////////////////////////////////////////////

    // Update Model //////////////////////////////////////////////////////////////////////
    public static function updateByID($table,$args,$id)
    { // start of updateByID func
        global $db;
        $Col_Names = TabInfo::get_col_names($table);
        for ($i = 1; $i < count($Col_Names); $i++) {
            $non_id_col[] = $Col_Names[$i]; 
        }
        $bind_col = "".implode("=?,",$non_id_col)."=?";
        array_push($args,$id);
        $stmt=$db->prepare("UPDATE $table SET $bind_col WHERE $Col_Names[0] = ?");
        $stmt->execute($args);                  
    } // end of updateByID func
}// end of DB Class

