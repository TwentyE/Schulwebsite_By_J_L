<meta charset="utf-8">
<?php
include('session.php');
$_SESSION['pageStore'] = "setting.php";

if(!isset($_SESSION['index_id'])){
header("location: index.php"); // Redirecting To login
}

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

<a href="logout.php">Ausloggen</a>
</div>';
?>
