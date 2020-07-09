<?php
    //hide all error message
    error_reporting(1); 

    //include db connection file
    include"./includes/DBConnection.php";

    $connect = new DBConnection();

    //test db connection
    if($connect->GetConnection()==1){

        $id  = $connect->FilterData($_POST["id"]);
        $fname = $connect->FilterData($_POST["fname"]);
        $lname = $connect->FilterData($_POST["lname"]);
        $tname = $connect->FilterData($_POST["tname"]);
        $gender = $connect->FilterData($_POST["gender"]);

        $sql = "UPDATE customer SET first_name = '$fname', last_name = '$lname', town_name = '$tname', gender_id = $gender WHERE id = $id";

        if($connect->ExecuteDML($sql)){
            echo "Success update";
        }else{
           echo "Query error";
        }

    }else{
        echo "Connection error";
    }


?>