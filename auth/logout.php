<?php

$_SESSION['user'] = null;
session_destroy();

// dd(session_get_cookie_params());
$params = session_get_cookie_params();
setcookie(session_name(),'',time()-3600);

header('location: /');
exit();

// redirect_to(/login);