<?php
    //Tuhotaan cookiet että päästään kirjautumaan ulos
    setcookie("vwgid", "deleted", 1, '/');
    setcookie("vwgrt", "deleted", 1, '/');
    if(!session_id()) session_start();
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', 1,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    header("Location: ../../index.php")
;?>
