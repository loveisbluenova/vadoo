<?php  
$ipn_data = $_POST; // Processing the values returned from paypal if (array_key_exists('charset', $ipn_data) &#038;&#038; ($charSet = $ipn_data['charset'])) {  // Ignore if charset is utf-8  if ($charSet == 'utf-8')    return; // Else you need to convert the data  foreach ($ipn_data as $key =----> &amp;$value) {
   $value = mb_convert_encoding($value, 'utf-8', $charSet);
 }
 $ipn_data['charset'] = 'utf-8';
 $ipn_data['charset_original'] = $charSet;
}
// Looping through the IPN Post Data and creating a final array of transaction details
foreach ($ipn_data as $key => $value) {
  $finalIPN[$key] = $value;
}
// Saving the encode transaction details  to the table
$dataJson = json_encode($finalIPN);
$ipn_data = $_POST; // Processing the values returned from paypal if (array_key_exists('charset', $ipn_data) &#038;&#038; ($charSet = $ipn_data['charset'])) {  // Ignore if charset is utf-8  if ($charSet == 'utf-8')    return; // Else you need to convert the data  foreach ($ipn_data as $key =----> &amp;$value) {
   $value = mb_convert_encoding($value, 'utf-8', $charSet);
 }
 $ipn_data['charset'] = 'utf-8';
 $ipn_data['charset_original'] = $charSet;
}
// Looping through the IPN Post Data and creating a final array of transaction details
foreach ($ipn_data as $key => $value) {
  $finalIPN[$key] = $value;
}
// Saving the encode transaction details  to the table
$dataJson = json_encode($finalIPN);