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
                      echo $lang['manage_questions']; 
                    ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_question'] ?>"><?php echo $lang['addNew'] ?></a></div>
                <div class="col-md-12">
                    <a class="btn btn-success" href="<?php echo $def['link_import_question'] ?>"><?php echo $lang['import_question'] ?></a>    
                <div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="questions" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="10%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="15%" align="center"><?php echo $lang['knowledge'] ?></th>
                <th width="60%" align="center"><?php echo $lang['questions'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $questions = $h->getquestions();
                $msg_question = '';
                if (count($questions) > 0) {
                    foreach ($questions as $kp => $question) {
                        $no = $kp + 1;
                        $knowledge = $question['knowledge'];
                        $q = $question['question'];
                        
                        $msg_question .= '<tr>';
                        $msg_question .= ' <td align="center">'.$no.'</td>';
                        $msg_question .= ' <td>'.$knowledge.'</td>';
                        $msg_question .= ' <td>'.$q.'</td>';
                        $msg_question .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_question'].'/'.$question['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$question['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_question .= '</tr>';
                    }
                }
                echo $msg_question;
              ?>
              </tbody>
              <tfoot>
                <tr>
                    <th width="10%" align="center"><?php echo $lang['no.'] ?></th>
                    <th width="15%" align="center"><?php echo $lang['knowledge'] ?></th>
                    <th width="60%" align="center"><?php echo $lang['questions'] ?></th>
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