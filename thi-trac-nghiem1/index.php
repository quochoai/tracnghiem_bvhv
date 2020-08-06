<?php
    include("../require_inc.php");
    if(!isset($_SESSION['is_logined_exam'])) {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $lang['the_quiz']; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $def['theme']; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"><?php echo $lang['the_quiz']; ?></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $lang['input_profile_code_to_exam']; ?></p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="<?php echo $def['id_profile_code'] ?>" placeholder="<?php echo $lang['profile_code'] ?>, ví dụ: 123.bvhv" autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="button" id="<?php echo $def['id_button_login'] ?>" class="btn btn-primary btn-block"><?php echo $lang['check_info']; ?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
<!-- jQuery -->
<script src="<?php echo $def['theme']; ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $def['theme']; ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Toastr -->
<script src="<?php echo $def['theme']; ?>plugins/toastr/toastr.min.js"></script>
<!-- login -->
<script type="text/javascript">
    $(document).ready(function(){
        function login(){
           var <?php echo $def['id_profile_code'] ?> = $('#<?php echo $def['id_profile_code'] ?>').val();
           if(<?php echo $def['id_profile_code'] ?> == <?php echo $def['empty_input'] ?>) {
                toastr.error('<?php echo $lang['not_input_profile_code'] ?>');
                $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_invalid'] ?>');
                $('#<?php echo $def['id_profile_code'] ?>').focus();
                return false;
           } else {
                $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_valid'] ?>');
                $('#<?php echo $def['id_profile_code'] ?>').removeClass('<?php echo $def['class_is_invalid'] ?>');
           }
           $('button#<?php echo $def['id_button_login'] ?>').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>');
           $.post("<?php echo $def['link_process_check_info']; ?>", {
                profile_code: <?php echo $def['id_profile_code'] ?>
           }, function(response){
                $('button#<?php echo $def['id_button_login'] ?>').html('<?php echo $lang['check_info']; ?>');
                if(response == '2'){
                    toastr.error('<?php echo $lang['invalid_profile_code'] ?>');
                    $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_invalid'] ?>');
                    $('#<?php echo $def['id_profile_code'] ?>').focus();
                    return false;
                } else {
                    $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_valid'] ?>');
                    $('#<?php echo $def['id_profile_code'] ?>').removeClass('<?php echo $def['class_is_invalid'] ?>');
                    if(response == '1') {
                        toastr.success('<?php echo $lang['check_info_successful'] ?>');
                        setTimeout(function(){
                            window.location.replace("<?php echo $def['link_the_quiz'] ?>");
                        }, 1000);
                    } else {
                        toastr.success('<?php echo $lang['system_error'] ?>');
                    }
                }
           })
        }
        $('#<?php echo $def['id_button_login'] ?>').click(function(){
           login();
        });
        $('input#<?php echo $def['id_profile_code'] ?>').keydown(function(e) {
        	if (e.keyCode == 13) {
        		login();
        	}
        });
    });
</script>
</body>
</html>
<?php } else { 
    echo '<a class="nav-link" href="'.$def['link_logout_quiz'].'" title="'.$lang['logout'].'">'.$lang['logout'].'</a><br />';
    echo $_REQUEST['pqh'];
    print_r($_SESSION['is_logined_exam']);
?>
    
<?php } ?>