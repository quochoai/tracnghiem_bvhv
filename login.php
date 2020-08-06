<?php
    include("require_inc.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $lang['admin_login']; ?></title>
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
  <div class="login-logo"><?php echo $lang['admin_login']; ?></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><?php echo $lang['signin_to_start_session']; ?></p>
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="<?php echo $def['id_profile_code'] ?>" placeholder="<?php echo $lang['profile_code'] ?>" autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="<?php echo $def['id_password'] ?>" placeholder="<?php echo $lang['password']; ?>" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <!--<div class="icheck-primary">
              <input type="checkbox" id="<?php echo $def['id_remember'] ?>" />
              <label for="<?php echo $def['id_remember'] ?>"><?php echo $lang['remember'] ?></label>
            </div>-->
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="button" id="<?php echo $def['id_button_login'] ?>" class="btn btn-primary btn-block"><?php echo $lang['sign_in']; ?></button>
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
           var <?php echo $def['id_password'] ?> = $('#<?php echo $def['id_password'] ?>').val(); 
           if(<?php echo $def['id_profile_code'] ?> == <?php echo $def['empty_input'] ?>) {
                toastr.error('<?php echo $lang['not_input_profile_code'] ?>');
                $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_invalid'] ?>');
                $('#<?php echo $def['id_profile_code'] ?>').focus();
                return false;
           } else {
                $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_valid'] ?>');
                $('#<?php echo $def['id_profile_code'] ?>').removeClass('<?php echo $def['class_is_invalid'] ?>');
           }
           if(<?php echo $def['id_password'] ?> == <?php echo $def['empty_input'] ?>) {
                toastr.error('<?php echo $lang['not_input_password'] ?>');
                $('#<?php echo $def['id_password'] ?>').addClass('<?php echo $def['class_is_invalid'] ?>');
                $('#<?php echo $def['id_password'] ?>').focus();
                return false;
           } else {
                $('#<?php echo $def['id_password'] ?>').addClass('<?php echo $def['class_is_valid'] ?>');
                $('#<?php echo $def['id_password'] ?>').removeClass('<?php echo $def['class_is_invalid'] ?>');
           }
           $('button#<?php echo $def['id_button_login'] ?>').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <?php echo $lang['processing'] ?>');
           $.post("<?php echo $def['link_process_login']; ?>", {
                profile_code: <?php echo $def['id_profile_code'] ?>,
                password: <?php echo $def['id_password'] ?>,
           }, function(response){
                $('button#<?php echo $def['id_button_login'] ?>').html('<?php echo $lang['sign_in']; ?>');
                if(response == '2'){
                    toastr.error('<?php echo $lang['invalid_profile_code'] ?>');
                    $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_invalid'] ?>');
                    $('#<?php echo $def['id_profile_code'] ?>').focus();
                    return false;
                } else {
                    $('#<?php echo $def['id_profile_code'] ?>').addClass('<?php echo $def['class_is_valid'] ?>');
                    $('#<?php echo $def['id_profile_code'] ?>').removeClass('<?php echo $def['class_is_invalid'] ?>');
                    if(response == '3') {
                        toastr.error('<?php echo $lang['password_wrong'] ?>');
                        $('#<?php echo $def['id_password'] ?>').addClass('<?php echo $def['class_is_invalid'] ?>');
                        $('#<?php echo $def['id_password'] ?>').focus();
                        return false;
                    } else {
                        if(response == '1') {
                            $('#<?php echo $def['id_password'] ?>').addClass('<?php echo $def['class_is_valid'] ?>');
                            $('#<?php echo $def['id_password'] ?>').removeClass('<?php echo $def['class_is_invalid'] ?>');
                            toastr.success('<?php echo $lang['login_successful'] ?>');
                            location.assign("<?php echo URL; ?>");
                        } else {
                            toastr.success('<?php echo $lang['system_error'] ?>');
                        }
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
        $('input#<?php echo $def['id_password'] ?>').keydown(function(e) {
        	if (e.keyCode == 13) {
        		login();
        	}
        });
    });
</script>
</body>
</html>