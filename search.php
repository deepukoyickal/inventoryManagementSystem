<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","project");
    $query=mysqli_query($con, "select * from item where item_code LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['item_code'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>
