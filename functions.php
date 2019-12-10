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
    $stmt = $db->prepare("SELECT p.id, p.userId, u.fullname as userFullname, u.hasAvatar as userHasAvatar, p.content, p.createdAt FROM posts as p LEFT JOIN users as u ON u.id = p.userId ORDER BY createdAt DESC");
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

  function sendfriendRequest($userId1, $userId2)
  {
    global $db;
    $stmt = $db->prepare("INSERT INTO friendship(userId1,userId2) VALUE (?,?)");
    $stmt->execute(array ($userId1, $userId2));

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
?>