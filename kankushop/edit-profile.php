<?php
$con = mysqli_connect("localhost", "root", "", "kankushop");
$select = "SELECT * FROM user_form WHERE name=''";
$result = $con->query($select);
$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <title>KANKU</title>

     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/bootstrap-theme.min.css">
     <link rel="stylesheet" href="css/fontAwesome.css">
     <link rel="stylesheet" href="css/hero-slider.css">
     <link rel="stylesheet" href="css/owl-carousel.css">
     <link rel="stylesheet" href="css/style.css">

     <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900" rel="stylesheet">

     <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
      <div class="wrap">
        <?php
        include("header.php");
        include_once("config.php");
?>
    </div>


<br><br>
<hr style="color:gray;width:62%;margin-left:15%;margin-bottom:-20px;">
<div class="container mt-3 w-50"style="margin-left:100px;width:85%;background-color:#fff;padding:45px;border:solid gray 1px;">
<!-- <div class="small-container" style="background-color:#fff;padding:45px;border:solid gray 1px;width:119%;margin-left:-40px;"> -->
    <h2>Edit Details</h2>
    <hr style="color:gray">
    <form method="post" enctype="multipart/form-data"> <!-- Add enctype for file upload -->
        <div class="mb-3 mt-3">
            <label for="username" style="font-size:18px;">Username</label>
            <input type="text" class="form-control"  name="username" style="font-size:18px;"style="border-radius:none;"placeholder="">
        </div>
       
        <div class="mb-3 mt-3">
            <label for="profile_picture"style="font-size:18px;">Profile Picture</label>
            <input type="file"  style="font-size:18px;"class="form-control" name="profile_picture">
        </div>
        <img src="img/<?php
        if(empty($row['profile_picture'])){
            echo "profile.png";
        } else {
            echo $row['profile_picture'];
        }
        ?>"height="120px" width="120px">
       <br><br> <button type="submit" name="update"style="color:white;background-color:#ff3f6c;border:none;padding:7px;border-radius:none;">Update</button>
     <a href="change_password.php" style="color:white;background-color:#ff3f6c;text-decoration:none;padding:7.5px;border-radius:none;">change  password</a><hr style="color:gray">
    </form>
</div>
    </div>
    </div>
   
<?php
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $profile_picture_temp = $_FILES['profile_picture']['tmp_name'];
    $upload_directory = "img/";
    
    if (!file_exists($upload_directory)) {
        mkdir($upload_directory, 0777, true);
    }
    move_uploaded_file($profile_picture_temp, $upload_directory . '/' . $profile_picture);


    $update_query = "UPDATE user_form SET ";
    $fields_to_update = array();
    if (!empty($username)) {
        $fields_to_update[] = "username='$username'";
    }
    
    if (!empty($profile_picture)) {
        $fields_to_update[] = "profile_picture='$profile_picture'";
    }
    // If no fields are updated, do not proceed with the query
    if (!empty($fields_to_update)) {
        $update_query .= implode(", ", $fields_to_update);
        
        
        // Execute the update query
        $update_result = mysqli_query($con, $update_query);
        
        // Check if update was successful
        if ($update_result) {
            echo "<script>alert('Profile updated successfully');</script>";
            echo "<script>window.location.href='profile.php';</script>"; 
        } else {
            echo "<script>alert('Failed to update profile');</script>";
        }
    } else {
        echo "<script>alert('No fields were updated');</script>";
    }
}
?>

</div>
</body>
</html>
<?php
include("footer.php");
?>