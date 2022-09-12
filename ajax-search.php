<?php
  require('connection.php');
  session_start();

$search_value = $_POST["search"];

$sql = "SELECT * FROM user WHERE  name LIKE '%{$search_value}%'";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr>
                <th width="60px">Id</th>
                <th>Name</th>
           
              </tr>';

              while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr><td align='center'>{$row["id"]}</td>
                <td>{$row["name"]}</td>
                <td>{$row["contact"]}</td>";
                
                
                
              }
    $output .= "</table>";

    mysqli_close($conn);

    echo $output;
}else{
    echo "<h2>No Record Found.</h2>";
}

?>
