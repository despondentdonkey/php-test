<?php
try {
    $sql = new PDO('mysql:host=localhost;dbname=db_test', 'root', '');
    $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Default is ERRMODE_SILENT. I believe the current option will allow for exceptions to be called and handled.
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
