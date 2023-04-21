<?php
  require_once("tools.php");
  
  if (empty($_SESSION)) {
    header("Location index.php");
     exit();
  }
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Receipt and Page and Tickets</title>
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
      <section id="receipt">
        <div id="userandmovie">
          <div class="userdetails">
            <h2>Purchaser Details</h2>
            <p><em>Name: </em><?= $_SESSION['user']['name'] ?></p>
            <p><em>Email: </em><?= $_SESSION['user']['email'] ?></p>
            <p><em>Mobile: </em><?= $_SESSION['user']['mobile'] ?></p>
          </div>
          <div class="seeingmovie">
            <h2>Movie</h2>
            <p><em>Movie: </em><?= $_SESSION['movie'] ?></p>
            <p><em>Rating: </em><?= $movieArray[$_SESSION['code']]['rating'] ?></p>
            <p><em>Showing: </em><?php echo getScreeningSession($_SESSION['code'], $_SESSION['day']); ?></p>
          </div>
        </div>
        <div class="ticketsummary">
          <h2>Purchase Summary</h2>
          <table>
            <thead>
              <tr><th>Ticket Type</th><th>Quantity</th><th>Total</th></tr>
            </thead>
            <?php ticketSummary($_SESSION['seats'], $_SESSION['code'], $_SESSION['day']); ?>
          </table>
        </div>
        <!-- Div below is not to be shown on print -->
        <div class="printmessage"><br><strong>You can print this page!</strong></div>
      </section>
      <!-- Function called to display tickets, they are one section each -->
      <?php displayTickets(); ?>
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
      </pre>
    </aside>
  </body>
</html>