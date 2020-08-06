<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
              <div class="row">
                <h3 class="card-title col-md-10">
                    <?php 
                        $exam = $h->getExamById($pqh[1]);
                        echo $lang['text_add_each_exam'].' '.$exam['name'] 
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_each_exam'].$pqh[1] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_add_each_exam'] ?>" method="post" id="form_jquery" role="form">
            <input type="hidden" name="exam_id" value="<?php echo $pqh[1] ?>" />
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['block_exam'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="block_id" id="block_id" style="width: 100%;">
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
                            <div class="select2-green">
                                <select class="select2" multiple="multiple" name="department_id[]" id="department_id" data-placeholder="<?php echo $lang['select_department'] ?>" data-dropdown-css-class="select2-green" style="width: 100%;">
                                <?php
                                    $departments = $h->getDistinctDepartments();
                                    if (count($departments) > 0) {
                                        foreach ($departments as $department) {
                                            echo '<option value="'.$department['id'].'-'.$department['name'].'">'.$department['name'].'</option>';
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <small id="departmentId" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['title_exam'] ?></label>
                            <div class="select2-green">
                                <select class="select2" multiple="multiple" name="title_id[]" id="title_id" data-placeholder="<?php echo $lang['select_title'] ?>" data-dropdown-css-class="select2-green" style="width: 100%;">
                                <?php
                                    $titles = $h->getTitles();
                                    if (count($titles) > 0) {
                                        foreach ($titles as $title) {
                                            echo '<option value="'.$title['id'].'-'.$title['name'].'">'.$title['name'].'</option>';
                                        }
                                    }
                                ?>
                                </select>
                            </div>
                            <small id="titleId" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="time_exam"><?php echo $lang['time_exam'] ?></label>
                            <input type="text" class="form-control" name="time_exam" id="time_exam" placeholder="<?php echo $lang['placeholder_time_exam'] ?>" />
                            <small id="timeExam" class="form-text text-danger"></small>
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
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_each_exam" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
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