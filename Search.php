<?php 
require_once "Init.php";
require_once "functions.php";
    $name = false;
     if (isset($_REQUEST['ok']))
     {
         $search = ($_GET['search']);
         if (!empty($search)) {
            $user = findFullname($search);
             if ($user) 
             {
                 if($user) {
                     $name = true;
                 }
             } 
             else {
                 echo"Không tim thấy!";
                 $name = false;
             }
         }
     }  
?>
<?php if ($name): ?>  
   <?php header('Location: add-friend.php');
      exit(); ?>
<?php endif; ?>