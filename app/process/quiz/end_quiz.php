<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_POST['profile_id'];
    $data['end_quiz'] = 1;
    $table = "exam_profile";
    $where = " where exam_id = $exam_id and profile_id = $profile_id";
    $h->update($data, $table, $where);