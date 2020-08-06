<?php
    if (! isset($_REQUEST['pqh']) || $_REQUEST['pqh'] == null) {
        include("dashboard.php");
    } else {
        $pqh = explode("/", trim($_REQUEST['pqh']));
        switch ($pqh[0]) {
            // block
            case $def['get_link_block']:
                include($def['views']."block/list.php");
                break;
            case $def['link_create_block']:
                include($def['views']."block/add.php");
                break;
            case $def['link_update_block']:
                include($def['views']."block/update.php");
                break;
            // department
            case $def['get_link_department']:
                include($def['views']."department/list.php");
                break;
            case $def['link_create_department']:
                include($def['views']."department/add.php");
                break;
            case $def['link_update_department']:
                include($def['views']."department/update.php");
                break;
            // title
            case $def['link_title']:
                include($def['views']."title/list.php");
                break;
            case $def['link_create_title']:
                include($def['views']."title/add.php");
                break;
            case $def['link_update_title']:
                include($def['views']."title/update.php");
                break;
            // profile
            case $def['get_link_profile']:
                include($def['views']."profile/list.php");
                break;
            case $def['link_create_profile']:
                include($def['views']."profile/add.php");
                break;
            case $def['link_update_profile']:
                include($def['views']."profile/update.php");
                break;
            case $def['link_change_password']:
                include($def['views']."profile/change_password.php");
                break;
            case $def['link_import_profile']:
                include($def['views']."profile/import.php");
                break;
            // profile exam
            case $def['link_profile_exam']:
                include($def['views']."profile/list_exam_profile.php");
                break;
            // exam
            case $def['get_link_exam']:
                include($def['views']."exam/list.php");
                break;
            case $def['link_create_exam']:
                include($def['views']."exam/add.php");
                break;
            case $def['link_update_exam']:
                include($def['views']."exam/update.php");
                break;
            // exam block follow exam
            case $def['get_link_each_exam']:
                include($def['views']."exam/list_each_exam.php");
                break;
            case $def['link_create_each_exam']:
                include($def['views']."exam/add_each_exam.php");
                break;
            case $def['link_update_each_exam']:
                include($def['views']."exam/update_each_exam.php");
                break;
            // construct exam
            case $def['link_construct_exam']:
                include($def['views']."exam/list_construct_exam.php");
                break;
            case $def['link_update_construct_exam']:
                include($def['views']."exam/update_construct_exam.php");
                break;
            case $def['link_add_construct_exam']:
                include($def['views']."exam/add_construct_exam.php");
                break;
            case $def['link_update_construct_exam_title']:
                include($def['views']."exam/update_construct_exam_title.php");
                break;
            // questions
            case $def['get_link_question']:
                include($def['views']."question/list.php");
                break;
            case $def['link_create_question']:
                include($def['views']."question/add.php");
                break;
            case $def['link_update_question']:
                include($def['views']."question/update.php");
                break;
            case $def['link_import_question']:
                include($def['views']."question/import.php");            
                break;
            case $def['link_question_knowledge']:
                include($def['views']."question/list_knowledge_question.php");            
                break;
            // knowledge
            case $def['link_knowledge']:
                include($def['views']."question/list_knowledge.php");
                break;
            case $def['link_update_knowledge']:
                include($def['views']."question/update_knowledge.php");
                break;
            case $def['link_create_knowledge']:
                include($def['views']."question/add_knowledge.php");
                break;
            // export
            case $def['link_report_profile']:
                include($def['views']."export/export_list_candidate.php");
                break;
            case $def['link_report_result_exam']:
                include($def['views']."export/export_result.php");
                break;
            case $def['link_report_result_exam_passed']:
                include($def['views']."export/export_result_passed.php");
                break;
            case $def['link_report_result_exam_failed']:
                include($def['views']."export/export_result_failed.php");
                break;
            // the quiz
            case $def['link_the_quiz']:
                if ($pqh[1] == '') 
                    include($def['views']."quiz/list_exam_quiz.php");
                if ($pqh[1] == $def['check_quiz'])
                    include($def['views']."quiz/check_quiz.php");
                if ($pqh[1] == $def['quiz'])
                    include($def['views']."quiz/quiz.php");
                break;
                
        }
    }
?>