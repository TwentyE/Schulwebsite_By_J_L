<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
<script>
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#000"
    },
    "button": {
      "background": "#f1d600"
    }
  },
  "content": {
    "message": "Bitte akteptieren Sie die Cookies um auf die Webseite weitergeleitet zu werden.",
    "dismiss": "Ok ",
    "link": "Mehr",
    "href": "imprint.php"
  }
});
</script>

<div id="wrapper">
<header><img src="Bilder/Logo2.0.png" alt="Logo"></header>

<?php include('session.php'); ?>
<nav>
<ul>
<li><a href="index.php"style="color">Home</a></li>
<li><a href="vp.php">Vertretungsplan</a></li>
<li><a href="contact.php">Kontakte</a></li>

<?php
if (isset($session_fullName)) {
  echo "<li><a href=\"account.php\">Profil</a></li>";
} else {
  echo '<li><a href="form.php">Anmelden</a></li>';
}
?>
</ul>
</nav>
<div class="fehlermeldung">
  <?php
  if (isset($fehlermeldung)) {
    echo $fehlermeldung;
  }
  ?>
</div>
