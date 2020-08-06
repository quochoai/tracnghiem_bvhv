<?php
    include("../../../require_inc.php");
    $block_id = $_POST['block_id'];
    if ($block_id == '') {
        $text_dp = '<option value="">'.$lang['choose_department'].'</option>';
    } else {
        $dp = $h->getDepartmentByBlockId($block_id);
        $text_dp = '';
        if (count($dp) > 0) {
            foreach ($dp as $dv) {
                $text_dp .= '<option value="'.$dv['id'].'">'.$dv['name'].'</option>';
            }
        }
    }
    echo $text_dp;
?>