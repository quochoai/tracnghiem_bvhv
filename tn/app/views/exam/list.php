<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['manage_exams'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_exam'] ?>/"><?php echo $lang['addNew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="exams" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="28%" align="center"><?php echo $lang['exam_name'] ?></th>
                <th width="16%" align="center"><?php echo $lang['exam_time'] ?></th>
                <th width="18%" align="center"><?php echo $lang['exam_date'] ?></th>
                <th width="10%" align="center"><?php echo $lang['exam_created_by'] ?></th>
                <th width="9%" align="center"><?php echo $lang['result'] ?></th>
                <th width="12%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $exams = $h->getExams();
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
                        $msg_exam .= ' <td><a href="'.$def['link_each_exam'].$exam['id'].'">'.$exam['name'].'</a></td>';
                        $msg_exam .= ' <td align="center">'.$exam['exam_time'].'</td>';
                        $msg_exam .= ' <td>'.date("d/m/Y", $exam['start_date']).' - '.date("d/m/Y", $exam['end_date']).'</td>';
                        $msg_exam .= ' <td align="center">'.$pl['profile_code'].'</td>';
                        $msg_exam .= ' <td align="center">'.$result.'</td>';
                        $msg_exam .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_exam'].'/'.$exam['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$exam['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_exam .= '</tr>';
                    }
                }
                echo $msg_exam;
              ?>
              </tbody>
              <tfoot>
                <tr>
                    <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                    <th width="28%" align="center"><?php echo $lang['exam_name'] ?></th>
                    <th width="16%" align="center"><?php echo $lang['exam_time'] ?></th>
                    <th width="18%" align="center"><?php echo $lang['exam_date'] ?></th>
                    <th width="10%" align="center"><?php echo $lang['exam_created_by'] ?></th>
                    <th width="9%" align="center"><?php echo $lang['result'] ?></th>
                    <th width="12%" align="center"><?php echo $lang['actions'] ?></th>
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