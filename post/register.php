<!-- Attempts to register the username and password from the POST information. -->
<?php
require_once('../require_sql.php');

$uname = $_POST['username'];
$pass = $_POST['password'];

function usernameExists($sql, $name) {
    $data = $sql->query("SELECT * FROM users");
    foreach ($data as $row) {
        if ($row['username'] == $name) {
            return true;
        }
    }
    return false;
}

if (strlen($uname) > 0) {
    if (strlen($pass) > 0) {
        if (usernameExists($sql, $uname)) {
            echo 'Username already exists.';
        } else {
            $statement = $sql->prepare("INSERT INTO users (username, password) VALUES(:uname, :pass);");
            $statement->execute(array('uname'=>$uname, 'pass'=>$pass));
            echo 'Registered<br>';
            echo "<a href='../index.php'>Login</a>";
        }
    } else {
        echo 'No password specified';
    }
} else {
    echo 'No username specified';
}
?>
