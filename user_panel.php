<?php
require_once('require_sql.php');
session_start();
$user = $_GET['user'];

$statement = $sql->prepare('SELECT * FROM users WHERE username=:uname;');
$statement->execute(array('uname'=>$user));
$userData = $statement->fetch();
$isUser = ($_SESSION['loggedin'] && $_SESSION['user'] == $user); //Is this the owner of this panel?

//temp func adds line break.
function line() {
    echo '<br>';
}

if ($isUser) {
    echo "Welcome to your panel, ". $userData['fname'] ."!<br>";
} else {
    echo $userData['fname'] . "'s Profile<br>";
}
echo "Username: " . $userData['username'];
line();
echo "Full Name: " . $userData['fname'] . " " . $userData['lname'];
line();
echo "Age: " . $userData['age'];

if ($isUser) {
    echo "<form action='post/set_user_attr.php?attr=fname' method='post'>";
        echo "<input type='text' name='fname'></input>";
        echo "<input type='submit' value='Set First Name'></input>";
    echo "</form>";
    echo "<br><a href='logout.php'>Logout</a>";
}

echo "<br><a href='index.php'>GOTO Index</a>";

?>
