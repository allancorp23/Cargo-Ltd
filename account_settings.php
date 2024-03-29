<?php
include("connection.php");
include("session.php");

$uname=$_SESSION['cargo_manager'];

// Select Data
$select=$con->query("SELECT * FROM `manager` WHERE `username`='$uname'");
$row=mysqli_fetch_assoc($select);
$username= $row['username'];
$password= $row['password'];

// Update Data
if(isset($_POST['update_manager'])){
    $username=mysqli_real_escape_string($con,$_POST['username']);
    $password=mysqli_real_escape_string($con,$_POST['password']);

    $update=$con->query("UPDATE `manager` SET `username`='$username',`password`='$password' WHERE `username`='$uname'");

    if($update){
        $_SESSION['cargo_manager']=$username;
        echo
        "
        <script>
            alert('Account Updated Successfully...');
        </script>
        ";
    }

    else{
        echo
        "
        <script>
            alert('Failed to Update Account...');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Account Settings</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="./imgs/icon.ico" type="image/x-icon">
</head>
<body>
    <div class="dashboard-container">
        <?php
            include("sidebar.php");
        ?>
        <div class="dashboard-right">
            <div class="right-title">
                <h1>Account Settings</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
                <form action="" method="post">
                    <label>Current Username:</label>
                    <input type="text" name="username" value="<?php echo $username;?>">
                    <label>Current Password:</label>
                    <input type="text" name="password" value="<?php echo $password;?>">
                    <button type="submit" name="update_manager">Update Account...</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>