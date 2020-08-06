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
                        $constructs = $h->getConstructExam($pqh[1]);
                        $titles = $h->getTitles();
                        $knowledges = $h->getKnowledge();
                        echo $lang['text_update_construct_exam']."<br />".$exam['name'];
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_construct_exam'].'/'.$pqh[1] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_construct_exam'] ?>" method="post" id="form_jquery" role="form">
              <input type="hidden" name="exam_id" value="<?php echo $pqh[1] ?>" />  
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['exam_name'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success"  disabled="disabled" style="width: 100%;">
                            <option value="<?php echo $pqh[1] ?>"><?php echo $exam['name'] ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['number_questions'] ?></label>
                            <input type="hidden" id="number_questions" value="<?php echo $exam['number_questions'] ?>" />
                            <input type="text" class="form-control" value="<?php echo $exam['number_questions'] ?>" disabled="" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="text-success"><?php echo $lang['manage_construct_exam'] ?></label>
                    </div>
                    <div class="col-md-12">
                        <div class="construct_exam">
                        <?php
                            if (count($constructs) > 0) {
                                foreach ($constructs as $ce => $construct) {
                                    $tt = explode(";", $construct['title_id']);
                                    $cons = explode(";cee;", $construct['construct']);
                        ?>
                                    <div class="col-md-12 position-relative">
                                        <div class="position-absolute update_title_exam"><a href="<?php echo $def['link_update_construct_exam_title'].'/'.$construct['id'] ?>" title="<?php echo $lang['update_construct_exam']?>" style="margin-right: 15px;"><i class="fas fa-edit"></i></a><a class="click_to_view_number" data-id="<?php echo $construct['id'] ?>" title="<?php echo $lang['click_to_view_construct_exam'] ?>" style="cursor: pointer;"><i class="fas fa-angle-right" style="font-size: 20px;"></i></a></div>
                                        <div class="form-group">
                                            <label><?php echo $lang['title_exam'] ?></label>
                                            <div class="select2-green">
                                                <select class="select2" disabled="" multiple="multiple" name="title_id<?php echo $construct['id'] ?>[]" data-dropdown-css-class="select2-green" style="width: 100%;">
                                                <?php
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
                                        </div>
                                    </div>
                        <?php
                                    if (count($cons) > 0) {
                                        echo '<div class="row" id="content_construct_exam-'.$construct['id'].'" style="display: none;">';
                                        foreach ($cons as $kcon => $con) {
                                            $kcon = $kcon + 1;
                                            $con_exam = explode(";kn;", $con);
                        ?>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo $lang['knowledge'] ?></label>
                                                    <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="knowledge<?php echo $construct['id'] ?>[]" id="knowledge<?php echo $construct['id'] ?>" style="width: 100%;">
                                                    <?php
                                                        if (count($knowledges) > 0) {
                                                            foreach ($knowledges as $knowledge) {
                                                                if ($con_exam[0] == $knowledge['name']) 
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
                                                    <input type="text" class="form-control" name="number_question<?php echo $construct['id'] ?>[]" id="number<?php echo $construct['id'] ?>" placeholder="<?php echo $lang['placeholder_number_question'] ?>" value="<?php echo $con_exam[1] ?>" />
                                                    <small id="numberQuestion<?php echo $construct['id'] ?>" class="form-text text-danger"></small>
                                                </div>
                                            </div>
                        <?php
                                        }
                                        echo '</div>';
                                    }
                                }
                            }
                        ?>
                        </div>
                        <a class="btn btn-success" href="<?php echo $def['link_add_construct_exam'].'/'.$pqh[1].'/' ?>"><?php echo $lang['text_add_construct_knowledge_exam'] ?></a>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
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
<style type="text/css">
    .update_title_exam{top: 5px; right: 0; z-index: 999;}
</style>