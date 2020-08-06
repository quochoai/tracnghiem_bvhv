<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['manage_title'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_title'] ?>/"><?php echo $lang['addNew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="titles" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="39%" align="center"><?php echo $lang['title_name'] ?></th>
                <th width="39%" align="center"><?php echo $lang['title_name_short'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $titles = $h->getTitles();
                $msg_title = '';
                if (count($titles) > 0) {
                    foreach ($titles as $kb => $title) {
                        $no = $kb + 1;
                        $msg_title .= '<tr>';
                        $msg_title .= ' <td align="center">'.$no.'</td>';
                        $msg_title .= ' <td><a href="'.$def['link_update_title'].'/'.$title['id'].'" title="'.$lang['update'].'">'.$title['name'].'</a></td>';
                        $msg_title .= ' <td>'.$title['name_short'].'</td>';
                        $msg_title .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_title'].'/'.$title['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$title['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_title .= '</tr>';
                    }
                }
                echo $msg_title;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="39%" align="center"><?php echo $lang['title_name'] ?></th>
                <th width="39%" align="center"><?php echo $lang['title_name_short'] ?></th>
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