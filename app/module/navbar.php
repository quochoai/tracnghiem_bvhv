<!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-success navbar-dark">

    <!-- Left navbar links -->

    <ul class="navbar-nav">

      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>
      <?php
        if ($pqh[1] != '' && ($pqh[1] == $def['check_quiz'] || $pqh[1] == $def['quiz'])) {
            $me = '';
            $exam_info = $h->getExamById($pqh[2]);
            $mee .= '<li class="nav-item d-sm-inline-block"><a class="nav-link">'.$lang['exam_name'].': '.$exam_info['name'].'</a></li>';
            echo $mee;  
        }
      ?>

    </ul>



    <!-- SEARCH FORM -->

    <!--

    <form class="form-inline ml-3">

      <div class="input-group input-group-sm">

        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">

        <div class="input-group-append">

          <button class="btn btn-navbar" type="submit">

            <i class="fas fa-search"></i>

          </button>

        </div>

      </div>

    </form>

    -->

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
      <?php
        if ($pqh[1] != '' && ($pqh[1] == $def['check_quiz'] || $pqh[1] == $def['quiz'])) {
      ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL ?>" title="<?php echo $lang['back_to_home']; ?>">
          <?php echo $lang['back_to_home']; ?>
        </a>
      </li>
      <?php } ?>  
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $def['link_logout'] ?>" title="<?php echo $lang['logout']; ?>">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>

  <!-- /.navbar -->