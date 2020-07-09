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
    <title>SSD Online | add customer</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

    <!-- include project navigation bar -->
    <?php
      include"./includes/nav-bar.php";
    ?><!-- navigation end here -->

    <!-- customer registration container -->
    <div id="add-cus-contaner">
        <div class="left-side-container">
            <img src="./media/image.jpeg">
        </div>
        <div class="right-side-container">
            <h2>Customer registration</h2>
            <table>
                <form id="register-cus" method="POST">
                <tr>
                    <td>
                        <h4>Customer first name</h4>
                        <h6 class="error-rep"></h6>
                        <input type="text" name="fnames" class="input-style fnames" required></td>
                </tr>
                <tr>
                    <td>
                        <h4>Customer Last name</h4>
                        <input type="text" name="lnames" class="input-style lnames" required></td>
                </tr>
                <tr>
                    <td>
                        <h4>Town name</h4>
                        <input type="text" name="tnames" class="input-style tnames" required></td>
                </tr>
                <tr>
                    <td>
                        <h4>Gender</h4>
                        <select name="genderid" class="genders select-style">
                            <?php
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

                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <br>
                        <button class="btnEditCus" type="submit">Register customer</button></td>
                </tr>
                </form>
            </table>
        </div>
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