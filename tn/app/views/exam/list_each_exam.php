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
                      $exam = $h->getExamById($pqh[1]);
                      echo $lang['manage_each_exam'].$exam['name']; 
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_each_exam'] ?>/<?php echo $pqh[1] ?>"><?php echo $lang['addNew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="each_exams" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="8%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="20%" align="center"><?php echo $lang['block_name'] ?></th>
                <th width="16%" align="center"><?php echo $lang['exam_date'] ?></th>
                <th width="10%" align="center"><?php echo $lang['time_exam'] ?></th>
                <th width="18%" align="center"><?php echo $lang['department_exam'] ?></th>
                <th width="18%" align="center"><?php echo $lang['title_exam'] ?></th>
                <th width="10%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $exam_id = $pqh[1];
                $exams = $h->getExamsBlock($exam_id);
                $msg_exam = '';
                if (count($exams) > 0) {
                    foreach ($exams as $kp => $exam) {
                        $no = $kp + 1;
                        $block = $h->getBlockById($exam['block_id']);
                        $block_name = $block['name'];
                        $dp = explode(";", $exam['department_id']);
                        $dp_name = '';
                        if (count($dp) > 0) {
                            foreach ($dp as $dv) {
                                $department = explode("-", $dv);
                                $dp_name .= $department[1].', ';
                            }
                        } 
                        if ($dp_name != '') 
                            $dp_name = substr($dp_name, 0, -2);
                        $tt = explode(";", $exam['title_id']);
                        $tt_name = '';
                        if (count($tt) > 0) {
                            foreach ($tt as $tv) {
                                $title = explode("-", $tv);
                                $tt_name .= $title[1].', ';
                            }
                        }
                        if ($tt_name != '')
                            $tt_name = substr($tt_name, 0, -2);
                        
                        $msg_exam .= '<tr>';
                        $msg_exam .= ' <td align="center">'.$no.'</td>';
                        $msg_exam .= ' <td>'.$block_name.'</td>';
                        $msg_exam .= ' <td align="center">'.date("d/m/Y", $exam['start_date']).' - '.date("d/m/Y", $exam['end_date']).'</td>';
                        $msg_exam .= ' <td>'.$exam['time_exam'].'</td>';
                        $msg_exam .= ' <td align="center">'.$dp_name.'</td>';
                        $msg_exam .= ' <td align="center">'.$tt_name.'</td>';
                        $msg_exam .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_each_exam'].'/'.$exam['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$exam['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_exam .= '</tr>';
                    }
                }
                echo $msg_exam;
              ?>
              </tbody>
              <tfoot>
                <tr>
                    <th width="8%" align="center"><?php echo $lang['no.'] ?></th>
                    <th width="20%" align="center"><?php echo $lang['block_name'] ?></th>
                    <th width="16%" align="center"><?php echo $lang['exam_date'] ?></th>
                    <th width="10%" align="center"><?php echo $lang['time_exam'] ?></th>
                    <th width="18%" align="center"><?php echo $lang['department_exam'] ?></th>
                    <th width="18%" align="center"><?php echo $lang['title_exam'] ?></th>
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