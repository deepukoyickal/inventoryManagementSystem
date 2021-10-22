<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","project");
    $query=mysqli_query($con, "select * from item where item_name LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['item_name'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
