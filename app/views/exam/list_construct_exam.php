<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="col-md-10 card-title">
                <?php echo $lang['manage_construct_exam'] ?>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="construct_exams" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="78%" align="center"><?php echo $lang['exam_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $exams = $h->getExams();
                $msg_exam = '';
                if (count($exams) > 0) {
                    foreach ($exams as $kp => $exam) {
                        $no = $kp + 1;
                        $msg_exam .= '<tr>';
                        $msg_exam .= ' <td align="center">'.$no.'</td>';
                        $msg_exam .= ' <td><a href="'.$def['link_update_construct_exam'].'/'.$exam['id'].'" title="'.$lang['click_to_update_construct_exam'].'">'.$exam['name'].'</a></td>';
                        $msg_exam .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_construct_exam'].'/'.$exam['id'].'" title="'.$lang['click_to_update_construct_exam'].'"><i class="fas fa-edit"></i></a></td>';
                        $msg_exam .= '</tr>';
                    }
                }
                echo $msg_exam;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="78%" align="center"><?php echo $lang['exam_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
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