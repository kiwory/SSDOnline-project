<?php
    //hide all error message
    error_reporting(1); 

    //include db connection file
    include"./includes/DBConnection.php";

    $connect = new DBConnection();

    //test db connection
    if($connect->GetConnection()==1){

        $fname = $connect->FilterData($_POST["fnames"]);
        $lname = $connect->FilterData($_POST["lnames"]);
        $tname = $connect->FilterData($_POST["tnames"]);
        $gender = $connect->FilterData($_POST["genderid"]);

        $sql = "INSERT INTO customer(first_name, last_name, town_name, gender_id) VALUES('$fname', '$lname', '$tname', '$gender')";

        if($connect->ExecuteDML($sql)){
            echo "Success register";
        }else{
           echo "Query error";
        }

    }else{
        echo "Connection error";
    }

