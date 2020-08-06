<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
              <div class="row">
                <h3 class="card-title col-md-10">
                    <?php echo $lang['text_add_exam'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_exam'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_add_exam'] ?>" method="post" id="form_jquery" role="form">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['exam_code'] ?></label>
                            <input type="text" class="form-control" name="exam_code" id="exam_code" placeholder="<?php echo $lang['placeholder_exam_code'] ?>" />
                            <small id="examCode" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['exam_name'] ?></label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo $lang['placeholder_exam_name'] ?>" />
                            <small id="examName" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['exam_start_date'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="start_date" id="start_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                <small id="startDate" class="form-text text-danger"></small>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['exam_end_date'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="end_date" id="end_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                <small id="endDate" class="form-text text-danger"></small>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="exam_time"><?php echo $lang['exam_time'] ?></label>
                            <input type="text" class="form-control" name="exam_time" id="exam_time" placeholder="<?php echo $lang['placeholder_exam_time'] ?>" />
                            <small id="examTime" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="number_questions"><?php echo $lang['number_questions'] ?></label>
                            <input type="text" class="form-control" name="number_questions" id="number_questions" placeholder="<?php echo $lang['placeholder_number_questions'] ?>" />
                            <small id="numberQuestions" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="point"><?php echo $lang['passed_point'] ?></label>
                            <input type="number" class="form-control" name="point" value="0" id="point" placeholder="<?php echo $lang['placeholder_passed_point'] ?>" />
                            <small id="passedPoint" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_exam" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
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