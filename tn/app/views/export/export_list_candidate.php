<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
                <?php 
                    echo $lang['manage_export_candidate']
                ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_export_candidate'] ?>" method="post" id="form_jquery" role="form" enctype="multipart/form-data">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['block_name'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="block_id" id="block_id" style="width: 100%;">
                            <option value=""><?php echo $lang['choose_block'] ?></option>
                            <?php
                                $blocks = $h->getBlocks();
                                if (count($blocks) > 0) {
                                    foreach ($blocks as $block) {
                                        echo '<option value="'.$block['id'].'">'.$block['name'].'</option>';
                                    }
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['department_exam'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="department_id" id="department_id" style="width: 100%;">
                                <option value=""><?php echo $lang['choose_department'] ?></option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_import" name="btnGui" class="btn btn-success"><?php echo $lang['export']; ?> <i class="fas fa-save"></i></button>
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