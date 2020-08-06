<?php
    include("../../../require_inc.php");
    $exam_id = $_POST['exam_id'];
    $profile_id = $_POST['profile_id'];
    $question_id = $_POST['idq'];
    $data['profile_answer'] = $_POST['pa'];
    $id = $_POST['eq_id'];
    $table = "exam_questions";
    $where = " where id = $id";
    $s = $h->update($data, $table, $where);
    $q = $h->getQuestionById($question_id);
    $right_answer = $q['right_answer'];
    
    /*if ($right_answer == $data['profile_answer']) {
        $r = $h->getResultsByExamProfile($exam_id, $profile_id);
        $idr = $r['id'];
        $number_answer_right = $r['number_answer_right'] + 1;
        $number_questions = $r['number_questions'];
        $point = round($number_answer_right/$number_questions, 2);
        $data2['number_answer_right'] = $number_answer_right;
        $data2['point'] = $point;
        $table2 = "results";
        $where2 = " where id = $idr";
        $sr = $h->update($data2, $table2, $where2);
    }
    */
    $list_ids = array();
    $list_eqs = $h->getQuestionsProfileExam($exam_id, $profile_id);
    foreach ($list_eqs as $k=>$v) {
        array_push($list_ids, $list_eqs[$k]['question_id']);
    }
    if (count($list_ids) > 0)
        $h->getNumberRightAnswer($list_ids, $exam_id, $profile_id);
    
     