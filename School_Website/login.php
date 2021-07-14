<?php
session_start(); // Starting Session

//if session exit, user nither need to signin nor need to signup
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
      $pageStore = $_SESSION['pageStore'];
header("location: $pageStore"); // Redirecting To Profile Page
    }
}

//Login progess start, if user press the signin button
if (isset($_POST['signIn'])) {
if (empty($_POST['fullName']) || empty($_POST['password'])) {
echo "Username oder Password sind Falsch";
}
else
{

$name = $_POST['fullName'];
$password = $_POST['password'];

// Make a connection with MySQL server.
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

          if (isset($_SESSION['pageStore'])) {
            $pageStore = $_SESSION['pageStore'];
          }
          else {
            $pageStore = "account.php";
          }
          header("location: $pageStore"); // Redirecting To Profile
          $stmt->close();
          $conn->close();

        }
else {
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
