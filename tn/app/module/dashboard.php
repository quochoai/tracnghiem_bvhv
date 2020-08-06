<!-- Main content -->
<?php
    $number_profiles = $h->number_profile_active();
    $number_candidates = $h->number_candidates();
    $number_questions = $h->number_questions();
    $number_blocks = $h->number_blocks();
    $number_departments = $h->number_departments();
    $number_titles = $h->number_titles();
    $number_exams = $h->number_exams();
?>
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_profiles; ?></h3>

            <p><?php echo $lang['text_role_candidate']; ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo $def['link_profile']; ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_candidates; ?></h3>
            <p><?php echo $lang['candidate']; ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo $def['link_profile']; ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_blocks; ?></h3>
            <p><?php echo $lang['block'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="<?php echo $def['link_block'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_departments ?></h3>
            <p><?php echo $lang['department'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo $def['link_department'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?php echo $number_titles; ?></h3>
            <p><?php echo $lang['title'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="<?php echo $def['link_profile'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $number_questions ?></h3>
            <p><?php echo $lang['questions'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-chatbox"></i>
          </div>
          <a href="<?php echo $def['link_question'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3><?php echo $number_exams ?></h3>
            <p><?php echo $lang['exam'] ?></p>
          </div>
          <div class="icon">
            <i class="ion ion-chatbox"></i>
          </div>
          <a href="<?php echo $def['link_exam'] ?>" class="small-box-footer"><?php echo $lang['more_info'] ?> <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->