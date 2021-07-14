<?php include("meta.php") ?>
<?php include("header.php") ?>
<?php
if (isset($session_fullName)) {
?>  <div id="Videos">
  <center>
    <h1>3 Gratis-Kurse:</h1>
    <br>
    <h2>Wo ist die Liebe?</h2>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/RSkrUUYTkBs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br><br><br><br>
  <h2>Frohe Weihnachten-Special Teil 1</h2>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/PAHCg7AnQXI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <br><br><br><br>
  <h2>Greenscreen</h2>
  <iframe width="560" height="315" src="https://www.youtube.com/embed/SNNZ-ZG_j4M" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<?php
} else {
  echo 'Du musst dich Anmelden um auf diese Seite zu gelangen';
}
?>
  <?php include("footer.php") ?>
