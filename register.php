<?php
try {
    $sql = new PDO('mysql:host=localhost;dbname=db_test', 'root', '');
    $sql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Default is ERRMODE_SILENT. I believe the current option will allow for exceptions to be called and handled.
} catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

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

if (usernameExists($sql, $uname)) {
    echo 'Username already exists.';
} else {
    $statement = $sql->prepare("INSERT INTO users (username, password) VALUES(:uname, :pass);");
    $statement->execute(array('uname'=>$uname, 'pass'=>$pass));
    echo 'Registered';
}
?>
