<?php
include("conf.php");

$states = $_POST['states'];
echo "<option  value=''>--Select City Now--</option>";

$sql = "SELECT * FROM district where state_id='$states'";
$result = $conn->query($sql);
while ($row = mysqli_fetch_array($result)) {
    $id = $row['id'];
    $district = $row['district'];
    echo "<option  value='$id'> $district</option>";
}
