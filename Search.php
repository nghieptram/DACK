<?php 
require_once "init.php";
require_once "functions.php";
$conversations = getLatestConversations($currentUser['id']);
        $search = strtolower($_POST['country']);
        $user = findFullname($search);
             if ($user) 
             {
                $nameOK=true;
                
             } 
             else {
                $nameOK=false;
             }
?>
<?php if($nameOK)
$sql = true;
$query = "select * from users where fullname like N'%$search%'";
$connect = mysqli_connect("localhost", "root", "", "doan");
$sql = mysqli_query($connect, $query);
$num = mysqli_num_rows($sql);
if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
                    echo "<br>";
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<A HREF='conversation.php?id='><br>{$row['fullname']}</br></A>";
                        echo '</tr>';
                    }
                }
                else if($num == 0 || $search == "" ) {
                    echo "Khong tim thay ket qua!";
                }
?>