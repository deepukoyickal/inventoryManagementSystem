<?php
    $key=$_GET['word'];
    $array1 = array();
    $con=mysqli_connect("localhost","root","","project");
    $query=mysqli_query($con, "select * from daily_customers where customer_id LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array1[] = $row['customer_id'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
