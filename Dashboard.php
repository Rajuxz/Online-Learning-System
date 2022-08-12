<?php 
    include('includes/sidebar.php');
    include('includes/connection.php');
      
?>    
            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <!-- <h3 class="fs-2">720</h3> -->
                                <?php
                                // <h3 class="fs-2">100</h3>
                                $sql ="SELECT * FROM student";
                                $result = $conn->query($sql) or die($conn->error);
                                $row = mysqli_num_rows($result);
                                echo'<h3 class="fs-2">'.$row.'</h3>';
                                ?>
                                <p class="fs-5">Students</p>
                            </div>
                            <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                // <h3 class="fs-2">100</h3>
                                $sql ="SELECT * FROM courses";
                                $result = $conn->query($sql) or die($conn->error);
                                $row = mysqli_num_rows($result);
                                echo'<h3 class="fs-2">'.$row.'</h3>';
                                ?>
                                <p class="fs-5">Courses</p>
                            </div>
                            <!-- <i class=""></i> -->
                            <i class="fas fa-book-reader fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>
    <span class="fs-4 text-primary">Statistics of joined student.</span>
    <div class="container" style="height:60vh; background-color:#eee;">
        <div class="row">
            <canvas id="mygraph" style="border:1px solid black;height:380px;"></canvas>
        </div>
    </div>
<?php include('includes/toggle.php'); ?>