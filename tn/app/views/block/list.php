<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header container-fluid">
            <div class="row">
                <h3 class="col-md-10 card-title">
                    <?php echo $lang['manage_block'] ?>
                </h3>
                <div class="col-md-2"><a class="float-right btn btn-success" href="<?php echo $def['link_create_block'] ?>/"><?php echo $lang['addNew'] ?></a></div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="blocks" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="78%" align="center"><?php echo $lang['block_name'] ?></th>
                <th width="15%" align="center"><?php echo $lang['actions'] ?></th>
              </tr>
              </thead>
              <tbody>
               <?php
                $blocks = $h->getBlocks();
                $msg_block = '';
                if (count($blocks) > 0) {
                    foreach ($blocks as $kb => $block) {
                        $no = $kb + 1;
                        $msg_block .= '<tr>';
                        $msg_block .= ' <td align="center">'.$no.'</td>';
                        $msg_block .= ' <td><a href="'.$def['link_update_block'].'/'.$block['id'].'" title="'.$lang['update'].'">'.$block['name'].'</a></td>';
                        $msg_block .= ' <td align="center"><a class="btn btn-success btn-sm" href="'.$def['link_update_block'].'/'.$block['id'].'" title="'.$lang['update'].'"><i class="fas fa-edit"></i></a> | <a class="btn btn-danger btn-sm delete" data-id="'.$block['id'].'" title="'.$lang['delete'].'"><i class="fas fa-trash-alt"></i></a></a> </td>';
                        $msg_block .= '</tr>';
                    }
                }
                echo $msg_block;
              ?>
              </tbody>
              <tfoot>
              <tr>
                <th width="7%" align="center"><?php echo $lang['no.'] ?></th>
                <th width="78%" align="center"><?php echo $lang['block_name'] ?></th>
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