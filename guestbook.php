<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  '****',
  'opentutorials');

  $sql = "SELECT * FROM guest ORDER BY created DESC";
  $result = mysqli_query($conn, $sql);
  $list = '';
  $li = '';
  while($row = mysqli_fetch_array($result)){
    //escaping
    $escaped_name = htmlspecialchars($row['name']);
    $escaped_content = htmlspecialchars($row['content']);
    $list =  $list."<p>{$escaped_name}&nbsp;{$escaped_content} {$row['created']}</p><br>";
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="fontello-39ab2155/css/fontello.css">
		<link rel="stylesheet" href="assets/css/guestbook.css" />
		<link rel="stylesheet" href="assets/css/reset.css">
    <title>Guest Book</title>
  </head>
  <body>
    <ul class="menu">
				<li><a href="home.html"><span class="logo"><img src="images/logo.jpg" alt="" /></span></a></li>
				<li><a href="exhibition.html">Exhibition</a></li>
				<li><a href="greeting.html">Greeting</a></li>
				<li class="last"><a href="guestbook.php">Guest Book</a></li>
		</ul>
    <div id="wrapper">

      <!-- Header -->
        <header id="header">
          <h1>Guest Book</h1>
        </header>

        <section id="main">
          <div style="overflow-y:scroll;" class="show">
            <?=$list?>
          </div>
          <form action="process_create.php" method="POST" target="param">
            <p class="group"><input type="text" name="name" class="name" required/>
              <span class="highlight"></span>
              <span class="bar"></span>
              <label>Name</label>
              <input type="submit" class="submit" value="Submit"></p>

            <br>
            <p><textarea name="content" class="content"
              placeholder="방명록을 남겨주세요" required></textarea></p>
          </form>
        </section>



      </div>

      <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/main.js"></script>
  </body>
</html>
