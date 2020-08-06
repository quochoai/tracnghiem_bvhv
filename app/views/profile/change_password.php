<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
              <div class="row">
                <h3 class="card-title col-md-10">
                    <?php echo $lang['change_password'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_profile'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_change_password'] ?>" method="post" id="form_jquery" role="form">
            <input type="hidden" name="id" value="<?php echo $pqh[1] ?>" />
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_new_password'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" />
                            </div>
                            <!-- /.input group -->
                            <small id="nameHelpPass" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['profile_confirm_new_password'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password_confirm" id="password_confirm" class="form-control" />
                            </div>
                            <!-- /.input group -->
                            <small id="nameHelpPassConfirm" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="changepass" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
                  <button type="reset" class="btn btn-default ml-2"><?php echo $lang['reset'] ?> <i class="fas fa-undo"></i></button>
              </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->