<?php 
require_once('./vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function findUserByEmail($email) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->execute(array(strtolower($email)));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function findUserById($id) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
  $stmt->execute(array($id));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}


function findFullname($search) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM users WHERE fullname like '%$search%'");
  $stmt->execute(array(strtolower($search)));
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  return $user;
}

function updateUser($user) {
    global $db;
    $stmt = $db->prepare("UPDATE users SET fullname = ?, phone = ?, hasAvatar = ? WHERE id = ?");
    $stmt->execute(array($user['fullname'], $user['phone'], $user['hasAvatar'], $user['id']));
    return $user;
  }

 
  
  function updateUserPassword($userId, $hashPassword) {
    global $db;
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute(array($hashPassword, $userId));
  }

  function createUser($fullname, $email, $password) {
    global $db;
    $code = generateRandomString(6);
    $stmt = $db->prepare("INSERT INTO users (email, password, fullname, status, code) VALUE (?, ?, ?, ?, ?)");
    $stmt->execute(array($email, $password, $fullname, 0, $code));
    $db->lastInsertId();
    sendEmail($email, $fullname, "Kích hoạt tài khoản", "Mã kích hoạt tài khoản của bạn là $code");
    return $id;
  }
  
function createForgotPass($email, $password) {
  global $db;
  $code = generateRandomString(6);
  //$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
  //$stmt->execute(array(strtolower($email)));

  //$stmt = $db->prepare("INSERT INTO users (email, fullname, code2) VALUE (?,?,?)");
  //$stmt->execute(array($email, $fullname, $code));
  $stmt = $db->prepare("UPDATE users SET password=?, code2 = ?");
  $stmt->execute(array ($password, $code));
  //$stmt = $db->prepare("UPDATE users SET password = ?, code2 = ? WHERE id = ?");
  //$stmt->execute(array($user['password'], $user['code2'], $user['id']));
  //$stmt = $db->prepare("INSERT INTO users (email, password, fullname, status, code) VALUE (?, ?, ?, ?, ?)");
  //$stmt->execute(array($email, $password, $fullname, 0, $code));
  $db->lastInsertId();
  sendEmail($email, $fullname, "Kích hoạt tài khoản", "Mã kích hoạt tài khoản của bạn là $code");
  return $id;
}



function generateRandomString($length = 10) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
  
  function sendEmail($to, $name, $subject, $content)
  {
    $mail = new PHPMailer(true);
        //Server settings                      // Enable verbose debug output
        $mail->isSMTP();   
        $email->CharSet   = 'UTF-8';                                         // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ndviet7h@gmail.com';                     // SMTP username
        $mail->Password   = '01667481692';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
  
        //Recipients
        $mail->setFrom('ltweb1.2019@gmail.com', 'LT Web 1 - 2019');
        $mail->addAddress($to, $name);     // Add a recipient
  
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->AltBody = $content;
  
        $mail->send();
    }
