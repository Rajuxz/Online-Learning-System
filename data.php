<?php
    //setting header to json
    header('Content-Type: application/json');
    include('includes/connection.php');
    //get connection
    //query to get data from the table
    $query ="SELECT count(id) as 'id', e_date from student GROUP BY e_date";


    $result = $conn->query($query);

    $data = array();

    foreach ($result as $row) {
        $data[] = $row;
    }


    $result->close();


    $conn->close();

    print json_encode($data);
?>