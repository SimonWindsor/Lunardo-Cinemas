<?php
  require_once('tools.php');
    
/* GET is called as the method if page has already been displayed and used has clicked
  the button on one of the bookings */
  if (isset($_GET['getreceipt'])) {
    $index = $_GET['getreceipt'];
    $bookings = searchBookings($_SESSION['searchemail'], $_SESSION['searchmobile']);
    $sortedBookings = organiseBookings($bookings);
    $_SESSION = $sortedBookings[$index];
    header('Location: receipt.php');
    exit();
  } else {
    $bookings = searchBookings($_SESSION['searchemail'], $_SESSION['searchmobile']);
  }
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Current Bookings</title>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
  </head>
  <body>
    <header>
      <div>
        <span><img src="logo.png" alt="Lunardo Cinemas Logo"/>Lunardo Cinemas</span>
      </div>
      <div id="contactheader">
        <p><strong>Phone: </strong>(00) 0000 0000<br><strong>Email: </strong>admin@lunardocinemas.com.au<br>
        <strong>Address: </strong>500-1000 Random Street<br>Brookland TAS 7888</p>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <li><a href="index.php#aboutus">About Us</a></li>
          <li><a href="index.php#seatsandprices">Seats and Prices</a></li>
          <li><a href="index.php#nowshowing">Now Showing</a></li>
        </ul>
      </div>
    </nav>

    <main>
      <?php showBookings($bookings) ?>
    </main>

    <footer>
      <p><b>Contact</b><br>Phone: (00) 0000 0000<br>Email: admin@lunardocinemas.com.au</p>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Simon Windsor, s3918370, Class B. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
    </footer>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
        SESSION Contains:
        <?php print_r($_SESSION) ?>
        POST Contains:
        <?php print_r($_POST) ?>
        GET Contains:
        <?php print_r($_GET) ?>
      </pre>
    </aside>
  </body>
</html>