<?php
setcookie("user_code", "", time() - 86400, "/");
setcookie("user_firstName", "", time() -86400, "/");
setcookie("user_lastName", "", time() - 86400, "/");
setcookie("user_email", "", time() + 86400, "/");
setcookie("user_password", "", time() - 86400, "/");
setcookie("user_address", "", time() - 86400, "/");
setcookie("user_city", "", time() - 86400, "/");
setcookie("user_stateOrProvince", "", time() - 86400, "/");
setcookie("user_postalCode", "", time() - 86400, "/");
header("Location: ../../index.php");
?>
