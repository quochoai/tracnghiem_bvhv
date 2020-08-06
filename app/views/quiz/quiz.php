<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <?php
            $examBDT = $h->getExamsBlockBDT($pqh[2], $profile['block_id'], $profile['department_id'], $profile['title_id']);
            $exam_info = $h->getExamById($pqh[2]);
            $exam_profile = $h->getExamProfileExamIdProfileId($pqh[2], $profile['id']);
            $today = date("Y/m/d");
            $hours = date("H:i");
            $time_exam = $examBDT[0]['time_exam'];
            $exam_time = $exam_info['exam_time'];
            $time_end = date("H:i", strtotime("+$exam_time minutes", strtotime($time_exam)));
            if ($exam_profile['end_quiz'] == 0) {
                if ($examBDT[0]['start_date'] == $today) {
                    if ($time_exam >= $hours) {
                        if ($hours < $time_end) {
          ?>  
          <div class="card-header">
                <h3 class="card-title text-uppercase font-weight-bold">
                    <?php echo $lang['exam_quiz'] ?>
                </h3>
          </div>  
          <!-- /.card-header -->
          
          <form method="post" id="form_jquery" role="form">
              <input type="hidden" id="exam_id" value="<?php echo $pqh[2] ?>" />
              <input type="hidden" id="profile_id" value="<?php echo $profile['id'] ?>" />  
              <div class="card-body">
                <div class="row">
                    <h3 class="col-md-12 text-center text-success" id="has_end_quiz"></h3>
                <?php
                    $eqs = $h->getQuestionsProfileExam($pqh[2], $profile['id']);
                    if (count($eqs) > 0) {
                        foreach ($eqs as $k => $eq) {
                            $no = $k+1;
                            $idq = $eq['question_id'];
                            $eq_id = $eq['id'];
                            $q = $h->getQuestionById($idq);
                            $aa = explode(";;;s_answer;;;", $q['answer']);
                            if ($q['type_question'] == $def['type_question_image']) {
                                if ($q['image'] != '')
                                    $img = '<img src="app/views/question/img/'.$qa['image'].'" style="max-width: 50%; margin-top: 10px; margin-bottom: 10px;" />';
                                else
                                    $img = '';
                            } else 
                                $img = '';                            
                ?>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="col-form-label font-weight-bold"><?php echo $no.'. '.$q['question'] ?></label>
                            <?php echo $img; ?>
                        </div>
                        <div class="form-group clearfix">
                        <?php  
                            $msa = '';
                            if (count($aa) > 0) {
                                $namea = 'answer.'.$idq;
                                foreach ($aa as $ka => $va) {
                                    $idd = "suggess_answer.".$idq.".".$ka;
                                    if ($eq['profile_answer'] == trim($va)) $checked = ' checked';
                                    else $checked = '';
                                    $msa .= '<div class="icheck-success d-block">';
                                    $msa .= '   <input type="radio" name="'.$namea.'" class="answer" data-id="'.$idq.';;answer;;'.$va.';;answer;;'.$eq_id.'" id="'.$idd.'"'.$checked.' />';
                                    $msa .= '   <label for="'.$idd.'">'.$va.'</label>';
                                    $msa .= '</div>';
                                }
                            }
                            echo $msa;
                        ?>
                        </div>
                        
                    </div>
                <?php 
                        }
                    }   
                ?>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <button type="submit" id="submit_quiz" class="btn btn-success"><?php echo $lang['end_quiz']; ?> <i class="fas fa-save"></i></button>
              </div>
          </form>
          <?php
                    } else {
                        if ($time_exam < $hours && $hours < $time_end) 
                            echo '<button class="btn btn-danger">'.$lang['not_on_hour'].' <i class="fas fa-time"></i></button>';
                        if ($hours >= $time_end)
                            echo '<button class="btn btn-danger">'.$lang['end_on_hour'].' <i class="fas fa-time"></i></button>';
                    }
                } else {
                    echo '<button class="btn btn-danger">'.$lang['not_on_hour'].' <i class="fas fa-time"></i></button>';
                }
             } elseif ($examBDT[0]['start_date'] < $today) {
                    echo '<button class="btn btn-danger">'.$lang['exam_for_you_end'].' <i class="fas fa-time"></i></button>';
             } else {
                    echo '<button class="btn btn-danger">'.$lang['exam_for_you_not_start'].' <i class="fas fa-time"></i></button>';
             } 
         } else {
            echo '<button class="btn btn-success">'.$lang['you_end_quiz'].' <i class="fas fa-time"></i></button>';
         }
          ?>
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