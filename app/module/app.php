<?php
    $profile = $_SESSION['is_logined'];
    $role = $profile['role'];
    if (!isset($_REQUEST['pqh'])) { 
        $key_title_site = 'title_website';
        $quiz = 0;
    } else {
        $key_title_site = $_REQUEST['pqh'];
        $pqh = explode("/", trim($_REQUEST['pqh']));
        if ($pqh[0] == $def['get_link_logout']) {
            unset($_SESSION['is_logined']);
            header("location: ".$def['link_login']);
        }
        $quiz = 1;
    }
    if ($quiz == 0 || ($quiz == 1 && $pqh[0] != 'thi-trac-nghiem')) {
        if ($role == $def['role_organizer']) {
            $sidebar = $def['sidebar_organizer'];
            $text_role = $lang['text_role_organizer'];
        } elseif ($role == $def['role_admin_staff']) {
            $sidebar = $def['sidebar_admin_staff'];
            $text_role = $lang['text_role_admin_staff'];
        } else {
            $sidebar = $def['sidebar_candidate'];
            $text_role = $lang['text_role_candidate'];
        }
    } else {
        $sidebar = $def['sizebar_quiz'];
        $text_role = $lang['information_quiz'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
      <base href="<?php echo URL; ?>" />                
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?php include("title.php"); ?></title>
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/fontawesome-free/css/all.min.css" />
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
      <!-- Tempusdominus Bbootstrap 4 -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
      <!-- iCheck -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
      <!-- JQVMap -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/jqvmap/jqvmap.min.css" />
      <!-- Theme style -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>dist/css/adminlte.min.css" />
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
      <!-- Daterange picker -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/daterangepicker/daterangepicker.css" />
      <!-- summernote -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/summernote/summernote-bs4.css" />
      <!-- select2 -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/select2/css/select2.min.css" />
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css" />
      <style type="text/css">
        label:not(.form-check-label):not(.custom-file-label) {
            font-weight: 400;
        }
      </style>
      <?php
        $array_dataTables = array($def['get_link_block'], $def['get_link_department'], $def['link_title'], $def['get_link_profile'], $def['get_link_exam'], $def['get_link_each_exam'], $def['get_link_question'], $def['link_knowledge'], $def['link_profile_exam'], $def['link_profile_exam'], $def['link_construct_exam'], $def['link_question_knowledge'], $def['link_the_quiz']);
        if (isset($_REQUEST['pqh']) && in_array($pqh[0], $array_dataTables)) {
      ?>
      <!-- DataTables -->
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
      <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
      <?php } ?>
      <!-- Google Font: Source Sans Pro -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    </head>
    <body class="hold-transition sidebar-mini layout-fixed accent-success">
        <div class="wrapper">
            <?php
                include("navbar.php");
                include($sidebar);
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php 
                    include("breadcrumb.php"); 
                    include("content.php");
                ?>
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="<?php echo URL; ?>"><?php echo $lang['copy_right'] ?></a>.</strong>
            All rights reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->
        <!-- jQuery -->
        <script src="<?php echo $def['theme']; ?>plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo $def['theme']; ?>plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo $def['theme']; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo $def['theme']; ?>plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo $def['theme']; ?>plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="<?php echo $def['theme']; ?>plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="<?php echo $def['theme']; ?>plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="<?php echo $def['theme']; ?>plugins/moment/moment.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo $def['theme']; ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo $def['theme']; ?>plugins/summernote/summernote-bs4.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo $def['theme']; ?>plugins/select2/js/select2.full.min.js"></script>
        <!-- Bootstrap Switch -->
        <script src="<?php echo $def['theme']; ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo $def['theme']; ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo $def['theme']; ?>dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo $def['theme']; ?>dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo $def['theme']; ?>dist/js/demo.js"></script>
        <script type="text/javascript">
            $(function(){
                //Datemask dd/mm/yyyy
                $('#birthday').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                $('#start_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                $('#end_date').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                $('.select2').select2();
                $("input[data-bootstrap-switch]").each(function(){
                  $(this).bootstrapSwitch('state', $(this).prop('checked'));
                });
            });
        </script>
        <?php
            if (isset($_REQUEST['pqh']) && in_array($pqh[0], $array_dataTables)) {
        ?>
        <!-- DataTables -->
        <script src="<?php echo $def['theme']; ?>plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript">
            <?php 
                if ($pqh[0] == $def['get_link_block']) {
                    $dataTable = 'blocks';
                    $coloumn_not_sort = '2';
                    $link_delete = $def['link_process_delete_block'];
                }
                if ($pqh[0] == $def['get_link_department']) {
                    $dataTable = 'departments';
                    $coloumn_not_sort = '3';
                    $link_delete = $def['link_process_delete_department'];
                }
                if ($pqh[0] == $def['link_title']) {
                    $dataTable = 'titles';
                    $coloumn_not_sort = '3';
                    $link_delete = $def['link_process_delete_title'];
                }
                if ($pqh[0] == $def['get_link_profile']) {
                    $dataTable = 'profiles';
                    $coloumn_not_sort = '2,3,4,5,6,7';
                    $link_delete = $def['link_process_delete_profile'];
                }
                if ($pqh[0] == $def['get_link_exam']) {
                    $dataTable = 'exams';
                    $coloumn_not_sort = '2,3,4,5,6';
                    $link_delete = $def['link_process_delete_exam'];
                }
                if ($pqh[0] == $def['get_link_each_exam']) {
                    $dataTable = 'each_exams';
                    $coloumn_not_sort = '2,3,4,5,6';
                    $link_delete = $def['link_process_delete_each_exam'];
                }
                if ($pqh[0] == $def['get_link_question']) {
                    $dataTable = 'questions';
                    $coloumn_not_sort = '2,3';
                    $link_delete = $def['link_process_delete_question'];
                }
                if ($pqh[0] == $def['link_knowledge']) {
                    $dataTable = 'knowledge';
                    $coloumn_not_sort = '2';
                    $link_delete = $def['link_process_delete_knowledge'];
                }
                if ($pqh[0] == $def['link_profile_exam']) {
                    $dataTable = 'exam_profiles';
                    $coloumn_not_sort = '2,3,4,5,6';
                }
                if ($pqh[0] == $def['link_construct_exam']) {
                    $dataTable = 'construct_exams';
                    $coloumn_not_sort = '2';
                }
                if ($pqh[0] == $def['link_question_knowledge']) {
                    $dataTable = 'questions_knowledge';
                    $coloumn_not_sort = '2,3';
                    $link_delete = $def['link_process_delete_question'];
                }
                if ($pqh[0] == $def['link_the_quiz'] && ($pqh[1] == '' || !isset($pqh[1]))) {
                    $dataTable = 'list_quiz_exams';
                    $coloumn_not_sort = '2,3,4';
                }                 
            ?>
            $('#<?php echo $dataTable; ?>').DataTable({
              "aoColumnDefs": [ {"bSortable" : false, "aTargets" : [<?php echo $coloumn_not_sort; ?>] } ],  
              "paging": true,
              "lengthChange": true,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
              "lengthMenu": [[20, 25, 30, 50, 100, -1], [20, 25, 30, 50, 100, "<?php echo $lang['all']; ?>"]],
              "language": {
                    "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Vietnamese.json"
              }
            });
            $(document).ready(function(){
                $(document).on('click', '.delete', function(){
                    if (confirm("<?php echo $lang['confirm_delete'] ?>")) {
                        var id = $(this).data('id');
                        $(this).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
                        $(this).parent().parent().hide();
                        $.post("<?php echo $link_delete ?>", { id: id }, function(data){
                            
                        });
                    }
                });
            });
        </script>
        <?php 
            } 
            if ($pqh[0] == $def['get_link_profile']) {
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on('click', '.clsactive', function(){
                    var id = $(this).data('id');
                    var pa = $(this).parent();
                    $.post("<?php echo $def['link_process_active_profile'] ?>", {id: id}, function(data){
                        pa.html(data);
                    });
                });
                $(document).on('click', '.clsactive_exam', function(){
                    var id = $(this).data('id');
                    var pa = $(this).parent();
                    $.post("<?php echo $def['link_process_active_exam_profile'] ?>", {id: id}, function(data){
                        pa.html(data);
                    });
                });
            });
        </script>
        <?php 
            } if ($pqh[0] == $def['get_link_exam']) {
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(document).on('click', '.clsactive_result', function(){
                    var id = $(this).data('id');
                    var pa = $(this).parent();
                    $.post("<?php echo $def['link_process_result_profile'] ?>", {id: id}, function(data){
                        pa.html(data);
                    });
                });
            });
        </script>
        <?php } ?>
        <?php 
            $array_form = array($def['link_create_block'], $def['link_update_block'], $def['link_create_department'], $def['link_update_department'], $def['link_create_title'], $def['link_update_title'], $def['link_create_profile'], $def['link_update_profile'], $def['link_change_password'], $def['link_create_exam'], $def['link_update_exam'], $def['link_create_each_exam'], $def['link_update_each_exam'], $def['link_create_question'], $def['link_update_question'], $def['link_import_question'], $def['link_report_profile'], $def['link_report_result_exam'], $def['link_report_result_exam_passed'], $def['link_report_result_exam_failed'], $def['link_create_knowledge'], $def['link_update_knowledge'], $def['link_update_construct_exam'], $def['link_add_construct_exam'], $def['link_update_construct_exam_title'], $def['link_import_profile'], $def['link_the_quiz']);
            $array_form_add = array($def['link_create_block'], $def['link_create_department'], $def['link_create_title'], $def['link_create_profile'], $def['link_create_knowledge']);
            $array_form_update = array($def['link_update_block'], $def['link_update_department'], $def['link_update_title'], $def['link_update_profile'], $def['link_update_exam'], $def['link_update_each_exam'], $def['link_update_question'], $def['link_update_knowledge']);
            $array_validate_title = array($def['link_create_block'], $def['link_create_department'], $def['link_create_title'], $def['link_create_profile'], $def['link_create_knowledge']);
            if (in_array($pqh[0], $array_form)) {
        ?>
        <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/toastr/toastr.min.css" />
        <script src="<?php echo $def['theme']; ?>plugins/toastr/toastr.min.js"></script>
        <script src="<?php echo $def['theme']; ?>plugins/jquery.form/jquery.form.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                <?php
                    if ($pqh[0] == $def['link_change_password']) {
                ?>
                $(document).on('click', '#changepass', function(){
                    var new_pass = $('#password').val();
                    var new_pass_confirm = $('#password_confirm').val();
                    if (new_pass == '') {
                        $('#nameHelpPass').html("<?php echo $lang['profile_new_password_error'] ?>");
                        $('#password').addClass('is-invalid');
                        $('#password').focus();
                        return false;
                    } else {
                        $('#nameHelpPass').html("");
                        $('#password').removeClass('is-invalid');
                        $('#password').addClass('is-valid');
                    }
                    if (new_pass_confirm == '') {
                        $('#nameHelpPassConfirm').html("<?php echo $lang['profile_confirm_new_password_error'] ?>");
                        $('#password_confirm').addClass('is-invalid');
                        $('#password_confirm').focus();
                        return false;
                    } else {
                        $('#nameHelpPassConfirm').html("");
                        $('#password_confirm').removeClass('is-invalid');
                        $('#password_confirm').addClass('is-valid');
                    }
                    if (new_pass_confirm !== new_pass) {
                        $('#nameHelpPassConfirm').html("<?php echo $lang['profile_password_not_match'] ?>");
                        $('#password_confirm').addClass('is-invalid');
                        $('#password_confirm').focus();
                        return false;
                    } else {
                        $('#nameHelpPassConfirm').html("");
                        $('#password_confirm').removeClass('is-invalid');
                        $('#password_confirm').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#changepass').attr("disabled",true);
                            $('#changepass').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                       	complete: function(xhr) {
                    	   $('#changepass').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                           $('#changepass').removeAttr('disabled');
                           var text = xhr.responseText;
                           var n = text.split(";");
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['change_password_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_profile'] ?>");
                                }, 4000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
             			}
                    });
                });
                <?php } 
                    if (in_array($pqh[0], $array_validate_title)) {
                ?>
                $(document).on('click', '#submit', function(){
                    <?php 
                        if ($pqh[0] == $def['link_create_block']) {
                            $err = $lang['block_error'];
                            $success = $lang['add_block_success'];
                        } 
                        if ($pqh[0] == $def['link_create_department']) {
                            $err = $lang['department_error'];
                            $success = $lang['add_department_success'];
                        }
                        if ($pqh[0] == $def['link_create_title']) {
                            $err = $lang['title_error'];
                            $success = $lang['add_title_success'];
                        }
                        if ($pqh[0] == $def['link_create_profile']) {
                            $err_code = $lang['profile_code_error'];
                            $err = $lang['profile_fullname_error'];
                            $success = $lang['add_profile_success'];
                        }
                        if ($pqh[0] == $def['link_create_knowledge']) {
                            $err = $lang['knowledge_error'];
                            $success = $lang['add_knowledge_success'];
                        }
                    ?>
                    var name = $('#name').val();
                    <?php 
                        if ($pqh[0] == $def['link_create_profile']) {
                    ?>
                    var profile_code = $('#profile_code').val();
                    if (profile_code == '') {
                        $('#nameHelpCode').html("<?php echo $err_code ?>");
                        $('#profile_code').addClass('is-invalid');
                        $('#profile_code').focus();
                        return false;
                    } else {
                        $('#nameHelpCode').html("");
                        $('#profile_code').removeClass('is-invalid');
                        $('#profile_code').addClass('is-valid');
                    }
                    <?php 
                        }
                    ?>
                    if (name == '') {
                        $('#nameHelpBlock').html("<?php echo $err ?>");
                        $('#name').addClass('is-invalid');
                        $('#name').focus();
                        return false;
                    } else {
                        $('#nameHelpBlock').html("");
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit').attr("disabled",true);
                            $('#submit').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                       	complete: function(xhr) {
                    	   $('#submit').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                           $('#submit').removeAttr('disabled');
                           var text = xhr.responseText;
                           var n = text.split(";");
                           <?php 
                            if ($pqh[0] != $def['link_create_profile']) {
                           ?>
                                if(n[0] == '1'){
                                    toastr.success('<?php echo $success ?>');
                                    $('#name').removeClass('is-valid');
                                    $('#name').val('');
                                    $('html, body').animate({scrollTop: $("html").offset().top}, 2000);
                                    <?php 
                                        if ($pqh[0] == $def['get_link_profile']) {
                                    ?>
                                    location = "<?php echo $def['link_profile'] ?>";
                                    <?php 
                                        }
                                    ?>
                                } else {           
                                    toastr.error('<?php echo $lang['error_system'] ?>');
                                    return false;
                                }
                            <?php
                                } else {
                            ?>
                            if (n[0] == 3) {
                                $('#profile_code').addClass('is-valid');
                                $('#profile_code').focus();
                                toastr.error('<?php echo $lang['profile_code_exist'] ?>');
                                return false;
                            } else {
                                if(n[0] == '1'){
                                    toastr.success('<?php echo $success ?>');
                                    window.location.replace("<?php echo $def['link_profile'] ?>");
                                } else {           
                                    toastr.error('<?php echo $lang['error_system'] ?>');
                                    return false;
                                }
                            }
                            <?php
                                }
                            ?>
             			}
                    });
                });
                <?php } ?>
                <?php 
                    if (in_array($pqh[0], $array_form_update)) {
                ?>
                $(document).on('click', '#cancel', function(){
                    <?php 
                        if ($pqh[0] == $def['link_update_block']) {
                    ?>
                    location = "<?php echo $def['link_block'] ?>";
                    <?php } 
                        if ($pqh[0] == $def['link_update_department']) {
                    ?>
                    location = "<?php echo $def['link_department'] ?>";
                    <?php
                        }
                        if ($pqh[0] == $def['link_update_title']) {
                    ?>
                    location = "<?php echo $def['link_title'] ?>";
                    <?php } 
                        if ($pqh[0] == $def['link_update_profile']) {
                    ?>
                    location = "<?php echo $def['link_profile'] ?>";
                    <?php
                        }
                        if ($pqh[0] == $def['link_update_exam']) {
                    ?>
                    location = "<?php echo $def['link_exam'] ?>";
                    <?php } 
                        if ($pqh[0] == $def['link_update_each_exam']) {
                    ?>
                    var exam_id = $('#exam_id').val();
                    location = "<?php echo $def['link_each_exam'] ?>"+exam_id;
                    <?php } 
                        if ($pqh[0] == $def['link_update_question']) {
                    ?>
                    location = "<?php echo $def['link_question'] ?>";
                    <?php } 
                        if ($pqh[0] == $def['link_update_knowledge']) {
                    ?>
                    location = "<?php echo $def['link_knowledge'] ?>";
                    <?php
                        }
                    ?>
                });
                $(document).on('click', '#update', function(){
                    <?php 
                        if ($pqh[0] == $def['link_update_block']) {
                            $err_update = $lang['block_error'];
                            $success_update = $lang['update_block_success'];
                            $location = $def['link_block'];
                        }
                        if ($pqh[0] == $def['link_update_department']) {
                            $err_update = $lang['department_error'];
                            $success_update = $lang['update_department_success'];
                            $location = $def['link_department'];
                        }
                        if ($pqh[0] == $def['link_update_title']) {
                            $err_update = $lang['title_error'];
                            $success_update = $lang['update_title_success'];
                            $location = $def['link_title'];
                        }
                        if ($pqh[0] == $def['link_update_profile']) {
                            $err_code_update = $lang['profile_code_error'];
                            $err_update = $lang['profile_fullname_error'];
                            $success_update = $lang['update_profile_success'];
                            $location = $def['link_profile'];
                        }
                        if ($pqh[0] == $def['link_update_knowledge']) {
                            $err_update = $lang['knowledge_error'];
                            $success_update = $lang['update_knowledge_success'];
                            $location = $def['link_knowledge'];
                        }
                    ?>
                    var name = $('#name').val();
                    <?php 
                        if ($pqh[0] == $def['link_update_profile']) {
                    ?>
                    var profile_code = $('#profile_code').val();
                    if (profile_code == '') {
                        $('#nameHelpCode').html("<?php echo $err_code ?>");
                        $('#profile_code').addClass('is-invalid');
                        $('#profile_code').focus();
                        return false;
                    } else {
                        $('#nameHelpCode').html("");
                        $('#profile_code').removeClass('is-invalid');
                        $('#profile_code').addClass('is-valid');
                    }
                    <?php 
                        }
                    ?>
                    if (name == '') {
                        $('#nameHelpBlock').html("<?php echo $err_update ?>");
                        $('#name').addClass('is-invalid');
                        $('#name').focus();
                        return false;
                    } else {
                        $('#nameHelpBlock').html("");
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#update').attr("disabled",true);
                            $('#update').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                       	complete: function(xhr) {
                    	   $('#update').html('<?php echo $lang['update']; ?> <i class="fas fa-save">');
                           $('#update').removeAttr('disabled');
                           var text = xhr.responseText;
                           var n = text.split(";");
                       	   if(n[0] == '1'){
                                toastr.success('<?php echo $success_update ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $location ?>");
                                }, 1000);
                 			}else {
                       	        toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                 			}
             			}
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_create_exam']) {
                ?>
                $(document).on('click', '#submit_exam', function(){
                    var exam_code = $('#exam_code').val();
                    var name = $('#name').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    var exam_time = $('#exam_time').val();
                    var number_questions = $('#number_questions').val();
                    var point = $('#point').val();
                    if (exam_code == '') {
                        $('#examCode').html("<?php echo $lang['exam_code_error'] ?>");
                        $('#exam_code').addClass('is-invalid');
                        $('#exam_code').focus();
                        return false;
                    } else {
                        $('#examCode').html("");
                        $('#exam_code').removeClass('is-invalid');
                        $('#exam_code').addClass('is-valid');
                    }
                    if (name == '') {
                        $('#examName').html("<?php echo $lang['exam_name_error'] ?>");
                        $('#name').addClass('is-invalid');
                        $('#name').focus();
                        return false;
                    } else {
                        $('#examName').html("");
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    if (start_date == '') {
                        $('#startDate').html("<?php echo $lang['start_date_error'] ?>");
                        $('#start_date').addClass('is-invalid');
                        $('#start_date').focus();
                        return false;
                    } else {
                        $('#startDate').html("");
                        $('#start_date').removeClass('is-invalid');
                        $('#start_date').addClass('is-valid');
                    }
                    if (end_date == '') {
                        $('#endDate').html("<?php echo $lang['end_date_error'] ?>");
                        $('#end_date').addClass('is-invalid');
                        $('#end_date').focus();
                        return false;
                    } else {
                        $('#endDate').html("");
                        $('#end_date').removeClass('is-invalid');
                        $('#end_date').addClass('is-valid');
                    }
                    if (exam_time == '') {
                        $('#examTime').html("<?php echo $lang['exam_time_error'] ?>");
                        $('#exam_time').addClass('is-invalid');
                        $('#exam_time').focus();
                        return false;
                    } else {
                        $('#examTime').html("");
                        $('#exam_time').removeClass('is-invalid');
                        $('#exam_time').addClass('is-valid');
                    }
                    if (number_questions == '') {
                        $('#numberQuestions').html("<?php echo $lang['number_questions_error'] ?>");
                        $('#number_questions').addClass('is-invalid');
                        $('#number_questions').focus();
                        return false;
                    } else {
                        $('#numberQuestions').html("");
                        $('#number_questions').removeClass('is-invalid');
                        $('#number_questions').addClass('is-valid');
                    }
                    if (point <= 0) {
                        $('#passedPoint').html("<?php echo $lang['passed_point_error'] ?>");
                        $('#passed_point').addClass('is-invalid');
                        $('#passed_point').focus();
                        return false;
                    } else {
                        $('#passedPoint').html("");
                        $('#passed_point').removeClass('is-invalid');
                        $('#passed_point').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_exam').attr("disabled",true);
                            $('#submit_exam').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                       	complete: function(xhr) {
                    	   $('#submit_exam').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                           $('#submit_exam').removeAttr('disabled');
                           var text = xhr.responseText;
                           var n = text.split(";");
                           console.log(text);
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['add_exam_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_exam'] ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
             			}
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_update_exam']) {
                ?>
                $(document).on('click', '#submit_updateexam', function(){
                    var exam_code = $('#exam_code').val();
                    var name = $('#name').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    var exam_time = $('#exam_time').val();
                    var number_questions = $('#number_questions').val();
                    var point = $('#point').val();
                    if (exam_code == '') {
                        $('#examCode').html("<?php echo $lang['exam_code_error'] ?>");
                        $('#exam_code').addClass('is-invalid');
                        $('#exam_code').focus();
                        return false;
                    } else {
                        $('#examCode').html("");
                        $('#exam_code').removeClass('is-invalid');
                        $('#exam_code').addClass('is-valid');
                    }
                    if (name == '') {
                        $('#examName').html("<?php echo $lang['exam_name_error'] ?>");
                        $('#name').addClass('is-invalid');
                        $('#name').focus();
                        return false;
                    } else {
                        $('#examName').html("");
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    if (start_date == '') {
                        $('#startDate').html("<?php echo $lang['start_date_error'] ?>");
                        $('#start_date').addClass('is-invalid');
                        $('#start_date').focus();
                        return false;
                    } else {
                        $('#startDate').html("");
                        $('#start_date').removeClass('is-invalid');
                        $('#start_date').addClass('is-valid');
                    }
                    if (end_date == '') {
                        $('#endDate').html("<?php echo $lang['end_date_error'] ?>");
                        $('#end_date').addClass('is-invalid');
                        $('#end_date').focus();
                        return false;
                    } else {
                        $('#endDate').html("");
                        $('#end_date').removeClass('is-invalid');
                        $('#end_date').addClass('is-valid');
                    }
                    if (exam_time == '') {
                        $('#examTime').html("<?php echo $lang['exam_time_error'] ?>");
                        $('#exam_time').addClass('is-invalid');
                        $('#exam_time').focus();
                        return false;
                    } else {
                        $('#examTime').html("");
                        $('#exam_time').removeClass('is-invalid');
                        $('#exam_time').addClass('is-valid');
                    }
                    if (number_questions == '') {
                        $('#numberQuestions').html("<?php echo $lang['number_questions_error'] ?>");
                        $('#number_questions').addClass('is-invalid');
                        $('#number_questions').focus();
                        return false;
                    } else {
                        $('#numberQuestions').html("");
                        $('#number_questions').removeClass('is-invalid');
                        $('#number_questions').addClass('is-valid');
                    }
                    if (point <= 0) {
                        $('#passedPoint').html("<?php echo $lang['passed_point_error'] ?>");
                        $('#passed_point').addClass('is-invalid');
                        $('#passed_point').focus();
                        return false;
                    } else {
                        $('#passedPoint').html("");
                        $('#passed_point').removeClass('is-invalid');
                        $('#passed_point').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_updateexam').attr("disabled",true);
                            $('#submit_updateexam').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                       	complete: function(xhr) {
                    	   $('#submit_updateexam').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                           $('#submit_updateexam').removeAttr('disabled');
                           var text = xhr.responseText;
                           var n = text.split(";");
                           console.log(text);
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['update_exam_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_exam'] ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
             			}
                    });
                });
                <?php } 
                    $array_change_department = array($def['link_create_profile'], $def['link_update_profile'], $def['link_create_each_exam'], $def['link_update_each_exam'], $def['link_create_question'], $def['link_update_question'], $def['link_report_profile'], $def['link_report_result_exam'], $def['link_report_result_exam_passed'], $def['link_report_result_exam_failed']);
                    if (in_array($pqh[0], $array_change_department)) {
                ?>
                $(document).on('change', '#block_id', function(){
                    var block_id = $(this).val();
                    $.post("<?php echo $def['get_department_follow_block'] ?>", {block_id: block_id}, function(data){
                        $('#department_id').html(data);
                    });
                }).change();
                <?php } 
                    if ($pqh[0] == $def['link_create_each_exam']) {
                ?>
                $(document).on('click', '#submit_each_exam', function(){
                    var department_id = $('#department_id').val();
                    var title_id = $('#title_id').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    if (department_id.length == 0) {
                        $('#departmentId').html("<?php echo $lang['exam_code_error'] ?>");
                        $('#department_id').addClass('is-invalid');
                        $('#department_id').focus();
                        return false;
                    } else {
                        $('#departmentId').html("");
                        $('#department_id').removeClass('is-invalid');
                        $('#department_id').addClass('is-valid');
                    }
                    if (title_id.length == 0) {
                        $('#titleId').html("<?php echo $lang['exam_code_error'] ?>");
                        $('#title_id').addClass('is-invalid');
                        $('#title_id').focus();
                        return false;
                    } else {
                        $('#titleId').html("");
                        $('#title_id').removeClass('is-invalid');
                        $('#title_id').addClass('is-valid');
                    }
                    
                    if (start_date == '') {
                        $('#startDate').html("<?php echo $lang['start_date_error'] ?>");
                        $('#start_date').addClass('is-invalid');
                        $('#start_date').focus();
                        return false;
                    } else {
                        $('#startDate').html("");
                        $('#start_date').removeClass('is-invalid');
                        $('#start_date').addClass('is-valid');
                    }
                    if (end_date == '') {
                        $('#endDate').html("<?php echo $lang['end_date_error'] ?>");
                        $('#end_date').addClass('is-invalid');
                        $('#end_date').focus();
                        return false;
                    } else {
                        $('#endDate').html("");
                        $('#end_date').removeClass('is-invalid');
                        $('#end_date').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_each_exam').attr("disabled",true);
                            $('#submit_each_exam').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                       	complete: function(xhr) {
                    	   $('#submit_each_exam').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                           $('#submit_each_exam').removeAttr('disabled');
                           var text = xhr.responseText;
                           var n = text.split(";");
                           console.log(text);
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['add_each_exam_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_each_exam'].$pqh[1] ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
             			}
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_update_each_exam']) {
                ?>
                $(document).on('click', '#submit_each_exam', function(){
                    var department_id = $('#department_id').val();
                    var title_id = $('#title_id').val();
                    var start_date = $('#start_date').val();
                    var end_date = $('#end_date').val();
                    if (department_id.length == 0) {
                        $('#departmentId').html("<?php echo $lang['exam_code_error'] ?>");
                        $('#department_id').addClass('is-invalid');
                        $('#department_id').focus();
                        return false;
                    } else {
                        $('#departmentId').html("");
                        $('#department_id').removeClass('is-invalid');
                        $('#department_id').addClass('is-valid');
                    }
                    if (title_id.length == 0) {
                        $('#titleId').html("<?php echo $lang['exam_code_error'] ?>");
                        $('#title_id').addClass('is-invalid');
                        $('#title_id').focus();
                        return false;
                    } else {
                        $('#titleId').html("");
                        $('#title_id').removeClass('is-invalid');
                        $('#title_id').addClass('is-valid');
                    }
                    
                    if (start_date == '') {
                        $('#startDate').html("<?php echo $lang['start_date_error'] ?>");
                        $('#start_date').addClass('is-invalid');
                        $('#start_date').focus();
                        return false;
                    } else {
                        $('#startDate').html("");
                        $('#start_date').removeClass('is-invalid');
                        $('#start_date').addClass('is-valid');
                    }
                    if (end_date == '') {
                        $('#endDate').html("<?php echo $lang['end_date_error'] ?>");
                        $('#end_date').addClass('is-invalid');
                        $('#end_date').focus();
                        return false;
                    } else {
                        $('#endDate').html("");
                        $('#end_date').removeClass('is-invalid');
                        $('#end_date').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_each_exam').attr("disabled",true);
                            $('#submit_each_exam').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                            complete: function(xhr) {
                            $('#submit_each_exam').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                            $('#submit_each_exam').removeAttr('disabled');
                            var text = xhr.responseText;
                            var n = text.split(";");
                            console.log(text);
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['update_each_exam_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_each_exam'].$pqh[1]; ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
                            }
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_create_question'] || $pqh[0] == $def['link_update_question']) {
                ?>
                $(document).on('click', '.add_suggest_answer', function(){
                    var html = '<input type="text" class="form-control mt-2" name="answer[]" />';
                    $('#add_answer').append(html);
                });
                $(document).on('change', '#type_question', function(){
                    var type_question = $(this).val();
                    if (type_question == 'image') {
                        var html_image = '<div class="form-group">';
                            html_image += ' <label for="exampleInputFile"><?php echo $lang['hinhanh'] ?></label>';
                            html_image += ' <div class="input-group">';
                            html_image += ' <div class="custom-file">';
                            html_image += '     <input type="file" class="custom-file-input" id="file" name="file" /><label class="custom-file-label" for="file"><?php echo $lang['choose_image'] ?></label>';
                            html_image += ' </div>';
                            //html_image += ' <div class="input-group-append"><span class="input-group-text" id=""><?php echo $lang['choose_image'] ?></span></div>';
                            html_image += ' </div>';
                            html_image += '</div>';
                        $('#image_question').html(html_image);
                    } else 
                        $('#image_question').html('');
                }).change();
                $(document).on('change', '#file', function(){
                    var filename = $(this).val();
                    if (filename != '') {
                        $('.custom-file-label').html(filename);
                    }
                }).change();
                <?php } 
                    if ($pqh[0] == $def['link_create_question']) {
                ?>
                $(document).on('click', '#submit_question', function(){
                    var question = $('#question').val();
                    var answer = $('input[name="answer[]"]').val();
                    var right_answer = $('#right_answer').val();
                    if (question == '') {
                        $('#questionHelp').html("<?php echo $lang['question_error'] ?>");
                        $('#question').addClass('is-invalid');
                        $('#question').focus();
                        return false;
                    } else {
                        $('#questionHelp').html("");
                        $('#question').removeClass('is-invalid');
                        $('#question').addClass('is-valid');
                    }
                    if (answer.length == 0) {
                        $('#answerHelp').html("<?php echo $lang['suggest_answer_error'] ?>");
                        $('input[name="answer[]"]').addClass('is-invalid');
                        $('#answer1').focus();
                        return false;
                    } else {
                        $('#answerHelp').html("");
                        $('input[name="answer[]"]').removeClass('is-invalid');
                        $('input[name="answer[]"]').addClass('is-valid');
                    }
                    if (right_answer == '') {
                        $('#rightAnswer').html("<?php echo $lang['right_answer_error'] ?>");
                        $('#right_answer').addClass('is-invalid');
                        $('#right_answer').focus();
                        return false;
                    } else {
                        $('#rightAnswer').html("");
                        $('#right_answer').removeClass('is-invalid');
                        $('#right_answer').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_question').attr("disabled",true);
                            $('#submit_question').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                            complete: function(xhr) {
                            $('#submit_question').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                            $('#submit_question').removeAttr('disabled');
                            var text = xhr.responseText;
                            var n = text.split(";");
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['add_question_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_question']; ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
                            }
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_update_question']) {
                ?>
                $(document).on('click', '#submit_question', function(){
                    var question = $('#question').val();
                    var answer = $('input[name="answer[]"]').val();
                    var right_answer = $('#right_answer').val();
                    if (question == '') {
                        $('#questionHelp').html("<?php echo $lang['question_error'] ?>");
                        $('#question').addClass('is-invalid');
                        $('#question').focus();
                        return false;
                    } else {
                        $('#questionHelp').html("");
                        $('#question').removeClass('is-invalid');
                        $('#question').addClass('is-valid');
                    }
                    if (answer.length == 0) {
                        $('#answerHelp').html("<?php echo $lang['suggest_answer_error'] ?>");
                        $('input[name="answer[]"]').addClass('is-invalid');
                        $('#answer1').focus();
                        return false;
                    } else {
                        $('#answerHelp').html("");
                        $('input[name="answer[]"]').removeClass('is-invalid');
                        $('input[name="answer[]"]').addClass('is-valid');
                    }
                    if (right_answer == '') {
                        $('#rightAnswer').html("<?php echo $lang['right_answer_error'] ?>");
                        $('#right_answer').addClass('is-invalid');
                        $('#right_answer').focus();
                        return false;
                    } else {
                        $('#rightAnswer').html("");
                        $('#right_answer').removeClass('is-invalid');
                        $('#right_answer').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_question').attr("disabled",true);
                            $('#submit_question').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                            complete: function(xhr) {
                            $('#submit_question').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                            $('#submit_question').removeAttr('disabled');
                            var text = xhr.responseText;
                            var n = text.split(";");
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['update_question_success'] ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_question']; ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
                            }
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_import_question'] || $pqh[0] == $def['link_import_profile']) {
                        if ($pqh[0] == $def['link_import_question']) {
                            $alert = $lang['import_question_success'];
                            $link_location = $def['link_question'];
                        } else {
                            $alert = $lang['import_profile_success'];
                            $link_location = $def['link_profile'];
                        }
                ?>
                $(document).on('click', '#submit_import', function(){
                    var file = $('#file').val();
                    if (file == '') {
                        $('#fileHelp').html("<?php echo $lang['file_import_error'] ?>");
                        $('#file').addClass('is-invalid');
                        $('#file').focus();
                        return false;
                    } else {
                        $('#fileHelp').html("");
                        $('#file').removeClass('is-invalid');
                        $('#file').addClass('is-valid');
                    }
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_import').attr("disabled",true);
                            $('#submit_import').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                        complete: function(xhr) {
                            $('#submit_import').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                            $('#submit_import').removeAttr('disabled');
                            var text = xhr.responseText;
                            var n = text.split(";");
                            if(n[0] == '1'){
                                toastr.success('<?php echo $alert; ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $link_location; ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
                        }
                    });
                });
                <?php } 
                    if ($pqh[0] == $def['link_update_construct_exam']) {
                ?>
                    $(document).on('click', '.click_to_view_number', function() {
                        var id_t = $(this).data('id');
                        var cls = $(this).children('i.fas');
                        if (cls.hasClass('fa-angle-right')) {
                            cls.removeClass('fa-angle-right');
                            cls.addClass('fa-angle-down');
                            $(this).attr('title', '<?php echo $lang['click_to_hide_construct_exam'] ?>');
                        } else {
                            cls.removeClass('fa-angle-down');
                            cls.addClass('fa-angle-right');
                            $(this).attr('title','<?php echo $lang['click_to_view_construct_exam'] ?>');
                        }
                        $('#content_construct_exam-'+id_t).toggle('slow');
                    });
                <?php
                    }
                    if ($pqh[0] == $def['link_add_construct_exam'] || $pqh[0] == $def['link_update_construct_exam_title']) {
                        if ($pqh[0] == $def['link_update_construct_exam_title']) {
                            $alert = $lang['update_success'];
                        } else {
                            $alert = $lang['add_success'];
                        }
                ?>
                    $(document).on('click', '#add_construct', function(){
                        var i = 1;
                        var kn = [];
                        $('select[name="knowledge[]"]').each(function(){
                            i = parseInt(i) + 1;
                            kn.push($(this).val());
                        });
                        $('#add_construct').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>');            
                        $('#add_construct').attr("disabled",true);   
                       $.get("<?php echo $def['link_process_change_knowledge'] ?>", {knowledge: kn}, function(data) {
                            $('#add_construct').html('<?php echo $lang['text_add_construct_exam']; ?>');            
                            $('#add_construct').removeAttr("disabled");
                            var html_construct = '<div class="col-md-6"><div class="form-group"><label><?php echo $lang['knowledge'] ?></label><select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="knowledge[]" id="knowledge'+i+'" style="width: 100%;">';
                                html_construct += data;
                                html_construct += '</select></div></div><div class="col-md-6"><div class="form-group"><label><?php echo $lang['number_question'] ?></label><input type="number" class="form-control" name="number_question[]" id="number_'+i+'" placeholder="<?php echo $lang['placeholder_number_question'] ?>" value="0" /><small id="numberQuestion_'+i+'" class="form-text text-danger"></small></div></div>';
                           $('#con_ex').append(html_construct);   
                        });
                           
                    });
                    $(document).on('click', '#submit_construct_exam', function(){
                        var total_number = 0;
                        $('input[name="number_question[]"]').each(function(){
                            total_number += parseInt($(this).val());
                        });
                        var number_questions = $('#number_questions').val();
                        var title_id = $('#title_id').val();
                        if (title_id == '') {
                            $('#titleId').html("<?php echo $lang['not_choose_title'] ?>");
                            $('#title_id').addClass('is-invalid');
                            $('#title_id').focus();
                            return false;
                        } else {
                            $('#titleId').html("");
                            $('#title_id').removeClass('is-invalid');
                            $('#title_id').addClass('is-valid');
                        }
                        if (total_number > number_questions) {
                            $('#numberQuestion').html("<?php echo $lang['number_questions_greate_than'] ?>");
                            return false;
                        } else {
                            if (total_number < number_questions) {
                                $('#numberQuestion').html("<?php echo $lang['number_questions_lower_than'] ?>");
                                return false;
                            } else {
                                $('#form_jquery').ajaxForm({
                                    beforeSend: function() {
                                        $('#submit_construct_exam').attr("disabled",true);
                                        $('#submit_construct_exam').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>'); 
                                    },
                                    uploadProgress: function(event, position, total, percentComplete) {
                                                        
                                    },
                                    success: function() {
                                        /*var percentVal = '100%';
                                        bar.width(percentVal);
                                        percent.html(percentVal);*/
                                    },
                                    complete: function(xhr) {
                                        $('#submit_construct_exam').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                                        $('#submit_construct_exam').removeAttr('disabled');
                                        var text = xhr.responseText;
                                        var n = text.split(";");
                                        if(n[0] == '1'){
                                            toastr.success('<?php echo $alert; ?>');
                                            setTimeout(function(){
                                                window.location.replace("<?php echo $def['link_update_construct_exam'].'/' ?>"+n[1]);
                                            }, 1000);
                                        } else {           
                                            toastr.error('<?php echo $lang['error_system'] ?>');
                                            return false;
                                        }
                                    }
                                });
                                
                            }
                        }
                    });
                <?php 
                    }
                    if ($pqh[0] == $def['link_the_quiz'] && $pqh[1] == $def['check_quiz']) { 
                ?>
                $(document).on('click', '#submit_start_quiz', function(){
                    $('#form_jquery').ajaxForm({
                        beforeSend: function() {
                            $('#submit_start_quiz').attr("disabled",true);
                            $('#submit_start_quiz').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing_quiz'] ?>'); 
                        },
                        uploadProgress: function(event, position, total, percentComplete) {
                                            
                        },
                        success: function() {
                            /*var percentVal = '100%';
                            bar.width(percentVal);
                            percent.html(percentVal);*/
                        },
                        complete: function(xhr) {
                            $('#submit_start_quiz').html('<?php echo $lang['save']; ?> <i class="fas fa-save">');
                            $('#submit_start_quiz').removeAttr('disabled');
                            var text = xhr.responseText;
                            var n = text.split(";");
                            if(n[0] == '1'){
                                toastr.success('<?php echo $lang['start_the_quiz']; ?>');
                                setTimeout(function(){
                                    window.location.replace("<?php echo $def['link_the_quiz'].'/'.$def['quiz'].'/'.$pqh[2] ?>");
                                }, 1000);
                            } else {           
                                toastr.error('<?php echo $lang['error_system'] ?>');
                                return false;
                            }
                        }
                    });
                });
                <?php 
                    }
                    if ($pqh[0] == $def['link_the_quiz'] && $pqh[1] == $def['quiz']) { 
                ?>
                $(document).on('click', '.answer', function(){
                    var answer = $(this).data('id');
                    var m = answer.split(";;answer;;");
                    var idq = m[0];
                    var pa = m[1];
                    var eq_id = m[2];
                    var exam_id = $('#exam_id').val();
                    var profile_id = $('#profile_id').val();
                    $.post("<?php echo $def['link_update_answer_question'] ?>", {
                       idq: idq,
                       pa: pa,
                       eq_id: eq_id,
                       exam_id: exam_id,
                       profile_id: profile_id 
                    }, function(data){
                        console.log(data);
                    });
                });
                $(document).on('click', '#submit_quiz', function(e){
                    e.preventDefault();
                    var exam_id = $('#exam_id').val();
                    var profile_id = $('#profile_id').val();
                    $('.answer').attr('disabled', true);
                    $(this).attr('disabled', true);
                    $.post("<?php echo $def['link_process_end_quiz'] ?>", {
                        exam_id: exam_id,
                        profile_id: profile_id
                    }, function(data){
                        $('#has_end_quiz').html("<?php echo $lang['you_end_quiz'] ?>");
                        $('html, body').animate({scrollTop: $("html").offset().top}, 2000);
                        return false;
                    });
                });
                <?php
                    }
                ?>                    
            });
        </script>
        <?php } ?>
    </body>
</html>