<?php
    include("../../require_inc.php");
    $profile_code = trim($_POST['profile_code']);
    $password = trim($_POST['password']);
    $result = $h->login_user($profile_code, $password);
?>