<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php include("meta.php") ?>
  <body>
    <?php include("header.php") ?>
    <section>
  <div id="Vertretungsplan">
      <h1>Vertretungsplan</h1>
      $xml=simplexml_load_file("plan.xml") or die("Error: Cannot create object");
      echo $xml->Kurz . "<br>";
      echo $xml->le . "<br>";

      <a><h3>Gib hier deine Klasse ein:
        <form method="get" action="../search.php" />
        <input type="text" id="keyword" name="keyword" value="Gib hier deine Klasse ein" onfocus="if (this.value=='Gib hier deine Klasse ein') {this.value=''; this.style.color='#696969';}" onclick="clickclear(this, 'Search [var.site_name]')" onblur="clickrecall(this,'Search [var.site_name]')" />
        </form>


</div></h3></a>

  <br><br>
  Unser Vertretungsplan ist in der Beta-Version. Bei Problemen oder Bugs melden Sie sich bei uns über unseren Discord Server (<a href="https://discord.gg/WwJTKtqC">Discord</a>)
  </div>
    </section>
  <?php include("footer.php") ?>
</div>


  </body>
</html>
