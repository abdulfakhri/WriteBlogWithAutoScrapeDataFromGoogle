<?php
// server should keep session data for 1 hour
ini_set('session.gc_maxlifetime', 3600);
 
// each client remember their session id for exactly 1 hour
session_set_cookie_params(3600);
 
 
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:/index.php"); 
?>