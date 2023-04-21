<?php

// Checks POST data in order to determine errors
function validateBooking() {
  global $movieArray;
  
  // In case user has tampered with movie code
  $moviecode = trim($_POST['code']);
  if (!isset($movieArray[$moviecode])) {
    header("Location: index.php");
    exit;
  }
  
  // In case seats are not empty or contain invalid data
  $seats = $_POST['seats'];
  foreach ($seats as $seat) {
    if (!empty($seat) && ($seat < 1 || $seat > 10)) {
      header("Location: index.php");
      exit;
    }
  }

  // In case movie is not showing in given day
  $times = $movieArray[$moviecode]['times'];
  $day = trim($_POST['day']);
  if ($day != "" && !isset($times[$day])) {
    header("Location: index.php");
    exit;
  }
  
  // Picks up errors relating to name input, in case empty or containing numbers
  $errors = [];
  $username = trim($_POST['user']['name']);
  if ($username == '') {
    $errors['user']['name'] = "Name can't be blank";
  } else if (!preg_match("/^[-A-Za-z '.]{1,64}$/", $username)) {
    $errors['user']['name'] = "Must be a valid name and not contain numbers or invalid characters";
  }
  
  // In case email address not entered as a valid one
  $email = trim($_POST['user']['email']);
  if ($email == '') {
    $errors['user']['email'] = "Email can't be blank";
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['user']['email'] = "Email must be a valid email address";
  }
  
  // In case phone number format is invalid
  $mobile = trim($_POST['user']['mobile']);
  if ($mobile == '') {
    $errors['user']['mobile'] = "Mobile can't be blank";
  } else if (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/", $mobile)){
    $errors['user']['mobile'] = "Mobile must be the correct format: must begine with 
                                '04', '(04)' or '+614' and contain 8 other numbers";
  }
  
  // In case no seats are selected
  $seatSelected = false;
  foreach ($seats as $seat) {
    if ($seat > 0) {
      $seatSelected = true;
    }
  }

  if (!$seatSelected) {
    $errors['seats'] = "No seats were selected";
  }

  // In case no time has been selected
  $day = trim($_POST['day']);
  if ($day == '') {
    $errors['day'] = "No time was selected";
  }

  return $errors;
}

?>
