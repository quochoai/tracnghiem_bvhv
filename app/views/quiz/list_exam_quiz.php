<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <h3 class="card-title">
                <?php echo $lang['my_list_the_quiz'] ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="list_quiz_exams" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="48%" align="center"><?php echo $lang['exam_name'] ?></th>
                <th width="16%" align="center"><?php echo $lang['exam_time'] ?></th>
                <th width="18%" align="center"><?php echo $lang['exam_date'] ?></th>
                <th width="10%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $exams = $h->getQuizNotDone($profile['id']);
                $msg_exam = '';
                if (count($exams) > 0) {
                    foreach ($exams as $kp => $exam) {
                        $no = $kp + 1;
                        $pl = $h->getProfileById($exam['created_by']);
                        if ($exam['result'] == $def['actived'])
                            $result = '<i class="fas fa-check-square btn-success clsactive_result" data-id="'.$exam['id'].'" style="cursor:pointer;" title="'.$lang['click_to_hide_result'].'"></i>';
                        else
                            $result = '<i class="fas fa-square btn-danger clsactive_result" data-id="'.$exam['id'].'" style="cursor:pointer;" title="'.$lang['click_to_show_result'].'"></i>';
                        $msg_exam .= '<tr>';
                        $msg_exam .= ' <td align="center">'.$no.'</td>';
                        $msg_exam .= ' <td>'.$exam['name'].'</td>';
                        $msg_exam .= ' <td align="center">'.$exam['exam_time'].'</td>';
                        $msg_exam .= ' <td>'.date("d/m/Y", $exam['start_date']).' - '.date("d/m/Y", $exam['end_date']).'</td>';
                        $msg_exam .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_the_quiz'].'/'.$def['check_quiz'].'/'.$exam['id'].'">'.$lang['check_info'].'</a> </td>';
                        $msg_exam .= '</tr>';
                    }
                }
                echo $msg_exam;
              ?>
              </tbody>
              <tfoot>
                <tr>
                    <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                    <th width="48%" align="center"><?php echo $lang['exam_name'] ?></th>
                    <th width="16%" align="center"><?php echo $lang['exam_time'] ?></th>
                    <th width="18%" align="center"><?php echo $lang['exam_date'] ?></th>
                    <th width="10%" align="center"><?php echo $lang['actions'] ?></th>
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