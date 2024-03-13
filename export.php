<?php
include("connection.php");
include("session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cargo Ltd - Export</title>
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
                <h1>Exported Fruniture</h1>
                <div class="line"></div>
            </div>

            <div class="right-content">
            <div class="buttons">
                    <a href="add_export.php">Add Export...</a>
                </div>
                <table>
                    <tr>
                        <th>Furniture Name</th>
                        <th>Export Date</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                    $select=$con->query("SELECT * FROM `export`");
                    if(mysqli_num_rows($select) > 0){
                    while($row = mysqli_fetch_assoc($select)){
                    ?>
                    <tr>
                        <td><?php
                         $view=$con->query("SELECT furniture_name FROM furniture WHERE furniture_id=".$row['furniture_id']);
                         $one=mysqli_fetch_assoc($view);
                         $furniture_name=$one['furniture_name'];
                         echo $furniture_name;
                         ?></td>
                        <td><?php echo $row['export_date'];?></td>
                        <td><?php echo $row['quantity'];?></td>
                        <td>
                            <a href="edit_export.php?export_id=<?php echo $row['export_id'];?>">Edit</a>

                            <a href="delete_export.php?export_id=<?php echo $row['export_id'];?>">Delete</a>
                        </td>
                    </tr>
                    <?php    
                    }
                    }
                    else{
                        echo "<h1>No Export Available...</h1>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>