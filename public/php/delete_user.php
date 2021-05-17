<?php
session_start();
if (isset($_GET["code"])) {
    $code = $_GET["code"];
    $file = simplexml_load_file("../../user_info.xml");
    list($user) = $file->xpath("//user[./code='$code']");
    unset($user[0]);

    list($total) = $file->xpath("//amount");
    $total[0] = $total[0] - 1;

    echo $file->asXML("../../user_info.xml");
}

header("Location: ./user_list.php");
