<?php
    include("require_inc.php");
    if(!isset($_SESSION['is_logined'])) header("Location: ".$def['link_login']);
    else {
        include("app/module/app.php");
    }
?>