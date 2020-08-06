<?php
    include("../../require_inc.php");
    $profile_code = trim($_POST['profile_code']);
    $result = $h->check_info($profile_code);
?>