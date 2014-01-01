<?php
require_once('../require_sql.php');
session_start();

if ($_GET['attr'] == 'fname') {
    $query = $sql->prepare('UPDATE users SET fname=:fname WHERE username=:uname');
    $query->execute(array('fname'=>$_POST['fname'], 'uname'=>$_SESSION['user']));
    header("Location: ../user_panel.php?user=" . $_SESSION['user']);
}
?>
