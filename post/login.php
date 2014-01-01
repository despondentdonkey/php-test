<!-- Attempts a login with the POST information (username, password). -->
<?php
require_once('../require_sql.php');

$uname = $_POST['username'];
$pass = $_POST['password'];

$query = $sql->prepare('SELECT * FROM users WHERE username=:uname');
$query->execute(array('uname'=>$uname));

$data = $query->fetch();

if ($data) {
    if ($data['password'] == $pass) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $uname;
        header("Location: ../user_panel.php?user=" . $uname);
    } else {
        echo 'Incorrect password, but hey you got the name right so good for you!';
    }
} else {
    echo 'Not a valid username.';
}

?>
