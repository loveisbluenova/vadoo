<?php
  if (isset($_POST['update_ga'])) {
        $OK = false;
        $update_google_query = "UPDATE buzzybuzzga SET buzzybuzzga=:buzzybuzzga WHERE buzzybuzzga_id=1";
        $stmt = $connwrite->prepare($update_google_query);
        // bind the parameters and execute the statement
        $stmt->bindParam(':buzzybuzzga', $_POST['buzzybuzzga'], PDO::PARAM_STR);
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();
		}