<?php
    if (isset($_REQUEST['pqh'])) {
        $pqh = explode("/", trim($_REQUEST['pqh']));
        switch ($pqh[0]) {
            // block
            case $def['get_link_block']:
                $title = $lang['manage_block'];
                break;
            case $def['link_create_block']:
                $title = $lang['text_add_block'];
                break;
            case $def['link_update_block']:
                $title = $lang['text_update_block'];
                break;
            // department
            case $def['get_link_department']:
                $title = $lang['manage_department'];
                break;
            case $def['link_create_department']:
                $title = $lang['text_add_department'];
                break;
            case $def['link_update_department']:
                $title = $lang['text_update_department'];
                break;
            // title
            case $def['link_title']:
                $title = $lang['manage_title'];
                break;
            case $def['link_create_title']:
                $title = $lang['text_add_title'];
                break;
            case $def['link_update_title']:
                $title = $lang['text_update_title'];
                break;
            // profile
            case $def['get_link_profile']:
                $title = $lang['manage_profile'];
                break;
            case $def['link_create_profile']:
                $title = $lang['text_add_profile'];
                break;
            case $def['link_update_profile']:
                $title = $lang['text_update_profile'];
                break;
            case $def['link_change_password']:
                $title = $lang['change_password'];
                break;
            case $def['link_import_profile']:
                $title = $lang['import_profile'];
                break;
            // profile exam
            case $def['link_profile_exam']:
                $pid = $h->getProfileById($pqh[1]);
                $title = $lang['list_exam_of'].$pid['fullname'].' - '.$pid['profile_code'];
                break;
            // exam
            case $def['get_link_exam']:
                $title = $lang['manage_exams'];
                break;
            case $def['link_create_exam']:
                $title = $lang['text_add_exam'];
                break;
            case $def['link_update_exam']:
                $title = $lang['text_update_exam'];
                break;
            // exam block follow exam
            case $def['get_link_each_exam']:
                $exam = $h->getExamById($pqh[1]);
                $title = $lang['manage_each_exam'].$exam['name'];
                break;
            case $def['link_create_each_exam']:
                $exam = $h->getExamById($pqh[1]);
                $title = $lang['text_add_each_exam'].' '.$exam['name'];
                break;
            case $def['link_update_each_exam']:
                $title = $lang['text_update_each_exam'];
                break;
            // construct exam
            case $def['link_construct_exam']:
                $title = $lang['manage_construct_exam'];
                break;
            case $def['link_update_construct_exam']:
                $exam = $h->getExamById($pqh[1]);
                $title = $lang['text_update_construct_exam'].$exam['name'];
                break;
            case $def['link_add_construct_exam']:
                $title = $lang['text_add_construct_knowledge_exam'];
                break;
            case $def['link_update_construct_exam_title']:
                $title = $lang['update_knowledge_number_question_for_title'];
                break;
            // questions
            case $def['get_link_question']:
                $title = $lang['manage_questions'];
                break;
            case $def['link_create_question']:
                $title = $lang['text_add_question'];
                break;
            case $def['link_update_question']:
                $title = $lang['text_update_question'];
                break;
            case $def['link_import_question']:
                $title = $lang['import_question'];
                break;
            case $def['link_question_knowledge']:
                $kn = $h->getKnowledgeByName($pqh[1]);
                $title = $lang['bank_questions_knowledge'].$kn['name'];
                break;
            // knowledge
            case $def['link_knowledge']:
                $title = $lang['list_knowledge'];
                break;
            case $def['link_update_knowledge']:
                $title = $lang['text_add_knowledge'];
                break;
            case $def['link_create_knowledge']:
                $title = $lang['text_update_knowledge'];
                break;
            // export
            case $def['link_report_profile']:
                $title = $lang['manage_export_candidate'];
                break;
            case $def['link_report_result_exam']:
                $title = $lang['export_result_exam'];
                break;
            case $def['link_report_result_exam_passed']:
                $title = $lang['export_result_exam_passed'];
                break;
            case $def['link_report_result_exam_failed']:
                $title = $lang['export_result_exam_failed'];
                break;
            // the quiz
            case $def['link_the_quiz']:
                if ($pqh[1] == '') 
                    $title = $lang['my_list_the_quiz'];
                if ($pqh[1] == $def['check_quiz'])
                    $title = $lang['check_quiz'];
                if ($pqh[1] == $def['quiz']) {
                    $exam = $h->getExamById($pqh[2]);
                    $title = $lang['the_quiz'].' - '.$lang['exam_name'].': '.$exam['name'];
                }
                break;
        }
    } else {
        $title = $lang['title_website'];
    }
    echo $title;
?>