//
    function likeStatus($statusID, $userId)
    {
      global $db;
      $stmt = $db->prepare("INSERT INTO teamx_user_likes(statusID, userId) VALUES(?, ?)");
      $stmt->execute(array($statusID, $userId));
      return $db->lastInsertId();
    }
    
    function removeLikedStatus($statusID, $userId)
    {
      global $db;
      $stmt = $db->prepare("DELETE FROM teamx_user_likes WHERE statusID = ? AND userId = ?");
      $stmt->execute(array($statusID, $userId));
    }
    function chkLikedStatus($statusID, $userId)
    {
      global $db;
      $stmt = $db->prepare("SELECT * FROM teamx_user_likes WHERE statusID = ? AND userId = ?");
      $stmt->execute(array($statusID, $userId));
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    function updateLikeCountStatusAdd($statusID)
    {
      global $db;
      $stmt = $db->prepare("SELECT * FROM teamx_user_status WHERE statusID = ?");
      $stmt->execute(array($statusID));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $n = $row['likes'];
    
      $stmt = $db->prepare("UPDATE teamx_user_status SET likes=$n+1 WHERE statusID = ?");
      return $stmt->execute(array($statusID));
    }
    
    function updateLikeCountStatusRemove($statusID)
    {
      global $db;
      $stmt = $db->prepare("SELECT * FROM teamx_user_status WHERE statusID = ?");
      $stmt->execute(array($statusID));
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $n = $row['likes'];
    
      $stmt = $db->prepare("UPDATE teamx_user_status SET likes=$n-1 WHERE statusID = ?");
      return $stmt->execute(array($statusID));
    }   
    
//


  function activateUser($code) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE code = ? AND status = ?");
    $stmt->execute(array($code, 0));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['code'] == $code  ) {
      $stmt = $db->prepare("UPDATE users SET code = ?, status = ? WHERE id = ?");
      $stmt->execute(array('', 1, $user['id']));
      return true;
    }
    return false;
  }

  function createPost($userId, $content) {
    global $db;
    $stmt = $db->prepare("INSERT INTO posts (userId, content, createdAt) VALUE (?, ?, CURRENT_TIMESTAMP())");
    $stmt->execute(array($userId, $content));
    return $db->lastInsertId();
  }
  
  function getNewFeeds() {
    global $db;
    $stmt = $db->prepare("SELECT id, content, createdAt FROM posts WHERE id=?");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
  }
  
  function getNewFeedsForuserId($userId) {
    $conn= mysqli_connect ('localhost','root','', 'doan1');
    $result = mysqli_query ($conn, 'select count(id) as total from posts');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $total_page = ceil($total_records/$limit);
    if($current_page > $total_page)
    {
        $current_page=$total_page;
    }
    else if ($current_page<1){
        $current_page=1;
    }
    $start = ($current_page - 1) * $limit;
    global $db;
    $friends = getFriends($userId);
    $friendIds = array();
    foreach ($friends as $friend) {
      $friendIds[] = $friend['id'];
    }
    $friendIds[] = $userId;
    $stmt = $db->prepare("SELECT p.id, p.userId, u.fullname as userFullname, u.hasAvatar as userHasAvatar, p.content, p.createdAt FROM posts as p LEFT JOIN users as u ON u.id = p.userId  WHERE p.userId IN (" . implode(',', $friendIds) .  ") ORDER BY createdAt DESC  LIMIT $start, $limit");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
  }
  
  function getNewFeedsForProfile($userId) {
    global $db;
    $stmt = $db->prepare("SELECT p.id, p.userId, u.fullname as userFullname, u.hasAvatar as userHasAvatar, p.content, p.createdAt FROM posts as p LEFT JOIN users as u ON u.id = p.userId WHERE p.userId =$userId ORDER BY createdAt DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
  }
  
  function resizeImage($filename, $max_width, $max_height)
  {
    list($orig_width, $orig_height) = getimagesize($filename);
  
    $width = $orig_width;
    $height = $orig_height;
  
    # taller
    if ($height > $max_height) {
      $width = ($max_height / $height) * $width;
      $height = $max_height;
    }
  
    # wider
    if ($width > $max_width) {
      $height = ($max_width / $width) * $height;
      $width = $max_width;
    }
  
    $image_p = imagecreatetruecolor($width, $height);
  
    $image = imagecreatefromjpeg($filename);
  
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $orig_width, $orig_height);
  
    return $image_p;
  }
  
  
  function activateForgotPass($code)
  {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE code2 = ?");
    $stmt->execute(array ($code));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if($user && $user['code2'] == $code)
    {
      $stmt = $db->prepare("UPDATE users SET code2 = ?  WHERE id = ?");
      $stmt->execute(array ("", $user['id']));
      return true;
    }
    return false;
  }


  function getfriendship($userId1, $userId2)
  {
    global $db;
    $stmt = $db->prepare("SELECT * FROM friendship WHERE userId1 = ? AND userId2 = ?");
    $stmt->execute(array ($userId1, $userId2));
    return  $stmt->fetch(PDO::FETCH_ASSOC);
  }

  function removefriendRequest($userId1, $userId2)
  {
    global $db;
    $stmt = $db->prepare("DELETE FROM friendship  WHERE (userId1 = ? AND userId2 = ?) OR (userId2 = ? AND userId1 = ?)");
    $stmt->execute(array ($userId1, $userId2,$userId1, $userId2));

  }

  function isFollow($userId1, $userId2) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM friendship WHERE userId1 = ? AND userId2 = ?");
    $stmt->execute(array($userId1, $userId2));
    $user1ToUser2 = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user1ToUser2) {
      return false;
    }
    $stmt = $db->prepare("SELECT * FROM friendship WHERE userId1 = ? AND userId2 = ?");
    $stmt->execute(array($userId2, $userId1));
    $user2ToUser1 = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user2ToUser1) {
      return false;
    }
    return true;
  } 
function getFriends($userId) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM friendship WHERE userId1 = ? OR userId2 = ?");
  $stmt->execute(array($userId, $userId));
  $following = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $friendship = array();
  for ($i = 0; $i < count($following); $i++) {
    $row1 = $following[$i];
    if ($userId == $row1['userId1']) {
      $userId2 = $row1['userId2'];
      for ($j = 0; $j < count($following); $j++) {
        $row2 = $following[$j];
        if ($userId == $row2['userId2'] && $userId2 == $row2['userId1']) {
          $friendship[] = findUserById($userId2);
        }
      }
    }
  }
  return $friendship;
}
function unfriend($userId1, $userId2) {
  global $db;
  $stmt = $db->prepare("DELETE FROM friendship WHERE userId1 = ? AND userId2 = ?");
  $stmt->execute(array($userId1, $userId2));
  $stmt = $db->prepare("DELETE FROM friendship WHERE userId1 = ? AND userId2 = ?");
  $stmt->execute(array($userId2, $userId1));
}

