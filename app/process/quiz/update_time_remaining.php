<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_SESSION['is_logined']['id'];
    $ex = $h->getExamProfileExamIdProfileId($exam_id, $profile_id);
    $time_pass = date("i:s", $ex['time_pass']);
    $data['time_pass'] = strtotime(date("H:i:s", strtotime("+1 seconds", $ex['time_pass'])));
    $s = $h->update($data, "exam_profile", " where id = ".$ex['id']);
    
    