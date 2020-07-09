<?php
    //hide all error message
    error_reporting(1); 

    //include db connection file
    include"./includes/DBConnection.php";

    $connect = new DBConnection();

    //test db connection
    if($connect->GetConnection()==1){

        $table  = $connect->FilterData($_POST["tablename"]);
        $columnid  = $connect->FilterData($_POST["columnid"]);
        $id  = $connect->FilterData($_POST["valueid"]);

        $sql = "DELETE FROM $table WHERE $columnid = $id";

        if($connect->ExecuteDML($sql)){
            echo "Success";
        }else{
           echo "Query error";
        }

    }else{
        echo "Connection error";
    }


?>