<?php

///////////////////////////////////////////////
///                                         ///
///      Author => Mohammed K. Haider       ///
///      Query_Type => Insert               ///
///                                         ///         
///////////////////////////////////////////////

// How to Use //

/*
    // create an array and pass the data {POST,GET, or any kind of data}
 $X = array(
     $_POST['Name'],
     $_POSt['Age'],
     .
     .
     ....
 );

 // then Call your static function and pass the Table Name with lower case and your array
 Insertion::save("User",$param);
 
*/

class Insertion
{ // start of class
    
    public static function save($table, $args)
    { // Start of func
        global $db;

        $Col_Names = TabInfo::get_col_names("user");
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
    } // end of func
}// end of Class 