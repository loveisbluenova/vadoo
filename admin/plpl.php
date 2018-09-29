<?php
include '../includes/connection.inc.php';
$connread = dbConnect('read', 'pdo');
$connwrite = dbConnect('write', 'pdo');
   $add_aappimage_query = "ALTER TABLE buddies ADD friend_timestamp INT NOT NULL";
        // prepare the statement
        $stmt = $connwrite->prepare($add_aappimage_query);
        // bind the parameters and execute the statement
		// execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();	