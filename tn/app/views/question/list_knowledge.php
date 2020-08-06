<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['list_knowledge'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_knowledge'] ?>/"><?php echo $lang['addNew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="knowledge" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="78%" align="center"><?php echo $lang['knowledge'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $knowledge = $h->getKnowledge();
                $msg_knowledge = '';
                if (count($knowledge) > 0) {
                    foreach ($knowledge as $kk => $kn) {
                        $no = $kk + 1;
                        $msg_knowledge .= '<tr>';
                        $msg_knowledge .= ' <td align="center">'.$no.'</td>';
                        $msg_knowledge .= ' <td><a href="'.$def['link_update_knowledge'].'/'.$kn['id'].'" title="'.$lang['update'].'">'.$kn['name'].'</a></td>';
                        $msg_knowledge .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_knowledge'].'/'.$kn['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$kn['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_knowledge .= '</tr>';
                    }
                }
                echo $msg_knowledge;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="78%" align="center"><?php echo $lang['knowledge'] ?></th>
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