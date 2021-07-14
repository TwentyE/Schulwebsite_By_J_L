<?php
session_start();
include('session.php');
$_SESSION['pageStore'] = "setting.php";

if(!isset($_SESSION['login_id'])){
header("location: form.php.php");
}
$Squery = "DELETE from account where id = ? LIMIT 1";
include('config.php');
$stmt = $conn->prepare($Squery);
$stmt->bind_param("i", $_SESSION['login_id']);
$stmt->execute();

if(session_destroy())
{
header("Location: form.php"); // Redirecting To Home Page
}
?>
