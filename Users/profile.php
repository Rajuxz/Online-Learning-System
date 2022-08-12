<?php
   session_start();
   include_once('../includes/connection.php');
   include('./utilities/head.php');
   include('./utilities/sidebar.php');
   include('./utilities/aside.php');
?>
<div class="container">
    <div class="row">
        <div class="col-6">
            <?php
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM student WHERE id ={$id}";
                $result = $conn->query($sql) or die("Error!");
                $row = $result->fetch_assoc();                
            ?>
            <div class="card border-info mb-3" style="max-width: 18rem; height:300px;">
            <div class="card-header">Account Information</div>
            <div class="card-body">
                <h5 class="card-title">Name:&nbsp;<?php echo $row['sname'];?></h5>
                <p class="card-text">Email:&nbsp;<?php echo $row['semail'];?></p>
                <p class="card-text">Contact:&nbsp;<?php echo $row['sphone'];?></p>
            </div>
            
            </div>
        </div>
    </div>
</div>
<?php include('./utilities/footer.php');?>
