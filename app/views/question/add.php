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
                        echo $lang['text_add_question'];
                        $array_knowledge = $h->getKnowledge();
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_question'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_add_question'] ?>" method="post" id="form_jquery" role="form">
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['type_question'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="type_question" id="type_question" style="width: 100%;">
                            <?php
                                $array_type_question = array($def['type_question_text'] => $lang['question_text'], $def['type_question_image'] => $lang['question_image']);
                                foreach ($array_type_question as $kq => $tq) {
                                    echo '<option value="'.$kq.'">'.$tq.'</option>';
                                }
                            ?>
                            </select>
                            <span id="image_question">
                                
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['knowledge'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="knowledge" id="knowledge" style="width: 100%;">
                            <?php
                                foreach ($array_knowledge as $kn) {
                                    echo '<option value="'.$kn['name'].'">'.$kn['name'].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['questions'] ?></label>
                            <textarea class="form-control" rows="3" name="question" id="question" placeholder="<?php echo $lang['placeholder_question'] ?>"></textarea>
                            <small id="questionHelp" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['suggest_answer'] ?></label>
                            <input type="text" class="form-control" name="answer[]" id="answer1" />
                            <span id="add_answer"></span><br />
                            <small class="form-text text-danger"><?php echo $lang['note_suggest_answer'] ?></small><br />
                            <small id="answerHelp" class="form-text text-danger"></small>
                            <a class="btn btn-success add_suggest_answer"><?php echo $lang['add_suggest_answer'] ?></a> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['right_answer'] ?></label>
                            <input type="text" class="form-control" name="right_answer" id="right_answer" placeholder="<?php echo $lang['placeholder_right_answer'] ?>" />
                            <small id="rightAnswer" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_question" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
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