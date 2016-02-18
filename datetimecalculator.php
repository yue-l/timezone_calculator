<?php
// date time calculation script for handling post requests from front-end


// the post call entry
calculate();

// main logic
function calculate () {
  // timezone
  $timezone  = intval($_POST['timeZone']);
  $timezoneRep;
  $currentTimeZone = defineTimeZone($timezone);

  // define date format
  $ymd = explode(' ', $_POST['currentDatetime']);
  $ymd = $ymd[0];
  $ymd = explode('/', $ymd);
  $year = $ymd[2];
  $month = $ymd[1];
  $day = $ymd[0];
  $hi = explode(' ', $_POST['currentDatetime'])[1];
  $hour = explode(':', $hi)[0];
  $minute = explode(':', $hi)[1];

  // reads current time
  $currentDateTime = new DateTime();
  $currentDateTime->setTimezone($currentTimeZone);
  $currentDateTime->setDate(intval($year), intval($month), intval($day));
  $currentDateTime->setTime($hour, $minute);

  // reads calculate figures
  $alteredDateTime = alterDateTime($currentDateTime, $_POST['updateType'], $_POST['day'], $_POST['hour'], $_POST['minute']);

  // convert response into json form
  echo json_encode(updateTimeZones($alteredDateTime));
}

// updates all the end outputs into different timezones
function updateTimeZones($datetime){
  $resultArray = array();
  $dtUTC = clone $datetime;
  $dtUTC->setTimezone(new DateTimeZone("UTC"));
  $dtAEST = clone $datetime;
  $dtAEST->setTimezone(new DateTimeZone("AEST"));
  $dtCST = clone $datetime;
  $dtCST->setTimezone(new DateTimeZone("CST"));
  $dtMST = clone $datetime;
  $dtMST->setTimezone(new DateTimeZone("MST"));
  $dtNZST = clone $datetime;
  $dtNZST->setTimezone(new DateTimeZone("NZST"));
  $resultArray = ['utc' => $dtUTC->format('d/m/Y H:i A T'),
                  'aest' => $dtAEST->format('d/m/Y H:i A T'),
                  'cst' => $dtCST->format('d/m/Y H:i A T'),
                  'mst' =>$dtMST->format('d/m/Y H:i A T'),
                  'nzst' => $dtNZST->format('d/m/Y H:i A T')];
  return $resultArray;
}

// updates the existing datetime, returns a new datetime instance for later timezone work
function alterDateTime($current, $method, $day, $hour, $minute) {
  $result = clone $current;
  $dtIntervalRep = 'P0Y0M' . $day . 'D' . 'T' . $hour . 'H' . $minute . 'M0S';
  $dateInterval = new DateInterval($dtIntervalRep);
  if($method == 'add') {
    $result = $result->add($dateInterval);
  } else if ($method == 'minus') {
    $result = $result->sub($dateInterval);
  }
  return $result;
}

// an adapator for converting TIMEZONE into a PHP compatiable form
function defineTimeZone($timezone){
  // timezone represents the UTC value of the corresponding timezones.
  switch ($timezone) {
    case 0:
    $timezoneRep = 'UTC';
    // Coordinated Universal Time
    return new DateTimeZone("UTC");
    break;
    case 10:
    $timezoneRep = 'AEST';
    // Australia Eastern Standard Time
    return new DateTimeZone("Australia/Sydney");
    break;
    case -6:
    $timezoneRep = 'CST';
    // North American Central Standard Time
    return new DateTimeZone("America/Chicago");
    break;
    case -7:
    $timezoneRep = 'MST';
    // Mountain Standard Time
    return new DateTimeZone("America/Denver");
    break;
    case 12:
    $timezoneRep = 'NZST';
    // NZ Standard Time
    return new DateTimeZone("Pacific/Auckland");
    break;
    default:
    // error
    break;
  }
}

?>
