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
                        $qa = $h->getQuestionById($pqh[1]);
                        echo $lang['text_update_question']
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_question'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_update_question'] ?>" method="post" id="form_jquery" role="form">
            <input type="hidden" name="id" value="<?php echo $pqh[1] ?>" />
              <div class="card-body container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['type_question'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="type_question" id="type_question" style="width: 100%;">
                            <?php
                                $array_type_question = array($def['type_question_text'] => $lang['question_text'], $def['type_question_image'] => $lang['question_image']);
                                foreach ($array_type_question as $kq => $tq) {
                                    if ($kq == $qa['type_question']) $selected = ' selected';
                                    else $selected = '';
                                    echo '<option value="'.$kq.'"'.$selected.'>'.$tq.'</option>';
                                }
                            ?>
                            </select>
                            <span id="image_question">
                            <?php
                                if ($qa['type_question'] == $def['type_question_image']) {
                                    if ($qa['image'] != '')
                                        echo '<img src="app/views/question/img/'.$qa['image'].'" style="max-width: 100%; margin-top: 10px; margin-bottom: 10px;" />';
                                
                            ?>
                                <div class="form-group">
                                    <label for="exampleInputFile"><?php echo $lang['hinhanh'] ?></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="file" name="file" />
                                            <label class="custom-file-label" for="file"><?php echo $lang['choose_image'] ?></label>
                                        </div>
                                        
                                    </div>
                                </div>
                            <?php 
                                }
                            ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo $lang['knowledge'] ?></label>
                            <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" name="knowledge" id="knowledge" data-placeholder="<?php echo $qa['knowledge'] ?>" style="width: 100%;">
                            <?php
                                $array_knowledge = $h->getKnowledge();
                                foreach ($array_knowledge as $kn) {
                                    if ($kn['name'] == $qa['knowledge']) $selected = ' selected';
                                    else $selected = '';
                                    echo '<option value="'.$kn['name'].'"'.$selected.'>'.$kn['name'].'</option>';
                                }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['questions'] ?></label>
                            <textarea class="form-control" rows="3" name="question" id="question" placeholder="<?php echo $lang['placeholder_question'] ?>"><?php echo $qa['question'] ?></textarea>
                            <small id="questionHelp" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['suggest_answer'] ?></label>
                            <?php 
                                $aa = explode(";;;s_answer;;;", $qa['answer']);
                                $msga = '';
                                foreach ($aa as $ka => $va) {
                                    $ka = $ka + 1;
                                    $msga .= '<input type="text" class="form-control mt-2" name="answer[]" id="answer'.$ka.'" value="'.$va.'" />';
                                }
                                echo $msga;
                            ?>
                            
                            <span id="add_answer"></span><br />
                                
                            <small class="form-text text-danger"><?php echo $lang['note_suggest_answer'] ?></small><br />
                            <small id="answerHelp" class="form-text text-danger"></small>
                            <a class="btn btn-success add_suggest_answer"><?php echo $lang['add_suggest_answer'] ?></a> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label" for="name"><?php echo $lang['right_answer'] ?></label>
                            <input type="text" class="form-control" name="right_answer" id="right_answer" placeholder="<?php echo $lang['placeholder_right_answer'] ?>" value="<?php echo $qa['right_answer'] ?>" />
                            <small id="rightAnswer" class="form-text text-danger"></small>
                        </div>
                    </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_question" class="btn btn-success"><?php echo $lang['save']; ?> <i class="fas fa-save"></i></button>
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