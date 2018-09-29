<?php
$timezone_options_query = "SELECT buzzytimezone FROM  buzzysiteoptions WHERE buzzysiteoptions_id=1";
foreach ($connread->query($timezone_options_query) as $row) {
$buzzytimezone=$row['buzzytimezone']; 
date_default_timezone_set($buzzytimezone);
}