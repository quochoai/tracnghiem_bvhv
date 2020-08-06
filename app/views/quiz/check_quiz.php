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
                        $examBDT = $h->getExamsBlockBDT($pqh[2], $profile['block_id'], $profile['department_id'], $profile['title_id']);
                        $exam_info = $h->getExamById($pqh[2]);
                        echo $lang['check_and_start_quiz'];
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_profile'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
              </div>
          </div>
          <!-- /.card-header -->
          <form action="<?php echo $def['link_process_create_quiz'] ?>" method="post" id="form_jquery" role="form" enctype="multipart/form-data">
              <!-- /.card-body -->
              <div class="card-footer">
                  <?php 
                    $today = date("Y/m/d");
                    $hours = date("H:i");
                    $time_exam = $examBDT[0]['time_exam'];
                    $exam_time = $exam_info['exam_time'];
                    $time_end = date("H:i", strtotime("+$exam_time minutes", strtotime($time_exam)));
                    //echo $hours.' / '.$time_exam.' / '.$time_end;
                    if ($examBDT[0]['start_date'] == $today) {
                        if ($time_exam >= $hours) {
                            if ($hours < $time_end) {
                  ?>  
                  <input type="hidden" id="exam_id" name="exam_id" value="<?php echo $pqh[2] ?>" />
                  <input type="hidden" id="profile_id" name="profile_id" value="<?php echo $profile['id'] ?>" />
                  <button type="submit" id="submit_start_quiz" name="btnGui" class="btn btn-success"><?php echo $lang['start_the_quiz']; ?> <i class="fas fa-save"></i></button>
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
                     } elseif ($examBDT[0]['start_date'] > $today) {
                            echo '<button class="btn btn-danger">'.$lang['exam_for_you_end'].' <i class="fas fa-time"></i></button>';
                     } else {
                            echo '<button class="btn btn-danger">'.$lang['exam_for_you_not_start'].' <i class="fas fa-time"></i></button>';
                     } 
                  ?>
                  <a class="btn btn-default ml-2" href="<?php echo $def['link_the_quiz'] ?>" title="<?php echo $lang['back'] ?>"><?php echo $lang['back'] ?> <i class="fas fa-undo"></i></a>
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