<?php
  session_start();

  // Array to create seat selections
  $seatsArray = [
    'Standard Adult Seats' => ['code' => "STA", 'fullprice' => "21.5", 'discprice' => "16"],
    'Standard Concession Seats' => ['code' => "STP", 'fullprice' => "19", 'discprice' => "14.5"],
    'Standard Child Seats' => ['code' => "STC", 'fullprice' => "17.5", 'discprice' => "13"],
    'First Class Adult Seats' => ['code' => "FCA", 'fullprice' => "31", 'discprice' => "25"],
    'First Class Concession Seats' => ['code' => "FCP", 'fullprice' => "28", 'discprice' => "23.5"],
    'First Class Child Seats' => ['code' => "FCC", 'fullprice' => "25", 'discprice' => "22"]
  ];

  // Array containg movies data as sub-arrays.
  $movieArray = [
    'ACT' => [
      'title' => "Avatar: The Way of Water",
      'rating' => "M",
      'director' => "James Cameron",
      'starring' => "Sam Worthington, Zoe Saldana",
      'synopsis' => "After a decade since Jake Sully has been raising a family with his wife Neytiri on the
                    extrasolar moon of Pandora. One day, humans on board an RDA ship return once again to
                    Pandora. The humans have laid a new base on Pandora and Jake must now work with Neytiri
                    to protect his home. Colonel Quaritch, has now been cloned into a Na'vi body and with
                    has memories uploaded from before his death. Quaritch is unable to remember his demise
                    at the hands of Jake but is only able to recall past events along with his vengeful
                    mission to eliminate Jake.",
      'minisynop' => "On the extrasolar moon Pandora, Jake Sully lives with his newfound family. Now a
                      familiar threat returns to finish what was previously started, Jake must work with
                      Neytiri and the army of the Na'vi race to protect all that belongs to them.",
      'poster' => "movie_posters/avatarwow.jpg",
      'trailer' => "https://www.youtube.com/embed/d9MyW72ELq0",
      'times' => [
        'MON' => ['dayname' => "Monday", 'time' => "9:00pm", 'price' => "discprice"],
        'TUE' => ['dayname' => "Tuesday", 'time' => "9:00pm", 'price' => "discprice"],
        'WED' => ['dayname' => "Wednesday", 'time' => "9:00pm", 'price' => "fullprice"],
        'THU' => ['dayname' => "Thursday", 'time' => "9:00pm", 'price' => "fullprice"],
        'FRI' => ['dayname' => "Friday", 'time' => "9:00pm", 'price' => "fullprice"],
        'SAT' => ['dayname' => "Saturday", 'time' => "6:00pm", 'price' => "fullprice"],
        'SUN' => ['dayname' => "Sunday", 'time' => "6:00pm", 'price' => "fullprice"]
      ]
    ],
    'FAM' => [
      'title' => "Puss in Boots: The Last Wish",
      'rating' => "PG",
      'director' => "Joel Crawford, Januel Mercado",
      'starring' => "Antonio Banderas, Salma Hayek, Harvey Guillén",
      'synopsis' => "Spanish lover and hero, Puss in Boots, is now down to the last of his nine lives. To make matter worse, the determmined bounty hunter named The Big Bad Wolf is also out to get him. For Puss to get back his nine lives and to escape fate at the hands of the Big Bad Wolf, he must obtain the courage to embark on a dangerous quest into the Dark Forest to find the Wishing Star. Not only is Puss seeking the map to the magical star though, and he must put his skills to use in order to get to it before his adversaries. Does Puss in Boots have what it takes?",
      'minisynop' => "Puss in Boots now finds that his passion for adventure has taken its toll: he has
                      lost eight of his nine lives. Puss sets out on an epic journey to find the mythical
                      Last Wish and get back his nine lives.",
      'poster' => "movie_posters/pussboots.jpg",
      'trailer' => "https://www.youtube.com/embed/RqrXhwS33yc",
      'times' => [
        'MON' => ['dayname' => "Monday", 'time' => "12:00pm", 'price' => "fullprice"],
        'TUE' => ['dayname' => "Tuesday", 'time' => "12:00pm", 'price' => "fullprice"],
        'WED' => ['dayname' => "Wednesday", 'time' => "6:00pm", 'price' => "fullprice"],
        'THU' => ['dayname' => "Thursday", 'time' => "6:00pm", 'price' => "fullprice"],
        'FRI' => ['dayname' => "Friday", 'time' => "6:00pm", 'price' => "fullprice"],
        'SAT' => ['dayname' => "Saturday", 'time' => "12:00pm", 'price' => "discprice"],
        'SUN' => ['dayname' => "Sunday", 'time' => "12:00pm", 'price' => "discprice"]
      ]
    ],
    'RMC' => [
      'title' => "Weird: The Al Yankovic Story",
      'rating' => "MA",
      'director' => "Eric Appel",
      'starring' => "Diedrich Bader, Daniel Radcliffe, Lin-Manuel Miranda",
      'synopsis' => "Witness the enexaggerated true story of Weird Al Yankovic. Coming from an upbringing where playing the accordian was a sin, Weird Al rebels and relentlessly pursues his dream of changing words to well known songs. An instant success and sex symbol, Weird Al, leads a lifestyle of excess and pursues romance that nearly breaks him.",
      'minisynop' => "Delve into the life of Weird Al Yankovic, from his rise to fame with early hits
                      like 'Eat It' and 'Like a Surgeon' to his torrid celebrity love affairs and famously
                      depraved lifestyle.",
      'poster' => "movie_posters/weirdalstory.jpg",
      'trailer' => "https://www.youtube.com/embed/cCNKdJ2CIJk",
      'times' => [
        'WED' => ['dayname' => "Wednesday", 'time' => "12:00pm", 'price' => "fullprice"],
        'THU' => ['dayname' => "Thursday", 'time' => "12:00pm", 'price' => "fullprice"],
        'FRI' => ['dayname' => "Friday", 'time' => "12:00pm", 'price' => "fullprice"],
        'SAT' => ['dayname' => "Saturday", 'time' => "3:00pm", 'price' => "discprice"],
        'SUN' => ['dayname' => "Sunday", 'time' => "3:00pm", 'price' => "discprice"]
      ]
    ],
    'AHF' => [
      'title' => "Margrete: Queen of the North",
      'rating' => "Unrated",
      'director' => "Charlotte Sieling",
      'starring' => "Trine Dyrholm, Søren Malling, Morten Hee Andersen",
      'synopsis' => "The year is 1402. Margrete has achieved what no one had achieved before: She has gathered formed a peace-oriented union between Denmark, Norway, and Sweden. Through her apodted son Erik, she single-handedly rules the union. However, the union is beset by enemies, so Margrete is planning a marriage between Erik and an English princess. An alliance with England should secure the union's status as an emerging European power, but a breathtaking conspiracy is underway that could tear Margrete and everything she believes in apart.",
      'minisynop' => "Queen Margrete is ruling Sweden, Norway and Denmark in 1402. She rules through Erik, her
                      adopted son. S conspiracy is now placing Margrete in an impossible dilemma that could
                      shatter her life's work: the Kalmar Union.",
      'poster' => "movie_posters/margrete.jpg",
      'trailer' => "https://www.youtube.com/embed/-7OCX98JgGk",
      'times' => [
        'MON' => ['dayname' => "Monday", 'time' => "6:00pm", 'price' => "discprice"],
        'TUE' => ['dayname' => "Tuesday", 'time' => "6:00pm", 'price' => "discprice"],
        'SAT' => ['dayname' => "Saturday", 'time' => "10:00pm", 'price' => "discprice"],
        'SUN' => ['dayname' => "Sunday", 'time' => "10:00pm", 'price' => "discprice"]
      ]
    ]
  ];

  // Generates flipcards on index page
  function makeFlipCard() {
    global $movieArray;
    $dayArray = ['MON' => "Monday", 'TUE' => "Tuesday", 'WED' => "Wednesday",
                  'THU' => "Thursday", 'FRI' => "Friday",
                  'SAT' => "Saturday", 'SUN' => "Sunday"];
    
    foreach ($movieArray as $movie => $details) {
      $movieTimes = [];
      
      // Determine what times to display
      foreach ($dayArray as $day => $name) {
        if (array_key_exists($day, $details['times']))
          array_push($movieTimes, $name.': '.$details['times'][$day]['time']);
        else
          array_push($movieTimes, $name.': Not Showing');
      }

      echo <<< "FLIPCARD1"
        <div class= "flipcard">
          <div class ="front">
            <div class = movietitle>
            {$details['title']}<br>
              Rated {$details['rating']}
            </div>
            <img class="poster" src="{$details['poster']}" alt="Avatar: The Way of Water"/>
          </div>
          <div class="back">
            <div class ="synopsis">
              {$details['minisynop']}<br><br>
            </div>
            <div class="screening">
              <b>Screening Times:</b><br><br>
      FLIPCARD1;
              for ($i = 0; $i < 7; $i++)
                echo $movieTimes[$i].'<br>';
      echo <<< "FLIPCARD2"
              <br>
              <a class="book" href="booking.php?movie={$movie}">Book Now</a> 
            </div>
          </div>
        </div>
      FLIPCARD2;
    }
  }

  // Called in booking.php to display seat selections and reduce code
  function getSeatSelector() {
    global $seatsArray;
    global $seatError;
    
    foreach ($seatsArray as $seat => $info) {
      echo <<< "DROPDOWN"
        <div>
          <label for="seats[STA]">{$seat}:</label>
          <select id="seats[{$info['code']}]" name="seats[{$info['code']}]" data-fullprice="{$info['fullprice']}" data-discprice="{$info['discprice']}">
            <option value="">Please Select</option>
      DROPDOWN;
      for ($i = 1; $i <= 10; $i++) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $selectStatus = setSelected($_POST["seats"][$info["code"]], $i);
        } else {
          $selectStatus = "";
        }
        echo <<< "OPTIONS"
            <option value="{$i}"} {$selectStatus} >{$i}</option>
        OPTIONS;
      }
      echo   "</select></div>";
    }
  }

  // Called in booking.php to display available times as radio buttons according to selected movie
  function getScreenTimes($moviecode) {
    global $movieArray;
    global $dayError;
    // Selects only available times for selected movie
    $times = $movieArray[$moviecode]['times'];

    foreach ($times as $day => $daydata) {
      $checkedStatus = setChecked($_POST["day"], $day);
      echo <<< "RADIOBUTTONINFO"
        <input type="radio" class="time" id="{$day}" name="day" value="{$day}" data-pricing="{$daydata['price']}" {$checkedStatus}>  
      RADIOBUTTONINFO;

      echo <<< "LABELINFO"
        <label for="{$day}">{$daydata['dayname']}<br>{$daydata['time']}</label>
      LABELINFO;
    }
  }

  // Returns a daycode if a day name is only available. Used for A4 when reading bookings.txt
  function getDayCode($day) {
    switch ($day) {
      case 'Monday':
        return 'MON';
      case 'Tuesday':
        return 'TUE';
      case 'Wednesday':
        return 'WED';
      case 'Thursday':
        return 'THU';
      case 'Friday':
        return 'FRI';
      case 'Saturday':
        return 'SAT';
      case 'Sunday':
        return 'SUN';
    }
  }

  // Called to set pre-selected data when errors with POST data exist
  function unsetFB(&$str, $fallback = '') {
    return (isset($str) ? $str : $fallback);
  }

  // Called to set pre-selected radio buttons when errors with POST data exist
  function setChecked(&$str, $val) {
    return (isset($str) && $str == $val ? 'checked' : ''); 
  }

  // Called to set pre-selected drop-down options when errors with POST data exist
  function setSelected(&$str, $val) {
    return (isset($str) && $str == $val ? 'selected' : ''); 
  }

  // Gets subtotal prices for dataToFile() function
  // Has been modified for A4 to take day as a parameter in order to work for currentbookings.php
  function getSubTotal($seat, $quantity, $code, $day) {
    global $movieArray;
    global $seatsArray;
    $fullOrDisc = $movieArray[$code]['times'][$day]['price'];

    foreach ($seatsArray as $type => $info) {
      if($seat == $info['code']) {
        return $quantity * $info[$fullOrDisc];
      }
    }
  }

  // Writes session data to bookings.txt
  function dataToFile() {
    global $movieArray;
    $total = 0;

    // For A4, spaces and quotes needed to be removed. "+61" also needs to be replaced with "0"
    $userMobile = str_replace('"', '', $_SESSION['user']['mobile']);
    $userMobile = str_replace(' ', '', $userMobile);
    $userMobile = str_replace('+61', '0', $userMobile);

    // Add non-calculatable data
    $bookingCells = [
      date("d/m/Y"),
      $_SESSION['user']['name'],
      $_SESSION['user']['email'],
      $userMobile,
      $_SESSION['code'],
      $movieArray[$_SESSION['code']]['times'][$_SESSION['day']]['dayname'],
      $movieArray[$_SESSION['code']]['times'][$_SESSION['day']]['time']
    ];

    // Calculate and add seat subtotals to $bookingCells
    foreach ($_SESSION['seats'] as $seat => $value) {
      $quantity = !empty($value) ? $value : 0;
      array_push($bookingCells, $quantity);
      array_push($bookingCells, getSubTotal($seat, $quantity, $_SESSION['code'], $_SESSION['day']));
    }

    // Get total by obtaining subtotals from their place in $bookingCells
    for ($i = 8; $i <= 18; $i += 2) {
      $total += $bookingCells[$i]; 
    }

    // Add total and GST to $bookingCells
    array_push($bookingCells, number_format((float)$total, 2, '.', ''));
    array_push($bookingCells, number_format((float)($total / 11), 2, '.', ''));

    if (($outfile = fopen('bookings.txt',"a")) && flock($outfile, LOCK_EX) !== false ) {
      fputcsv($outfile, $bookingCells, "\t");
      flock($outfile, LOCK_UN);
      fclose($outfile);
    }
  }

  function getSeatName($code) {
    global $seatsArray;

    foreach($seatsArray as $type => $info) {
      if ($code == $info['code'])
        return $type;
    }
  }

  // contains parameters for A4 so it can be used with non-session data on
  // currentbookings.php
  function ticketSummary($seats, $code, $day) {
    $tickets = '';
    $total = 0;

    foreach ($seats as $seat => $quantity) {
      if (!empty($quantity)) {
        $type = getSeatName($seat);
        $subTotal = getSubTotal($seat, $quantity, $code, $day);
        $subTotal = number_format((float)$subTotal, 2, '.', '');
        $tickets .= <<< "TICKETS"
          <tr><td>{$type}</td><td>{$quantity}</td><td>\${$subTotal}</td></tr>
        TICKETS;
        $total += $subTotal;
      } 
    }

    $total = number_format((float)$total, 2, '.', '');
    
    echo <<< "TICKETTABLE"
      <tbody>
        {$tickets}
      </tbody>
      <tfoot>
        <tr><td colspan="2">TOTAL:</td><td>\${$total}</td></tr>
      </tfoot>
    TICKETTABLE;
  }

  function getScreeningSession($movieCode, $dayCode) {
    global $movieArray;

    foreach ($movieArray[$movieCode]['times'] as $day => $info) {
      if (trim($dayCode) == $day)
        return $info['dayname']." ".$info['time'];
    }
  }

  function displayTickets() {
    global $movieArray;
    $screenTime = getScreeningSession($_SESSION['code'], $_SESSION['day']);

    foreach($_SESSION['seats'] as $seat => $quantity) {
      if (!empty($quantity)) {
        // substr removes last letter so it shows as "seat" not "seats"
        $seatName = substr(getSeatName($seat), 0, -1);
        for ($i = 1; $i <= $quantity; $i++) {
          echo <<< "TICKET"
            <section class="ticket">
              <h2 class="ticketheading">Lunardo Cinemas Ticket</h2>
              <div class="ticketbody">
                <div>
                  <div class="tickettitle">{$_SESSION['movie']} ({$movieArray[$_SESSION['code']]['rating']})</div>
                  <div><br>{$screenTime}</div><br><br>
                  <div>{$seatName} ({$seat})</div><br><br>
                </div>
                <div>
                  <img src="qr.png" alt="QR Missing, check ticket code"/>
                  <br>code: 340fad
                </div>
              </div>
              <div class="printmessage"><br><strong>You can print this ticket!</strong></div>
            </section>
          TICKET;
        }
      }
    }
  }

  // Searches bookings.txt for matches when user searches for pre-existing bookings
  function searchBookings($email, $mobile) {
    str_replace('"', '', $mobile);
    $import = file("bookings.txt");
    $bookings = [];

    foreach ($import as $line) {
      $current = explode("\t", $line);
      if ($email == $current[2] && $mobile == $current[3])
        array_push($bookings, $line);
    }

    return $bookings;
  }
  
  /* If no matches are found, error message is printed,
      overwise, data is sent to currentbookings.php
  */
  function isBookings($email, $mobile) {
    $bookings = searchBookings($email, $mobile);

    if (count($bookings) == 0)
      return false;
    else {
      return true;
      }
  }

  // Arranges bookings in an associative array for easy display and also
  // for displaying their reciept and tickets later
  function organiseBookings($bookings) {
    global $movieArray;
    $userBookings = [];

    foreach ($bookings as $booking) {
      $current = explode("\t", $booking);
      $moviecode = $current[4];

      /* add to an array that mimics how session data looks after a booking is made
          this will help display a receipt and tickets later. There will be the addition
          of date booked, time and day name
      */
      array_push ($userBookings, [
        'movie' => $movieArray[$moviecode]['title'],
        'code' => $moviecode,
        'seats' => [
          'STA' => $current[7],
          'STP' => $current[9],
          'STC' => $current[11],
          'FCA' => $current[13],
          'FCP' => $current[15],
          'FCC' => $current[17],
        ],
        'dayname' => $current[5],
        'day' => getDayCode($current[5]),
        'time' => $current[6],
        'user' => [
          'name' => str_replace('"', '', $current[1]),
          'email' => $current[2],
          'mobile' => $current[3]
        ],
        'dateBooked' => $current[0]
      ]);
    }

    return $userBookings;
  }

  // Displays books in currentbookins.php
  function showBookings($bookings) {
    $userBookings = organiseBookings($bookings);

    // create a new section for each booking
    for ($i = 0; $i < count($userBookings); $i++) {
      echo <<< "BOOKINGDETAILS"
        <section id="booking">
          <h2>{$userBookings[$i]['movie']}</h2>
          <div>
            <table>
              <thead>
                <tr><th>Ticket Type</th><th>Quantity</th><th>Total</th></tr>
              </thead>
      BOOKINGDETAILS;
      ticketSummary($userBookings[$i]['seats'], $userBookings[$i]['code'], $userBookings[$i]['day']);
      // buttons to be named in accordance with $i as so to select correct booking
      // with button press
      echo <<< "BOOKINGDETAILS2"
            </table>
            <div>
              <form action="currentbookings.php?booking={$i}" method="get">
                <p><em>Booked On:</em> {$userBookings[$i]['dateBooked']}</p>
                <p><em>Booked By:</em> {$userBookings[$i]['user']['name']}</p>
                <p><em>Booked For:</em> {$userBookings[$i]['dayname']}, {$userBookings[$i]['time']}</p>
                <button type="submit" name="getreceipt" value="{$i}">View Receipt and Tickets</button>
              </form>
            </div>
          </div>
        </section>
      BOOKINGDETAILS2;
    }
  }

  // Displays the form in footer for user to retrieve bookings
  function footerSearchForm() {
    echo <<< "PRINTFORM"
      <section id = "getbooking">
        <h2>Have a booking already?</h2>
        <p>Enter details below:</p>
        <form action='index.php' method='post'>
          <label for="searchemail" id="searchemaillabel">Email: </label>
          <input type="email" id="searchemail" name="searchemail" required>
          <label for="searchmobile" id="searchmobilelabel">Mobile: </label>
          <input type="text" id="searchmobile" name="searchmobile" pattern="(\(04\)|04|\+614)( ?\d){8}" required>
          <input type="submit" id="searchbookings" name="searchbookings" value="search"/>
        </form>
      </section>
    PRINTFORM;
  }
?>