<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if(isset($_SESSION['login_id'])) {
  header("location: account.php"); // Redirecting To Profile
}

//echo "test";
//Login progess start, if user press the signin button
if (isset($_POST['signIn'])) {
  if (empty($_POST['fullName']) || empty($_POST['password'])) {
    echo "Username oder Password sind Falsch";
  } else {
    $name = $_POST['fullName'];
    $password = $_POST['password'];

    include('config.php');

    $sQuery = "SELECT id, password from account where fullName=? LIMIT 1";
    // To protect MySQL injection for Security purpose
    $stmt = $conn->prepare($sQuery);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    $stmt->store_result();

    if($stmt->fetch()) {
      if (password_verify($password, $hash)) {
        $_SESSION['login_id'] = $id;

        header("location: account.php"); // Redirecting To Profile
        $stmt->close();
        $conn->close();
      } else {
        echo 'Username oder Password sind Falsch';
      }
    } else {
      echo 'Username oder Password sind Falsch';
    }
    $stmt->close();
    $conn->close(); // Closing database Connection
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include("meta.php") ?>
  <body>
    <?php include("header.php") ?>
 <div class="rlform">
  <div class="rlform rlform-wrapper">
   <div class="rlform-box">
    <div class="rlform-box-inner">
   <form method="post">
    <p>Melde dich an um Fortzufahren</p>
    <div class="rlform-group">
     <label>Benutzername</label>
     <input type="fullName" name="fullName" class="rlform-input" required>
    </div>
    <div class="rlform-group password-group">
     <label>Passwort</label>
     <input type="password" name="password" class="rlform-input" required>
    </div>
    <button type="submit" class="rlform-btn" name="signIn">Sign In
    </button>
   </form>
  </div>
   </div>
     </div>
 </div>
 <?php include("footer.php") ?>
  </div>
 </body>
</html>
