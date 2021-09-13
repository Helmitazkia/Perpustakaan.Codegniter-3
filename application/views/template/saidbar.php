<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        <img src="<?= base_url('asset/img/profile/') .  $user['image']; ?>"class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=   $user['name'];  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                  </button>
              </span>
          </div>
      </form>
        <!-- /.search form -->
        <!--- QUERY DARI MENU -->
      <?php
        //userdata mengambil session yang lagi login
        //untuk Menanpilkan Menu Header di Saidbar
        $role_id = $this->session->userdata('role_id');
        $queryMenu ="SELECT `user_menu`.`id`,`menu`
                    FROM `user_menu` JOIN `user_access_menu`
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                    WHERE `user_access_menu`.`role_id` =  $role_id
                    ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
                  $menu = $this->db->query( $queryMenu)->result_array();     
      ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!---lOOPING MENU NYA SUPAYA SESUAI DENGAN ROLE_ID/Yang Login-->  
    <ul class="sidebar-menu" data-widget="tree">
      <?php foreach ($menu as $m):?>
          <li class="header">
             <?= $m['menu'];?>
         </li>

         <!--SIAPKAN SUB MENU-->
        <?php
        $menuid = $m['id'];
        $querySubmenu ="SELECT *
                  FROM `user_sub_menu` 
                  WHERE `menu_id` =  $menuid
                  AND `user_sub_menu`.`is_active` = 1 
                  ";
                $Submenu = $this->db->query($querySubmenu)->result_array();     
      ?>
      <?php foreach ($Submenu as $sm ): ?>
      <li>
        <?php if($title == $sm['title']): ?>
          <li class="nav-item">
             <?php else :  ?>
           <li class="nav-item active">
              <?php endif;  ?>
            <a class="nav-link" href="<?= base_url ($sm['url']);?>">
          <i class="<?= ($sm['icon']);?>"></i>
         <span> <?= $sm['title'];  ?></span></a>
      
      </li>
          
      <!--<a href="<?= base_url ($sm['url']);?>">
              <i class="<?= ($sm['icon']);?>"></i><span><?= $sm['title'];  ?></span>
            </a>
        <ul class="treeview-menu">
         <li class="active"><a href="<?php  echo base_url('datamahasiswa/tampil_mahasiswa ') ?>"><i class="fa fa-circle-o"></i>Data Anggota</a></li>
         <li><a href="<?php  echo base_url('datamahasiswa/mahasiswa_b') ?>"><i class="fa fa-circle-o"></i>Data Petugas</a></li>
         <li><a href="<?php  echo base_url('datamahasiswa/user_role') ?>"><i class="fa fa-circle-o"></i>Data User</a></li>
      </ul>-->

      <?php endforeach;  ?>
        
        
         
      <?php endforeach;?>
           
    
      <!--<<li class="header">MENU</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Menu Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Sub Menu Management</span></a></li>-->
        <li class="header">LABELS</li>
        <!--<li><a href="#"><i class="fa fa-exclamation"></i> <span>Ganti Passwprd</span></a></li>-->
        <li><a href="<?php  echo base_url('auth/logout') ?>"><i  class="fa fa-angle-double-left"></i> <span>Logout</span></a></li>
        <!--<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
