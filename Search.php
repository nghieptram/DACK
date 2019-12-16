<?php 
require_once "Init.php";
require_once "functions.php";
        
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
$query = "select * from users where fullname like N'%$search%'";
$connect = mysqli_connect("localhost", "root", "", "demo1");
$sql = mysqli_query($connect, $query);
$num = mysqli_num_rows($sql);

if ($num > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$num ket qua tra ve voi tu khoa <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10">';
                    while ($row = mysqli_fetch_assoc($sql)) {
                        echo '<tr>';
                            echo "<td>{$row['fullname']}</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
?>

