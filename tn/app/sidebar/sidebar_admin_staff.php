<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-successs elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light"><?php echo $text_role; ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="/edit-information">
          <a href="" class="d-block"><?php echo $profile['fullname']; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column <?php echo $def['nav-flat']; ?>" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo $def['link_profile'] ?>" class="nav-link">
              <i class="fas fa-user-tie nav-icon"></i>
              <p><?php echo $lang['manage_profile'] ?></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $def['link_update_profile'] ?>/<?php echo $profile['id'] ?>" class="nav-link">
              <i class="fas fa-user-tie nav-icon"></i>
              <p><?php echo $lang['update_information'] ?></p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $def['link_change_password'] ?>/<?php echo $profile['id'] ?>" class="nav-link">
              <i class="fas fa-key nav-icon"></i>
              <p><?php echo $lang['change_password'] ?></p>
            </a>
          </li>
          <!--
          <li class="nav-item has-treeview">
            <a href="<?php echo $def['link_question'] ?>" class="nav-link">
              <i class="nav-icon fas fa-university"></i>
              <p><?php echo $lang['manage_questions']; ?></p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="javascript:void(0);" class="nav-link">
                <i class="nav-icon fas fa-chart-bar"></i>
              <p><?php echo $lang['manage_report'] ?><i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $def['link_report'] ?>" class="nav-link">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p><?php echo $lang['manage_export_report'] ?></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo $def['link_report_profile'] ?>" class="nav-link">
                  <i class="fas fa-file-excel nav-icon"></i>
                  <p><?php echo $lang['manage_export_candidate'] ?></p>
                </a>
              </li>
              -->
              <li class="nav-item has-treeview">
                <a href="<?php echo $def['link_logout'] ?>" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p><?php echo $lang['logout']; ?></p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>