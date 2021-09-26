<?php
session_start();
session_destroy();

setcookie('usernamecookie','', $uname, time()-86400);
setcookie('passwordcookie','', $pass, time()-86400);

header("Location: ../../index.php");
