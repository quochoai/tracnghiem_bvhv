<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
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
        <!-- /.card -->
        <!-- /.login-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->