<?php
    if($current_page >1 && $total_page >1)
    {
        echo '<a href="index.php ? page='.($current_page -1).'" style="text-decoration: none">Prev &nbsp </a> | ';
    }
    for($i = 1; $i<=$total_page; $i++){
        if($i == $current_page)
        {
            echo'<span style="text-decoration: none"> &nbsp Trang '.$i.'</span> &nbsp |';
        }
        else{
            echo'<a href="index.php?page='.$i.'" style="text-decoration: none" >&nbsp Trang '.$i.'</a> &nbsp |';
        }
    }
    if($current_page <$total_page && $total_page>1)
    {
        echo '<a href="index.php?page='.($current_page + 1).'" style="text-decoration: none"> &nbsp Next </a> ';
    }
?>