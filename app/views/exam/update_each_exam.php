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
                        $exam_block = $h->getExamBlockById($pqh[1]);
                        $exam = $h->getExamById($exam_block['exam_id']);
                        $dp = explode(";", $exam_block['department_id']);
                        $tt = explode(";", $exam_block['title_id']);
                        $examdate = strtotime($exam_block['start_date']);
                        echo $lang['text_update_each_exam']
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_each_exam'].$pqh[1] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_each_exam'] ?>" method="post" id="form_jquery" role="form">
            <input type="hidden" name="id" value="<?php echo $pqh[1] ?>" />
            <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $exam_block['exam_id'] ?>" />
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
                                        if ($block['id'] == $exam_block['block_id']) $selected = ' selected';
                                        else $selected = '';
                                        echo '<option value="'.$block['id'].'"'.$selected.'>'.$block['name'].'</option>';
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
                                            if (in_array($department['id'].'-'.$department['name'], $dp)) $selected = ' selected';
                                            else $selected = '';
                                            echo '<option value="'.$department['id'].'-'.$department['name'].'"'.$selected.'>'.$department['name'].'</option>';
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
                                            if (in_array($title['id'].'-'.$title['name'], $tt)) $selected = ' selected';
                                            else $selected = '';
                                            echo '<option value="'.$title['id'].'-'.$title['name'].'"'.$selected.'>'.$title['name'].'</option>';
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
                            <input type="text" class="form-control" name="time_exam" id="time_exam" placeholder="<?php echo $lang['placeholder_time_exam'] ?>" value="<?php echo $exam_block['time_exam'] ?>" />
                            <small id="timeExam" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['exam_date'] ?></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" name="start_date" id="start_date" value="<?php echo date("d/m/Y", $examdate) ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                <small id="startDate" class="form-text text-danger"></small>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_each_exam" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
                  <a href="<?php echo $def['link_each_exam'].$exam_block['exam_id'] ?>" class="btn btn-default ml-2"><?php echo $lang['cancel'] ?> <i class="fas fa-undo"></i></a>
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