<?php
    include('./includes/connection.php');
    $sql = "SELECT sname,sphone,semail FROM student";
    $result = $conn->query($sql) or die("Went wrong!");
    $header = "Name"."\t"."Phone"."\t"."Email"."\t";
    $setData = '';
    while($row = mysqli_fetch_row($result)){
        $rowData = '';
        foreach($row as $value){
            $value = '"'.$value.'"'."\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData)."\n";
    }
    header("Content-type: application/octet-stream");  
    header("Content-Disposition: attachment; filename=StudentDetails.xls"); 
    header("Pragma: no-cache");
    header("Expires: 0"); 
    echo ucwords($header) . "\n" . $setData . "\n";  
?>