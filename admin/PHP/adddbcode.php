	  <?php
	  include 'security/xss-security.php';
    include 'includes/connection.inc.php';
    $connread = dbConnect('read', 'pdo');
    $connwrite = dbConnect('write', 'pdo');
    $update_news_image = "UPDATE  buzzynews SET buzzynews_image='aaa' WHERE buzzynews_id=22";
        $stmt = $connwrite->prepare($update_news_image);
        // bind the parameters and execute the statement
        // execute and get number of affected rows
        $stmt->execute();
        $OK = $stmt->rowCount();