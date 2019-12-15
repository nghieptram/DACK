<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "demo1");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM users WHERE fullname LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["fullname"];
 }
    echo json_encode($data);
}

?>