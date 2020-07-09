<?php 
//hide all error message
error_reporting(1); 

//include db connection file
include"./includes/DBConnection.php";

$connect = new DBConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSD Online</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

    <!-- include project navigation bar -->
    <?php
      include"./includes/nav-bar.php";
    ?><!-- navigation end here -->


    <!-- container implement CRUD on customer table -->
    <div id="cont-customer-tb">
        <h2>Implementation of CRUD on customer table</h2>
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer first name</th>
                        <th>Customer last name</th>
                        <th>Town name</th>
                        <th>Customer gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- fetch data to database table -->
                <tbody>
                <?php

                   $sql = "SELECT C.id, C.first_name, C.last_name, C.town_name, G.gender_name, C.gender_id  FROM customer C INNER JOIN gender G ON C.gender_id = G.id ORDER BY C.id DESC";

                   //test db connection
                   if($connect->GetConnection()==1){
                       //excute and test query
                       if($result=$connect->GetRows($sql)){
                           //check success query if return row
                           if($result->num_rows>0){
                               //fetch record
                               while($row = $result->fetch_row()){

                                echo "
                                <tr>
                                <td>$row[0]</td>
                                <td>$row[1]</td>
                                <td>$row[2]</td>
                                <td>$row[3]</td>
                                <td>$row[4]</td>
                                <td>
                                    <button type='button' class='btnAdd' title='Add/Insert'><i class='fas fa-plus-square'></i></button>
                                    <button data-id='$row[0]' data-fname='$row[1]' data-lname='$row[2]' data-tname='$row[3]' data-genderid='$row[5]' data-gendername='$row[4]' type='button' class='btnEdit' title='Edit/Update'><i class='fas fa-edit'></i></button>
                                    <button data-table='customer' data-column='id' data-idvalue='$row[0]' type='button' class='btnDelete' title='Remove/Delete'><i class='fas fa-trash'></i></button>
                                </td>
                            </tr>
                                ";

                               }
                           }else{
                            echo "
                            <tr>
                              <td colspan='6' style='text-align:center'> Empty customer record!</td>
                            </tr>
                          ";
                           }
                       }else{
                        echo "
                          <tr>
                            <td colspan='6' style='text-align:center'> Query error!</td>
                          </tr>
                        ";
                       }
                   }else{
                       echo "
                         <tr>
                            <td colspan='6'  style='text-align:center'> db connection fail!</td>
                         </tr>
                       ";
                   }


                ?>
                </tbody>

            </table>

    </div>

    <!-- edit customer container -->
    <div id="input-customer-container" class="edit-co">
        <section>
            <span>Edit customer details</span>
            <button class="btnClose" type="button"><i class="fas fa-times"></i></button>
        </section>

        <table>
            <form id="edit-form" method="POST">
                <tr>
                    <td>
                        <h4>Customer first name</h4>
                        <h6 class="error-report error"></h6>
                        <input type="hidden" name="id" class="cid">
                        <input type="text" name="fname" class="input-style fname" required></td>
                </tr>
                <tr>
                    <td>
                        <h4>Customer Last name</h4>
                        <input type="text" name="lname" class="input-style lname" required></td>
                </tr>
                <tr>
                    <td>
                        <h4>Town name</h4>
                        <input type="text" name="tname" class="input-style tname" required></td>
                </tr>
                <tr>
                    <td>
                        <h4>Gender</h4>
                        <select name="gender" class="gender select-style">

                            <!-- <?php
                                if($connect->GetConnection()==1){
                                    //excute and test query
                                    $sql = "SELECT * FROM gender";
                                    if($result=$connect->GetRows($sql)){
                                            //check success query if return row
                                            if($result->num_rows>0){
                                            //fetch record  
                                               while($row = $result->fetch_row()){
                                                   echo "<option value='$row[0]'>$row[1]</option>";
                                               }
                                            }else{//empty
                                            }
                                        }else{//query error
                                        }
                                    }else{//connection error
                                    }

                            ?> -->
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btnEditCus" type="submit">Update customer detail</button></td>
                </tr>
            </form>
        </table>

    </div>

    <!-- add gender info -->
    <div id="input-customer-container" class="add-gender-cont">
        <section>
            <span>Add gender</span>
            <button class="btnClose" type="button"><i class="fas fa-times"></i></button>
        </section>

        <table>
            <form id="add-form" method="POST">
                <tr>
                    <td>
                        <h4>Gender name</h4>
                        <input type="text" name="gendernames" class="input-style gendernames" required></td>
                </tr>

                <tr>
                    <td>
                        <button class="btnEditCus" type="submit">Add gender</button></td>
                </tr>
            </form>
        </table>
    </div>
    
    <script type="text/javascript" src="./js/Jquery-min.js"></script>
    <script type="text/javascript" src="./js/ongeza-script.js"></script>
    <script defer type="text/javascript" src="./js/fontawesome-all.js"></script>

</body>
</html>