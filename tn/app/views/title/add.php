<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
              <div class="row">
                <h3 class="card-title col-md-10">
                    <?php echo $lang['text_add_title'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_title'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_add_title'] ?>" method="post" id="form_jquery" role="form">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['title_name'] ?></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $lang['placeholder_title_name'] ?>" />
                        <small id="nameHelpBlock" class="form-text text-danger"></small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['title_name_short'] ?></label>
                        <input type="text" class="form-control" name="name_short" id="name_short" placeholder="<?php echo $lang['placeholder_title_name_short'] ?>" />
                        <small id="nameHelpBlock" class="form-text text-danger"></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
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