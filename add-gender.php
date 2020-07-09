<?php
    //hide all error message
    error_reporting(1); 

    //include db connection file
    include"./includes/DBConnection.php";

    $connect = new DBConnection();

    //test db connection
    if($connect->GetConnection()==1){

        $gender  = $connect->FilterData($_POST["gendernames"]);

        $sql = "INSERT INTO gender(gender_name) VALUES('$gender')";

        if($connect->ExecuteDML($sql)){
            echo "Success add";
        }else{
           echo "Query error";
        }

    }else{
        echo "Connection error";
    }

