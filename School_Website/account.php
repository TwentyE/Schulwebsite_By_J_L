<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include("meta.php") ?>
  <body>
    <?php include("header.php") ?>
  <section2>
    <?php
      if(!isset($_SESSION['login_id'])){
        header("location: form.php"); // Redirecting To login
      }
      echo '<div style="font-size: 35px;">
      <strong>Profil</strong>
      <br>'
      . $session_fullName
      . '<br>
      <a href="logout.php">Ausloggen</a>
      </div>';
      ?>
    </section2>
        <?php include("footer.php") ?>
    </div>
  </body>
</html>
