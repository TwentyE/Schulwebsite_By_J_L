<meta charset="utf-8">
<?php
include('session.php');
$_SESSION['pageStore'] = "setting.php";

if(!isset($_SESSION['login_id'])){
header("location: login.php"); // Redirecting To login
}
echo '<div style="font-size: 35px;">
<strong>Einstellungen</strong>
<br>'
. $session_fullName
. '<br>

<script type="text/javascript">
function init() {
	document.getElementById("button")
		.addEventListener("click", warnung);
}

function warnung() {
	var check = confirm("Wollen sie ihren Account wirklich Löschen?");
	if (check == true) {
		window.location = "/destroyer.php";
	}
	if (check == false) {
		window.location = "/setting.php";
}
document.addEventListener("DOMContentLoaded", init);
</script>

<a id="button" href="destroyer.php">Account Löschen</a>
<br>
<a href="index.php">Profil</a>
<a href="logout.php">Ausloggen</a>
</div>';
?>
