<?php
    define("URL","http://localhost/tracnghiem/");
    $def = array(
        'link_login' => URL.'login.php',
        'link_process_login' => URL.'app/process/login.php',

        'link_process_add_exam' => URL.'app/process/exams/add.php',
        'link_process_update_exam' => URL.'app/process/exams/update.php',
        'link_process_delete_exam' => URL.'app/process/exams/delete.php',
        'link_process_result_profile' => URL.'app/process/exams/active_result.php',

        'link_process_add_each_exam' => URL.'app/process/exams/add_exam.php',
        'link_process_update_each_exam' => URL.'app/process/exams/update_exam.php',
        'link_process_delete_each_exam' => URL.'app/process/exams/delete_exam.php',
        'link_process_add_construct_exam' => URL.'app/process/exams/add_construct_exam.php',
        'link_process_update_construct_exam' => URL.'app/process/exams/update_construct_exam.php',
        'link_process_change_knowledge' => URL.'app/process/exams/change_knowledge.php',

        'link_process_add_block' => URL.'app/process/block/add.php',
        'link_process_update_block' => URL.'app/process/block/update.php',
        'link_process_delete_block' => URL.'app/process/block/delete.php',
        
        'link_process_add_department' => URL.'app/process/department/add.php',
        'link_process_update_department' => URL.'app/process/department/update.php',
        'link_process_delete_department' => URL.'app/process/department/delete.php',
        'get_department_follow_block' => URL.'app/process/department/change_department.php',

        'link_process_add_title' => URL.'app/process/title/add.php',
        'link_process_update_title' => URL.'app/process/title/update.php',
        'link_process_delete_title' => URL.'app/process/title/delete.php',

        'link_process_add_profile' => URL.'app/process/profile/add.php',
        'link_process_update_profile' => URL.'app/process/profile/update.php',
        'link_process_delete_profile' => URL.'app/process/profile/delete.php',
        'link_process_active_profile' => URL.'app/process/profile/active.php',
        'link_process_active_exam_profile' => URL.'app/process/profile/active_exam.php',
        'link_process_change_password' => URL.'app/process/profile/change_password.php',

        'link_process_add_question' => URL.'app/process/question/add.php',
        'link_process_update_question' => URL.'app/process/question/update.php',
        'link_process_delete_question' => URL.'app/process/question/delete.php',
        'link_process_import_question' => URL.'app/process/question/import.php',
        'link_process_add_knowledge' => URL.'app/process/question/add_knowledge.php',
        'link_process_update_knowledge' => URL.'app/process/question/update_knowledge.php',
        'link_process_delete_knowledge' => URL.'app/process/question/delete_knowledge.php',
        
        'link_process_export_candidate' => URL.'app/process/export/export_candidate.php',
        'link_process_export_result' => URL.'app/process/export/export_result.php',
        'link_process_export_result_passed' => URL.'app/process/export/export_result_passed.php',
        'link_process_export_result_failed' => URL.'app/process/export/export_result_failed.php',



        'theme' => URL.'theme/',
        'empty_input' => "''",
        // id_form
        //login
        'id_profile_code' => 'profile_code',
        'id_password' => 'password',
        'id_remember' => 'remember',
        'id_button_login' => 'login',
        'class_is_invalid' => 'is-invalid',
        'class_is_valid' => 'is-valid',
        
        // sidebar
        'sidebar_organizer' => 'app/sidebar/sidebar_organizer.php',
        'sidebar_admin_staff' => 'app/sidebar/sidebar_admin_staff.php',
        'sidebar_candidate' => 'app/sidebar/sidebar_candidate.php',
        'nav-flat' => 'nav-flat',
        
        'link_exam' => 'ki-thi/',        
        'get_link_exam' => 'ki-thi',
        'link_create_exam' => 'them-ki-thi',
        'link_update_exam' => 'cap-nhat-ki-thi',
        'link_construct_exam' => 'co-cau-de-thi',
        'link_add_construct_exam' => 'them-co-cau-de-thi-cho-doi-tuong-thi',
        'link_update_construct_exam' => 'cap-nhat-co-cau-de-thi',
        'link_update_construct_exam_title' => 'cap-nhat-co-cau-de-thi-cho-doi-tuong-thi',

        'link_each_exam' => 'khoi-thi-theo-ki-thi/',
        'get_link_each_exam' => 'khoi-thi-theo-ki-thi',
        'link_create_each_exam' => 'them-khoi-thi-theo-ki-thi',
        'link_update_each_exam' => 'cap-nhat-khoi-thi-theo-ki-thi',


        'link_block' => 'khoi/',
        'get_link_block' => 'khoi',
        'link_create_block' => 'them-khoi',
        'link_update_block' => 'cap-nhat-khoi',
        
        'link_department' => 'khoa/',
        'get_link_department' => 'khoa',
        'link_create_department' => 'them-khoa',
        'link_update_department' => 'cap-nhat-khoa',
        'link_title' => 'chuc-danh',
        'link_create_title' => 'them-chuc-danh',
        'link_update_title' => 'cap-nhat-chuc-danh',
        'link_profile' => 'nhan-vien/',
        'get_link_profile' => 'nhan-vien',
        'link_create_profile' => 'them-nhan-vien',
        'link_update_profile' => 'cap-nhat-nhan-vien',
        'link_change_password' => 'thay-doi-mat-khau',
        
        'link_question' => 'ngan-hang-de-thi/',
        'get_link_question' => 'ngan-hang-de-thi',
        'link_create_question' => 'them-de-thi',
        'link_update_question' => 'cap-nhat-de-thi',
        'link_import_question' => 'nhap-de-thi-bang-file-excel',
        'link_report' => 'xuat-bao-cao/',
        'get_link_report' => 'xuat-bao-cao',
        'link_report_profile' => 'xuat-bao-cao-danh-sach-thi-sinh',
        'link_report_result_exam' => 'xuat-bao-cao-danh-sach-diem-thi',
        'link_report_result_exam_passed' => 'xuat-bao-cao-danh-sach-diem-thi-dat',
        'link_report_result_exam_failed' => 'xuat-bao-cao-danh-sach-diem-thi-khong-dat',
        'link_edit_profile_login' => 'edit-information/',
        'get_link_edit_profile_login' => 'edit-information',
        'link_knowledge' => 'kien-thuc',
        'link_create_knowledge' => 'them-kien-thuc',
        'link_update_knowledge' => 'cap-nhat-kien-thuc',
        'link_profile_exam' => 'ki-thi-nhan-vien',
        'link_content_profile_exam' => 'noi-dung-bai-thi',
        'link_logout' => 'logout/',
        'get_link_logout' => 'logout',
        
        
        // role
        'role_organizer' => 1,
        'role_admin_staff' => 2,
        'role_candidate' => 3,

        // active/ inactive
        'actived' => 1,
        'inactive' => 0,
        'basic' => 1,
        'not_basic' => 0,
        
        'type_question_text' => 'text',
        'type_question_image' => 'image',
        
        'point' => 7,
        'filename_export_candidate' => 'danh_sach_thi_sinh.xlsx',
        'filename_export_result' => 'danh_sach_diem_thi_ket_qua_tong.xlsx',
        'filename_export_result_passed' => 'danh_sach_diem_thi_ket_qua_dat.xlsx',
        'filename_export_result_failed' => 'danh_sach_diem_thi_ket_qua_khong_dat.xlsx',

        
        'views' => 'app/views/',
               
    );
?>