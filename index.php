<?php
  require_once('tools.php');

  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isBookings($_POST['searchemail'], $_POST['searchmobile'])) {
      $_SESSION = $_POST;
      header('Location: currentbookings.php');
    } else
      echo '<div class="searcherror">No matches found</div>';
  }
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lunardo Home Page</title>

    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css?t=<?= filemtime("style.css"); ?>">
    <script src='../wireframe.js'></script>
  </head>

  <body onscroll="navBarControl()">

    <header>
      <div>
        <span><img src="logo.png" alt="Lunardo Cinemas Logo"/>Lunardo Cinemas</span>
      </div>
    </header>

    <nav>
      <div>
        <ul>
          <li><a href="#aboutus">About Us</a></li>
          <li><a href="#seatsandprices">Seats and Prices</a></li>
          <li><a href="#nowshowing">Now Showing</a></li>
        </ul>
      </div>
    </nav>

    <main>
      <section id = "aboutus">
        <h2>About Us</h2>
        <h3>Our Story</h3>
        <p>
          Lunardo Cinemas have been proudly serving the Brookland region since 2003.
          For nearly 20 years, we have provided a comfortable, convenient, immersive
          and yet affordable cinematic experience. Our theatres have provided a
          local and near-by alternative to city cinemas.
        </p>
        <p>
          During the COVID 19 pandemic, we have invested in upgrades to our threaters
          in order to bring a modernised and more competitive set of comfort and
          technology to appeal to the more seasoned cinema-viewer.
        </p>
        <p>
          We are proud to annouce our grand re-opening in February, showcasing
          our new upgrades:
        </p>
        <h3>New seats:</h3>
        <p>
          We now offer a comfortable yet affordable viewing experience with our
          new standard seats as well premium reclinable seats.
        </p>
        <h3>Sound:</h3>
        <p>
          We have recently adopted a
          <a href = "https://professional.dolby.com/cinema/dolby-atmos">Dolby Atmos</a>
          sound installation including overhead speakers in our theatres for a truly immersive
          cinematic experience.
        </p>
        <h3>Visual:</h3>
        <p>
          Along with our new audio installation, Lundardo Cinemas also offer a new upgrade
          with <a href = "https://professional.dolby.com/cinema/">3D Dolby Vision</a> for
          a stunning 3D expereince.
        </p>
      </section>

    <section id = "seatsandprices">
      <h2>Seats and Prices</h2>
      <div class = seating>  
        <div class = standard >
          <h3>Standard Seating</h3><br>
          <img src="../../media/Profern-Standard-Twin.png" alt="Standard Seating">
        </div>
        <div class = firstclass>
          <h3>First Class Seating</h3><br>
          <img src="../../media/Profern-Verona-Twin.png" alt="First Class Seating">
        </div>
      </div>
	    <table>
        <tbody>
          <tr>
            <th>Seat Type</th>
            <th>Seat Code</th>
            <th>Discounted Prices</th>
            <th>Normal Prices</th>
          </tr>
          <tr>
            <td>Standard Adult</td>
            <td>STA</td>
            <td>16.00</td>
            <td>21.50</td>
          </tr>
          <tr>
            <td>Standard Concession</td>
            <td>STP</td>
            <td>14.50</td>
            <td>19.00</td>
          </tr>
          <tr>
            <td>Standard Child</td>
            <td>STC</td>
            <td>13.00</td>
            <td>17.50</td>
          </tr>
          <tr>
            <td>First Class Adult</td>
            <td>FCA</td>
            <td>25.00</td>
            <td>31.00</td>
          </tr>
          <tr>
            <td>First Class Concession</td>
            <td>FCP</td>
            <td>23.50</td>
            <td>28.00</td>
          </tr>
          <tr>
            <td>First Class Child</td>
            <td>FCC</td>
            <td>22.00</td>
            <td>25.00</td>
          </tr>
        </tbody>
	    </table>
    </section>

    <section id = "nowshowing">
      <h2>Now Showing</h2>
      <div class="cardgrid">
        <?php  makeFlipCard(); ?>
      </div>
    </section>

    </main>

    <footer>
      <!-- New section for A4 for retrieving bookings, written as function for re-use in bookings.php-->
      <?php footerSearchForm() ?>
      <p><b>Contact</b><br>Phone: (00) 0000 0000<br>Email: admin@lunardocinemas.com.au</p>
      <div>&copy;<script>
        document.write(new Date().getFullYear());
      </script> Simon Windsor, s3918370, Class B. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
      <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
      <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <script src='script.js'></script>
  </body>
</html>
