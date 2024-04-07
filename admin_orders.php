<?php
include 'config.php';
session_start();
$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>
<?php include 'admin_header.php'; ?>

<section class="orders">
    <h1 class="title">Placed Orders</h1>
    <div class="box-container">
        <?php
        $select_orders = mysqli_query(
            $conn,
            "SELECT * FROM `orders`"
        ) or die ('Query failed');
        
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
        ?>
        <div class="box">
                <p> User ID : <span><?php echo $fetch_orders[] ?></span></p>
        
        </div>
        <?php 
            }
        }else {
            echo '<p class="empty">No orders placed yet.</p>';
        }
        ?>
    </div>
</section>





<script src="js/admin_script.js"></script>
</body>
</html>