<?php
$conn= mysqli_connect ('localhost','root','', 'doan1');
$result = mysqli_query ($conn, 'select count(id) as total from posts');
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$total_page = ceil($total_records/$limit);
if($current_page > $total_page)
{
    $current_page=$total_page;
}
else if ($current_page<1){
    $current_page=1;
}
$start = ($current_page - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM posts LIMIT $start, $limit");
?>