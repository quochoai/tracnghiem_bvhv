<?php
    include("../../../require_inc.php");
    $id = $_POST['id'];
    $data['password'] = $h->mahoa(trim($_POST['password']));
    $table = 'profiles';
    $user = $_SESSION['is_logined'];
    $result = $h->updateDataBy($data, $table, "where id = $id", $user['id']);
    if ($result)
        echo '1;success';
    else 
        echo '2;error';
?>