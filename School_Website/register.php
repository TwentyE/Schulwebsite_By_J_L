<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

if(isset($_SESSION['login_id'])) {
  header("location: account.php"); // Redirecting To Profile
}

//Register progess start, if user press the signup button
if (isset($_POST['signUp'])) {
  if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['newPassword'])) {
    $fehlermeldung = "Please fill up all the required field.";
  } else {

  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $password = $_POST['newPassword'];
  $hash = password_hash($password, PASSWORD_DEFAULT);

  // Make a connection with MySQL server.
  include('config.php');

  $sQuery = "SELECT id from account where email=? LIMIT 1";
  $iQuery = "INSERT Into account (fullName, email, password) values(?, ?, ?)";

  // To protect MySQL injection for Security purpose
  $stmt = $conn->prepare($sQuery);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id);
  $stmt->store_result();
  $rnum = $stmt->num_rows;

  if($rnum==0) { //if true, insert new data
    $stmt->close();
    $stmt = $conn->prepare($iQuery);
    $stmt->bind_param("sss", $fullName, $email, $hash);
    if($stmt->execute()) {
      $fehlermeldung = 'Du wurdest erfolgreich regestriert, bitte logge dich jetzt mit deinen Daten ein.';}
    } else {
      $fehlermeldung = 'Diese E-mail hat schon ein anderer User.';
    }
    $stmt->close();
    $conn->close(); // Closing database Connection
  }
}

?>
<!DOCTYPE html>
<html>
  <?php include("meta.php") ?>
<head>
  <?php include("header.php") ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Register</title>
	<link rel="stylesheet" href="auth.css">
</head>
<body>
 <div class="rlform">
  <div class="rlform rlform-wrapper">
   <div class="rlform-box">
	<div class="rlform-box-inner">
	 <form method="post" oninput='validatePassword()'>
	  <p>Kreiere deinen Account</p>

     <div class="rlform-group">
	  <label>Name</label>
	  <input type="text" name="fullName" class="rlform-input" required>
	 </div>

	 <div class="rlform-group">
	  <label>E-mail</label>
	  <input type="email" name="email" class="rlform-input" required>
	 </div>

	 <div class="rlform-group">
	  <label>Passwort</label>
	  <input type="password" name="newPassword" id="newPass" class="rlform-input" required>
     </div>

     <div class="rlform-group">
	  <label>Bestätige das Passwort</label>
	  <input type="password" name="conformpassword" id="conformPass" class="rlform-input" required>
     </div>

	  <button class="rlform-btn" name="signUp">Sign Up
	  </button>

	  <div class="text-foot">
	   Du hast schon einen Account? <a href="form.php">Login</a>
	  </div>
	 </form>
	</div>
   </div>
  </div>
 </div>
     <?php include("footer.php") ?>
	<script>
		function validatePassword(){
  if(newPass.value != conformPass.value) {
    conformPass.setCustomValidity('Die Passwörter stimmen nicht überein');
  } else {
    conformPass.setCustomValidity('');
  }
}
	</script>
</body>
</html>
