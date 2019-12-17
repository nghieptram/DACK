<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "doan1");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM users WHERE fullname LIKE N'%".$request."%'
";

$result = mysqli_query($connect, $query);
$language = 'vi';
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