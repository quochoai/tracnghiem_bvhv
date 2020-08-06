<!-- Main content -->
<?php
    $knowledge = $h->getKnowledgeById($pqh[1]);
?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
              <h3 class="card-title col-md-10">
                  <?php echo $lang['text_update_knowledge'] ?>
              </h3>
              <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_knowledge'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_knowledge'] ?>" method="post" id="form_jquery" role="form">
              <input type="hidden" name="id" value="<?php echo $pqh[1]; ?>" />
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="col-form-label" for="name"><?php echo $lang['knowledge'] ?></label>
                        <input type="hidden" name="old_name" value="<?php echo $knowledge['name'] ?>" />
                        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $lang['placeholder_knowledge'] ?>" value="<?php echo $knowledge['name'] ?>" />
                        <small id="nameHelpBlock" class="form-text text-danger"></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="update" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
                  <button type="button" id="cancel" class="btn btn-default ml-2"><?php echo $lang['cancel'] ?> <i class="fas fa-undo"></i></button>
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