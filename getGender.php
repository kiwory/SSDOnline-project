<?php
//hide all error message
error_reporting(1); 

//include db connection file
include"./includes/DBConnection.php";

if(isset($_POST["genderid"]) && isset($_POST["gendername"])){
    $id = $_POST["genderid"];
    $gname = $_POST["gendername"];
    echo "<option value='$id'>$gname</option>";

    $sql = "SELECT * FROM gender WHERE id != $id";

}else{
    $sql = "SELECT * FROM gender";
}

$connect = new DBConnection();

    if($connect->GetConnection()==1){
        //excute and test query
        if($result=$connect->GetRows($sql)){
                //check success query if return row
                if($result->num_rows>0){
                //fetch record  
                    while($row = $result->fetch_row()){
                        echo "<option value='$row[0]'>$row[1]</option>";
                    }
                }
            }else{//query error
                echo "<option value='0'>Empty</option>";
            }
        }else{//connection error
            echo "<option value='0'>Empty</option>";
        }

?>