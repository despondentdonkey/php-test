<?php
require_once('require_sql.php');

$data = $sql->query('SELECT * FROM users');

echo '<br><br>Users<br>';
foreach ($data as $row) {
    $uname = $row['username'];
    echo "<a href='user_panel.php?user=" . $uname . "'>" . $uname . "</a>" . "<br>";
}

?>
