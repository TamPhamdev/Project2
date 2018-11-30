<?php
include_once '../../../assets/common/connect.php';

//if (mysqli_affected_rows($cn) > 0) {
//    echo '<h4> Connected</h4>';
//}

$sql = "SELECT * FROM news";
      
//echo $sql;
$result = mysqli_query($cn, $sql);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);


?>