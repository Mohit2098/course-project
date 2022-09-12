<?php
$conn = mysqli_connect("localhost","root","","admin");
if($conn->connect_error)
{

    echo "Failed to connect" .mysqli_error();

}

?>
