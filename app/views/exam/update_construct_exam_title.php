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
                        $id = $pqh[1];
                        $con_ex = $h->getConstructExamById($id);
                        $exam = $h->getExamById($con_ex['exam_id']);
                        $tt = explode(";", $con_ex['title_id']);
                        $exams = $h->getConstructExamNotId($con_ex['exam_id'], $id);
                        $ttnot = '';
                        if (count($exams) > 0) {
                            foreach ($exams as $ex) {
                                $ttnot .= $ex['title_id'].';';
                                
                            }
                        }
                        if ($ttnot != '') { 
                            $ttnot = substr($ttnot, 0, -1);
                            $title_not = explode(";", $ttnot);
                            foreach ($title_not as $ttn) {
                                $ti = explode("-", $ttn);
                                $title_id .= $ti[0].',';
                            }
                            $title_id = substr($title_id, 0, -1);
                        } else $title_id = "''";
                        $titles = $h->getTitlesNotIn($title_id);
                        $knowledges = $h->getKnowledge();
                        echo $lang['text_update_construct_exam_title']."<br />".$lang['exam'].": ".$exam['name'];
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_update_construct_exam'].'/'.$con_ex['exam_id'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_construct_exam'] ?>" method="post" id="form_jquery" role="form">
              <input type="hidden" name="id" value="<?php echo $id ?>" />  
              <input type="hidden" name="exam_id" value="<?php echo $con_ex['exam_id'] ?>" />
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['exam_name'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success"  disabled="disabled" style="width: 100%;">
                            <option value=""><?php echo $exam['name'] ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['number_questions'] ?></label>
                            <input type="hidden" id="number_questions" id="number_questions" value="<?php echo $exam['number_questions'] ?>" />
                            <input type="text" class="form-control" value="<?php echo $exam['number_questions'] ?>" disabled="" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="text-success"><?php echo $lang['manage_construct_exam'] ?></label>
                    </div>
                    <div class="col-md-12">
                        <div class="construct_exam">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><?php echo $lang['title_exam'] ?></label>
                                    <div class="select2-green">
                                        <select class="select2" multiple="multiple" name="title_id[]" id="title_id" data-dropdown-css-class="select2-green" style="width: 100%;" data-placeholder="<?php echo $lang['select_title'] ?>">
                                        <?php
                                            if (count($titles) > 0) {
                                                foreach ($titles as $title) {
                                                    $ttss = $title['id'].'-'.$title['name'];
                                                    if (in_array($ttss, $tt)) 
                                                        $selected = ' selected';
                                                    else
                                                        $selected = '';
                                                    echo '<option value="'.$title['id'].'-'.$title['name'].'"'.$selected.'>'.$title['name'].'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                        <small id="titleId" class="form-text text-danger"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="con_ex">
                                <?php  
                                    $constructs = explode(";cee;", $con_ex['construct']);
                                    if (count($constructs) > 0) {
                                        foreach ($constructs as $construct) {
                                        $con = explode(";kn;", $construct);
                                        $kn = $con[0];
                                        $num = $con[1];
                                ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $lang['knowledge'] ?></label>
                                        <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="knowledge[]" id="knowledge1" style="width: 100%;">
                                        <?php
                                            if (count($knowledges) > 0) {
                                                foreach ($knowledges as $knowledge) {
                                                    if ($knowledge['name'] == $kn) 
                                                        $selected = ' selected';
                                                    else
                                                        $selected = '';
                                                    echo '<option value="'.$knowledge['name'].'"'.$selected.'>'.$knowledge['name'].'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo $lang['number_question'] ?></label>
                                        <input type="number" class="form-control" name="number_question[]" id="number_1" placeholder="<?php echo $lang['placeholder_number_question'] ?>" value="<?php echo $num; ?>" />
                                        <small id="numberQuestion_1" class="form-text text-danger"></small>
                                    </div>
                                </div>
                                <?php
                                        } 
                                    } 
                                ?>
                            </div>
                        </div>
                        <span id="numberQuestion" class="form-text text-danger"></span>
                        <a class="btn btn-success" id="add_construct"><?php echo $lang['text_add_construct_exam'] ?></a><br />
                        <span id="rightAnswer" class="form-text text-danger"><?php echo $lang['note_add_construct_exam'] ?></span>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_construct_exam" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
                  <a href="<?php echo $def['link_update_construct_exam'].'/'.$con_ex['exam_id'] ?>" class="btn btn-default ml-2"><?php echo $lang['reset'] ?> <i class="fas fa-undo"></i></a>
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