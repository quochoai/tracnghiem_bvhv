<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php
                        $pid = $h->getProfileById($pqh[1]); 
                        echo $lang['list_exam_of'].$pid['fullname'].' - '.$pid['profile_code']; 
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right" href="<?php echo $def['link_profile'] ?>" title="<?php echo $lang['back'] ?>"><i class="fas fa-undo-alt"></i></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="exam_profiles" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="33%" align="center"><?php echo $lang['exam_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['block_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['exam_date'] ?></th>
                <th width="10%" align="center"><?php echo $lang['point_exam'] ?></th>
                <th width="10%" align="center"><?php echo $lang['summary'] ?></th>
                <th width="10%" align="center"><?php echo $lang['status'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $profiles = $h->getExamProfiles($pqh[1]);
                $msg_profile = '';
                if (count($profiles) > 0) {
                    foreach ($profiles as $kp => $profile_list) {
                        $no = $kp + 1;
                        $exam = $h->getExamById($profile_list['exam_id']);
                        $block = $h->getBlockById($profile_list['block_id']);
                        $department = $h->getDepartmentById($profile_list['department_id']);
                        $title = $h->getTitleById($profile_list['title_id']);
                        $start_date = $profile_list['start_date'];
                        $end_date = $profile_list['end_date'];
                        if ($start_date == $end_date) {
                            $exam_date = date("d/m/Y", $start_date);
                        } else {
                            $exam_date = date("d/m/Y", $start_date).' - '.date("d/m/Y", $end_date);
                        }
                        $number_questions = $profile_list['number_questions'];
                        $number_answer_right = $profile_list['number_answer_right'];
                        $point = $profile_list['point'];
                        if ($number_questions == 0 && $number_answer_right == 0 && $point == 0) {
                            $point_exam = '';
                            $summary = '';
                            $status = '';
                            $link = '<a href="#" title="'.$lang['exam_not_show'].'">'.$exam['name'].'</a>';
                        } else {
                            if ($profile_list['result'] == 1) {
                                $point_exam = $point;
                                $summary = $number_answer_right.'/'.$number_questions;
                                if ($point >= $def['point']) 
                                    $status = $lang['passed'];
                                else
                                    $status = $lang['failed'];
                            } else {
                                $point_exam = $lang['not_published'];
                                $summary = $lang['not_published'];
                                $status = $lang['not_published'];
                            }
                            $link = '<a href="'.$def['link_content_profile_exam'].'/'.$pqh[1].'/'.$profile_list['exam_id'].'" title="'.$lang['click_to_view_content_exam'].'">'.$exam['name'].'</a>';
                        }

                        $msg_profile .= '<tr>';
                        $msg_profile .= ' <td align="center">'.$no.'</td>';
                        $msg_profile .= ' <td>'.$link.'</td>';
                        $msg_profile .= ' <td>'.$block['name'].'</td>';
                        $msg_profile .= ' <td>'.$exam_date.'</td>';
                        $msg_profile .= ' <td>'.$point_exam.'</td>';
                        
                        $msg_profile .= ' <td>'.$summary.'</td>';
                        $msg_profile .= ' <td>'.$status.'</td>';
                        $msg_profile .= '</tr>';
                    }
                }
                echo $msg_profile;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="33%" align="center"><?php echo $lang['exam_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['block_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['exam_date'] ?></th>
                <th width="10%" align="center"><?php echo $lang['point_exam'] ?></th>
                <th width="10%" align="center"><?php echo $lang['summary'] ?></th>
                <th width="10%" align="center"><?php echo $lang['status'] ?></th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
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