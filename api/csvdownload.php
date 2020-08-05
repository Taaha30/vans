 <?PHP
require '../config.php';
require './functions.php';

$data = participantsCall($connection);
$form = formCall($connection);
$ews = ewsCall($connection);
$slots = slotsAllCall($connection);
$selectews = selectEventsCall($connection);

  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.
  
  function cleanData(&$str)
  {
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "'$str";
    }
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }

  // filename for download
  if ($_GET["action"] == "csvDownload") {
    foreach ($ews as $key => $value) {
      if ($_GET["data"] == $value["uid"]) {
        $filename = $value["name"]."_" . date('Ymd') . ".csv";
      }
      if ($_GET["data"] == "all") {
        $filename = "All_delegates_" . date('Ymd') . ".csv";
      }
    }
  }
  header("Content-Disposition: attachment; filename=\"$filename\"");
  header("Content-Type: text/csv");

  $out = fopen("php://output", 'w');

  $flag = false;
if ($_GET["action"] == "csvDownload") {
  $row = [];
  foreach ($data as $key => $value) {
    $row[$key]["ewslist"] = $value["ewslist"];
    $row[$key]["Delegate_ID"] = $value["delegateid"];
    $row[$key]["Full_Name"] = $value["name"];
    $row[$key]["Contact"] = $value["contact"];
    $row[$key]["Email"] = $value["email"];
    $row[$key]["Delegate_type"] = $value["delegatetype"];
    $row[$key]["Gender"] = $value["gender"];
    $row[$key]["Date_Of_Birth"] = $value["dob"];
    $row[$key]["College"] = $value["college"];
    $row[$key]["City_Of_College"] = $value["ccity"];
    $row[$key]["Year"] = $value["year"];
    $row[$key]["Qualification"] = $value["qualification"];
    $row[$key]["MMC_Registration_No"] = $value["mmcreg"];

    $ewslist = explode(",", $value["ewslist"]);
    $finalews = array_filter(array_map('trim', $ewslist));
    $slotlist = explode(",", $value["slotlist"]);
    $finalslot = array_filter(array_map('trim', $slotlist));
    $row[$key]["Events_and_workshops"] = "";
    if (empty($finalews)) {
      $row[$key]["Events_and_workshops"] .= "No events or workshops.";
    } else {
      foreach ($ews as $fkey => $fvalue) {
        if (in_array($fvalue["uid"], $finalews)) {
          $slotindex = array_search($fvalue["uid"], $finalews);
          foreach($slots as $skey => $svalue){
            if ($finalslot[$slotindex] == $svalue["uid"]) {
              $row[$key]["Events_and_workshops"] .= "" . $fvalue["type"] . " : " . $fvalue["name"] . " (".$svalue["name"].")\r\n";
            }
          }
        }
      }
    }
  }

  foreach ($row as $key => $value) {
    $ewslist = explode(",", $value["ewslist"]);
    $finalews = array_filter(array_map('trim', $ewslist));
    if (in_array($_GET["data"], $finalews)) {
      unset($value["ewslist"]);
      if(!$flag) {
        // display field/column names as first row
        fputcsv($out, array_keys($value), ',', '"');
        $flag = true;
      }
      array_walk($value, __NAMESPACE__ . '\cleanData');
      fputcsv($out, array_values($value), ',', '"');
    }
    if ($_GET["data"] == "all") {
      unset($value["ewslist"]);
      if(!$flag) {
        // display field/column names as first row
        fputcsv($out, array_keys($value), ',', '"');
        $flag = true;
      }
      array_walk($value, __NAMESPACE__ . '\cleanData');
      fputcsv($out, array_values($value), ',', '"');
    }
  }
}

// if ($_GET["action"] == "iniDownload") {
//   $result = mysqli_query($connection, "SELECT initialize.name as Name, initialize.email as Email, initialize.contact as Contact, initialize.transid as KM_Transaction_ID, initialize.amount as Amount, runsid.name as Run_name, types.name as Run_type, initialize.status as Status, initialize.timeon as Initialized_at, initialize.updatedon as Status_updated_at FROM `initialize` INNER JOIN `types` ON initialize.runtypeid = types.uid INNER JOIN `runs` runsid ON types.runid = runsid.uid order by initialize.timeon DESC") or die('Query failed!');
//   while($row = mysqli_fetch_assoc($result)) {
//     if(!$flag) {
//       // display field/column names as first row
//       fputcsv($out, array_keys($row), ',', '"', "ewslist");
//       $flag = true;
//     }
//     array_walk($row, __NAMESPACE__ . '\cleanData');
//     fputcsv($out, array_values($row), ',', '"', $value["ewslist"]);
//   }
// }
  fclose($out);
  exit;
?>