function sendFriendRequest($userId1, $userId2) {
  global $db;
  $stmt = $db->prepare("INSERT INTO friendship(userId1, userId2) VALUES(?, ?)");
  $stmt->execute(array($userId1, $userId2));
}

function acceptFriendRequest($userId1, $userId2) {
  global $db;
  $stmt = $db->prepare("INSERT INTO friendship(userId1, userId2) VALUES(?, ?)");
  $stmt->execute(array($userId1, $userId2));
}
function getID($userId1) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM notify WHERE  forUserID = $userId1 ");
  return $stmt->fetch(PDO::FETCH_ASSOC);
   
}

function rejectFriendRequest($userId1, $userId2) {
  global $db;
  $stmt = $db->prepare("DELETE FROM friendship WHERE userId1 = ? AND userId2 = ?");
  $stmt->execute(array($userId2, $userId1));
}
function cancelFriendRequest($userId1, $userId2) {
  global $db;
  $stmt = $db->prepare("DELETE FROM friendship WHERE userId1 = ? AND userId2 = ?");
  $stmt->execute(array($userId1, $userId2));
}

function getLatestConversations($userId) {
  global $db;
  $stmt = $db->prepare("SELECT userId2 AS id, u.fullname, u.hasAvatar FROM messages AS m LEFT JOIN users AS u ON u.id = m.userId2 WHERE userId1 = ? GROUP BY userId2 ORDER BY createdAt DESC");
  $stmt->execute(array($userId));
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  for ($i = 0; $i < count($result); $i++) {
    $stmt = $db->prepare("SELECT * FROM messages WHERE userId1 = ? AND userId2 = ? ORDER BY createdAt DESC LIMIT 1");
    $stmt->execute(array($userId, $result[$i]['id']));
    $lastMessage = $stmt->fetch(PDO::FETCH_ASSOC);
    $result[$i]['lastMessage'] = $lastMessage;
  }
  return $result;
}

function getMessagesWithuserId($userId1, $userId2) {
  global $db;
  $stmt = $db->prepare("SELECT * FROM messages WHERE userId1 = ? AND userId2 = ? ORDER BY createdAt");
  $stmt->execute(array($userId1, $userId2));
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


//cmt 

function createComment($idPost,$userId, $tittle) {
  global $db;
  $stmt = $db->prepare("INSERT INTO comments (idPost, userId, tittle, createdAt) VALUE (?, ?, CURRENT_TIMESTAMP())");
  $stmt->execute();
  $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $db->lastInsertId();
}

function getAllComment() {
  global $db;
  $stmd = $db -> prepare("SELECT p.id, p.userId, u.fullname as userFullname, u.hasAvatar as userHasAvatar, p.content, p.createAt FROM comments as p LEFT JOIN users as u On u.id = p.userId ORDER BY createdAt DESC");
  $stmt->execute();
  $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
  return $comments;
}

function sendMessage($userId1, $userId2, $content) {
  global $db;
  $stmt = $db->prepare("INSERT INTO messages (userId1, userId2, content, type, createdAt) VALUE (?, ?, ?, ?, CURRENT_TIMESTAMP())");
  $stmt->execute(array($userId1, $userId2, $content, 0));
  $id = $db->lastInsertId();
  $stmt = $db->prepare("SELECT * FROM messages WHERE id = ?");
  $stmt->execute(array($id));
  $newMessage = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt = $db->prepare("INSERT INTO messages (userId2, userId1, content, type, createdAt) VALUE (?, ?, ?, ?, ?)");
  $stmt->execute(array($userId1, $userId2, $content, 1, $newMessage['createdAt']));
}


function getAllNotify($forUserID) {
  global $db;
  $stmt = $db -> prepare("SELECT fromUserID, forUserID, fullname, createdAt FROM notify, users WHERE forUserID=$forUserID and users.id = notify.fromUserID ORDER BY createdAt DESC");
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertNotify_Notify($forUserID, $fromUserID) {
  global $db;
  $stmt = $db->prepare("INSERT INTO notify (n_type, forUserID, fromUserID) VALUES (?, ?, ?)");
  $stmt->execute(array(1, $forUserID, $fromUserID));
  return $db->lastInsertId();
}

function deleteMessageWithId($id)
  {
    global $db;
    $stmt = $db->prepare("DELETE FROM messages WHERE userId1=?");
    $stmt->execute(array($id));
  }
?>