<?php
$con = mysqli_connect('localhost', 'root', '', 'db_test');

$uname = $_POST['username'];
$pass = $_POST['password'];

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

function usernameExists($con, $name) {
    $unames = mysqli_query($con, "SELECT username FROM users");
    while ($row = mysqli_fetch_array($unames)) {
        $currentName = $row[0];
        if ($currentName == $name) {
            return true;
        }
    }
    return false;
}

if (usernameExists($con, $uname)) {
    echo 'Username already exists.';
} else {
    mysqli_query($con, "INSERT INTO users (username, password) VALUES('" . $uname . "', '" . $pass . "')");
    echo 'Registered';
}

?>
