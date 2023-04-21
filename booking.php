<?php
  require_once('tools.php');
  $moviecode = '';
  $namefield = '';
  $emailfield = '';
  $mobilefield = '';
  $nameError = '';
  $emailError = '';
  $mobileError = '';
  $seatError = '';
  $dayError = '';
  
  // In case booking button has been clicked
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    require_once("post-validation.php");
    $errorMsgs = validateBooking();
    // In case no errors in the form exist, user can be referred to receipt page and data written to bookis.txt
    if (count($errorMsgs) == 0) {
      $_SESSION = $_POST;
      // Write to bookings.txt
      dataToFile();
      header('Location: receipt.php'); 
      exit();
    } else if (isset($_POST['searchbookings'])) {
      if (isBookings($_POST['searchemail'], $_POST['searchmobile'])) {
        $_SESSION = $_POST;
        header('Location: currentbookings.php');
      } else
        echo '<div class="searcherror">No matches found</div>';
    } else { // if there are errors, pre-filled data will be entered
      $moviecode = trim($_POST['code']);
      $nameError = $errorMsgs['user']['name'];
      $emailError = $errorMsgs['user']['email'];
      $mobileError = $errorMsgs['user']['mobile'];
      $seatError = $errorMsgs['seats'];
      $dayError = $errorMsgs['day'];
      $namefield = unsetFB($_POST['user']['name']);
      $emailfield = unsetFB($_POST['user']['email']);
      $mobilefield = unsetFB($_POST['user']['mobile']);
    } 
  } else { // If page is loaded with GET data
    $moviecode = $_GET['movie'];
  }

  // Refer user back to index in case movie code isn't valid
  if (!isset($movieArray[$moviecode])) {
    header('Location: index.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Booking Page</title>
    
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
  </head>

  <!-- For A3, onload has been added as when checking for post errors, table would not redisplay -->
  <!-- For A4, recallUser() is called also to prefill localStarage data -->
  <body onload="calcTotalPrice(); recallUser();">
    <header>
      <div>
        <span><img src="logo.png" alt="Lunardo Cinemas Logo"/>Lunardo Cinemas</span>
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
      <!-- Section below displays movie data based on GET data or re-used post data -->
      <section>
        <h2><?= $movieArray[$moviecode]['title'] ?></h2>
        <div class="film">
          <div class="filminfo">
            <h3>Starring:</h3>
            <?= $movieArray[$moviecode]['starring'] ?><br><br>
            <h3>Directed By:</h3>
            <?= $movieArray[$moviecode]['director'] ?><br><br>
            <h3>Synopsis:</h3>
            <p>
              <?= $movieArray[$moviecode]['synopsis'] ?>
            </p>
          </div>
          <iframe width="560" height="315" src=<?= $movieArray[$moviecode]['trailer'] ?> 
            title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;
            clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
          </iframe>

        </div>

      </section>
      <!-- Section below displays form for user selection -->
      <section>
        <!-- "onsubmit="return checkValid()"" to be used instead of "novalidate" for client-side vaildation -->
        <form action='booking.php' method='post' onchange="calcTotalPrice()"  novalidate>
          <input type="hidden" id="movie" name="movie" value="<?= $movieArray[$moviecode]['title'] ?>">
          <input type="hidden" id="code" name="code" value="<?= $moviecode ?>">
          <h2>Select Seats</h2>
          <div class="inputerror"><?= $seatError ?></div>
          <!-- Php method below is called to display drop-down menus for seat selection -->
          <div class="seatselect">
            <?php getSeatSelector(); ?>
          </div>
          <!-- Div below displays on client-side verification -->
          <div id="noseats" hidden>
            <p>Select Seats!</p>
          </div>
          <br><h2>Select Screening Time</h2>
          <div class="inputerror"><?= $dayError ?></div>
          <!-- Php method below is called to display radio buttons for time selection -->
          <div class="timeselect">
            <fieldset>
              <?php getScreenTimes($moviecode); ?>
            </fieldset>
          </div>
          <!-- Div below displays on client-side verification -->
          <div id="noscreen" hidden>
            <p>Select Screening Time!</p>
          </div>
          <div id="pricetable">
          </div>
          <br><h2>Enter Details</h2>
          <!-- Div below displays text boxes for user details -->
          <div class="purchaserdetails">
            <!-- Divs have been put next to textbox labels to display errors after POST -->
            <div><div class="inputerror"><?= $nameError ?></div>Full Name: 
            <input type="text" id="user[name]" name="user[name]" pattern="[-A-Za-z '.]{1,64}" 
            value="<?= $namefield ?>" required></div>
            <div><div class="inputerror"><?= $emailError ?></div>Email: 
            <input type="email" id="user[email]" name="user[email]" 
            value="<?= $emailfield ?>" required></div>
            <div><div class="inputerror"><?= $mobileError ?></div>Mobile Number: 
            <input type="text" id="user[mobile]" name="user[mobile]" pattern="(\(04\)|04|\+614)( ?\d){8}"
            value="<?= $mobilefield ?>" required></div>
          </div>
          <br><input type="submit" id="submit" value="Book Tickets"/>
          <!-- For A4, new checkbox has been added to remember or forget user from local storage -->
          <input type="checkbox" id="remember-forget" name="remember-forget" value="Remember Me" onchange="rememberForget(this)"/>
          <label for="remember-forget" id="remlabel"></label>
        </form>
      </section>
    </main>
    <footer>
      <?php footerSearchForm() ?>
      <p><b>Contact</b><br>Phone: (00) 0000 0000<br>Email: admin@lunardocinemas.com.au</p>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Simon Windsor, s3918370, Class B. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <aside id="debug">
      <hr>
      <h3>Debug Area</h3>
      <pre>
        GET Contains:
        <?php print_r($_GET) ?>
        POST Contains:
        <?php print_r($_POST) ?>
        SESSION Contains:
        <?php print_r($_SESSION) ?>
      </pre>
    </aside>
    <script src='script.js'></script>
  </body>
</html>
